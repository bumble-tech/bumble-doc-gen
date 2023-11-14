<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Constant\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Method\DynamicMethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Method\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Property\PropertyEntity;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

final class CacheablePhpEntityFactory
{
    public function __construct(
        private CacheableEntityWrapperFactory $cacheableEntityWrapperFactory,
        private LocalObjectCache $localObjectCache,
        private Container $diContainer
    ) {
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createPropertyEntity(
        ClassEntity $classEntity,
        string $propertyName,
        string $implementingClassName
    ): PropertyEntity {
        $objectId = "{$classEntity->getName()}:{$propertyName}";
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(PropertyEntity::class);
        $propertyEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'propertyName' => $propertyName,
            'implementingClassName' => $implementingClassName
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $propertyEntity);
        return $propertyEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createConstantEntity(
        ClassEntity $classEntity,
        string $constantName,
        string $implementingClassName,
        bool $reloadCache = false
    ): ConstantEntity {
        $objectId = "{$classEntity->getName()}:{$constantName}";
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(ConstantEntity::class);
        $constantEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'constantName' => $constantName,
            'implementingClassName' => $implementingClassName,
            'reloadCache' => $reloadCache
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $constantEntity);
        return $constantEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createMethodEntity(
        ClassEntity $classEntity,
        string $methodName,
        string $implementingClassName
    ): MethodEntity {
        $objectId = "{$classEntity->getName()}:{$methodName}";
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(MethodEntity::class);
        $methodEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'methodName' => $methodName,
            'implementingClassName' => $implementingClassName
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $methodEntity);
        return $methodEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createDynamicMethodEntity(
        ClassEntity $classEntity,
        Method $annotationMethod
    ): DynamicMethodEntity {
        $objectId = "{$classEntity->getName()}:{$annotationMethod->getMethodName()}";
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(DynamicMethodEntity::class);
        $methodEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'annotationMethod' => $annotationMethod,
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $methodEntity);
        return $methodEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createClassEntity(
        ClassEntityCollection $classEntityCollection,
        string $className,
        ?string $relativeFileName = null
    ): ClassEntity {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(ClassEntity::class);
        $classEntity = $this->diContainer->make($wrapperClassName, [
            'classEntityCollection' => $classEntityCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $classEntity);
        return $classEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createSubClassEntity(
        string $subClassEntity,
        ClassEntityCollection $classEntityCollection,
        string $className,
        ?string $relativeFileName
    ): ClassEntity {
        if (!is_a($subClassEntity, ClassEntity::class, true)) {
            throw new \Exception(
                'The class must inherit from `BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity`'
            );
        }
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper($subClassEntity);
        $classEntity = $this->diContainer->make($wrapperClassName, [
            'classEntityCollection' => $classEntityCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $classEntity);
        return $classEntity;
    }

    private function getOrCreateEntityClassWrapper(string $entityClassName): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $entityClassName);
        } catch (ObjectNotFoundException) {
        }
        $classNameParts = explode('\\', $entityClassName);
        $classEntityName = end($classNameParts);
        $wrapperClassName = $this->cacheableEntityWrapperFactory->createWrappedEntityClass(
            $entityClassName,
            "{$classEntityName}Wrapper"
        );
        $this->localObjectCache->cacheMethodResult(__METHOD__, $entityClassName, $wrapperClassName);
        return $wrapperClassName;
    }
}
