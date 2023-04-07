<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use Nette\PhpGenerator\Parameter;

final class CacheableEntityWrapperFactory
{
    public function __construct()
    {
    }

    public function createWrappedEntityClass(string $className, string $wrapperName): string
    {
        static $entityWrapperClassNames = [];

        if (!isset($entityWrapperClassNames[$wrapperName])) {
            $namespaceName = 'BumbleDocGen\\Core\\Parser\\Entity\\Cache';

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

                        $cacheNamespace = "{$wrapperName}_{$method->getName()}";

                        $cacheableMethodAttrObj = $cacheableMethodAttr->newInstance();
                        $expiresAfter = time() + $cacheableMethodAttrObj->getCacheSeconds();
                        $newMethod->setBody('
                            $funcArgs = func_get_args();
                            $cacheKey = \\' . $cacheableMethodAttrObj->getCacheKeyGeneratorClass() . '::generateKey(
                                \'' . $cacheNamespace . '\',
                                $this,
                                $funcArgs
                            );
                            
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
}
