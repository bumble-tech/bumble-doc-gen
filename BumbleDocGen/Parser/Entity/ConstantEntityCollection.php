<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

final class ConstantEntityCollection extends BaseEntityCollection
{
    public static function createByReflectionClass(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        AttributeParser $attributeParser
    ): ConstantEntityCollection {
        $constantEntityCollection = new ConstantEntityCollection();
        foreach ($reflectionClass->getReflectionConstants() as $reflectionConstant) {
            $constantEntity = ConstantEntity::create(
                $configuration,
                $reflector,
                $reflectionClass,
                $reflectionConstant,
                $attributeParser
            );
            if (
                $configuration->classConstantEntityFilterCondition($constantEntity)->canAddToCollection()
            ) {
                $constantEntityCollection->add($constantEntity);
            }
        }
        return $constantEntityCollection;
    }

    public function add(ConstantEntity $constantEntity, bool $reload = false): ConstantEntityCollection
    {
        $key = $constantEntity->getObjectId();
        if (!isset($this->entities[$key]) || $reload) {
            $this->entities[$key] = $constantEntity;
        }
        return $this;
    }
}
