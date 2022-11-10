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
use Roave\BetterReflection\Reflection\Reflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

abstract class BaseEntity
{
    protected LoggerInterface $logger;

    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector $reflector,
        protected AttributeParser $attributeParser
    ) {
        $this->logger = $this->configuration->getLogger();
    }

    abstract public function getReflection(): Reflection;

    abstract public function getImplementingReflectionClass(): ReflectionClass;

    abstract protected function getDocCommentRecursive(): string;

    abstract protected function getDocCommentReflectionRecursive(): Reflection;

    abstract public function getDescription(): string;

    public function getAttributeParser(): AttributeParser
    {
        return $this->attributeParser;
    }

    public static function generateObjectIdByReflection(Reflection $reflection): string
    {
        if (method_exists($reflection, 'getImplementingClass')) {
            return "{$reflection->getImplementingClass()->getName()}:{$reflection->getName()}";
        }
        return $reflection->getName();
    }

    final public function getObjectId(): string
    {
        return self::generateObjectIdByReflection($this->getReflection());
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

    final public function getDocBlock(): DocBlock
    {
        static $docBlocks = [];
        $objectId = $this->getObjectId();
        if (!isset($docBlocks[$objectId])) {
            $docBlockFactory = $this->attributeParser->getDocBlockFactory();
            $docBlocks[$objectId] = $docBlockFactory->create($this->getDocCommentRecursive() ?: ' ');
        }
        return $docBlocks[$objectId];
    }

    public function isInternal(): bool
    {
        static $isInternalCache = [];
        $objectId = $this->getObjectId();
        if (!isset($isInternalCache[$objectId])) {
            $docBlock = $this->getDocBlock();
            $internalBlock = $docBlock->getTagsByName('internal')[0] ?? null;
            $isInternalCache[$objectId] = (bool)$internalBlock;
        }
        return $isInternalCache[$objectId];
    }

    public function isDeprecated(): bool
    {
        static $isDeprecatedCache = [];
        $objectId = $this->getObjectId();
        if (!isset($isDeprecatedCache[$objectId])) {
            $docBlock = $this->getDocBlock();
            $internalBlock = $docBlock->getTagsByName('deprecated')[0] ?? null;
            $isDeprecatedCache[$objectId] = (bool)$internalBlock;
        }
        return $isDeprecatedCache[$objectId];
    }

    public function hasDescriptionLinks(): bool
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
    public function getDescriptionLinks(?Context $context = null): array
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
                        if(!str_contains($this->getDocCommentRecursive(), $name)) {
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

    public function hasThrows(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('throws')) > 0;
    }

    /**
     * @return array<int,array{name:string, description:string|null}>
     */
    public function getThrows(?Context $context = null): array
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

    public function hasExamples(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('example')) > 0;
    }

    /**
     * @return array<int,array{example:string}>
     */
    public function getExamples(): array
    {
        static $examplesCache = [];
        $objectId = $this->getObjectId();
        if (!isset($examplesCache[$objectId])) {
            $examples = [];
            $docBlock = $this->getDocBlock();
            foreach ($docBlock->getTagsByName('example') as $example) {
                try {
                    $examples[] = ['example' => (string)$example];
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }
            $examplesCache[$objectId] = $examples;
        }
        return $examplesCache[$objectId];
    }

    public function getFirstExample(): string
    {
        $examples = $this->getExamples();
        return $examples[0]['example'] ?? '';
    }

    public function getDocNote(): string
    {
        static $docNoteCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docNoteCache[$objectId])) {
            $docBlock = $this->getDocBlock();
            $docNoteCache[$objectId] = (string)($docBlock->getTagsByName('note')[0] ?? '');
        }
        return $docNoteCache[$objectId];
    }
}
