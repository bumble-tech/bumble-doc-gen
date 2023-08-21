<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;

final class PropertyEntityCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassEntity               $classEntity,
        private PhpHandlerSettings        $phpHandlerSettings,
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
    public function loadPropertyEntities(): void
    {
        $propertyEntityFilter = $this->phpHandlerSettings->getPropertyEntityFilter();
        foreach ($this->classEntity->getPropertiesData() as $name => $propertyData) {
            $propertyEntity = $this->cacheablePhpEntityFactory->createPropertyEntity(
                $this->classEntity,
                $name,
                $propertyData['declaringClass'],
                $propertyData['implementingClass']
            );
            if ($propertyEntityFilter->canAddToCollection($propertyEntity)) {
                $this->add($propertyEntity);
            }
        }
    }

    public function add(PropertyEntity $propertyEntity, bool $reload = false): PropertyEntityCollection
    {
        $propertyName = $propertyEntity->getName();
        if (!isset($this->entities[$propertyName]) || $reload) {
            $this->entities[$propertyName] = $propertyEntity;
        }
        return $this;
    }

    public function get(string $objectName): ?PropertyEntity
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $objectName): ?PropertyEntity
    {
        $propertyEntity = $this->get($objectName);
        if (!$propertyEntity) {
            $propertyData = $this->classEntity->getPropertiesData()[$objectName] ?? null;
            if (is_array($propertyData)) {
                return $this->cacheablePhpEntityFactory->createPropertyEntity(
                    $this->classEntity,
                    $objectName,
                    $propertyData['declaringClass'],
                    $propertyData['implementingClass']
                );
            }
        }
        return $propertyEntity;
    }
}
