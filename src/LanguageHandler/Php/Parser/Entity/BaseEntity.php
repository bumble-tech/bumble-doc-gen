<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Renderer\RendererHelper;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;
use DI\Attribute\Inject;
use phpDocumentor\Reflection\DocBlock;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;

abstract class BaseEntity implements CacheableEntityInterface, EntityInterface
{
    use CacheableEntityTrait;

    #[Inject] private GetDocumentedEntityUrl $documentedEntityUrlFunction;
    #[Inject] private RendererHelper $rendererHelper;

    protected function __construct(
        private Configuration $configuration,
        private LocalObjectCache $localObjectCache,
        private ParserHelper $parserHelper,
        private LoggerInterface $logger
    ) {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    abstract public function getAst(): \PhpParser\Node\Stmt;

    abstract public function getImplementingClass(): ClassEntity;

    abstract protected function getDocCommentRecursive(): string;

    abstract public function getDocCommentEntity(): ClassEntity|MethodEntity|PropertyEntity|ConstantEntity;

    abstract public function getDescription(): string;

    abstract public function getFileName(): ?string;

    #[CacheableMethod] abstract public function getStartLine(): int;

    abstract public function getDocBlock(): DocBlock;

    abstract public function getRootEntityCollection(): ClassEntityCollection;

    abstract public function getPhpHandlerSettings(): PhpHandlerSettings;

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getRelativeFileName(): ?string
    {
        return $this->getCurrentRootEntity()->getRelativeFileName();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    final public function isEntityFileCanBeLoad(): bool
    {
        return $this->getCurrentRootEntity()->isClassLoad() && $this->getRelativeFileName();
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

    public function isInternal(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('internal')[0] ?? null;
        return (bool)$internalBlock;
    }

    public function isDeprecated(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('deprecated')[0] ?? null;
        return (bool)$internalBlock;
    }

    /**
     * @throws \Exception
     */
    public function hasDescriptionLinks(): bool
    {
        return count($this->getDescriptionLinksData()) > 0;
    }

    /**
     * @throws \Exception
     */
    #[CacheableMethod] protected function getDescriptionLinksData(): array
    {
        $links = [];
        $docBlock = $this->getDocBlock();
        $getDocCommentEntity = $this->getDocCommentEntity();

        if (is_a($getDocCommentEntity, ClassEntity::class)) {
            $docCommentImplementingClass = $getDocCommentEntity;
        } elseif (method_exists($getDocCommentEntity, 'getImplementingClass')) {
            $docCommentImplementingClass = $getDocCommentEntity->getImplementingClass();
        } else {
            $docCommentImplementingClass = $getDocCommentEntity;
        }

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
                } elseif ($url = $this->rendererHelper->getPreloadResourceLink($name)) {
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
                        } else {
                            // phpDocumentor resolves function values with an error as a class (adds namespace).
                            // This is a temporary fix that allows us to check whether the call is to the current class or to another.
                            $rawValue = '';
                            $ref = $seeBlock->getReference();
                            $seeBlockRefReflection = new \ReflectionClass($ref);
                            if ($seeBlockRefReflection->hasProperty('fqsen')) {
                                $property = $seeBlockRefReflection->getProperty('fqsen');
                                $property->setAccessible(true);
                                $fqsenProperty = $property->getValue($ref);
                                if (is_a($fqsenProperty, \phpDocumentor\Reflection\Fqsen::class)) {
                                    $rawValue = $fqsenProperty->getName();
                                }
                            }
                            if ($rawValue && !str_contains($rawValue, '\\')) {
                                if ($docCommentImplementingClass->hasMethod($rawValue)) {
                                    $name = "{$docCommentImplementingClass->getName()}::{$rawValue}()";
                                } elseif ($docCommentImplementingClass->hasProperty($rawValue)) {
                                    $name = "{$docCommentImplementingClass->getName()}::${$rawValue}";
                                } elseif ($docCommentImplementingClass->hasConstant($rawValue)) {
                                    $name = "{$docCommentImplementingClass->getName()}::{$rawValue}";
                                }
                            }
                        }
                    }
                    $name = str_replace([
                        'self::',
                        '$this->'
                    ], "{$docCommentImplementingClass->getShortName()}::", $name);

                    $links[] = [
                        'className' => $name,
                        'url' => null,
                        'name' => $name,
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
                } elseif ($url = $this->rendererHelper->getPreloadResourceLink($name)) {
                    $links[] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => $description,
                    ];
                } else {
                    $currentClassEntity = is_a($docCommentImplementingClass, ClassEntity::class) ? $docCommentImplementingClass : $docCommentImplementingClass->getRootEntity();
                    $className = $this->parserHelper->parseFullClassName(
                        $name,
                        $currentClassEntity
                    );

                    $links[] = [
                        'className' => $className,
                        'url' => null,
                        'name' => $className,
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
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function getDescriptionLinks(): array
    {
        $linksData = $this->getDescriptionLinksData();
        return $this->fillInLinkDataWithUrls($linksData);
    }

    public function hasThrows(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('throws')) > 0;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] protected function getThrowsData(): array
    {
        $throws = [];
        $implementingClassEntity = $this->getDocCommentEntity()->getRootEntity();
        $docBlock = $this->getDocBlock();
        foreach ($docBlock->getTagsByName('throws') as $throwBlock) {
            if (is_a($throwBlock, DocBlock\Tags\Throws::class)) {
                $names = explode('|', (string)$throwBlock->getType());
                foreach ($names as $name) {
                    if ($url = $this->rendererHelper->getPreloadResourceLink($name)) {
                        $throws[] = [
                            'url' => $url,
                            'name' => $name,
                            'description' => (string)$throwBlock->getDescription(),
                        ];
                        continue;
                    }
                    $className = $this->parserHelper->parseFullClassName(
                        $name,
                        $implementingClassEntity
                    );
                    $throwData = [
                        'className' => $className,
                        'name' => $className,
                        'description' => (string)$throwBlock->getDescription(),
                    ];
                    $throws[] = $throwData;
                }
            }
        }
        return $throws;
    }

    /**
     * Get parsed throws from `throws` doc block
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getThrows(): array
    {
        $throwsData = $this->getThrowsData();
        return $this->fillInLinkDataWithUrls($throwsData);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function fillInLinkDataWithUrls(array $linkData): array
    {
        foreach ($linkData as $key => $data) {
            if (!isset($data['url'])) {
                $linkData[$key]['url'] = null;
            } else {
                continue;
            }
            if (($data['className'] ?? null)) {
                $entityData = $this->getRootEntityCollection()->getEntityLinkData(
                    $data['className'],
                    $this->getImplementingClass()->getName(),
                    false
                );
                if (!$entityData['entityName'] && !str_contains($data['className'], '\\')) {
                    try {
                        $data['className'] = $this->getDocCommentEntity()->getCurrentRootEntity()->getNamespaceName() . "\\{$data['className']}";
                        $entityData = $this->getRootEntityCollection()->getEntityLinkData(
                            $data['className'],
                            $this->getDocCommentEntity()->getCurrentRootEntity()->getName(),
                            false
                        );
                    } catch (\Exception $e) {
                        $this->logger->error($e->getMessage());
                    }
                }

                if ($entityData['entityName']) {
                    $linkData[$key]['url'] = call_user_func_array(
                        callback: $this->documentedEntityUrlFunction,
                        args: [
                            $this->getRootEntityCollection(),
                            $entityData['entityName'],
                            $entityData['cursor']
                        ]
                    );
                } else {
                    $preloadResourceLink = $this->rendererHelper->getPreloadResourceLink($data['className']);
                    if ($preloadResourceLink) {
                        $linkData[$key]['url'] = $preloadResourceLink;
                    } else {
                        $linkData[$key]['url'] = null;
                        $this->logger->warning("Unable to get URL data for entity `{$data['className']}`");
                    }
                }
                $linkData[$key]['name'] = $entityData['title'];
                unset($data['className']);
            }
        }
        return $linkData;
    }

    public function hasExamples(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('example')) > 0;
    }

    /**
     * Get parsed examples from `examples` doc block
     *
     * @return array<int,array{example:string}>
     */
    public function getExamples(): array
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
    public function getFirstExample(): string
    {
        $examples = $this->getExamples();
        return $examples[0]['example'] ?? '';
    }

    public function getDocNote(): string
    {
        $docBlock = $this->getDocBlock();
        return (string)($docBlock->getTagsByName('note')[0] ?? '');
    }

    /**
     * Get the doc comment of an entity
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocComment(): string
    {
        $docComment = $this->getAst()->getDocComment();
        return (string)$docComment?->getReformattedText();
    }

    public function getCurrentRootEntity(): ?RootEntityInterface
    {
        if (is_a($this, RootEntityInterface::class)) {
            return $this;
        } elseif (method_exists($this, 'getRootEntity')) {
            return $this->getRootEntity();
        }
        return null;
    }

    protected function getEntityDependenciesCacheKey(): string
    {
        return "__internalEntityDependencies{$this->getCacheKey()}";
    }

    /**
     * @throws InvalidArgumentException
     */
    final public function getCachedEntityDependencies(): array
    {
        $entity = $this->getCurrentRootEntity();
        $entityDependencies = [];
        if ($entity) {
            $filesDependenciesCacheKey = $this->getEntityDependenciesCacheKey();
            $entityDependencies = $this->getEntityCacheValue($filesDependenciesCacheKey);
            if (is_null($entityDependencies)) {
                $entityDependencies = $this->reloadEntityDependenciesCache();
            }
        }
        return $entityDependencies;
    }
    #[Inject] private GenerationErrorsHandler $generationErrorsHandler;

    /**
     * @throws InvalidArgumentException
     */
    final public function reloadEntityDependenciesCache(): array
    {
        $entityDependencies = [];
        $entity = $this->getCurrentRootEntity();
        if ($entity) {
            $errorsBeforeCount = count($this->generationErrorsHandler->getRecords());
            $entityDependencies = $entity->getEntityDependencies();
            $errorsAfterCount = count($this->generationErrorsHandler->getRecords());
            if ($errorsBeforeCount === $errorsAfterCount) {
                $this->addEntityValueToCache($this->getEntityDependenciesCacheKey(), $entityDependencies);
            } else {
                $this->removeEntityValueFromCache($this->getEntityDependenciesCacheKey());
                $entityDependencies = [];
            }
        }
        return $entityDependencies;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    private function isSubEntityFileCacheIsOutdated(string $dependenciesCacheKey): bool
    {
        if (!method_exists($this, 'getImplementingClassName') || !method_exists($this, 'getImplementingClass')) {
            return true;
        }
        $key = $this->getImplementingClassName();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $key);
        } catch (ObjectNotFoundException) {
        }
        try {
            $dependenciesChecks = $this->localObjectCache->getMethodCachedResult($dependenciesCacheKey, '');
        } catch (ObjectNotFoundException) {
            return false;
        }
        $implementingClass = $this->getImplementingClass();
        $relativeFileName = $implementingClass->getRelativeFileName(false);
        if (!isset($dependenciesChecks[$relativeFileName])) {
            $dependenciesChecks[$relativeFileName] = true;
            $cachedEntityDependencies = $this->getCachedEntityDependencies();
            $hashFile = $cachedEntityDependencies[$relativeFileName] ?? '';
            if ($hashFile) {
                $projectRoot = $this->configuration->getProjectRoot();
                $filePath = "{$projectRoot}{$relativeFileName}";
                $dependenciesChecks[$relativeFileName] = !file_exists($filePath) || md5_file($filePath) !== $hashFile;
                $this->localObjectCache->cacheMethodResult(__METHOD__, '', $dependenciesChecks);
            }
        }
        $entityCacheIsOutdated = $dependenciesChecks[$relativeFileName];
        $this->localObjectCache->cacheMethodResult(__METHOD__, $key, $entityCacheIsOutdated);
        return $entityCacheIsOutdated;
    }

    protected function isCurrentEntityCanBeLoad(): bool
    {
        $classEntity = $this->getCurrentRootEntity();
        if (!$classEntity) {
            return false;
        }
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $classEntity->getObjectId());
        } catch (ObjectNotFoundException) {
        }
        $entityCanBeLoad = $this->getRootEntityCollection()->getPluginEventDispatcher()->dispatch(
            new OnCheckIsClassEntityCanBeLoad($this->getCurrentRootEntity())
        )->isClassCanBeLoad();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $classEntity->getObjectId(), $entityCanBeLoad);
        return $entityCanBeLoad;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    final public function entityCacheIsOutdated(): bool
    {
        $entity = $this->getCurrentRootEntity();
        $entityName = $entity?->getName();
        if (!$entity || !$entity->isEntityNameValid($entityName)) {
            return false;
        }
        try {
            $rootEntityResult = $this->localObjectCache->getMethodCachedResult(__METHOD__, $entityName);
            if (!$rootEntityResult) {
                return false;
            } elseif (is_a($this, ClassEntity::class)) {
                return true;
            }
            return $this->isSubEntityFileCacheIsOutdated(__METHOD__);
        } catch (ObjectNotFoundException) {
        }

        try {
            $dependenciesChecks = $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
            $dependenciesChecks = [];
        }

        $this->localObjectCache->cacheMethodResult(__METHOD__, $entityName, false);
        if (!$this->isCurrentEntityCanBeLoad()) {
            return false;
        }

        $cachedDependencies = $this->getCachedEntityDependencies();
        if (!$cachedDependencies) {
            $entityCacheIsOutdated = true;
            $this->logger->warning("Unable to load {$entityName} entity dependencies");
        } else {
            $entityCacheIsOutdated = false;
            $projectRoot = $this->configuration->getProjectRoot();
            foreach ($cachedDependencies as $relativeFileName => $hashFile) {
                $filePath = "{$projectRoot}{$relativeFileName}";
                if (array_key_exists($filePath, $dependenciesChecks)) {
                    if ($dependenciesChecks[$filePath]) {
                        $entityCacheIsOutdated = true;
                        break;
                    }
                    continue;
                }

                if (!file_exists($filePath) || md5_file($filePath) !== $hashFile) {
                    $entityCacheIsOutdated = true;
                    $dependenciesChecks[$filePath] = true;
                    break;
                } else {
                    $dependenciesChecks[$filePath] = false;
                }
            }
        }

        if (!$entityCacheIsOutdated) {
            $localDependencies = $this->getEntityCacheValue($this->getEntityDependenciesCacheKey()) ?? [];
            if (!$localDependencies && $cachedDependencies) {
                $this->addEntityValueToCache($this->getEntityDependenciesCacheKey(), $cachedDependencies);
            } elseif (ksort($localDependencies) !== ksort($cachedDependencies)) {
                $entityCacheIsOutdated = true;
            }
        }

        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $dependenciesChecks);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $entityName, $entityCacheIsOutdated);
        return $entityCacheIsOutdated;
    }
}
