<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use Doctrine\Common\Annotations\DocParser;
use phpDocumentor\Reflection\DocBlockFactory;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * @internal
 */
final class AttributeParser
{
    private FakeClassLoader $fakeClassLoader;

    public function __construct(private Reflector $reflector, private LoggerInterface $logger)
    {
        $this->fakeClassLoader = new FakeClassLoader($reflector, $logger);
    }

    public function parseAnnotations(string $docComment): array
    {
        try {
            return (new DocParser())->parse($docComment);
        } catch (\Doctrine\Common\Annotations\AnnotationException $e) {
            if (
                preg_match('/(@|\\\\)([a-zA-Z\\\]+)/', $e->getMessage(), $matches) &&
                $this->fakeClassLoader->loadClass($matches[2], true)
            ) {
                return $this->parseAnnotations($docComment);
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
        return [];
    }

    public function getDocBlockFactory(): DocBlockFactory
    {
        static $docBlockFactory = null;
        if (is_null($docBlockFactory)) {
            $docBlockFactory = \phpDocumentor\Reflection\DocBlockFactory::createInstance();
        }
        return $docBlockFactory;
    }

    public function hasAnnotationIfIsSubclassOf(string $docComment, string $className): bool
    {
        static $checkResults = [];
        if (!$docComment || !$className) {
            return false;
        }

        $docBlockFactory = $this->getDocBlockFactory();
        foreach ($docBlockFactory->create($docComment)->getTags() as $tag) {
            $tagClassName = $tag->getName();
            if (!ParserHelper::isClassLoaded($this->reflector, $tagClassName)) {
                continue;
            }

            if (isset($checkResults[$tagClassName])) {
                return $checkResults[$tagClassName];
            }

            try {
                if ($tagClassName === $className) {
                    $checkResults[$tagClassName] = true;
                    return true;
                }

                $reflectClass = $this->reflector->reflectClass($tagClassName);
                if (in_array($className, $reflectClass->getParentClassNames())) {
                    $checkResults[$tagClassName] = true;
                    return true;
                }
            } catch (\Exception $e) {
                $this->logger->error("{$tagClassName} | {$e->getMessage()}");
            }
            $checkResults[$tagClassName] = false;
        }
        return false;
    }

    public function getAnnotationIfIsSubclassOf(string $docComment, string $className): ?object
    {
        $annotations = $this->parseAnnotations($docComment);
        foreach ($annotations as $annotation) {
            if ($className === get_class($annotation) || in_array($className, $annotation->__parentClassNames)) {
                return $annotation;
            }
        }
        return null;
    }

    public function hasAttributeIfIsSubclassOf(ReflectionClass $reflectionClass, string $className): bool
    {
        static $checkResults = [];
        foreach ($reflectionClass->getAttributes() as $reflectAttribute) {
            $attributeName = $reflectAttribute->getName();
            if (isset($checkResults[$attributeName])) {
                return $checkResults[$attributeName];
            }

            try {
                if ($attributeName === $className) {
                    $checkResults[$attributeName] = true;
                    return true;
                }

                if (in_array($className, $reflectAttribute->getParentClassNames())) {
                    $checkResults[$attributeName] = true;
                    return true;
                }
            } catch (\Exception $e) {
                $this->logger->error("{$attributeName} | {$e->getMessage()}");
            }
            $checkResults[$attributeName] = false;
        }
        return false;
    }
}
