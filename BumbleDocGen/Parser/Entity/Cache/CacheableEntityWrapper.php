<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ConstantEntity;
use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\Entity\PropertyEntity;
use Nette\PhpGenerator\Parameter;

final class CacheableEntityWrapper
{
    private const DEPENDENCIES_CACHE_KEY = '__entityDependencies';

    private static array $filesDependenciesCache = [];

    private static function loadEntityDependencies(ClassEntity $classEntity): array
    {
        $parentClassNames = $classEntity->getReflection()->getParentClassNames();
        $traitClassNames = $classEntity->getReflection()->getTraitNames();
        $interfaceNames = $classEntity->getReflection()->getInterfaceNames();

        $fileDependencies = [];
        $classNames = array_unique(array_merge($parentClassNames, $traitClassNames, $interfaceNames));
        $classNames[] = $classEntity->getName();
        foreach ($classNames as $className) {
            $reflectionClass = $classEntity->getReflector()->reflectClass($className);
            $fileName = $reflectionClass->getFileName();
            if ($fileName) {
                $relativeFileName = str_replace($classEntity->getConfiguration()->getProjectRoot(), '', $reflectionClass->getFileName());
                $fileDependencies[$relativeFileName] = md5_file($fileName);
            }
        }
        return $fileDependencies;
    }

    public static function getAndCacheEntityDependencies(ClassEntity $classEntity, bool $reload = false): array
    {
        $cacheItemPool = $classEntity->getConfiguration()->getEntityCacheItemPool();
        $className = $classEntity->getName();

        if (empty(self::$filesDependenciesCache)) {
            if ($cacheItemPool->hasItem(self::DEPENDENCIES_CACHE_KEY)) {
                self::$filesDependenciesCache = $cacheItemPool->getItem(self::DEPENDENCIES_CACHE_KEY)->get();
            }
        }

        if (!isset(self::$filesDependenciesCache[$className]) || $reload) {
            self::$filesDependenciesCache[$className] = self::loadEntityDependencies($classEntity);
            $cacheItemPool = $classEntity->getConfiguration()->getEntityCacheItemPool();
            $cacheItem = $cacheItemPool->getItem(self::DEPENDENCIES_CACHE_KEY);
            $cacheItem->set(self::$filesDependenciesCache);
            $cacheItemPool->saveDeferred($cacheItem);
        }
        return self::$filesDependenciesCache[$className];
    }

    public static function entityCacheIsOutdated(ClassEntity $classEntity): bool
    {
        static $filesCacheState = [];
        $className = $classEntity->getName();
        if (!isset($filesCacheState[$className])) {
            $projectRoot = $classEntity->getConfiguration()->getProjectRoot();
            $filesCacheState[$className] = false;
            foreach (self::getAndCacheEntityDependencies($classEntity) as $relativeFileName => $hashFile) {
                if (md5_file("{$projectRoot}{$relativeFileName}") !== $hashFile) {
                    $filesCacheState[$className] = true;
                    break;
                }
            }
        }
        return $filesCacheState[$className];
    }

    private static function createForEntity(string $className, string $wrapperName): string
    {
        static $entityWrapperClassNames = [];

        if (!isset($entityWrapperClassNames[$wrapperName])) {
            $namespaceName = 'BumbleDocGen\\Parser\\Entity\\Cache';

            $namespace = new \Nette\PhpGenerator\PhpNamespace($namespaceName);
            $class = $namespace->addClass($wrapperName);
            $class->setExtends($className);

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

                        $newMethod->setBody('
                            static $cache = [];
                            $funcArgs = func_get_args();
                            $cacheKey = \'' . $cacheKey . '\' . md5(json_encode($funcArgs)) . str_replace(["\\\\", ":"], "_", $this->getObjectId());
                            if(!isset($cache[$cacheKey])){
                                $cacheItemPool = $this->configuration->getEntityCacheItemPool();
                                
                                if(is_subclass_of($this, \BumbleDocGen\Parser\Entity\ClassEntity::class)) {
                                    $classEntity = $this;
                                }
                                else {
                                    $classEntity = $this->getClassEntity();
                                }
                                
                                $cacheItem = $cacheItemPool->getItem($cacheKey);
                                if (
                                    $cacheItemPool->hasItem($cacheKey) && 
                                    !\BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapper::entityCacheIsOutdated($classEntity)
                                ) {
                                    $result = $cacheItem->get();
                                } else {
                                    $result = parent::' . $method->getName() . '(...$funcArgs);
                                    $cacheItem->set($result);
                                    $cacheItemPool->save($cacheItem);
                                    \BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapper::getAndCacheEntityDependencies($classEntity, true);
                                }
                                $cache[$cacheKey] = $result;
                            }
                            return $cache[$cacheKey];
                        ');
                    }
                }
            }

            eval((string)$namespace);
            $entityWrapperClassNames[$wrapperName] = "{$namespaceName}\\$wrapperName";
        }
        return $entityWrapperClassNames[$wrapperName];
    }

    public static function createForPropertyEntity(): string
    {
        return self::createForEntity(PropertyEntity::class, 'PropertyEntityWrapper');
    }

    public static function createForConstantEntity(): string
    {
        return self::createForEntity(ConstantEntity::class, 'ConstantEntityWrapper');
    }

    public static function createForMethodEntity(): string
    {
        return self::createForEntity(MethodEntity::class, 'MethodEntityWrapper');
    }

    public static function createForClassEntity(): string
    {
        return self::createForEntity(ClassEntity::class, 'ClassEntityWrapper');
    }
}
