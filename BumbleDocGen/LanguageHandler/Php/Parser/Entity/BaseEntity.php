<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheKey\CacheableEntityInterface;
use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Renderer\RendererHelper;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflection\ReflectionProperty;

abstract class BaseEntity implements CacheableEntityInterface, EntityInterface
{
    protected function __construct(
        private Configuration          $configuration,
        private ReflectorWrapper       $reflector,
        private LocalObjectCache       $localObjectCache,
        private GetDocumentedEntityUrl $documentedEntityUrlFunction,
        private RendererHelper         $renderHelper,
        private ParserHelper           $parserHelper,
        private LoggerInterface        $logger
    )
    {
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     * @internal
     */
    abstract protected function getReflection(): ReflectionClass|ReflectionMethod|ReflectionProperty|ReflectionClassConstant;

    abstract public function getImplementingReflectionClass(): ReflectionClass;

    #[CacheableMethod] abstract protected function getDocCommentRecursive(): string;

    abstract public function getDocCommentEntity(): ClassEntity|MethodEntity|PropertyEntity|ConstantEntity;

    #[CacheableMethod] abstract public function getDescription(): string;

    #[CacheableMethod] abstract public function getFileName(): ?string;

    #[CacheableMethod] abstract public function getStartLine(): int;

    #[CacheableMethod] abstract public function getDocBlock(): DocBlock;

    abstract public function getRootEntityCollection(): ClassEntityCollection;

    abstract public function getEntityDependencies(): array;

    abstract public function getPhpHandlerSettings(): PhpHandlerSettings;

    final protected function getLocalObjectCache(): LocalObjectCache
    {
        return $this->localObjectCache;
    }

    /**
     * Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
     * @throws InvalidConfigurationParameterException
     */
    public function getAbsoluteFileName(): ?string
    {
        $relativeFileName = $this->getFileName();
        return $relativeFileName ? $this->configuration->getProjectRoot() . $relativeFileName : null;
    }

    protected function prepareTypeString(string $type): string
    {
        try {
            $cache = $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
            $cache = [];
        }
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
                        $this->getRootEntityCollection()->getLoadedOrCreateNew($t)->entityDataCanBeLoaded()
                    ) {
                        $types[$k] = "\\{$t}";
                    }
                }
                $cache[$cacheKey] = $types[$k];
                $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cache);
            } else {
                $types[$k] = $cache[$cacheKey];
            }
        }
        return implode('|', $types);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFileSourceLink(bool $withLine = true): ?string
    {
        $fileName = $this->getFileName();
        if (!$fileName) {
            return null;
        }
        return $this->getPhpHandlerSettings()->getFileSourceBaseUrl() . $fileName . ($withLine ? "#L{$this->getStartLine()}" : '');
    }

    /**
     * Get entity unique ID
     */
    public function getObjectId(): string
    {
        if (method_exists($this, 'getRootEntity')) {
            return "{$this->getRootEntity()->getName()}:{$this->getName()}";
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

    #[CacheableMethod] public function isInternal(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('internal')[0] ?? null;
        return (bool)$internalBlock;
    }

    #[CacheableMethod] public function isDeprecated(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('deprecated')[0] ?? null;
        return (bool)$internalBlock;
    }

    #[CacheableMethod] public function hasDescriptionLinks(): bool
    {
        $docBlock = $this->getDocBlock();
        return preg_match_all('/(\@see )(.*?)( |}|])/', $this->getDescription() . ' ') ||
            count($docBlock->getTagsByName('see')) || count($docBlock->getTagsByName('link'));
    }

    /**
     * @throws \Exception
     */
    #[CacheableMethod] protected function getDescriptionLinksData(): array
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
                } elseif ($url = $this->renderHelper->getPreloadResourceLink($name)) {
                    $links[] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => $description,
                    ];
                } elseif (str_starts_with($name, '\\')) {
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
                    $data = $this->getRootEntityCollection()->getEntityLinkData(
                        $className,
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
                $this->logger->error($e->getMessage());
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
                } elseif ($url = $this->renderHelper->getPreloadResourceLink($name)) {
                    $links[] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => $description,
                    ];
                }
                $currentClassEntity = is_a($docCommentImplementingClass, ClassEntity::class) ? $docCommentImplementingClass : $docCommentImplementingClass->getRootEntity();
                $className = $this->parserHelper->parseFullClassName(
                    $name,
                    $currentClassEntity->getReflection()
                );
                $data = $this->getRootEntityCollection()->getEntityLinkData(
                    $className,
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
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function getDescriptionLinks(): array
    {
        $linksData = $this->getDescriptionLinksData();
        return $this->fillInLinkDataWithUrls($linksData);
    }

    #[CacheableMethod] public function hasThrows(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('throws')) > 0;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] protected function getThrowsData(): array
    {
        $throws = [];
        $implementingReflectionClass = $this->getDocCommentEntity()->getRootEntity()->getReflection();
        $docBlock = $this->getDocBlock();
        foreach ($docBlock->getTagsByName('throws') as $throwBlock) {
            if (is_a($throwBlock, DocBlock\Tags\Throws::class)) {
                $names = explode('|', (string)$throwBlock->getType());
                foreach ($names as $name) {
                    if ($url = $this->renderHelper->getPreloadResourceLink($name)) {
                        $throws[] = [
                            'url' => $url,
                            'name' => $name,
                            'description' => (string)$throwBlock->getDescription(),
                        ];
                        continue;
                    }
                    $className = $this->parserHelper->parseFullClassName(
                        $name,
                        $implementingReflectionClass
                    );
                    $throwData = [
                        'name' => $className,
                        'description' => (string)$throwBlock->getDescription(),
                    ];
                    $throwData['entityData'] = $this->getRootEntityCollection()->getEntityLinkData(
                        $className,
                        $this->getImplementingReflectionClass()->getName(),
                        false
                    );
                    $throws[] = $throwData;
                }
            }
        }
        return $throws;
    }

    /**
     * Get parsed throws from `throws` doc block
     *
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getThrows(): array
    {
        $throwsData = $this->getThrowsData();
        return $this->fillInLinkDataWithUrls($throwsData);
    }

    private function fillInLinkDataWithUrls(array $linkData): array
    {
        foreach ($linkData as $key => $data) {
            if (!isset($data['url'])) {
                $throwsData[$key]['url'] = null;
            } else {
                continue;
            }
            if (($data['entityData'] ?? null) && $data['entityData']['entityName']) {
                $linkData[$key]['url'] = call_user_func_array(
                    callback: $this->documentedEntityUrlFunction,
                    args: [
                        $this->getRootEntityCollection(),
                        $data['entityData']['entityName'],
                        $data['entityData']['cursor']
                    ]
                );
                unset($data['entityData']);
            }
        }
        return $linkData;
    }

    #[CacheableMethod] public function hasExamples(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('example')) > 0;
    }

    /**
     * Get parsed examples from `examples` doc block
     *
     * @return array<int,array{example:string}>
     */
    #[CacheableMethod] public function getExamples(): array
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

    /**
     * Get first example from @examples doc block
     */
    #[CacheableMethod] public function getFirstExample(): string
    {
        $examples = $this->getExamples();
        return $examples[0]['example'] ?? '';
    }

    #[CacheableMethod] public function getDocNote(): string
    {
        $docBlock = $this->getDocBlock();
        return (string)($docBlock->getTagsByName('note')[0] ?? '');
    }


    /**
     * Get the doc comment of an entity
     *
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocComment(): string
    {
        return $this->getReflection()->getDocComment();
    }

    public function entityCacheIsOutdated(): bool
    {
        return true;
    }
}
