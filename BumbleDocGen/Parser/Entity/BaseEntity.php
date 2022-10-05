<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Parser\ParserHelper;
use phpDocumentor\Reflection\DocBlock;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\Reflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

abstract class BaseEntity
{
    protected LoggerInterface $logger;

    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector $reflector,
        protected AttributeParser $attributeParser
    ) {
        $this->logger = $this->configuration->getLogger();
    }

    abstract public function getReflection(): Reflection;

    abstract public function getImplementingReflectionClass(): ReflectionClass;

    abstract public function getDocAnnotation(): ?object;

    abstract protected function getDocCommentRecursive(): string;

    abstract protected function getDocCommentReflectionRecursive(): Reflection;

    abstract public function getDescription(): string;

    public function getAttributeParser(): AttributeParser
    {
        return $this->attributeParser;
    }

    protected static function generateObjectIdByReflection(Reflection $reflection): string
    {
        if (method_exists($reflection, 'getImplementingClass')) {
            return "{$reflection->getImplementingClass()->getName()}:{$reflection->getName()}";
        }
        return $reflection->getName();
    }

    final public function getObjectId(): string
    {
        return self::generateObjectIdByReflection($this->getReflection());
    }

    protected function prettyVarExport(mixed $expression): string
    {
        $export = var_export($expression, true);
        $patterns = [
            "/array \(/" => '[',
            "/^([ ]*)\)(,?)$/m" => '$1]$2',
            "/=>[ ]?\n[ ]+\[/" => '=> [',
            "/([ ]*)(\'[^\']+\') => ([\[\'])/" => '$1$2 => $3',
        ];
        return str_replace(
            PHP_EOL,
            ' ',
            preg_replace(array_keys($patterns), array_values($patterns), $export)
        );
    }

    final public function getDocBlock(): DocBlock
    {
        static $docBlocks = [];
        $objectId = $this->getObjectId();
        if (!isset($docBlocks[$objectId])) {
            $docBlockFactory = $this->attributeParser->getDocBlockFactory();
            $docBlocks[$objectId] = $docBlockFactory->create($this->getDocCommentRecursive() ?: ' ');
        }
        return $docBlocks[$objectId];
    }

    public function isInternal(): bool
    {
        static $isInternalCache = [];
        $objectId = $this->getObjectId();
        if (!isset($isInternalCache[$objectId])) {
            $docBlock = $this->getDocBlock();
            $internalBlock = $docBlock->getTagsByName('internal')[0] ?? null;
            $isInternalCache[$objectId] = (bool)$internalBlock;
        }
        return $isInternalCache[$objectId];
    }

    public function isDeprecated(): bool
    {
        static $isDeprecatedCache = [];
        $objectId = $this->getObjectId();
        if (!isset($isDeprecatedCache[$objectId])) {
            $docBlock = $this->getDocBlock();
            $internalBlock = $docBlock->getTagsByName('deprecated')[0] ?? null;
            $isDeprecatedCache[$objectId] = (bool)$internalBlock;
        }
        return $isDeprecatedCache[$objectId];
    }

    public function hasDescriptionLinks(): bool
    {
        return count($this->getDescriptionLinks()) > 0;
    }

    private function getClassLinkUrlFromString(string $link, string &$name): ?string
    {
        $name = $link;
        try {
            $link = str_replace(['(', ')', '$'], '', ltrim($link, '\\'));
            if (str_contains($link, '->')) {
                $nameParts = explode('->', $link);
            } else {
                $nameParts = explode('::', $link);
            }

            $implementingReflectionClass = $this->getImplementingReflectionClass();
            $getReflectionOfLink = function (
                ReflectionClass $reflectionClass,
                string $linkName
            ) use (&$name): ?Reflection {
                $reflectionOfLink = null;
                if ($reflectionClass->hasMethod($linkName)) {
                    $reflectionOfLink = $reflectionClass->getMethod($linkName);
                    $name = "{$reflectionClass->getName()}::{$reflectionOfLink->getName()}()";
                } elseif ($reflectionClass->hasProperty($linkName)) {
                    $reflectionOfLink = $reflectionClass->getProperty($linkName);
                    $name = "{$reflectionClass->getName()}::\${$reflectionOfLink->getName()}";
                } elseif ($reflectionClass->hasConstant($linkName)) {
                    $reflectionOfLink = $reflectionClass->getReflectionConstant($linkName);
                    $name = "{$reflectionClass->getName()}::{$reflectionOfLink->getName()}";
                } elseif (ParserHelper::isClassLoaded($this->reflector, $linkName)) {
                    $reflectionOfLink = $this->reflector->reflectClass($linkName);
                    $name = $linkName;
                }
                return $reflectionOfLink;
            };

            if (!isset($nameParts[1])) {
                $reflectionOfLink = $getReflectionOfLink($implementingReflectionClass, $nameParts[0]);
            } else {
                $className = str_replace(
                    ['self', 'static', 'this'],
                    $implementingReflectionClass->getShortName(),
                    $nameParts[0]
                );

                if (!str_contains($className, '\\')) {
                    $uses = ParserHelper::getUsesList($implementingReflectionClass);
                    if (isset($uses[$className])) {
                        $className = $uses[$className];
                    } else {
                        $newClassName = "{$implementingReflectionClass->getNamespaceName()}\\{$className}";
                        if (ParserHelper::isClassLoaded($this->reflector, $newClassName)) {
                            $className = $newClassName;
                        }
                    }
                }

                if (!ParserHelper::isClassLoaded($this->reflector, $className)) {
                    throw new \Exception("\"\\{$className}\" could not be found in the located source");
                }
                $linkClassReflection = $this->reflector->reflectClass($className);
                $reflectionOfLink = $getReflectionOfLink($linkClassReflection, $nameParts[1]);
            }

            if ($reflectionOfLink) {
                if (method_exists($reflectionOfLink, 'getDeclaringClass')) {
                    $fullFileName = $reflectionOfLink->getDeclaringClass()->getFileName();
                } elseif (method_exists($reflectionOfLink, 'getFileName')) {
                    $fullFileName = $reflectionOfLink->getFileName();
                } else {
                    return null;
                }
                if (!$fullFileName || !str_starts_with($fullFileName, $this->configuration->getProjectRoot())) {
                    return null;
                }
                $fileName = str_replace(
                    $this->configuration->getProjectRoot(),
                    '',
                    $fullFileName
                );
                return "{$fileName}#L{$reflectionOfLink->getStartLine()}";
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
        return null;
    }

    /**
     * @return array<int,array{name:string, description:string|null, url:string|null}>
     */
    public function getDescriptionLinks(): array
    {
        static $linksCache = [];
        $objectId = $this->getObjectId();
        if (!isset($linksCache[$objectId])) {
            $links = [];
            $docBlock = $this->getDocBlock();
            $getLinkKey = function (?string $url, ?string $name): string {
                return md5($url . $name);
            };
            foreach ($docBlock->getTagsByName('see') as $seeBlock) {
                try {
                    $name = (string)$seeBlock->getReference();
                    $description = (string)$seeBlock->getDescription();
                    $url = null;
                    if (filter_var($name, FILTER_VALIDATE_URL)) {
                        $url = $name;
                    } elseif (str_starts_with($name, '\\')) {
                        $name = ltrim($name, '\\');
                        $newName = '';
                        $url = $this->getClassLinkUrlFromString($name, $newName);
                        $name = $newName;
                    }
                    $key = $getLinkKey($url, $name);
                    $links[$key] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => $description,
                    ];
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }

            $description = $this->getDescription();
            if (preg_match_all('/(\@see )(.*?)( |}|])/', $description . ' ', $matches)) {
                foreach ($matches[2] as $name) {
                    if (filter_var($name, FILTER_VALIDATE_URL)) {
                        $url = $name;
                    } else {
                        $name = ltrim($name, '\\');
                        $newName = '';
                        $url = $this->getClassLinkUrlFromString($name, $newName);
                        $name = $newName;
                    }
                    $key = $getLinkKey($url, $name);
                    $links[$key] = [
                        'url' => $url,
                        'name' => $name,
                        'description' => '',
                    ];
                }
            }

            foreach ($docBlock->getTagsByName('link') as $linkBlock) {
                try {
                    $description = (string)$linkBlock->getDescription();
                    $url = $linkBlock->getLink();
                    $key = $getLinkKey($url, $url);
                    $links[$key] = [
                        'url' => $url,
                        'name' => $url,
                        'description' => $description,
                    ];
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }

            $linksCache[$objectId] = $links;
        }
        return $linksCache[$objectId];
    }

    public function hasThrows(): bool
    {
        return count($this->getThrows()) > 0;
    }

    /**
     * @return array<int,array{name:string, description:string|null}>
     */
    public function getThrows(): array
    {
        static $throwsCache = [];
        $objectId = $this->getObjectId();
        if (!isset($throwsCache[$objectId])) {
            $throws = [];
            try {
                $implementingReflection = $this->getDocCommentReflectionRecursive();
                if (method_exists($implementingReflection, 'getImplementingClass')) {
                    $implementingReflectionClass = $implementingReflection->getImplementingClass();
                } else {
                    $implementingReflectionClass = $implementingReflection;
                }
                $uses = ParserHelper::getUsesList($implementingReflectionClass);
                $docBlock = $this->getDocBlock();
                foreach ($docBlock->getTagsByName('throws') as $throwBlock) {
                    try {
                        $names = explode('|', (string)$throwBlock->getType());
                        foreach ($names as $name) {
                            $name = ltrim($name, '\\');
                            if (isset($uses[$name])) {
                                $className = $uses[$name];
                            } elseif (
                                str_contains($name, '\\') && ParserHelper::isClassLoaded($this->reflector, $name)
                            ) {
                                $className = $name;
                            } elseif (
                                !str_starts_with(
                                    $name,
                                    '\\' . $implementingReflectionClass->getNamespaceName()
                                )
                            ) {
                                $className = "{$implementingReflectionClass->getNamespaceName()}{$name}";
                                if (!ParserHelper::isClassLoaded($this->reflector, $className)) {
                                    $className = $name;
                                }
                            } else {
                                $className = $name;
                            }
                            $url = $this->getClassLinkUrlFromString($className, $name);

                            $throws[] = [
                                'name' => $name,
                                'url' => $url,
                                'description' => (string)$throwBlock->getDescription(),
                            ];
                        }
                    } catch (\Exception $e) {
                        $this->logger->error($e->getMessage());
                    }
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
            $throwsCache[$objectId] = $throws;
        }
        return $throwsCache[$objectId];
    }

    public function hasExamples(): bool
    {
        return count($this->getExamples()) > 0;
    }

    /**
     * @return array<int,array{example:string}>
     */
    public function getExamples(): array
    {
        static $examplesCache = [];
        $objectId = $this->getObjectId();
        if (!isset($examplesCache[$objectId])) {
            $examples = [];
            $docBlock = $this->getDocBlock();
            foreach ($docBlock->getTagsByName('example') as $example) {
                try {
                    $examples[] = ['example' => (string)$example];
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }
            $examplesCache[$objectId] = $examples;
        }
        return $examplesCache[$objectId];
    }

    public function getFirstExample(): string
    {
        $examples = $this->getExamples();
        return $examples[0]['example'] ?? '';
    }
}
