<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\InvalidCallContextException;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\DynamicMethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Roave\BetterReflection\Reflection\ReflectionClass;

final class CacheablePhpEntityFactory
{
    public function __construct(
        private ReflectorWrapper $reflector,
        private Configuration    $configuration,
        private LocalObjectCache $localObjectCache,
        private Container        $diContainer
    )
    {
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createPropertyEntity(
        ClassEntity $classEntity,
        string      $propertyName,
        string      $declaringClassName,
        string      $implementingClassName
    ): PropertyEntity
    {
        $objectId = "{$classEntity->getName()}:{$propertyName}";
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(PropertyEntity::class);
        $propertyEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'propertyName' => $propertyName,
            'declaringClassName' => $declaringClassName,
            'implementingClassName' => $implementingClassName
        ]);
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $propertyEntity);
        return $propertyEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createConstantEntity(
        ClassEntity $classEntity,
        string      $constantName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): ConstantEntity
    {
        $objectId = "{$classEntity->getName()}:{$constantName}";
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(ConstantEntity::class);
        $constantEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'constantName' => $constantName,
            'declaringClassName' => $declaringClassName,
            'implementingClassName' => $implementingClassName,
            'reloadCache' => $reloadCache
        ]);
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $constantEntity);
        return $constantEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createMethodEntity(
        ClassEntity $classEntity,
        string      $methodName,
        string      $declaringClassName,
        string      $implementingClassName
    ): MethodEntity
    {
        $objectId = "{$classEntity->getName()}:{$methodName}";
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(MethodEntity::class);
        $methodEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'methodName' => $methodName,
            'declaringClassName' => $declaringClassName,
            'implementingClassName' => $implementingClassName
        ]);
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $methodEntity);
        return $methodEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createDynamicMethodEntity(
        ClassEntity $classEntity,
        Method      $annotationMethod
    ): DynamicMethodEntity
    {
        $objectId = "{$classEntity->getName()}:{$annotationMethod->getName()}";
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(DynamicMethodEntity::class);
        $methodEntity = $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'annotationMethod' => $annotationMethod,
        ]);
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $methodEntity);
        return $methodEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createClassEntity(
        ClassEntityCollection $classEntityCollection,
        string                $className,
        ?string               $relativeFileName = null
    ): ClassEntity
    {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(ClassEntity::class);
        $classEntity = $this->diContainer->make($wrapperClassName, [
            'reflector' => $this->reflector,
            'classEntityCollection' => $classEntityCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName
        ]);
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $classEntity);
        return $classEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function createClassEntityByReflection(
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection
    ): ClassEntity
    {
        $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $reflectionClass->getFileName() ?? '');
        $relativeFileName = $relativeFileName ?: null;
        $className = $reflectionClass->getName();
        $classEntity = $this->createClassEntity($classEntityCollection, $className, $relativeFileName);
        $classEntity->setReflectionClass($reflectionClass);
        return $classEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createSubClassEntity(
        string                $subClassEntity,
        ClassEntityCollection $classEntityCollection,
        string                $className,
        ?string               $relativeFileName
    ): ClassEntity
    {
        if (!is_a($subClassEntity, ClassEntity::class, true)) {
            throw new \Exception(
                'The class must inherit from `BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity`'
            );
        }
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper($subClassEntity);
        $classEntity = $this->diContainer->make($wrapperClassName, [
            'reflector' => $this->reflector,
            'classEntityCollection' => $classEntityCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName
        ]);
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $classEntity);
        return $classEntity;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function createSubClassEntityByReflection(
        string                $subClassEntity,
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection
    ): ClassEntity
    {
        $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $reflectionClass->getFileName() ?? '');
        $relativeFileName = $relativeFileName ?: null;
        $className = $reflectionClass->getName();
        $classEntity = $this->createSubClassEntity(
            $subClassEntity,
            $classEntityCollection,
            $className,
            $relativeFileName
        );
        $classEntity->setReflectionClass($reflectionClass);
        return $classEntity;
    }

    private function getOrCreateEntityClassWrapper(string $entityClassName): string
    {
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($entityClassName);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $classNameParts = explode('\\', $entityClassName);
        $classEntityName = end($classNameParts);
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(
            $entityClassName,
            "{$classEntityName}Wrapper"
        );
        $this->localObjectCache->cacheCurrentMethodResultSilently($entityClassName, $wrapperClassName);
        return $wrapperClassName;
    }
}
