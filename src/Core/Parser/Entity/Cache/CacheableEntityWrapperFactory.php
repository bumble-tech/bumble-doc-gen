<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use Nette\PhpGenerator\Parameter;

final class CacheableEntityWrapperFactory
{
    public function __construct(
        private readonly LocalObjectCache $localObjectCache
    ) {
    }

    public function createWrappedEntityClass(string $className, string $wrapperName): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $wrapperName);
        } catch (ObjectNotFoundException) {
        }

        $namespaceName = 'BumbleDocGen\\Core\\Parser\\Entity\\Cache';
        $entityWrapperClassName = "{$namespaceName}\\$wrapperName";

        if (class_exists($entityWrapperClassName)) {
            $this->localObjectCache->cacheMethodResult(__METHOD__, $wrapperName, $entityWrapperClassName);
            return $entityWrapperClassName;
        }

        $namespace = new \Nette\PhpGenerator\PhpNamespace($namespaceName);
        $class = $namespace->addClass($wrapperName);
        $class->setExtends($className);

        if (is_a($className, CacheableEntityInterface::class, true)) {
            $class->addTrait(CacheableEntityWrapperTrait::class);
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

                        $cacheNamespace = "{$wrapperName}_{$method->getName()}";

                        $cacheableMethodAttrObj = $cacheableMethodAttr->newInstance();
                        $newMethod->setBody("
                            return \$this->getWrappedMethodResult(
                                '{$method->getName()}', 
                                func_get_args(), 
                                '{$cacheableMethodAttrObj->getCacheKeyGeneratorClass()}',
                                '{$cacheNamespace}',
                                {$cacheableMethodAttrObj->getCacheSeconds()}
                            );
                        ");
                    }
                }
            }
        }

        eval((string)$namespace);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $wrapperName, $entityWrapperClassName);
        return $entityWrapperClassName;
    }
}
