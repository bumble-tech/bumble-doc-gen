<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * @implements \IteratorAggregate<int, MethodEntity>
 */
final class MethodEntityCollection extends BaseEntityCollection
{
    public static function createByClassEntity(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ClassEntity $classEntity,
        AttributeParser $attributeParser
    ): MethodEntityCollection {
        $methodEntityCollection = new MethodEntityCollection();
        $logger = $configuration->getLogger();
        $reflectionClass = $classEntity->getReflection();
        foreach ($reflectionClass->getMethods() as $reflectionMethod) {
            $methodEntity = MethodEntity::create(
                $configuration,
                $reflector,
                $reflectionClass,
                $reflectionMethod,
                $attributeParser
            );
            if (
                $configuration->methodEntityFilterCondition($methodEntity)->canAddToCollection()
            ) {
                $methodEntityCollection->add($methodEntity);
            }
        }

        $docBlock = $classEntity->getDocBlock();
        $methodsBlocks = $docBlock->getTagsByName('method');
        if ($methodsBlocks) {
            foreach ($methodsBlocks as $methodsBlock) {
                try {
                    /**@var \phpDocumentor\Reflection\DocBlock\Tags\Method $methodsBlock */
                    $methodEntity = DynamicMethodEntity::createByAnnotationMethod(
                        $configuration,
                        $reflector,
                        $reflectionClass,
                        $methodsBlock
                    );
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
