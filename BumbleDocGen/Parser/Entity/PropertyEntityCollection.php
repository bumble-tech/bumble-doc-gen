<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

final class PropertyEntityCollection extends BaseEntityCollection
{
    private static function getPropertiesReflections(
        ReflectionClass $reflectionClass,
        LoggerInterface $logger
    ): \Generator {
        try {
            foreach ($reflectionClass->getImmediateProperties() as $propertiesReflection) {
                yield $propertiesReflection;
            }
            $parentClass = $reflectionClass->getParentClass();
            if ($parentClass) {
                foreach (self::getPropertiesReflections($parentClass, $logger) as $propertiesReflection) {
                    yield $propertiesReflection;
                }
            }
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
        }
    }

    public static function createByReflectionClass(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        AttributeParser $attributeParser,
    ): PropertyEntityCollection {
        $propertyEntityCollection = new PropertyEntityCollection();
        $logger = $configuration->getLogger();
        foreach (self::getPropertiesReflections($reflectionClass, $logger) as $propertyReflection) {
            $propertyEntity = PropertyEntity::create(
                $configuration,
                $reflector,
                $reflectionClass,
                $propertyReflection,
                $attributeParser
            );
            if (
                $configuration->propertyEntityFilterCondition($propertyEntity)->canAddToCollection()
            ) {
                $propertyEntityCollection->add($propertyEntity);
            }
        }
        return $propertyEntityCollection;
    }

    public function add(PropertyEntity $propertyEntity, bool $reload = false): PropertyEntityCollection
    {
        $key = $propertyEntity->getName();
        if (!isset($this->entities[$key]) || $reload) {
            $this->entities[$key] = $propertyEntity;
        }
        return $this;
    }
}
