<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;

final class PropertyEntitiesCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassLikeEntity $classEntity,
        private PhpHandlerSettings $phpHandlerSettings,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory
    ) {
    }

    /**
     * Load property entities into the collection according to the project configuration
     *
     * @internal
     *
     * @see PhpHandlerSettings::getPropertyEntityFilter()
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function loadPropertyEntities(): void
    {
        $propertyEntityFilter = $this->phpHandlerSettings->getPropertyEntityFilter();
        foreach ($this->classEntity->getPropertiesData() as $name => $propertyImplementingClass) {
            $propertyEntity = $this->cacheablePhpEntityFactory->createPropertyEntity(
                $this->classEntity,
                $name,
                $propertyImplementingClass
            );
            if ($propertyEntityFilter->canAddToCollection($propertyEntity)) {
                $this->add($propertyEntity);
            }
        }
    }

    /**
     * Add an entity to a collection
     *
     * @api
     *
     * @param PropertyEntity $propertyEntity Entity to be added to the collection
     * @param bool $reload Replace an entity with a new one if one has already been loaded previously
     */
    public function add(PropertyEntity $propertyEntity, bool $reload = false): PropertyEntitiesCollection
    {
        $propertyName = $propertyEntity->getName();
        if (!isset($this->entities[$propertyName]) || $reload) {
            $this->entities[$propertyName] = $propertyEntity;
        }
        return $this;
    }

    /**
     * Get the loaded property entity if it exists
     *
     * @api
     *
     * @param string $objectName Property entity name
     */
    public function get(string $objectName): ?PropertyEntity
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * Get the property entity if it exists. If the property exists but has not been loaded into the collection, a new entity object will be created
     *
     * @param string $objectName Property entity name
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $objectName): ?PropertyEntity
    {
        $propertyEntity = $this->get($objectName);
        if (!$propertyEntity) {
            $propertyImplementingClass = $this->classEntity->getPropertiesData()[$objectName] ?? null;
            if (!is_null($propertyImplementingClass)) {
                return $this->cacheablePhpEntityFactory->createPropertyEntity(
                    $this->classEntity,
                    $objectName,
                    $propertyImplementingClass
                );
            }
        }
        return $propertyEntity;
    }
}
