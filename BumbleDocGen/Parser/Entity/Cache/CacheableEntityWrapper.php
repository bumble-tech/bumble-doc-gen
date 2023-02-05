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
                            $cacheKey = \'' . $cacheKey . '\' . str_replace(["\\\\", ":"], "_", $this->getObjectId());
                            if(!isset($cache[$cacheKey])){
                                $cacheItemPool = $this->configuration->getEntityCacheItemPool();
                                if ($cacheItemPool->hasItem($cacheKey)) {
                                    $result = $cacheItemPool->getItem($cacheKey)->get();
                                } else {
                                    $result = parent::' . $method->getName() . '(...func_get_args());
                                    $cacheItem = $cacheItemPool->getItem($cacheKey);
                                    $cacheItem->set($result);
                                    $cacheItemPool->save($cacheItem);
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
