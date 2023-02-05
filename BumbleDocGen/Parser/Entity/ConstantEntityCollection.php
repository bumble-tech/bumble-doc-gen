<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapper;

final class ConstantEntityCollection extends BaseEntityCollection
{
    public static function createByClassEntity(
        ClassEntity $classEntity
    ): ConstantEntityCollection
    {
        $constantEntityCollection = new ConstantEntityCollection();

        $constantEntityClassName = CacheableEntityWrapper::createForConstantEntity();
        foreach ($classEntity->getConstantsData() as $constantData) {
            $constantEntity = $constantEntityClassName::create(
                $classEntity,
                $constantData['name'],
                $constantData['declaringClass'],
                $constantData['implementingClass']
            );
            if (
                $classEntity->getConfiguration()->classConstantEntityFilterCondition($constantEntity)->canAddToCollection()
            ) {
                $constantEntityCollection->add($constantEntity);
            }
        }
        return $constantEntityCollection;
    }

    public function add(ConstantEntity $constantEntity, bool $reload = false): ConstantEntityCollection
    {
        $key = $constantEntity->getName();
        if (!isset($this->entities[$key]) || $reload) {
            $this->entities[$key] = $constantEntity;
        }
        return $this;
    }

    public function get(string $key): ?PropertyEntity
    {
        return $this->entities[$key] ?? null;
    }
}
