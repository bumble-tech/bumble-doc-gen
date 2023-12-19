<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Psr\Log\LoggerInterface;

/**
 * Collection of PHP class method entities
 *
 * @implements \IteratorAggregate<int, MethodEntity>
 */
final class MethodEntitiesCollection extends BaseEntityCollection
{
    private array $unsafeEntities = [];

    public function __construct(
        private ClassLikeEntity $classEntity,
        private PhpHandlerSettings $phpHandlerSettings,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory,
        private LoggerInterface $logger
    ) {
    }

    /**
     * Load method entities into the collection according to the project configuration
     *
     * @internal
     *
     * @see PhpHandlerSettings::getMethodEntityFilter()
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function loadMethodEntities(): void
    {
        $methodEntityFilter = $this->phpHandlerSettings->getMethodEntityFilter();
        foreach ($this->classEntity->getMethodsData() as $name => $methodImplementingClass) {
            $methodEntity = $this->cacheablePhpEntityFactory->createMethodEntity(
                $this->classEntity,
                $name,
                $methodImplementingClass
            );
            if ($methodEntityFilter->canAddToCollection($methodEntity)) {
                $this->add($methodEntity);
            }
        }

        $docBlock = $this->classEntity->getDocBlock();
        $methodsBlocks = $docBlock->getTagsByName('method');
        if ($methodsBlocks) {
            foreach ($methodsBlocks as $methodsBlock) {
                try {
                    /**@var Method $methodsBlock */
                    $methodEntity = $this->cacheablePhpEntityFactory->createDynamicMethodEntity($this->classEntity, $methodsBlock);
                    $this->add($methodEntity);
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }
        }
    }

    /**
     * Add an entity to a collection
     *
     * @api
     *
     * @param MethodEntityInterface $methodEntity Entity to be added to the collection
     * @param bool $reload Replace an entity with a new one if one has already been loaded previously
     */
    public function add(MethodEntityInterface $methodEntity, bool $reload = false): MethodEntitiesCollection
    {
        $methodName = $methodEntity->getName();
        if (!isset($this->entities[$methodName]) || $reload) {
            $this->entities[$methodName] = $methodEntity;
        }
        return $this;
    }

    /**
     * Get the loaded method entity if it exists
     *
     * @api
     *
     * @param string $objectName Method entity name
     */
    public function get(string $objectName): ?MethodEntity
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * Get the method entity if it exists. If the method exists but has not been loaded into the collection, a new entity object will be created
     *
     * @api
     *
     * @param string $objectName Method entity name
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $objectName): ?MethodEntity
    {
        $methodEntity = $this->get($objectName);
        if (!$methodEntity) {
            if (array_key_exists($objectName, $this->unsafeEntities)) {
                return $this->unsafeEntities[$objectName];
            }

            $methodImplementingClass = $this->classEntity->getMethodsData()[$objectName] ?? null;
            if (!is_null($methodImplementingClass)) {
                $methodEntity = $this->cacheablePhpEntityFactory->createMethodEntity(
                    $this->classEntity,
                    $objectName,
                    $methodImplementingClass
                );
                $this->unsafeEntities[$objectName] = $methodEntity;
            }
        }
        return $methodEntity;
    }

    /**
     * Get a copy of the collection containing only those methods that are initialization methods
     *
     * @api
     */
    public function getInitializations(): MethodEntitiesCollection
    {
        $methodEntitiesCollection = clone $this;
        foreach ($this as $objectId => $methodEntity) {
            try {
                /**@var MethodEntity $methodEntity */
                if (!$methodEntity->isInitialization()) {
                    $methodEntitiesCollection->remove($objectId);
                }
            } catch (\Exception $e) {
                $this->logger->warning($e->getMessage());
            }
        }
        $methodEntitiesCollection->unsafeEntities = [];
        return $methodEntitiesCollection;
    }

    /**
     * Get a copy of the collection containing only those methods that are not initialization methods
     *
     * @api
     */
    public function getAllExceptInitializations(): MethodEntitiesCollection
    {
        $methodEntitiesCollection = clone $this;
        foreach ($this as $objectId => $methodEntity) {
            try {
                /**@var MethodEntity $methodEntity */
                if ($methodEntity->isInitialization()) {
                    $methodEntitiesCollection->remove($objectId);
                }
            } catch (\Exception $e) {
                $this->logger->warning($e->getMessage());
            }
        }
        $methodEntitiesCollection->unsafeEntities = [];
        return $methodEntitiesCollection;
    }
}
