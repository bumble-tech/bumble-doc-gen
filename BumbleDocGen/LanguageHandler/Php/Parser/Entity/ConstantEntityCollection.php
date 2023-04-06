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

final class ConstantEntityCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassEntity               $classEntity,
        private PhpHandlerSettings        $phpHandlerSettings,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function loadConstantEntities(): void
    {
        $classConstantEntityFilter = $this->phpHandlerSettings->getClassConstantEntityFilter();
        foreach ($this->classEntity->getConstantsData() as $name => $constantData) {
            $constantEntity = $this->cacheablePhpEntityFactory->createConstantEntity(
                $this->classEntity,
                $name,
                $constantData['declaringClass'],
                $constantData['implementingClass']
            );
            if ($classConstantEntityFilter->canAddToCollection($constantEntity)) {
                $this->add($constantEntity);
            }
        }
    }

    public function add(ConstantEntity $constantEntity, bool $reload = false): ConstantEntityCollection
    {
        $constantName = $constantEntity->getName();
        if (!isset($this->entities[$constantName]) || $reload) {
            $this->entities[$constantName] = $constantEntity;
        }
        return $this;
    }

    public function get(string $objectName): ?ConstantEntity
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $constantName): ?ConstantEntity
    {
        $constantEntity = $this->get($constantName);
        if (!$constantEntity) {
            $constantsData = $this->classEntity->getConstantsData()[$constantName] ?? null;
            if (is_array($constantsData)) {
                return $this->cacheablePhpEntityFactory->createConstantEntity(
                    $this->classEntity,
                    $constantName,
                    $constantsData['declaringClass'],
                    $constantsData['implementingClass']
                );
            }
        }
        return $constantEntity;
    }
}
