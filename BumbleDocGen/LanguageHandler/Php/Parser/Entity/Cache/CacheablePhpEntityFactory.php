<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\Core\Render\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use Roave\BetterReflection\Reflection\ReflectionClass;

final class CacheablePhpEntityFactory
{
    public function __construct(
        private Configuration          $configuration,
        private PhpHandlerSettings     $phpHandlerSettings,
        private ReflectorWrapper       $reflector,
        private GetDocumentedEntityUrl $documentedEntityUrlFunction
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

    public function createClassEntity(
        ClassEntityCollection $classEntityCollection,
        string                $className,
        ?string               $relativeFileName = null,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ClassEntity::class, 'ClassEntityWrapper');
        return $wrapperClassName::create(
            $this->configuration,
            $this->phpHandlerSettings,
            $this->reflector,
            $classEntityCollection,
            $this->documentedEntityUrlFunction,
            $className,
            $relativeFileName,
            $reloadCache
        );
    }

    public function createClassEntityByReflection(
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(ClassEntity::class, 'ClassEntityWrapper');
        return $wrapperClassName::createByReflection(
            $this->configuration,
            $this->phpHandlerSettings,
            $this->reflector,
            $reflectionClass,
            $this->documentedEntityUrlFunction,
            $classEntityCollection,
            $reloadCache
        );
    }

    public function createSubClassEntity(
        string                $subClassEntity,
        ClassEntityCollection $classEntityCollection,
        string                $className,
        ?string               $relativeFileName,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        $classNameParts = explode('\\', $subClassEntity);
        $subClassEntityName = end($classNameParts);
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass($subClassEntity, "{$subClassEntityName}Wrapper");
        return $wrapperClassName::create(
            $this->configuration,
            $this->phpHandlerSettings,
            $this->reflector,
            $classEntityCollection,
            $className,
            $relativeFileName,
            $reloadCache
        );
    }

    public function createSubClassEntityByReflection(
        string                $subClassEntity,
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        $classNameParts = explode('\\', $subClassEntity);
        $className = end($classNameParts);
        $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass($subClassEntity, "{$className}Wrapper");
        return $wrapperClassName::createByReflection(
            $this->configuration,
            $this->phpHandlerSettings,
            $this->reflector,
            $reflectionClass,
            $classEntityCollection,
            $reloadCache
        );
    }
}
