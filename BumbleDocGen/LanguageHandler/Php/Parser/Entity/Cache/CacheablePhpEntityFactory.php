<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Roave\BetterReflection\Reflection\ReflectionClass;

final class CacheablePhpEntityFactory
{
    public function __construct(
        private ReflectorWrapper $reflector,
        private Container        $diContainer
    )
    {
    }

    public static function createPropertyEntity(
        ClassEntity $classEntity,
        string      $propertyName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): PropertyEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(PropertyEntity::class, 'PropertyEntityWrapper');
        return $wrapperClassName::create(
            $classEntity,
            $propertyName,
            $declaringClassName,
            $implementingClassName,
            $reloadCache
        );
    }

    public function createConstantEntity(
        ClassEntity $classEntity,
        string      $constantName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): ConstantEntity
    {
        static $wrapperClassName = null;
        if (is_null($wrapperClassName)) {
            $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ConstantEntity::class, 'ConstantEntityWrapper');
            $this->diContainer->set($wrapperClassName, \DI\factory([$wrapperClassName, 'create']));
        }
        return $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'constantName' => $constantName,
            'declaringClassName' => $declaringClassName,
            'implementingClassName' => $implementingClassName,
            'reloadCache' => $reloadCache
        ]);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createMethodEntity(
        ClassEntity $classEntity,
        string      $methodName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): MethodEntity
    {
        static $wrapperClassName = null;
        if (is_null($wrapperClassName)) {
            $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(MethodEntity::class, 'MethodEntityWrapper');
            $this->diContainer->set($wrapperClassName, \DI\factory([$wrapperClassName, 'create']));
        }
        return $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'methodName' => $methodName,
            'declaringClassName' => $declaringClassName,
            'implementingClassName' => $implementingClassName,
            'reloadCache' => $reloadCache
        ]);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createClassEntity(
        ClassEntityCollection $classEntityCollection,
        string                $className,
        ?string               $relativeFileName = null,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        static $wrapperClassName = null;
        if (is_null($wrapperClassName)) {
            $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ClassEntity::class, 'ClassEntityWrapper');
            $this->diContainer->set($wrapperClassName, \DI\factory([$wrapperClassName, 'create']));
        }
        return $this->diContainer->make($wrapperClassName, [
            'reflector' => $this->reflector,
            'classEntityCollection' => $classEntityCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName,
            'reloadCache' => $reloadCache
        ]);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createClassEntityByReflection(
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        static $wrapperClassName = null;
        if (is_null($wrapperClassName)) {
            $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ClassEntity::class, 'ClassEntityRWrapper');
            $this->diContainer->set($wrapperClassName, \DI\factory([$wrapperClassName, 'createByReflection']));
        }
        return $this->diContainer->make($wrapperClassName, [
            'reflector' => $this->reflector,
            'classEntityCollection' => $classEntityCollection,
            'reflectionClass' => $reflectionClass,
            'reloadCache' => $reloadCache
        ]);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createSubClassEntity(
        string                $subClassEntity,
        ClassEntityCollection $classEntityCollection,
        string                $className,
        ?string               $relativeFileName,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        static $wrapperClassName = [];
        $classNameParts = explode('\\', $subClassEntity);
        $subClassEntityName = end($classNameParts);
        if (!array_key_exists($subClassEntityName, $wrapperClassName)) {
            $wrapperClassName[$subClassEntityName] = CacheableEntityWrapperFactory::createWrappedEntityClass($subClassEntity, "{$subClassEntityName}Wrapper");
            $this->diContainer->set($wrapperClassName[$subClassEntityName], \DI\factory([$wrapperClassName, 'create']));
        }
        return $this->diContainer->make($wrapperClassName[$subClassEntityName], [
            'reflector' => $this->reflector,
            'classEntityCollection' => $classEntityCollection,
            'className' => $className,
            'relativeFileName' => $relativeFileName,
            'reloadCache' => $reloadCache
        ]);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function createSubClassEntityByReflection(
        string                $subClassEntity,
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        static $wrapperClassName = [];
        $classNameParts = explode('\\', $subClassEntity);
        $subClassEntityName = end($classNameParts);
        if (!array_key_exists($subClassEntityName, $wrapperClassName)) {
            $wrapperClassName[$subClassEntityName] = CacheableEntityWrapperFactory::createWrappedEntityClass($subClassEntity, "{$subClassEntityName}RWrapper");
            $this->diContainer->set($wrapperClassName[$subClassEntityName], \DI\factory([$wrapperClassName, 'createByReflection']));
        }
        return $this->diContainer->make($wrapperClassName[$subClassEntityName], [
            'reflector' => $this->reflector,
            'classEntityCollection' => $classEntityCollection,
            'reflectionClass' => $reflectionClass,
            'reloadCache' => $reloadCache
        ]);
    }
}
