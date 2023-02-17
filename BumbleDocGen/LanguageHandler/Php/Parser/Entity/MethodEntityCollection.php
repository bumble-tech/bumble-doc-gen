<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapperFactory;

/**
 * @implements \IteratorAggregate<int, MethodEntity>
 */
final class MethodEntityCollection extends BaseEntityCollection
{
    public function __construct(private ClassEntity $classEntity)
    {
    }

    public static function createByClassEntity(ClassEntity $classEntity): MethodEntityCollection
    {
        $methodEntityCollection = new MethodEntityCollection($classEntity);
        $configuration = $classEntity->getConfiguration();

        foreach ($classEntity->getMethodsData() as $name => $methodData) {
            $methodEntity = CacheableEntityWrapperFactory::createMethodEntity(
                $classEntity,
                $name,
                $methodData['declaringClass'],
                $methodData['implementingClass']
            );
            if (
                $configuration->methodEntityFilterCondition($methodEntity)->canAddToCollection()
            ) {
                $methodEntityCollection->add($methodEntity);
            }
        }

        $logger = $configuration->getLogger();
        $docBlock = $classEntity->getDocBlock();
        $methodsBlocks = $docBlock->getTagsByName('method');
        if ($methodsBlocks) {
            foreach ($methodsBlocks as $methodsBlock) {
                try {
                    /**@var \phpDocumentor\Reflection\DocBlock\Tags\Method $methodsBlock */
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

    public function unsafeGet(string $key): ?MethodEntity
    {
        $methodEntity = $this->get($key);
        if (!$methodEntity) {
            $methodData = $this->classEntity->getMethodsData()[$key] ?? null;
            if (is_array($methodData)) {
                return CacheableEntityWrapperFactory::createMethodEntity(
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
        $methodEntityCollection = new MethodEntityCollection($this->classEntity);
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
        $methodEntityCollection = new MethodEntityCollection($this->classEntity);
        foreach ($this as $methodEntity) {
            /**@var MethodEntity $methodEntity */
            if (!$methodEntity->isInitialization()) {
                $methodEntityCollection->add($methodEntity);
            }
        }
        return $methodEntityCollection;
    }
}
