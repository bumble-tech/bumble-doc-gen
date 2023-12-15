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
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\RendererHelper;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Data\DocBlockLink;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded;
use DI\Attribute\Inject;
use phpDocumentor\Reflection\DocBlock;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;

abstract class BaseEntity implements CacheableEntityInterface
{
    use CacheableEntityTrait;

    #[Inject] private PluginEventDispatcher $pluginEventDispatcher;
    #[Inject] private GetDocumentedEntityUrl $documentedEntityUrlFunction;
    #[Inject] private RendererHelper $rendererHelper;
    #[Inject] private GenerationErrorsHandler $generationErrorsHandler;
    #[Inject] private PhpHandlerSettings $phpHandlerSettings;

    protected function __construct(
        private Configuration $configuration,
        private LocalObjectCache $localObjectCache,
        private ParserHelper $parserHelper,
        private LoggerInterface $logger
    ) {
    }

    /**
     * Get AST for this entity
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    abstract public function getAst(): \PhpParser\Node\Stmt;

    /**
     * Get the class like entity in which the current entity was implemented
     *
     * @api
     */
    abstract public function getImplementingClass(): ClassLikeEntity;

    /**
     * Get the line number of the beginning of the entity code in a file
     *
     * @api
     */
    abstract public function getStartLine(): int;

    /**
     * Get the collection of root entities to which this entity belongs
     *
     * @api
     */
    abstract public function getRootEntityCollection(): PhpEntitiesCollection;

    /**
     * Link to an entity where docBlock is implemented for this entity
     *
     * @internal
     */
    abstract public function getDocCommentEntity(): ClassLikeEntity|MethodEntity|PropertyEntity|ClassConstantEntity;

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getRelativeFileName(): ?string
    {
        return $this->getCurrentRootEntity()->getRelativeFileName();
    }

    /**
     * Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getAbsoluteFileName(): ?string
    {
        $relativeFileName = $this->getRelativeFileName();
        return $relativeFileName ? $this->configuration->getProjectRoot() . $relativeFileName : null;
    }

    /**
     * Checking if entity data can be retrieved
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    final public function isEntityFileCanBeLoad(): bool
    {
        return $this->getCurrentRootEntity()->isClassLoad() && $this->getRelativeFileName();
    }

    /**
     * Get entity description
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
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
                        $this->getRootEntityCollection()->getLoadedOrCreateNew($t)->isEntityDataCanBeLoaded()
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
     * @internal
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getFileSourceLink(bool $withLine = true): ?string
    {
        $fileName = $this->getRelativeFileName();
        if (!$fileName) {
            return null;
        }
        return $this->phpHandlerSettings->getFileSourceBaseUrl() . $fileName . ($withLine ? "#L{$this->getStartLine()}" : '');
    }

    /**
     * Get entity unique ID
     *
     * @api
     */
    public function getObjectId(): string
    {
        if (method_exists($this, 'getRootEntity')) {
            return "{$this->getRootEntity()->getName()}:{$this->getName()}";
        }
        return $this->getName();
    }

    /**
     * Get the code line number where the docBlock of the current entity begins
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocCommentLine(): ?int
    {
        $entity = $this->getDocCommentEntity();
        return $entity->getAst()->getDocComment()?->getStartLine();
    }

    /**
     * Get DocBlock for current entity
     *
     * @internal
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlock(): DocBlock
    {
        $docCommentEntity = $this->getDocCommentEntity();
        return $this->parserHelper->getDocBlock(
            $docCommentEntity->getImplementingClass(),
            $docCommentEntity->getDocComment() ?: ' ',
            $this->getDocCommentLine()
        );
    }

    /**
     * Checking if an entity has `internal` docBlock
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function isInternal(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('internal')[0] ?? null;
        return (bool)$internalBlock;
    }

    /**
     * Checking if an entity has `api` docBlock
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function isApi(): bool
    {
        $docBlock = $this->getDocBlock();
        $internalBlock = $docBlock->getTagsByName('api')[0] ?? null;
        return (bool)$internalBlock;
    }

    /**
     * Checking if an entity has `deprecated` docBlock
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function isDeprecated(): bool
    {
        $docBlock = $this->getDocBlock();
        $deprecatedBlock = $docBlock->getTagsByName('deprecated')[0] ?? null;
        return (bool)$deprecatedBlock;
    }

    /**
     * Checking if an entity has links in its description
     *
     * @api
     *
     * @throws \Exception
     */
    public function hasDescriptionLinks(): bool
    {
        return count($this->getDescriptionDocBlockLinks()) > 0;
    }

    /**
     * @return DocBlockLink[]
     *
     * @throws \Exception
     */
    #[CacheableMethod] protected function getDescriptionDocBlockLinks(): array
    {
        $links = [];
        $docBlock = $this->getDocBlock();
        $getDocCommentEntity = $this->getDocCommentEntity();

        if (is_a($getDocCommentEntity, ClassLikeEntity::class)) {
            $docCommentImplementingClass = $getDocCommentEntity;
        } else {
            $docCommentImplementingClass = $getDocCommentEntity->getImplementingClass();
        }

        foreach ($docBlock->getTagsByName('see') as $seeBlock) {
            if (!is_a($seeBlock, DocBlock\Tags\See::class)) {
                continue;
            }
            try {
                $name = (string)$seeBlock->getReference();
                $description = (string)$seeBlock->getDescription();
                if (filter_var($name, FILTER_VALIDATE_URL)) {
                    $links[] = new DocBlockLink(
                        name: $name,
                        description: $description,
                        url: $name,
                    );
                } elseif ($url = $this->rendererHelper->getPreloadResourceLink($name)) {
                    $links[] = new DocBlockLink(
                        name: $name,
                        description: $description,
                        url: $url
                    );
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

                    $links[] = new DocBlockLink(
                        name: $name,
                        description: $description,
                        className: $name,
                    );
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
        }

        $description = $this->getDescription();
        if (preg_match_all('/(\@see )(.*?)( |}|])/', $description . ' ', $matches)) {
            foreach ($matches[2] as $name) {
                if (filter_var($name, FILTER_VALIDATE_URL)) {
                    $links[] = new DocBlockLink(
                        name: $name,
                        url: $name,
                    );
                } elseif ($url = $this->rendererHelper->getPreloadResourceLink($name)) {
                    $links[] = new DocBlockLink(
                        name: $name,
                        description: $description,
                        url: $url,
                    );
                } else {
                    $currentClassEntity = is_a($docCommentImplementingClass, ClassLikeEntity::class) ? $docCommentImplementingClass : $docCommentImplementingClass->getRootEntity();
                    $className = $this->parserHelper->parseFullClassName(
                        $name,
                        $currentClassEntity
                    );

                    $links[] = new DocBlockLink(
                        name: $className,
                        description: $description,
                        className: $className,
                    );
                }
            }
        }

        foreach ($docBlock->getTagsByName('link') as $linkBlock) {
            if (!is_a($linkBlock, DocBlock\Tags\Link::class)) {
                continue;
            }
            $description = (string)$linkBlock->getDescription();
            $url = $linkBlock->getLink();
            $links[] = new DocBlockLink(
                name: $url,
                description: $description,
                url: $url,
            );
        }

        return $links;
    }

    /**
     * Get parsed links from description and doc blocks `see` and `link`
     *
     * @return DocBlockLink[]
     *
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     *@api
     *
     */
    public function getDescriptionLinks(): array
    {
        $linksData = $this->getDescriptionDocBlockLinks();
        return $this->getPreparedDocBlockLinks($linksData);
    }

    /**
     * Checking if an entity has `throws` docBlock
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function hasThrows(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('throws')) > 0;
    }

    /**
     * @return DocBlockLink[]
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getThrowsDocBlockLinks(): array
    {
        $throws = [];
        $implementingClassEntity = $this->getDocCommentEntity()->getRootEntity();
        $docBlock = $this->getDocBlock();
        foreach ($docBlock->getTagsByName('throws') as $throwBlock) {
            if (is_a($throwBlock, DocBlock\Tags\Throws::class)) {
                $names = explode('|', (string)$throwBlock->getType());
                foreach ($names as $name) {
                    if ($url = $this->rendererHelper->getPreloadResourceLink($name)) {
                        $throws[] = new DocBlockLink(
                            name: $name,
                            description: (string)$throwBlock->getDescription(),
                            url: $url,
                        );
                        continue;
                    }
                    $className = $this->parserHelper->parseFullClassName(
                        $name,
                        $implementingClassEntity
                    );
                    $throwData = new DocBlockLink(
                        name: $className,
                        description: (string)$throwBlock->getDescription(),
                        className: $className,
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
     * @return DocBlockLink[]
     *
     * @throws InvalidConfigurationParameterException
     *@api
     *
     */
    public function getThrows(): array
    {
        $throwsData = $this->getThrowsDocBlockLinks();
        return $this->getPreparedDocBlockLinks($throwsData);
    }

    /**
     * @param DocBlockLink[] $docBlockLinks
     *
     * @return DocBlockLink[]
     *
     * @throws InvalidConfigurationParameterException
     */
    private function getPreparedDocBlockLinks(array $docBlockLinks): array
    {
        $preparedDocBlockLinksLinks = [];
        foreach ($docBlockLinks as $data) {
            if ($data->url) {
                $preparedDocBlockLinksLinks[] = $data;
                continue;
            }

            $className = $data->className;
            $name = $data->name;
            $url = null;
            if ($data->className) {
                $entityData = $this->getRootEntityCollection()->getEntityLinkData(
                    $data->className,
                    $this->getImplementingClass()->getName(),
                    false
                );
                if (!$entityData['entityName'] && !str_contains($data->className, '\\')) {
                    try {
                        $className = $this->getDocCommentEntity()->getCurrentRootEntity()->getNamespaceName() . "\\{$data->className}";
                        $entityData = $this->getRootEntityCollection()->getEntityLinkData(
                            $className,
                            $this->getDocCommentEntity()->getCurrentRootEntity()->getName(),
                            false
                        );
                    } catch (\Exception $e) {
                        $this->logger->error($e->getMessage());
                    }
                }

                if ($entityData['entityName']) {
                    $url = call_user_func_array(
                        callback: $this->documentedEntityUrlFunction,
                        args: [
                            $this->getRootEntityCollection(),
                            $entityData['entityName'],
                            $entityData['cursor']
                        ]
                    );
                } else {
                    $preloadResourceLink = $this->rendererHelper->getPreloadResourceLink($data->className);
                    if ($preloadResourceLink) {
                        $url = $preloadResourceLink;
                    } else {
                        $this->logger->warning("Unable to get URL data for entity `{$data->className}`");
                    }
                }
                $name = $entityData['title'];
            }
            $preparedDocBlockLinksLinks[] = new DocBlockLink(
                name: $name,
                description: $data->description,
                className: $className,
                url: $url
            );
        }
        return $preparedDocBlockLinksLinks;
    }

    /**
     * Checking if an entity has `example` docBlock
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function hasExamples(): bool
    {
        $docBlock = $this->getDocBlock();
        return count($docBlock->getTagsByName('example')) > 0;
    }

    /**
     * Get parsed examples from `examples` doc block
     *
     * @return array<int,array{example:string}>
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
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
     * Get first example from `examples` doc block
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getFirstExample(): string
    {
        $examples = $this->getExamples();
        return $examples[0]['example'] ?? '';
    }

    /**
     * Get the note annotation value
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getDocNote(): string
    {
        $docBlock = $this->getDocBlock();
        return (string)($docBlock->getTagsByName('note')[0] ?? '');
    }

    /**
     * Get the doc comment of an entity
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocComment(): string
    {
        $docComment = $this->getAst()->getDocComment();
        return (string)$docComment?->getReformattedText();
    }

    /**
     * @internal
     */
    public function getCurrentRootEntity(): ?ClassLikeEntity
    {
        if (is_a($this, ClassLikeEntity::class)) {
            return $this;
        } elseif (method_exists($this, 'getRootEntity')) {
            return $this->getRootEntity();
        }
        return null;
    }

    /**
     * @internal
     */
    protected function getEntityDependenciesCacheKey(): string
    {
        return "__internalEntityDependencies{$this->getCacheKey()}";
    }

    /**
     * @internal
     *
     * @throws InvalidArgumentException
     * @throws InvalidConfigurationParameterException
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

    /**
     * @inheritDoc
     *
     * @throws InvalidArgumentException
     * @throws InvalidConfigurationParameterException
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
     * @internal
     *
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    private function isSubEntityFileCacheIsOutdated(string $dependenciesCacheKey): bool
    {
        if (!method_exists($this, 'getImplementingClassName')) {
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
        $relativeFileName = $implementingClass->getRelativeFileName();
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
        $isEntityCacheOutdated = $dependenciesChecks[$relativeFileName];
        $this->localObjectCache->cacheMethodResult(__METHOD__, $key, $isEntityCacheOutdated);
        return $isEntityCacheOutdated;
    }

    /**
     * @internal
     */
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
        $entityCanBeLoad = $this->pluginEventDispatcher->dispatch(
            new OnCheckIsEntityCanBeLoaded($this->getCurrentRootEntity())
        )->isEntityCanBeLoaded();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $classEntity->getObjectId(), $entityCanBeLoad);
        return $entityCanBeLoad;
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    final public function isEntityCacheOutdated(): bool
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
            } elseif (is_a($this, ClassLikeEntity::class)) {
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
            $isEntityCacheOutdated = true;
            $this->logger->warning("Unable to load {$entityName} entity dependencies");
        } else {
            $isEntityCacheOutdated = false;
            $projectRoot = $this->configuration->getProjectRoot();
            foreach ($cachedDependencies as $relativeFileName => $hashFile) {
                $filePath = "{$projectRoot}{$relativeFileName}";
                if (array_key_exists($filePath, $dependenciesChecks)) {
                    if ($dependenciesChecks[$filePath]) {
                        $isEntityCacheOutdated = true;
                        break;
                    }
                    continue;
                }

                if (!file_exists($filePath) || md5_file($filePath) !== $hashFile) {
                    $isEntityCacheOutdated = true;
                    $dependenciesChecks[$filePath] = true;
                    break;
                } else {
                    $dependenciesChecks[$filePath] = false;
                }
            }
        }

        if (!$isEntityCacheOutdated) {
            $localDependencies = $this->getEntityCacheValue($this->getEntityDependenciesCacheKey()) ?? [];
            if (!$localDependencies && $cachedDependencies) {
                $this->addEntityValueToCache($this->getEntityDependenciesCacheKey(), $cachedDependencies);
            } elseif (ksort($localDependencies) !== ksort($cachedDependencies)) {
                $isEntityCacheOutdated = true;
            }
        }

        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $dependenciesChecks);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $entityName, $isEntityCacheOutdated);
        return $isEntityCacheOutdated;
    }
}
