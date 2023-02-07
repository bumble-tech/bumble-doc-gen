<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ConstantEntity;
use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\Entity\PropertyEntity;
use Nette\PhpGenerator\Parameter;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

final class CacheableEntityWrapperFactory
{
    private static function createForEntity(string $className, string $wrapperName): string
    {
        static $entityWrapperClassNames = [];

        if (!isset($entityWrapperClassNames[$wrapperName])) {
            $namespaceName = 'BumbleDocGen\\Parser\\Entity\\Cache';

            $namespace = new \Nette\PhpGenerator\PhpNamespace($namespaceName);
            $class = $namespace->addClass($wrapperName);
            $class->setExtends($className);
            $class->addTrait(CacheableEntityWrapperTrait::class);
            $class->addImplement(CacheableEntityWrapperInterface::class);

            $reflectionClass = new \ReflectionClass($className);
            foreach ($reflectionClass->getMethods() as $method) {
                if (!$method->isFinal() && !$method->isStatic()) {
                    $cacheableMethodAttr = $method->getAttributes(CacheableMethod::class)[0] ?? null;
                    if ($cacheableMethodAttr) {
                        $newMethod = $class->addMethod($method->getName())
                            ->setStatic($method->isStatic())
                            ->setVariadic($method->isVariadic())
                            ->setReturnType((string)$method->getReturnType());

                        $parameters = [];
                        foreach ($method->getParameters() as $parameter) {
                            $parameter = new Parameter($parameter->getName());
                            $parameter->setDefaultValue($parameter->getDefaultValue());
                            $parameters[] = $parameter;
                        }
                        $newMethod->setParameters($parameters);

                        $cacheKey = "{$wrapperName}_{$method->getName()}";

                        $expiresAfter = time() + $cacheableMethodAttr->newInstance()->getCacheSeconds();
                        $newMethod->setBody('
                            $funcArgs = func_get_args();
                            $cacheKey = \'' . $cacheKey . '\' . md5(json_encode($funcArgs)) . $this->getObjectId();
                            $internalDataKey = "__data__";
                            
                            $result = $this->getCacheValue($cacheKey);
                            if(!is_array($result) || !array_key_exists($internalDataKey, $result) || $this->entityCacheIsOutdated()) {
                                $methodReturnValue = parent::' . $method->getName() . '(...$funcArgs);
                                $result = [
                                    $internalDataKey => $methodReturnValue,
                                    "__expires_after__" => ' . $expiresAfter . '
                                ];
                                $this->addValueToCache($cacheKey, $result);
                            }
                            return $result[$internalDataKey];
                        ');
                    }
                }
            }

            eval((string)$namespace);
            $entityWrapperClassNames[$wrapperName] = "{$namespaceName}\\$wrapperName";
        }
        return $entityWrapperClassNames[$wrapperName];
    }

    public static function createPropertyEntity(
        ClassEntity $classEntity,
        string      $propertyName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): PropertyEntity
    {
        $wrapperClassName = self::createForEntity(PropertyEntity::class, 'PropertyEntityWrapper');
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
        $wrapperClassName = self::createForEntity(ConstantEntity::class, 'ConstantEntityWrapper');
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
        $wrapperClassName = self::createForEntity(MethodEntity::class, 'MethodEntityWrapper');
        return $wrapperClassName::create(
            $classEntity,
            $methodName,
            $declaringClassName,
            $implementingClassName,
            $reloadCache
        );
    }

    public static function createClassEntity(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        string                 $className,
        ?string                $relativeFileName,
        AttributeParser        $attributeParser,
        bool                   $reloadCache = false
    ): ClassEntity
    {
        $wrapperClassName = self::createForEntity(ClassEntity::class, 'ClassEntityWrapper');
        return $wrapperClassName::create(
            $configuration,
            $reflector,
            $className,
            $relativeFileName,
            $attributeParser,
            $reloadCache
        );
    }

    public static function createClassEntityByReflection(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        ReflectionClass        $reflectionClass,
        AttributeParser        $attributeParser,
        bool                   $reloadCache = false
    ): ClassEntity
    {
        $wrapperClassName = self::createForEntity(ClassEntity::class, 'ClassEntityWrapper');
        return $wrapperClassName::createByReflection(
            $configuration,
            $reflector,
            $reflectionClass,
            $attributeParser,
            $reloadCache
        );
    }

    public static function createSubClassEntityByReflection(
        string                 $subClassEntity,
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        ReflectionClass        $reflectionClass,
        AttributeParser        $attributeParser,
        bool                   $reloadCache = false
    ): ClassEntity
    {
        $classNameParts = explode('\\', $subClassEntity);
        $className = end($classNameParts);
        $wrapperClassName = self::createForEntity($subClassEntity, "{$className}Wrapper");
        return $wrapperClassName::createByReflection(
            $configuration,
            $reflector,
            $reflectionClass,
            $attributeParser,
            $reloadCache
        );
    }
}
