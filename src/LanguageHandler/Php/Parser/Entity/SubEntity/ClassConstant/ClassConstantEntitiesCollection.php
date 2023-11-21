<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;

final class ClassConstantEntitiesCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassLikeEntity $classEntity,
        private PhpHandlerSettings $phpHandlerSettings,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory
    ) {
    }

    /**
     *
     * @internal
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function loadConstantEntities(): void
    {
        $classConstantEntityFilter = $this->phpHandlerSettings->getClassConstantEntityFilter();
        foreach ($this->classEntity->getConstantsData() as $name => $constantImplementingClass) {
            $constantEntity = $this->cacheablePhpEntityFactory->createClassConstantEntity(
                $this->classEntity,
                $name,
                $constantImplementingClass
            );
            if ($classConstantEntityFilter->canAddToCollection($constantEntity)) {
                $this->add($constantEntity);
            }
        }
    }

    /**
     * @api
     */
    public function add(ClassConstantEntity $constantEntity, bool $reload = false): ClassConstantEntitiesCollection
    {
        $constantName = $constantEntity->getName();
        if (!isset($this->entities[$constantName]) || $reload) {
            $this->entities[$constantName] = $constantEntity;
        }
        return $this;
    }

    /**
     * @api
     */
    public function get(string $objectName): ?ClassConstantEntity
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     *
     * @api
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $constantName): ?ClassConstantEntity
    {
        $constantEntity = $this->get($constantName);
        if (!$constantEntity) {
            $constantsImplementingClass = $this->classEntity->getConstantsData()[$constantName] ?? null;
            if (!is_null($constantsImplementingClass)) {
                return $this->cacheablePhpEntityFactory->createClassConstantEntity(
                    $this->classEntity,
                    $constantName,
                    $constantsImplementingClass
                );
            }
        }
        return $constantEntity;
    }
}
