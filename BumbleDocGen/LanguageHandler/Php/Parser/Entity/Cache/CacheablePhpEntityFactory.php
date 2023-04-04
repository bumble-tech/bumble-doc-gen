<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
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
        private Configuration    $configuration,
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
        string      $implementingClassName,
        bool        $reloadCache = false
    ): PropertyEntity
    {
        static $wrapperClassName = null;
        if (is_null($wrapperClassName)) {
            $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(PropertyEntity::class, 'PropertyEntityWrapper');
            $this->diContainer->set($wrapperClassName, \DI\factory([$wrapperClassName, 'create']));
        }
        return $this->diContainer->make($wrapperClassName, [
            'classEntity' => $classEntity,
            'propertyName' => $propertyName,
            'declaringClassName' => $declaringClassName,
            'implementingClassName' => $implementingClassName,
            'reloadCache' => $reloadCache
        ]);
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
        static $classEntities = [];
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $wrapperClassName = $this->createAndRegisterWrapper(ClassEntity::class);
            $classEntities[$objectId] = $this->diContainer->make($wrapperClassName, [
                'reflector' => $this->reflector,
                'classEntityCollection' => $classEntityCollection,
                'className' => $className,
                'relativeFileName' => $relativeFileName,
                'reloadCache' => $reloadCache
            ]);
        }
        return $classEntities[$objectId];
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function createClassEntityByReflection(
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $reflectionClass->getFileName() ?? '');
        $relativeFileName = $relativeFileName ?: null;
        $className = $reflectionClass->getName();
        $classEntity = $this->createClassEntity($classEntityCollection, $className, $relativeFileName, $reloadCache);
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
        ?string               $relativeFileName,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        if (!is_a($subClassEntity, ClassEntity::class, true)) {
            throw new \Exception(
                'The class must inherit from `BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity`'
            );
        }
        static $classEntities = [];
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $wrapperClassName = $this->createAndRegisterWrapper($subClassEntity);
            $classEntities[$objectId] = $this->diContainer->make($wrapperClassName, [
                'reflector' => $this->reflector,
                'classEntityCollection' => $classEntityCollection,
                'className' => $className,
                'relativeFileName' => $relativeFileName,
                'reloadCache' => $reloadCache
            ]);
        }
        return $classEntities[$objectId];
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function createSubClassEntityByReflection(
        string                $subClassEntity,
        ReflectionClass       $reflectionClass,
        ClassEntityCollection $classEntityCollection,
        bool                  $reloadCache = false
    ): ClassEntity
    {
        $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $reflectionClass->getFileName() ?? '');
        $relativeFileName = $relativeFileName ?: null;
        $className = $reflectionClass->getName();
        $classEntity = $this->createSubClassEntity(
            $subClassEntity,
            $classEntityCollection,
            $className,
            $relativeFileName,
            $reloadCache
        );
        $classEntity->setReflectionClass($reflectionClass);
        return $classEntity;
    }

    private function createAndRegisterWrapper(string $classEntity): string
    {
        static $wrapperClassNames = [];
        if (!isset($wrapperClassNames[$classEntity])) {
            $classNameParts = explode('\\', $classEntity);
            $classEntityName = end($classNameParts);
            $wrapperClassName = CacheableEntityWrapperFactory::createWrappedEntityClass(
                $classEntity,
                "{$classEntityName}Wrapper"
            );
            $this->diContainer->set($wrapperClassName, \DI\autowire($wrapperClassName));
            $wrapperClassNames[$classEntity] = $wrapperClassName;
        }
        return $wrapperClassNames[$classEntity];
    }
}
