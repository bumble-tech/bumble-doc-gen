<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\EntityDocRender\EntityDocRenderHelper;
use phpDocumentor\Reflection\DocBlock;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflection\ReflectionProperty;
use Roave\BetterReflection\Reflector\Reflector;

abstract class BaseEntity
{
    protected LoggerInterface $logger;

    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector              $reflector,
        protected AttributeParser        $attributeParser
    )
    {
        $this->logger = $this->configuration->getLogger();
    }

    public function getConfiguration(): ConfigurationInterface
    {
        return $this->configuration;
    }

    abstract public function getReflection(): ReflectionClass|ReflectionMethod|ReflectionProperty|ReflectionClassConstant;

    abstract public function getImplementingReflectionClass(): ReflectionClass;

    #[Cache\CacheableMethod] abstract protected function getDocCommentRecursive(): string;

    abstract protected function getDocCommentReflectionRecursive(): ReflectionClass|ReflectionMethod|ReflectionProperty|ReflectionClassConstant;

    #[Cache\CacheableMethod] abstract public function getDescription(): string;

    public function getAttributeParser(): AttributeParser
    {
        return $this->attributeParser;
    }

    public static function generateObjectIdByReflection(ReflectionClass|ReflectionMethod|ReflectionProperty|ReflectionClassConstant $reflection): string
    {
        if (method_exists($reflection, 'getImplementingClass')) {
            return "{$reflection->getImplementingClass()->getName()}:{$reflection->getName()}";
        }
        return $reflection->getName();
    }

    public function getObjectId(): string
    {
        if (method_exists($this, 'getClassEntity')) {
            return "{$this->getClassEntity()->getName()}:{$this->getName()}";
        }
        return $this->getName();
    }

    protected function prettyVarExport(mixed $expression): string
    {
        $export = var_export($expression, true);
        $patterns = [
            "/array \(/" => '[',
            "/^([ ]*)\)(,?)$/m" => '$1]$2',
            "/=>[ ]?\n[ ]+\[/" => '=> [',
            "/([ ]*)(\'[^\']+\') => ([\[\'])/" => '$1$2 => $3',
        ];
        return str_replace(
            PHP_EOL,
            ' ',
            preg_replace(array_keys($patterns), array_values($patterns), $export)
        );
    }

    #[Cache\CacheableMethod] final public function getDocBlock(): DocBlock
    {
        $docBlockFactory = $this->attributeParser->getDocBlockFactory();
        return $docBlockFactory->create($this->getDocCommentRecursive() ?: ' ');
    }

    #[Cache\CacheableMethod] public function isInternal(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('internal')[0] ?? null;
        return (bool)$internalBlock;
    }

    #[Cache\CacheableMethod] public function isDeprecated(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('deprecated')[0] ?? null;
        return (bool)$internalBlock;
    }

    #[Cache\CacheableMethod] public function hasDescriptionLinks(): bool
    {
        $docBlock = $this->getDocBlock();
        return preg_match_all('/(\@see )(.*?)( |}|])/', $this->getDescription() . ' ') ||
            count($docBlock->getTagsByName('see')) || count($docBlock->getTagsByName('link'));
    }

    private function getDocCommentImplementingClass(): ReflectionClass
    {
        $implementingReflection = $this->getDocCommentReflectionRecursive();
        if (method_exists($implementingReflection, 'getImplementingClass')) {
            $implementingReflectionClass = $implementingReflection->getImplementingClass();
        } else {
            $implementingReflectionClass = $implementingReflection;
        }
        return $implementingReflectionClass;
    }

    /**
     * @return array<int,array{name:string, description:string|null, url:string|null}>
     */
    #[Cache\CacheableMethod] public function getDescriptionLinks(?Context $context = null): array
    {
        static $linksCache = [];
        $objectId = $this->getObjectId() .
            ($context ? spl_object_id($context) . $context->getCurrentTemplateFilePatch() : '');
        if (!isset($linksCache[$objectId])) {
            $links = [];
            $docBlock = $this->getDocBlock();
            $getLinkKey = function (?string $url, ?string $name): string {
                return md5($url . $name);
            };

            $docCommentImplementingClass = $this->getDocCommentImplementingClass();
            foreach ($docBlock->getTagsByName('see') as $seeBlock) {
                try {
                    $name = (string)$seeBlock->getReference();
                    $description = (string)$seeBlock->getDescription();
                    $url = null;
                    if (filter_var($name, FILTER_VALIDATE_URL)) {
                        $url = $name;
                    } elseif (str_starts_with($name, '\\') && $context) {

                        $className = $name;

                        // fixing annotations bug. Result always started with `\\`
                        if (!str_contains($this->getDocCommentRecursive(), $name)) {
                            $className = ParserHelper::parseFullClassName(
                                $name,
                                $this->reflector,
                                $docCommentImplementingClass
                            );
                        }

                        $data = EntityDocRenderHelper::getEntityUrlData(
                            $className,
                            $context,
                            $this->getImplementingReflectionClass()->getName()
                        );
                        $url = $data['url'];
                        $name = $data['title'];
                    }
                    $key = $getLinkKey($url, $name);
                    $links[$key] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => $description,
                    ];
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }

            $description = $this->getDescription();
            if (preg_match_all('/(\@see )(.*?)( |}|])/', $description . ' ', $matches)) {
                foreach ($matches[2] as $name) {
                    $url = null;
                    if (filter_var($name, FILTER_VALIDATE_URL)) {
                        $url = $name;
                    } elseif ($context) {
                        $className = ParserHelper::parseFullClassName(
                            $name,
                            $this->reflector,
                            $docCommentImplementingClass
                        );
                        $data = EntityDocRenderHelper::getEntityUrlData(
                            $className,
                            $context,
                            $this->getImplementingReflectionClass()->getName()
                        );
                        $url = $data['url'];
                        $name = $data['title'];
                    }
                    $key = $getLinkKey($url, $name);
                    $links[$key] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => '',
                    ];
                }
            }

            foreach ($docBlock->getTagsByName('link') as $linkBlock) {
                try {
                    $description = (string)$linkBlock->getDescription();
                    $url = $linkBlock->getLink();
                    $key = $getLinkKey($url, $url);
                    $links[$key] = [
                        'url' => $url,
                        'name' => $url,
                        'description' => $description,
                    ];
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }

            $linksCache[$objectId] = $links;
        }
        return $linksCache[$objectId];
    }

    #[Cache\CacheableMethod] public function hasThrows(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('throws')) > 0;
    }

    /**
     * @return array<int,array{name:string, description:string|null}>
     */
    #[Cache\CacheableMethod] public function getThrows(?Context $context = null): array
    {
        static $throwsCache = [];
        $objectId = $this->getObjectId() .
            ($context ? spl_object_id($context) . $context->getCurrentTemplateFilePatch() : '');
        if (!isset($throwsCache[$objectId])) {
            $throws = [];
            try {
                $implementingReflectionClass = $this->getDocCommentImplementingClass();
                $docBlock = $this->getDocBlock();
                foreach ($docBlock->getTagsByName('throws') as $throwBlock) {
                    try {
                        $names = explode('|', (string)$throwBlock->getType());
                        foreach ($names as $name) {
                            $className = ParserHelper::parseFullClassName(
                                $name,
                                $this->reflector,
                                $implementingReflectionClass
                            );
                            $url = null;
                            if ($context) {
                                $data = EntityDocRenderHelper::getEntityUrlData(
                                    $className,
                                    $context,
                                    $this->getImplementingReflectionClass()->getName()
                                );
                                $url = $data['url'];
                                $name = $data['title'];
                            }

                            $throws[] = [
                                'name' => $name,
                                'url' => $url,
                                'description' => (string)$throwBlock->getDescription(),
                            ];
                        }
                    } catch (\Exception $e) {
                        $this->logger->error($e->getMessage());
                    }
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
            $throwsCache[$objectId] = $throws;
        }
        return $throwsCache[$objectId];
    }

    #[Cache\CacheableMethod] public function hasExamples(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('example')) > 0;
    }

    /**
     * @return array<int,array{example:string}>
     */
    #[Cache\CacheableMethod] public function getExamples(): array
    {
        $examples = [];
        $docBlock = $this->getDocBlock();
        foreach ($docBlock->getTagsByName('example') as $example) {
            try {
                $examples[] = ['example' => (string)$example];
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
        }
        return $examples;
    }

    #[Cache\CacheableMethod] public function getFirstExample(): string
    {
        $examples = $this->getExamples();
        return $examples[0]['example'] ?? '';
    }

    #[Cache\CacheableMethod] public function getDocNote(): string
    {
        $docBlock = $this->getDocBlock();
        return (string)($docBlock->getTagsByName('note')[0] ?? '');
    }

    #[Cache\CacheableMethod] public function getDocComment(): string
    {
        return $this->getReflection()->getDocComment();
    }
}
