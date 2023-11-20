<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\EnumEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\InterfaceEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Constant\ConstantEntity;
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
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createConstantEntity(
        ClassLikeEntity $classEntity,
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

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function createClassLikeEntity(
        ClassEntityCollection $classEntityCollection,
        string $className,
        ?string $relativeFileName = null
    ): ClassLikeEntity {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }

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

        $wrapperClassName = $this->getOrCreateEntityClassWrapper($entityClassName);
        /** @var ClassLikeEntity $classEntity */
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
    ): ClassLikeEntity {
        if (!is_a($subClassEntity, ClassLikeEntity::class, true)) {
            throw new \RuntimeException(
                'The class must inherit from `' . ClassEntity::class . '`'
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
