<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapper;

final class PropertyEntityCollection extends BaseEntityCollection
{
    public static function createByClassEntity(ClassEntity $classEntity): PropertyEntityCollection
    {
        $propertyEntityCollection = new PropertyEntityCollection();

        $propertyEntityClassName = CacheableEntityWrapper::createForPropertyEntity();
        foreach ($classEntity->getPropertiesData() as $propertyData) {
            $propertyEntity = $propertyEntityClassName::create(
                $classEntity,
                $propertyData['name'],
                $propertyData['declaringClass'],
                $propertyData['implementingClass']
            );
            if (
                $classEntity->getConfiguration()->propertyEntityFilterCondition($propertyEntity)->canAddToCollection()
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

    public function get(string $key): ?PropertyEntity
    {
        return $this->entities[$key] ?? null;
    }
}
