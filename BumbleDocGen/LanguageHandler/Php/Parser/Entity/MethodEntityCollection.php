<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

/**
 * @implements \IteratorAggregate<int, MethodEntity>
 */
final class MethodEntityCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassEntity               $classEntity,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory
    )
    {
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public static function createByClassEntity(
        ClassEntity               $classEntity,
        CacheablePhpEntityFactory $cacheablePhpEntityFactory
    ): MethodEntityCollection
    {
        $methodEntityCollection = new MethodEntityCollection($classEntity, $cacheablePhpEntityFactory);
        $configuration = $classEntity->getConfiguration();

        $methodEntityFilter = $classEntity->getPhpHandlerSettings()->getMethodEntityFilter();
        foreach ($classEntity->getMethodsData() as $name => $methodData) {
            $methodEntity = $cacheablePhpEntityFactory->createMethodEntity(
                $classEntity,
                $name,
                $methodData['declaringClass'],
                $methodData['implementingClass']
            );
            if ($methodEntityFilter->canAddToCollection($methodEntity)) {
                $methodEntityCollection->add($methodEntity);
            }
        }

        $logger = $configuration->getLogger();
        $docBlock = $classEntity->getDocBlock();
        $methodsBlocks = $docBlock->getTagsByName('method');
        if ($methodsBlocks) {
            foreach ($methodsBlocks as $methodsBlock) {
                try {
                    /**@var Method $methodsBlock */
                    $methodEntity = DynamicMethodEntity::createByAnnotationMethod($classEntity, $methodsBlock);
                    $methodEntityCollection->add($methodEntity);
                } catch (\Exception $e) {
                    $logger->error($e->getMessage());
                }
            }
        }

        return $methodEntityCollection;
    }

    public function add(MethodEntityInterface $methodEntity, bool $reload = false): MethodEntityCollection
    {
        $key = $methodEntity->getName();
        if (!isset($this->entities[$key]) || $reload) {
            $this->entities[$key] = $methodEntity;
        }
        return $this;
    }

    public function get(string $key): ?MethodEntity
    {
        return $this->entities[$key] ?? null;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->entities);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function unsafeGet(string $key): ?MethodEntity
    {
        $methodEntity = $this->get($key);
        if (!$methodEntity) {
            $methodData = $this->classEntity->getMethodsData()[$key] ?? null;
            if (is_array($methodData)) {
                return $this->cacheablePhpEntityFactory->createMethodEntity(
                    $this->classEntity,
                    $key,
                    $methodData['declaringClass'],
                    $methodData['implementingClass']
                );
            }
        }
        return $methodEntity;
    }

    public function getInitializations(): MethodEntityCollection
    {
        $methodEntityCollection = new MethodEntityCollection($this->classEntity, $this->cacheablePhpEntityFactory);
        foreach ($this as $methodEntity) {
            /**@var MethodEntity $methodEntity */
            if ($methodEntity->isInitialization()) {
                $methodEntityCollection->add($methodEntity);
            }
        }
        return $methodEntityCollection;
    }

    public function getAllExceptInitializations(): MethodEntityCollection
    {
        $methodEntityCollection = new MethodEntityCollection($this->classEntity, $this->cacheablePhpEntityFactory);
        foreach ($this as $methodEntity) {
            /**@var MethodEntity $methodEntity */
            if (!$methodEntity->isInitialization()) {
                $methodEntityCollection->add($methodEntity);
            }
        }
        return $methodEntityCollection;
    }
}
