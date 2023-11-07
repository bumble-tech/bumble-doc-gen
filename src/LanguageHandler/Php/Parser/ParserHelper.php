<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use DI\DependencyException;
use DI\NotFoundException;
use Monolog\Logger;
use Nette\PhpGenerator\GlobalFunction;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Types\Context;
use phpDocumentor\Reflection\Types\ContextFactory;

final class ParserHelper
{
    private static array $builtInTypes = [
        'array',
        'int',
        'string',
        'array',
        'bool',
        'boolean',
        'null',
        'NULL',
        'mixed',
        'void',
        'self',
        'static',
        'false',
        'true',
        'never',
        'object',
        'float',
        'callable',
        '[]',
    ];

    private static array $predefinedClassesInterfaces = [
        \Traversable::class,
        \Iterator::class,
        \IteratorAggregate::class,
        \IteratorIterator::class,
        \OuterIterator::class,
        \RecursiveIterator::class,
        \SeekableIterator::class,
        \SplObserver::class,
        \SplSubject::class,
        \Throwable::class,
        \ArrayAccess::class,
        \Serializable::class,
        \Closure::class,
        \Generator::class,
        \Countable::class,
        \stdClass::class,
        \WeakReference::class,
        \WeakMap::class,
        \Stringable::class,
        \Exception::class,
        \BadFunctionCallException::class,
        \BadMethodCallException::class,
        \DomainException::class,
        \InvalidArgumentException::class,
        \LengthException::class,
        \LogicException::class,
        \OutOfBoundsException::class,
        \OutOfRangeException::class,
        \OverflowException::class,
        \RangeException::class,
        \RuntimeException::class,
        \UnderflowException::class,
        \UnexpectedValueException::class,
        \UnexpectedValueException::class,
        \SplDoublyLinkedList::class,
        \SplStack::class,
        \SplQueue::class,
        \SplHeap::class,
        \SplMaxHeap::class,
        \SplMinHeap::class,
        \SplPriorityQueue::class,
        \SplFixedArray::class,
        \SplObjectStorage::class,
        \AppendIterator::class,
        \ArrayIterator::class,
        \CachingIterator::class,
        \CallbackFilterIterator::class,
        \DirectoryIterator::class,
        \EmptyIterator::class,
        \FilesystemIterator::class,
        \FilterIterator::class,
        \GlobIterator::class,
        \InfiniteIterator::class,
        \LimitIterator::class,
        \MultipleIterator::class,
        \NoRewindIterator::class,
        \ParentIterator::class,
        \RecursiveArrayIterator::class,
        \RecursiveCachingIterator::class,
        \RecursiveCallbackFilterIterator::class,
        \RecursiveDirectoryIterator::class,
        \RecursiveFilterIterator::class,
        \RecursiveIteratorIterator::class,
        \RecursiveRegexIterator::class,
        \RecursiveTreeIterator::class,
        \RegexIterator::class,
        \SplFileInfo::class,
        \SplFileObject::class,
        \SplTempFileObject::class,
        \ArrayObject::class,
        \JsonSerializable::class,
        \JsonException::class,
        \PhpToken::class,
        \DateTime::class,
        \DateTimeImmutable::class,
        \DateTimeInterface::class,
        \DateTimeZone::class,
        \DateInterval::class,
        \DatePeriod::class,
        'CurlHandle',
        'CurlMultiHandle',
        'CurlShareHandle',
        'CURLFile',
        'Memcache',
        'Memcached',
        'SimpleXMLElement',
        'SimpleXMLIterator',
        'DOMAttr',
        'DOMCdataSection',
        'DOMCharacterData',
        'DOMChildNode',
        'DOMComment',
        'DOMDocument',
        'DOMDocumentFragment',
        'DOMDocumentType',
        'DOMElement',
        'DOMEntity',
        'DOMEntityReference',
        'DOMException',
        'DOMImplementation',
        'DOMNamedNodeMap',
        'DOMNode',
        'DOMNodeList',
        'DOMNotation',
        'DOMParentNode',
        'DOMProcessingInstruction',
        'DOMText',
        'DOMXPath',
    ];

    public function __construct(
        private Configuration $configuration,
        private ReflectorWrapper $reflector,
        private LocalObjectCache $localObjectCache,
        private Logger $logger
    ) {
    }

    public static function getBuiltInClassNames(): array
    {
        static $classNames = [];
        if (!$classNames) {
            $builtInClassNames = array_merge(self::$predefinedClassesInterfaces, get_declared_classes());
            foreach ($builtInClassNames as $className) {
                if (str_starts_with(ltrim($className, '\\'), 'Composer')) {
                    break;
                }
                $classNames[$className] = $className;
            }
        }
        return $classNames;
    }

    public static function isBuiltInClass(string $className): bool
    {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        return array_key_exists($className, self::getBuiltInClassNames());
    }

    public static function isBuiltInType(string $name): bool
    {
        foreach (self::$builtInTypes as $builtInType) {
            if (str_starts_with($name, $builtInType)) {
                return true;
            }
        }
        return false;
    }

    private static function checkIsClassName(string $name): bool
    {
        if (
            !preg_match(
                '/^(?=_*[A-z]+)[A-z0-9]+$/',
                $name
            )
        ) {
            return false;
        }

        $name = explode('\\', $name);
        $name = end($name);
        $chr = \mb_substr($name, 0, 1, "UTF-8");
        return \mb_strtolower($chr, "UTF-8") != $chr;
    }

    public static function isCorrectClassName(string $className, bool $checkBuiltIns = true): bool
    {
        if (self::isBuiltInType($className) || ($checkBuiltIns && self::isBuiltInClass($className))) {
            return false;
        }
        return self::checkIsClassName($className);
    }

    public function isClassLoaded(string $className): bool
    {
        if (self::isCorrectClassName($className)) {
            try {
                $this->reflector->reflectClass($className);
                return true;
            } catch (\Exception) {
            }
        }

        return false;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getUsesListByClassEntity(ClassEntity $classEntity, bool $extended = true): array
    {
        $fileName = $classEntity->getAbsoluteFileName();
        if (!$fileName) {
            return [];
        }
        $classContentCache = $classEntity->getFileContent();
        $uses = [];
        if (
            preg_match_all(
                '/(use )(.*)(;)/',
                $classContentCache,
                $matches
            )
        ) {
            foreach ($matches[2] as $className) {
                $key = array_reverse(explode('\\', $className))[0];
                $uses[$key] = $className;
            }
        }

        if ($extended) {
            foreach (
                array_merge(
                    $classEntity->getParentClassNames(),
                    $classEntity->getInterfaceNames()
                ) as $className
            ) {
                $key = array_reverse(explode('\\', $className))[0];
                $uses[$key] = $className;
            }
        }

        return $uses;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function parseFullClassName(
        string $searchClassName,
        ClassEntity $parentClassEntity,
        bool $extended = true
    ): string {
        $classNameParts = explode('::', $searchClassName);
        $searchClassName = $classNameParts[0];
        $key = $parentClassEntity->getName() . $searchClassName;

        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $key);
        } catch (ObjectNotFoundException) {
        }

        $trimmedName = ltrim($searchClassName, '\\');
        $uses = $this->getUsesListByClassEntity($parentClassEntity, $extended);
        if (isset($uses[$trimmedName])) {
            $className = $uses[$trimmedName];
        } elseif (isset($uses[$searchClassName])) {
            $className = $uses[$searchClassName];
        } elseif (
            str_contains($searchClassName, '\\') && $this->isClassLoaded($searchClassName)
        ) {
            $className = $searchClassName;
        } elseif (
            !str_starts_with(
                $searchClassName,
                '\\' . $parentClassEntity->getNamespaceName()
            )
        ) {
            $className = "{$parentClassEntity->getNamespaceName()}{$searchClassName}";
            if (!$this->isClassLoaded($className)) {
                $className = $searchClassName;
            }
        } else {
            $className = $searchClassName;
        }

        if (isset($classNameParts[1])) {
            $className = "{$className}::$classNameParts[1]";
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $key, $className);
        return $className;
    }

    public function getClassFromFile($file): ?string
    {
        if (str_ends_with($file, '.php')) {
            $content = file_get_contents($file);
            $namespaceLevel = false;
            $classLevel = false;
            $namespace = '';
            foreach (token_get_all($content, TOKEN_PARSE) as $token) {
                if ($token[0] === T_NAMESPACE) {
                    $namespaceLevel = true;
                } elseif ($namespaceLevel && in_array($token[0], [T_NAME_QUALIFIED, T_STRING])) {
                    $namespaceLevel = false;
                    $namespace = $token[1];
                }
                if (!$namespaceLevel && in_array($token[0], [T_CLASS, T_INTERFACE, T_TRAIT])) {
                    $classLevel = true;
                } elseif ($classLevel && $token[0] === T_STRING) {
                    return $namespace . '\\' . $token[1];
                }
            }
        }
        return null;
    }

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    protected function getRawValue(MethodEntity $methodEntity, string $condition)
    {
        $prepareReturnValue = function (mixed $value): mixed {
            if (!is_string($value) || str_contains($value, ':') || str_contains($value, '->')) {
                return $value;
            }
            return "'{$value}'";
        };

        $classEntity = $methodEntity->getImplementingClass();
        if (
            str_contains($condition, '::') && !str_contains($condition, '"') && !str_contains($condition, '\'')
        ) {
            try {
                $parts = explode('::', $condition);
                if ($parts[0] === 'parent') {
                    $classEntity = $methodEntity->getImplementingClass()->getParentClass();
                } elseif ($parts[0] === 'self') {
                    $classEntity = $methodEntity->getImplementingClass();
                } elseif ($parts[0] === 'static') {
                    $classEntity = $methodEntity->getRootEntity();
                } elseif ($this::isCorrectClassName($parts[0])) {
                    $classEntity = $classEntity->getRootEntityCollection()->getLoadedOrCreateNew($parts[0]);
                }

                if ($classEntity && $classEntity->entityDataCanBeLoaded()) {
                    if (str_contains($parts[1], '(') && !str_contains($parts[1], ' ') && !str_contains($parts[1], '.')) {
                        $methodName = explode('(', $parts[1])[0];
                        $nextMethodEntity = $classEntity->getMethodEntity($methodName);
                        $methodValue = $this->getMethodReturnValue($nextMethodEntity);
                        return $prepareReturnValue($methodValue);
                    } elseif (!preg_match('/([-+:\/ ])/', $parts[1])) {
                        $constantValue = $classEntity->getConstant($parts[1]);
                        return $prepareReturnValue($constantValue);
                    }
                }
            } catch (\Exception) {
            }
        }

        return preg_replace_callback(
            '/([$]?)([a-zA-Z_\\\\]+)((::)|(->))([\s\S]([^ -+\-;\]])+)(([^)]?)+[)])?/',
            function (array $matches) use ($classEntity, $prepareReturnValue) {
                if ($matches[1] && $matches[2] != 'this') {
                    return $matches[0];
                }
                if (substr_count($matches[0], '->') > 1) {
                    return $matches[0];
                }

                if (!in_array($matches[2], ['static', 'self', 'partner', 'this'])) {
                    $classEntity = $classEntity->getRootEntityCollection()->getLoadedOrCreateNew($matches[2]);
                }

                if (!$classEntity->entityDataCanBeLoaded()) {
                    return $matches[0];
                }

                if (isset($matches[8]) && $classEntity->hasMethod($matches[6])) {
                    $methodEntity = $classEntity->getMethodEntity($matches[6]);
                    $methodValue = $this->getMethodReturnValue($methodEntity);
                    return $prepareReturnValue($methodValue);
                } elseif ($classEntity->hasConstant($matches[6])) {
                    $constantValue = $classEntity->getConstant($matches[6]);
                    return $prepareReturnValue($constantValue);
                }
                return $matches[0];
            },
            $condition
        );
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getMethodReturnValue(MethodEntity $methodEntity): mixed
    {
        if (preg_match('/(return )([^;]+)/', $methodEntity->getBodyCode(), $matches)) {
            $savedParts = [];
            $i = 0;
            $preparedConditions = preg_replace_callback("/((\")(.*?)(\"))|((')(.*?)('))/", function (array $matches) use (&$savedParts, &$i) {
                $value = array_key_exists(7, $matches) ? $matches[7] : $matches[3];
                $savedParts[++$i] = $value;
                return "'[%{$i}%]'";
            }, $matches[2]);

            $conditions = explode('.', $preparedConditions);
            $values = [];
            foreach ($conditions as $condition) {
                foreach ($savedParts as $i => $savedPart) {
                    $condition = str_replace("[%{$i}%]", $savedPart, $condition);
                }
                $values[] = self::getRawValue($methodEntity, trim($condition));
            }
            $value = implode(' . ', $values);

            if ($value && !str_contains($value, '::') && !str_contains($value, '$this->')) {
                try {
                    $fName = 'x' . uniqid();
                    $fn = new GlobalFunction($fName);
                    $value = str_replace(['(', ')'], '', $value);
                    $fn->setBody("return {$value};");
                    eval((string)$fn);
                    return $fName();
                } catch (\Exception) {
                }
            }
            return $value;
        }
        return null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFilesInGit(): array
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $gitClient = $this->configuration->getGitClientPath();
        exec("cd {$this->configuration->getProjectRoot()} && {$gitClient} ls-files", $output);
        $gitFiles = array_flip($output);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $gitFiles);
        return $gitFiles;
    }

    private function getDocBlockFactory(): DocBlockFactory
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $docBlockFactory = DocBlockFactory::createInstance();
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $docBlockFactory);
        return $docBlockFactory;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlock(ClassEntity $classEntity, string $docComment, ?int $lineNumber = null): DocBlock
    {
        $docComment = $docComment ?: ' ';
        $cacheKey = md5("{$classEntity->getName()}{$docComment}{$lineNumber}");
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $cacheKey);
        } catch (ObjectNotFoundException) {
        }
        try {
            $docBlock = $this->getDocBlockFactory()->create(
                $docComment,
                $this->getDocBlockContext($classEntity),
                !is_null($lineNumber) ? new Location($lineNumber) : null,
            );
        } catch (\Exception $e) {
            $this->logger->error(
                "Class `{$classEntity->getName()}` DockBlock parsing error: {$e->getMessage()}. 
                Doc block: {$docComment}"
            );
            $docBlock = $this->getDocBlockFactory()->create(
                ' ',
                $this->getDocBlockContext($classEntity)
            );
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $cacheKey, $docBlock);
        return $docBlock;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlockContext(ClassEntity $classEntity): Context
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $classEntity->getName());
        } catch (ObjectNotFoundException) {
        }

        $tmpContext = (new ContextFactory())->createForNamespace(
            $classEntity->getNamespaceName(),
            $classEntity->getFileContent()
        );
        $aliases = $tmpContext->getNamespaceAliases();
        foreach (
            array_merge(
                $classEntity->getParentClassNames(),
                $classEntity->getInterfaceNames(),
                $classEntity->getTraitsNames(),
                self::$predefinedClassesInterfaces
            ) as $parentClassName
        ) {
            if (str_contains($parentClassName, '\\')) {
                $parentClassNameParts = explode('\\', $parentClassName);
                $name = array_pop($parentClassNameParts);
                if (!isset($aliases[$name])) {
                    $aliases[$name] = $parentClassName;
                }
            }
        }
        $context = new Context(
            $tmpContext->getNamespace(),
            $aliases
        );
        $this->localObjectCache->cacheMethodResult(__METHOD__, $classEntity->getName(), $context);
        return $context;
    }
}
