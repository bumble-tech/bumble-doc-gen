<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettingsInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

final class CacheablePhpEntityFactory
{
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

    public static function createConstantEntity(
        ClassEntity $classEntity,
        string      $constantName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): ConstantEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ConstantEntity::class, 'ConstantEntityWrapper');
        return $wrapperClassName::create(
            $classEntity,
            $constantName,
            $declaringClassName,
            $implementingClassName,
            $reloadCache
        );
    }

    public static function createMethodEntity(
        ClassEntity $classEntity,
        string      $methodName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): MethodEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(MethodEntity::class, 'MethodEntityWrapper');
        return $wrapperClassName::create(
            $classEntity,
            $methodName,
            $declaringClassName,
            $implementingClassName,
            $reloadCache
        );
    }

    public static function createClassEntity(
        ConfigurationInterface      $configuration,
        PhpHandlerSettingsInterface $phpHandlerSettings,
        Reflector                   $reflector,
        ClassEntityCollection       $classEntityCollection,
        string                      $className,
        ?string                     $relativeFileName = null,
        bool                        $reloadCache = false
    ): ClassEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ClassEntity::class, 'ClassEntityWrapper');
        return $wrapperClassName::create(
            $configuration,
            $phpHandlerSettings,
            $reflector,
            $classEntityCollection,
            $className,
            $relativeFileName,
            $reloadCache
        );
    }

    public static function createClassEntityByReflection(
        ConfigurationInterface      $configuration,
        PhpHandlerSettingsInterface $phpHandlerSettings,
        Reflector                   $reflector,
        ReflectionClass             $reflectionClass,
        ClassEntityCollection       $classEntityCollection,
        bool                        $reloadCache = false
    ): ClassEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ClassEntity::class, 'ClassEntityWrapper');
        return $wrapperClassName::createByReflection(
            $configuration,
            $phpHandlerSettings,
            $reflector,
            $reflectionClass,
            $classEntityCollection,
            $reloadCache
        );
    }

    public static function createSubClassEntity(
        string                      $subClassEntity,
        ConfigurationInterface      $configuration,
        PhpHandlerSettingsInterface $phpHandlerSettings,
        Reflector                   $reflector,
        ClassEntityCollection       $classEntityCollection,
        string                      $className,
        ?string                     $relativeFileName,
        bool                        $reloadCache = false
    ): ClassEntity
    {
        $classNameParts = explode('\\', $subClassEntity);
        $subClassEntityName = end($classNameParts);
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass($subClassEntity, "{$subClassEntityName}Wrapper");
        return $wrapperClassName::create(
            $configuration,
            $phpHandlerSettings,
            $reflector,
            $classEntityCollection,
            $className,
            $relativeFileName,
            $reloadCache
        );
    }

    public static function createSubClassEntityByReflection(
        string                      $subClassEntity,
        ConfigurationInterface      $configuration,
        PhpHandlerSettingsInterface $phpHandlerSettings,
        Reflector                   $reflector,
        ReflectionClass             $reflectionClass,
        ClassEntityCollection       $classEntityCollection,
        bool                        $reloadCache = false
    ): ClassEntity
    {
        $classNameParts = explode('\\', $subClassEntity);
        $className = end($classNameParts);
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass($subClassEntity, "{$className}Wrapper");
        return $wrapperClassName::createByReflection(
            $configuration,
            $phpHandlerSettings,
            $reflector,
            $reflectionClass,
            $classEntityCollection,
            $reloadCache
        );
    }
}
