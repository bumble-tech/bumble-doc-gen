<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use Nette\PhpGenerator\Parameter;

final class CacheableEntityWrapperFactory
{
    public function __construct(
        private LocalObjectCache $localObjectCache
    )
    {
    }

    public function createWrappedEntityClass(string $className, string $wrapperName): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $wrapperName);
        } catch (ObjectNotFoundException) {
        }

        $namespaceName = 'BumbleDocGen\\Core\\Parser\\Entity\\Cache';

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
                        $expiresAfter = time() + $cacheableMethodAttrObj->getCacheSeconds();
                        $newMethod->setBody("
                            return \$this->getWrappedMethodResult(
                                '{$method->getName()}', 
                                func_get_args(), 
                                '{$cacheableMethodAttrObj->getCacheKeyGeneratorClass()}',
                                '{$cacheNamespace}',
                                {$expiresAfter}
                            );
                        ");
                    }
                }
            }
        }

        eval((string)$namespace);
        $entityWrapperClassName = "{$namespaceName}\\$wrapperName";
        $this->localObjectCache->cacheMethodResult(__METHOD__, $wrapperName, $entityWrapperClassName);
        return $entityWrapperClassName;
    }
}
