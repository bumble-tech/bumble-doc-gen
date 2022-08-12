<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

final class ConstantEntityCollection extends BaseEntityCollection
{
    private static function getConstantsReflections(
        ReflectionClass $reflectionClass,
        LoggerInterface $logger
    ): \Generator {
        try {
            foreach ($reflectionClass->getImmediateReflectionConstants() as $constantsReflection) {
                yield $constantsReflection;
            }
            $parentClass = $reflectionClass->getParentClass();
            if ($parentClass) {
                foreach (self::getConstantsReflections($parentClass, $logger) as $constantsReflection) {
                    yield $constantsReflection;
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
        AttributeParser $attributeParser
    ): ConstantEntityCollection {
        $constantEntityCollection = new ConstantEntityCollection();
        $logger = $configuration->getLogger();
        foreach (self::getConstantsReflections($reflectionClass, $logger) as $reflectionConstant) {
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
