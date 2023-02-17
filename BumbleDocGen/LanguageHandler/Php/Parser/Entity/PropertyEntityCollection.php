<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapperFactory;

final class PropertyEntityCollection extends BaseEntityCollection
{
    public function __construct(private ClassEntity $classEntity)
    {
    }

    public static function createByClassEntity(ClassEntity $classEntity): PropertyEntityCollection
    {
        $propertyEntityCollection = new PropertyEntityCollection($classEntity);

        foreach ($classEntity->getPropertiesData() as $name => $propertyData) {
            $propertyEntity = CacheableEntityWrapperFactory::createPropertyEntity(
                $classEntity,
                $name,
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

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->entities);
    }

    public function unsafeGet(string $key): ?PropertyEntity
    {
        $propertyEntity = $this->get($key);
        if (!$propertyEntity) {
            $propertyData = $this->classEntity->getPropertiesData()[$key] ?? null;
            if (is_array($propertyData)) {
                return CacheableEntityWrapperFactory::createPropertyEntity(
                    $this->classEntity,
                    $key,
                    $propertyData['declaringClass'],
                    $propertyData['implementingClass']
                );
            }
        }
        return $propertyEntity;
    }
}
