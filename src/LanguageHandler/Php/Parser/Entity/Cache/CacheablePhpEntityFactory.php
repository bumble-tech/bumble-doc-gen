<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\EnumEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\InterfaceEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\DynamicMethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\TraitEntity;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

final class CacheablePhpEntityFactory
{
    public function __construct(
        private CacheableEntityWrapperFactory $cacheableEntityWrapperFactory,
        private ComposerHelper $composerHelper,
        private LocalObjectCache $localObjectCache,
        private Container $diContainer
    ) {
    }

    /**
     * Create a child entity ClassLikeEntity in which the CacheableMethod attributes will be processed to cache the results of the methods
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function createClassLikeEntity(
        PhpEntitiesCollection $entitiesCollection,
        string $className,
        ?string $relativeFileName = null,
        ?string $entityClassName = null
    ): ClassLikeEntity {
        $className = ClassLikeEntity::normalizeClassName($className);
        $objectId = md5($className);
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }

        if (!$entityClassName) {
            $fileName = $this->composerHelper->getComposerClassLoader()->findFile($className);
            $entityClassName = ClassEntity::class;
            if ($fileName) {
                $shortClassNameLS = mb_strtolower(array_reverse(explode('\\', $className))[0]);
                preg_match(
                    '/^(\s+)?(interface|trait|((final|abstract)\s+)?class|enum)(\s+)(' . $shortClassNameLS . ')/m',
                    mb_strtolower(file_get_contents($fileName)),
                    $matches
                );
                $entityClassName = match ($matches[2] ?? '') {
                    'interface' => InterfaceEntity::class,
                    'trait' => TraitEntity::class,
                    'enum' => EnumEntity::class,
                    default => ClassEntity::class
                };
            }
        } else {
            $entityClassName = ClassLikeEntity::normalizeClassName($entityClassName);
        }

        if (
            !in_array($entityClassName, [
                InterfaceEntity::class,
                TraitEntity::class,
                EnumEntity::class,
                ClassEntity::class
            ]) && !is_a($entityClassName, ClassLikeEntity::class, true)
        ) {
            throw new \RuntimeException(
                'The $entityClassName parameter must contain the name of the class that is a subclass of ' . ClassLikeEntity::class
            );
        }

        $wrapperClassName = $this->getOrCreateEntityClassWrapper($entityClassName);
        /** @var ClassLikeEntity $classEntity */
        $classEntity = $this->diContainer->make($wrapperClassName, [
            'entitiesCollection' => $entitiesCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName
        ]);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $classEntity);
        return $classEntity;
    }

    /**
     * @internal
     *
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createPropertyEntity(
        ClassLikeEntity $classEntity,
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
     * @internal
     *
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createClassConstantEntity(
        ClassLikeEntity $classEntity,
        string $constantName,
        string $implementingClassName,
        bool $reloadCache = false
    ): ClassConstantEntity {
        $objectId = "{$classEntity->getName()}:{$constantName}";
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $wrapperClassName = $this->getOrCreateEntityClassWrapper(ClassConstantEntity::class);
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
     * @internal
     *
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createMethodEntity(
        ClassLikeEntity $classEntity,
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
     * @internal
     *
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createDynamicMethodEntity(
        ClassLikeEntity $classEntity,
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
