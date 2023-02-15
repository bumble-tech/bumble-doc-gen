<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\Cache\CacheKey\RenderContextCacheKeyGenerator;
use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\EntityDocRender\EntityDocRenderHelper;
use BumbleDocGen\Render\Twig\Filter\StrTypeToUrl;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;
use phpDocumentor\Reflection\DocBlock;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflection\ReflectionProperty;
use Roave\BetterReflection\Reflector\Reflector;

abstract class BaseEntity
{
    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector              $reflector,
    )
    {
    }

    public function getConfiguration(): ConfigurationInterface
    {
        return $this->configuration;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->getConfiguration()->getLogger();
    }

    /**
     * @internal
     */
    abstract public function getReflection(): ReflectionClass|ReflectionMethod|ReflectionProperty|ReflectionClassConstant;

    abstract public function getImplementingReflectionClass(): ReflectionClass;

    #[Cache\CacheableMethod] abstract protected function getDocCommentRecursive(): string;

    abstract protected function getDocCommentEntity(): ClassEntity|MethodEntity|PropertyEntity|ConstantEntity;

    #[Cache\CacheableMethod] abstract public function getDescription(): string;

    /**
     * Returns the relative path to a file if it can be retrieved and if the file is in the project directory
     */
    #[Cache\CacheableMethod] abstract public function getFileName(): ?string;

    #[Cache\CacheableMethod] abstract public function getStartLine(): int;

    #[Cache\CacheableMethod] abstract public function getDocBlock(): DocBlock;

    abstract protected function getClassEntityCollection(): ClassEntityCollection;

    protected function prepareTypeString(string $type): string
    {
        static $cache = [];
        $types = explode('|', $type);
        foreach ($types as $k => $t) {
            $cacheKey = md5($t);
            if (!isset($cache[$cacheKey])) {
                if ($t && !str_starts_with($t, '\\')) {
                    if (
                        str_contains($t, '\\') ||
                        preg_match('/^([A-Z]+)([a-zA-Z_0-9]+)$/', $t) && ParserHelper::isCorrectClassName($t, false)
                    ) {
                        $types[$k] = "\\{$t}";
                    } elseif (
                        ParserHelper::isCorrectClassName($t) &&
                        $this->getClassEntityCollection()->getLoadedOrCreateNew($t)->classDataCanBeLoaded()
                    ) {
                        $types[$k] = "\\{$t}";
                    }
                }
                $cache[$cacheKey] = $types[$k];
            } else {
                $types[$k] = $cache[$cacheKey];
            }
        }
        return implode('|', $types);
    }

    public function getFileSourceLink(bool $withLine = true): ?string
    {
        $fileName = $this->getFileName();
        if (!$fileName) {
            return null;
        }
        return $this->configuration->getFileSourceBaseUrl() . $fileName . ($withLine ? "#L{$this->getStartLine()}" : '');
    }

    public static function generateObjectIdByReflection(ReflectionClass|ReflectionMethod|ReflectionProperty|ReflectionClassConstant $reflection): string
    {
        if (method_exists($reflection, 'getImplementingClass')) {
            return "{$reflection->getImplementingClass()->getName()}:{$reflection->getName()}";
        }
        return $reflection->getName();
    }

    /**
     * Get entity unique ID
     */
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

    #[Cache\CacheableMethod(
        Cache\CacheableMethod::MONTH_SECONDS,
        RenderContextCacheKeyGenerator::class
    )]
    protected function getDescriptionLinksData(?Context $context = null): array
    {
        $links = [];
        $docBlock = $this->getDocBlock();
        $docCommentImplementingClass = $this->getDocCommentEntity();

        foreach ($docBlock->getTagsByName('see') as $seeBlock) {
            if (!is_a($seeBlock, DocBlock\Tags\See::class)) {
                continue;
            }
            try {
                $name = (string)$seeBlock->getReference();
                $description = (string)$seeBlock->getDescription();
                if (filter_var($name, FILTER_VALIDATE_URL)) {
                    $links[] = [
                        'url' => $name,
                        'name' => $name,
                        'description' => $description,
                    ];
                } elseif (array_key_exists($name, StrTypeToUrl::$builtInUrls)) {
                    $links[] = [
                        'url' => StrTypeToUrl::$builtInUrls[$name],
                        'name' => $name,
                        'description' => $description,
                    ];
                } elseif (str_starts_with($name, '\\') && $context) {
                    if (!str_contains($name, '::')) {
                        // tmp hack to fix methods declared as global functions
                        if (str_contains($name, '(') || str_contains($name, '$')) {
                            $name = str_replace(
                                "{$docCommentImplementingClass->getNamespaceName()}\\",
                                "{$docCommentImplementingClass->getName()}::",
                                $name
                            );
                        }
                    }
                    $name = str_replace([
                        'self::',
                        '$this->'
                    ], "{$docCommentImplementingClass->getShortName()}::", $name);

                    $className = $name;
                    $data = EntityDocRenderHelper::getEntityDataByLink(
                        $className,
                        $context,
                        $this->getImplementingReflectionClass()->getName(),
                        false
                    );
                    $links[] = [
                        'entityData' => $data,
                        'url' => null,
                        'name' => $data['title'],
                        'description' => $description,
                    ];
                }
            } catch (\Exception $e) {
                $this->getLogger()->error($e->getMessage());
            }
        }

        $description = $this->getDescription();
        if (preg_match_all('/(\@see )(.*?)( |}|])/', $description . ' ', $matches)) {
            foreach ($matches[2] as $name) {
                if (filter_var($name, FILTER_VALIDATE_URL)) {
                    $links[] = [
                        'url' => $name,
                        'name' => $name,
                        'description' => '',
                    ];
                } elseif (array_key_exists($name, StrTypeToUrl::$builtInUrls)) {
                    $links[] = [
                        'url' => StrTypeToUrl::$builtInUrls[$name],
                        'name' => $name,
                        'description' => $description,
                    ];
                } elseif ($context) {
                    $currentClassEntity = is_a($docCommentImplementingClass, ClassEntity::class) ? $docCommentImplementingClass : $docCommentImplementingClass->getClassEntity();
                    $className = ParserHelper::parseFullClassName(
                        $name,
                        $this->reflector,
                        $currentClassEntity->getReflection()
                    );
                    $data = EntityDocRenderHelper::getEntityDataByLink(
                        $className,
                        $context,
                        $this->getImplementingReflectionClass()->getName(),
                        false
                    );
                    $links[] = [
                        'entityData' => $data,
                        'url' => null,
                        'name' => $data['title'],
                        'description' => $description,
                    ];
                }
            }
        }

        foreach ($docBlock->getTagsByName('link') as $linkBlock) {
            if (!is_a($linkBlock, DocBlock\Tags\Link::class)) {
                continue;
            }
            $description = (string)$linkBlock->getDescription();
            $url = $linkBlock->getLink();
            $links[] = [
                'url' => $url,
                'name' => $url,
                'description' => $description,
            ];
        }

        return $links;
    }

    /**
     * Get parsed links from description and doc blocks `see` and `link`
     */
    public function getDescriptionLinks(?Context $context = null): array
    {
        $linksData = $this->getDescriptionLinksData($context);
        $getDocumentedClassUrl = new GetDocumentedClassUrl($context);
        foreach ($linksData as $key => $data) {
            if (!isset($data['url'])) {
                $linksData[$key]['url'] = null;
            } else {
                continue;
            }
            if (($data['entityData'] ?? null) && $data['entityData']['entityName']) {
                $linksData[$key]['url'] = $getDocumentedClassUrl($data['entityData']['entityName'], $data['entityData']['cursor']);
                unset($data['entityData']);
            }
        }
        return $linksData;
    }

    #[Cache\CacheableMethod] public function hasThrows(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('throws')) > 0;
    }

    #[Cache\CacheableMethod(
        Cache\CacheableMethod::MONTH_SECONDS,
        RenderContextCacheKeyGenerator::class
    )]
    protected function getThrowsData(?Context $context = null): array
    {
        $throws = [];
        $implementingReflectionClass = $this->getDocCommentEntity()->getClassEntity()->getReflection();
        $docBlock = $this->getDocBlock();
        foreach ($docBlock->getTagsByName('throws') as $throwBlock) {
            if (is_a($throwBlock, DocBlock\Tags\Throws::class)) {
                $names = explode('|', (string)$throwBlock->getType());
                foreach ($names as $name) {
                    if (array_key_exists($name, StrTypeToUrl::$builtInUrls)) {
                        $throws[] = [
                            'url' => StrTypeToUrl::$builtInUrls[$name],
                            'name' => $name,
                            'description' => (string)$throwBlock->getDescription(),
                        ];
                        continue;
                    }
                    $className = ParserHelper::parseFullClassName(
                        $name,
                        $this->reflector,
                        $implementingReflectionClass
                    );
                    $throwData = [
                        'name' => $className,
                        'description' => (string)$throwBlock->getDescription(),
                    ];
                    if ($context) {
                        $throwData['entityData'] = EntityDocRenderHelper::getEntityDataByLink(
                            $className,
                            $context,
                            $this->getImplementingReflectionClass()->getName(),
                            false
                        );
                    }
                    $throws[] = $throwData;
                }
            }
        }
        return $throws;
    }

    /**
     * Get parsed throws from `throws` doc block
     */
    public function getThrows(?Context $context = null): array
    {
        $throwsData = $this->getThrowsData($context);
        $getDocumentedClassUrl = new GetDocumentedClassUrl($context);
        foreach ($throwsData as $key => $data) {
            if (!isset($data['url'])) {
                $throwsData[$key]['url'] = null;
            } else {
                continue;
            }
            if (($data['entityData'] ?? null) && $data['entityData']['entityName']) {
                $throwsData[$key]['url'] = $getDocumentedClassUrl($data['entityData']['entityName'], $data['entityData']['cursor']);
                unset($data['entityData']);
            }
        }
        return $throwsData;
    }

    #[Cache\CacheableMethod] public function hasExamples(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('example')) > 0;
    }

    /**
     * Get parsed examples from `examples` doc block
     *
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
                $this->getLogger()->error($e->getMessage());
            }
        }
        return $examples;
    }

    /**
     * Get first example from @examples doc block
     */
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

    /**
     * Get the doc comment of an entity
     */
    #[Cache\CacheableMethod] public function getDocComment(): string
    {
        return $this->getReflection()->getDocComment();
    }
}
