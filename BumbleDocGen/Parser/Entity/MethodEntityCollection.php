<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

/**
 * @implements \IteratorAggregate<int, MethodEntity>
 */
final class MethodEntityCollection extends BaseEntityCollection
{
    public static function createByClassEntity(ClassEntity $classEntity): MethodEntityCollection
    {
        $methodEntityCollection = new MethodEntityCollection();
        $configuration = $classEntity->getConfiguration();
        foreach ($classEntity->getMethodsData() as $methodData) {
            $methodEntity = MethodEntity::create(
                $classEntity,
                $methodData['name'],
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

    public function getInitializations(): MethodEntityCollection
    {
        $methodEntityCollection = new MethodEntityCollection();
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
        $methodEntityCollection = new MethodEntityCollection();
        foreach ($this as $methodEntity) {
            /**@var MethodEntity $methodEntity */
            if (!$methodEntity->isInitialization()) {
                $methodEntityCollection->add($methodEntity);
            }
        }
        return $methodEntityCollection;
    }
}
