<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use Nette\PhpGenerator\GlobalFunction;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Types\ContextFactory;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflector\Reflector;

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

    public function __construct()
    {
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

    public static function isClassLoaded(ReflectorWrapper $reflector, string $className): bool
    {
        if (self::isCorrectClassName($className)) {
            try {
                $reflector->reflectClass($className);
                return true;
            } catch (\Exception) {
            }
        }

        return false;
    }

    public static function getUsesList(ReflectionClass $reflectionClass, bool $extended = true): array
    {
        static $classContentCache = [];
        $fileName = $reflectionClass->getFileName();
        if (!$fileName) {
            return [];
        }
        if (!isset($classContentCache[$fileName])) {
            $classContentCache[$fileName] = file_get_contents($fileName);
        }
        $uses = [];
        if (
            preg_match_all(
                '/(use )(.*)(;)/',
                $classContentCache[$fileName],
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
                    $reflectionClass->getParentClassNames(),
                    $reflectionClass->getInterfaceNames()
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
    public function getUsesListByClassEntity(ClassEntity $classEntity, bool $extended = true): array
    {
        static $classContentCache = [];
        $fileName = $classEntity->getAbsoluteFileName();
        if (!$fileName) {
            return [];
        }
        if (!isset($classContentCache[$fileName])) {
            $classContentCache[$fileName] = file_get_contents($fileName);
        }
        $uses = [];
        if (
            preg_match_all(
                '/(use )(.*)(;)/',
                $classContentCache[$fileName],
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

    public static function parseFullClassName(
        string           $searchClassName,
        ReflectorWrapper $reflector,
        ReflectionClass  $reflectionClass,
        bool             $extended = true
    ): string
    {
        static $parsedFullClassNameCache = [];
        $classNameParts = explode('::', $searchClassName);
        $searchClassName = $classNameParts[0];

        $key = $reflectionClass->getName() . $searchClassName;
        if (!isset($parsedFullClassNameCache[$key])) {
            $trimmedName = ltrim($searchClassName, '\\');
            $uses = self::getUsesList($reflectionClass, $extended);
            if (isset($uses[$trimmedName])) {
                $className = $uses[$trimmedName];
            } elseif (isset($uses[$searchClassName])) {
                $className = $uses[$searchClassName];
            } elseif (
                str_contains($searchClassName, '\\') && ParserHelper::isClassLoaded($reflector, $searchClassName)
            ) {
                $className = $searchClassName;
            } elseif (
                !str_starts_with(
                    $searchClassName,
                    '\\' . $reflectionClass->getNamespaceName()
                )
            ) {
                $className = "{$reflectionClass->getNamespaceName()}{$searchClassName}";
                if (!ParserHelper::isClassLoaded($reflector, $className)) {
                    $className = $searchClassName;
                }
            } else {
                $className = $searchClassName;
            }

            $parsedFullClassNameCache[$key] = $className;
        }

        $className = $parsedFullClassNameCache[$key];
        if (isset($classNameParts[1])) {
            $className = "{$className}::$classNameParts[1]";
        }
        return $className;
    }

    public static function getClassFromFile($file): ?string
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

    protected static function getRawValue(
        Reflector        $reflector,
        ReflectionClass  $reflectionClass,
        ReflectionMethod $reflectionMethod,
        string           $condition
    )
    {
        $prepareReturnValue = function (mixed $value): mixed {
            if (!is_string($value) || str_contains($value, ':') || str_contains($value, '->')) {
                return $value;
            }
            return "'{$value}'";
        };
        if (
            str_contains($condition, '::') && !str_contains($condition, '"') && !str_contains($condition, '\'')
        ) {
            try {
                $nextClass = null;
                $parts = explode('::', $condition);
                if ($parts[0] === 'parent') {
                    $nextClass = $reflectionMethod->getImplementingClass()->getParentClass();
                } elseif ($parts[0] === 'self') {
                    $nextClass = $reflectionMethod->getImplementingClass();
                } elseif (self::isClassLoaded($reflector, $parts[0])) {
                    $nextClass = $reflector->reflectClass($parts[0]);
                }

                if ($nextClass) {
                    if (str_contains($parts[1], '(') && !str_contains($parts[1], ' ') && !str_contains($parts[1], '.')) {
                        $methodName = explode('(', $parts[1])[0];
                        $nextReflection = $nextClass->getMethod($methodName);
                        $methodValue = self::getMethodReturnValue($reflector, $reflectionClass, $nextReflection);
                        return $prepareReturnValue($methodValue);
                    } elseif (!preg_match('/([-+:\/ ])/', $parts[1])) {
                        $constantValue = $nextClass->getConstant($parts[1]);
                        return $prepareReturnValue($constantValue);
                    }
                    $reflectionClass = $nextClass;
                }
            } catch (\Exception) {
            }
        }

        $value = preg_replace_callback(
            '/([$]?)([a-zA-Z_\\\\]+)((::)|(->))([\s\S]([^ -+\-;\]])+)(([^)]?)+[)])?/',
            function (array $matches) use ($reflector, $reflectionClass, $prepareReturnValue) {
                if ($matches[1] && $matches[2] != 'this') {
                    return $matches[0];
                }
                if (substr_count($matches[0], '->') > 1) {
                    return $matches[0];
                }

                $nextClass = $reflectionClass;
                if (!in_array($matches[2], ['static', 'self', 'partner', 'this'])) {
                    $nextClass = $reflector->reflectClass($matches[2]);
                }

                if (isset($matches[8]) && $nextClass->hasMethod($matches[6])) {
                    $methodValue = self::getMethodReturnValue($reflector, $nextClass, $nextClass->getMethod($matches[6]));
                    return $prepareReturnValue($methodValue);
                } elseif ($nextClass->hasConstant($matches[6])) {
                    $constantValue = $nextClass->getConstant($matches[6]);
                    return $prepareReturnValue($constantValue);
                } else {
                    return $matches[0];
                }
            },
            $condition
        );

        return $value;
    }

    public static function getMethodReturnValue(
        Reflector        $reflector,
        ReflectionClass  $reflectionClass,
        ReflectionMethod $reflectionMethod
    ): mixed
    {
        if (preg_match('/(return )([^;]+)/', $reflectionMethod->getBodyCode(), $matches)) {
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
                $values[] = self::getRawValue($reflector, $reflectionClass, $reflectionMethod, trim($condition));
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
    public function getFilesInGit(Configuration $configuration): array
    {
        static $gitFiles = null;
        if (is_null($gitFiles)) {
            $gitClient = $configuration->getGitClientPath();
            exec("cd {$configuration->getProjectRoot()} && {$gitClient} ls-files", $output);
            $gitFiles = array_flip($output);
        }
        return $gitFiles;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlock(ClassEntity $classEntity, string $docComment): DocBlock
    {
        static $docBlockFactory = null;
        if (is_null($docBlockFactory)) {
            $docBlockFactory = DocBlockFactory::createInstance();
        }

        static $docBlocksCache = [];
        $docComment = $docComment ?: ' ';
        $cacheKey = md5("{$classEntity->getName()}{$docComment}");
        if (!isset($docBlocksCache[$cacheKey])) {
            $docBlocksCache[$cacheKey] = $docBlockFactory->create(
                $docComment,
                $this->getDocBlockContext($classEntity)
            );
        }
        return $docBlocksCache[$cacheKey];
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlockContext(ClassEntity $classEntity): \phpDocumentor\Reflection\Types\Context
    {
        static $contexts = [];
        if (!array_key_exists($classEntity->getName(), $contexts)) {
            $tmpContext = (new ContextFactory)->createForNamespace(
                $classEntity->getNamespaceName(),
                $classEntity->getFileContent()
            );
            $aliases = $tmpContext->getNamespaceAliases();
            foreach (array_merge(
                         $classEntity->getParentClassNames(),
                         $classEntity->getInterfaceNames(),
                         $classEntity->getTraitsNames(),
                         self::$predefinedClassesInterfaces
                     ) as $parentClassName) {
                if (str_contains($parentClassName, '\\')) {
                    $parentClassNameParts = explode('\\', $parentClassName);
                    $name = array_pop($parentClassNameParts);
                    if (!isset($aliases[$name])) {
                        $aliases[$name] = $parentClassName;
                    }
                }
            }
            $contexts[$classEntity->getName()] = new \phpDocumentor\Reflection\Types\Context(
                $tmpContext->getNamespace(),
                $aliases
            );
        }
        return $contexts[$classEntity->getName()];
    }
}
