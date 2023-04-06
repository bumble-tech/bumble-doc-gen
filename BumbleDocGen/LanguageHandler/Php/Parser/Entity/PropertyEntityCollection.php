<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;

final class PropertyEntityCollection extends BaseEntityCollection
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
     * @throws ReflectionException
     */
    public static function createByClassEntity(
        ClassEntity               $classEntity,
        CacheablePhpEntityFactory $cacheablePhpEntityFactory
    ): PropertyEntityCollection
    {
        $propertyEntityCollection = new PropertyEntityCollection($classEntity, $cacheablePhpEntityFactory);

        $propertyEntityFilter = $classEntity->getPhpHandlerSettings()->getPropertyEntityFilter();
        foreach ($classEntity->getPropertiesData() as $name => $propertyData) {
            $propertyEntity = $cacheablePhpEntityFactory->createPropertyEntity(
                $classEntity,
                $name,
                $propertyData['declaringClass'],
                $propertyData['implementingClass']
            );
            if ($propertyEntityFilter->canAddToCollection($propertyEntity)) {
                $propertyEntityCollection->add($propertyEntity);
            }
        }
        return $propertyEntityCollection;
    }

    public function add(PropertyEntity $propertyEntity, bool $reload = false): PropertyEntityCollection
    {
        $objectId = $propertyEntity->getObjectId();
        if (!isset($this->entities[$objectId]) || $reload) {
            $this->entities[$objectId] = $propertyEntity;
        }
        return $this;
    }

    public function get(string $objectId): ?PropertyEntity
    {
        return $this->entities[$objectId] ?? null;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $key): ?PropertyEntity
    {
        $propertyEntity = $this->get($key);
        if (!$propertyEntity) {
            $propertyData = $this->classEntity->getPropertiesData()[$key] ?? null;
            if (is_array($propertyData)) {
                return $this->cacheablePhpEntityFactory->createPropertyEntity(
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
