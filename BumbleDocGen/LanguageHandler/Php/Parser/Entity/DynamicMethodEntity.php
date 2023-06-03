<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Roave\BetterReflection\Reflection\ReflectionClass;

/**
 * Method obtained by parsing the "method" annotation
 */
class DynamicMethodEntity implements MethodEntityInterface
{
    public function __construct(
        private Configuration $configuration,
        private ParserHelper  $parserHelper,
        private ClassEntity   $classEntity,
        private Method        $annotationMethod
    )
    {
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getName(): string
    {
        return $this->annotationMethod->getMethodName();
    }

    public function isStatic(): bool
    {
        return $this->annotationMethod->isStatic();
    }

    /**
     * @throws \Exception
     */
    public function getCallMethod(): MethodEntity
    {
        if ($this->isStatic()) {
            $callMethod = $this->classEntity->getMethodEntity('__callStatic');
        } else {
            $callMethod = $this->classEntity->getMethodEntity('__call');
        }
        return $callMethod;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function getFileName(): ?string
    {
        return $this->getImplementingClass()->getFileName();
    }

    /**
     * @throws \Exception
     */
    public function getStartLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getStartLine();
    }

    /**
     * @throws \Exception
     */
    public function getEndLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getEndLine();
    }

    public function getModifiersString(): string
    {
        $modifiersString = [];
        $modifiersString[] = 'public';
        if ($this->isStatic()) {
            $modifiersString[] = 'static';
        }
        $modifiersString[] = 'function';
        return implode(' ', $modifiersString);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getReturnType(): string
    {
        $returnType = (string)$this->annotationMethod->getReturnType();
        $returnType = ltrim($returnType, '\\');
        if (!str_contains($returnType, '\\')) {
            $uses = $this->parserHelper->getUsesListByClassEntity($this->classEntity);
            if (isset($uses[$returnType])) {
                $returnType = $uses[$returnType];
            } else {
                $newClassName = "{$this->getNamespaceName()}\\{$returnType}";
                if ($this->parserHelper->isClassLoaded($newClassName)) {
                    $returnType = $newClassName;
                }
            }
        }
        return $returnType;
    }

    public function getParameters(): array
    {
        $parameters = [];
        if ($this->annotationMethod->getArguments()) {
            foreach ($this->annotationMethod->getArguments() as $argument) {
                $var = array_map('trim', explode('=', $argument['name']));
                $parameters[] = [
                    'name' => $var[0],
                    'type' => (string)($argument['type'] ?? ''),
                    'description' => (string)($argument['description'] ?? ''),
                    'defaultValue' => $var[1] ?? null,
                ];
            }
        }
        return $parameters;
    }

    public function getParametersString(): string
    {
        $parameters = [];
        foreach ($this->getParameters() as $parameterData) {
            $parameters[] = "{$parameterData['type']} \${$parameterData['name']}" .
                ($parameterData['defaultValue'] ? " = {$parameterData['defaultValue']}" : '');
        }
        return implode(', ', $parameters);
    }

    /**
     * @throws \Exception
     */
    public function getImplementingReflectionClass(): ReflectionClass
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getImplementingReflectionClass();
    }

    /**
     * @throws \Exception
     */
    public function getImplementingClassName(): string
    {
        return $this->getImplementingReflectionClass()->getName();
    }

    public function getDescription(): string
    {
        return (string)$this->annotationMethod->getDescription();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function isInitialization(): bool
    {
        $initializationReturnTypes = [
            'self',
            'static',
            'this',
            $this->getImplementingReflectionClass()->getName(),
            $this->getImplementingReflectionClass()->getShortName(),
        ];
        return $this->isStatic() && in_array($this->getReturnType(), $initializationReturnTypes);
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    public function isPublic(): bool
    {
        return true;
    }

    public function isProtected(): bool
    {
        return false;
    }

    public function isPrivate(): bool
    {
        return false;
    }

    public function isDynamic(): bool
    {
        return true;
    }

    public function getFirstReturnValue(): mixed
    {
        return null;
    }

    public function getBodyCode(): string
    {
        return '';
    }

    public function getObjectId(): string
    {
        return "{$this->getRootEntity()->getName()}:{$this->getName()}";
    }

    public function getRootEntityCollection(): RootEntityCollection
    {
        return $this->getRootEntity()->getRootEntityCollection();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getAbsoluteFileName(): ?string
    {
        $relativeFileName = $this->getFileName();
        return $relativeFileName ? $this->configuration->getProjectRoot() . $relativeFileName : null;
    }

    public function entityCacheIsOutdated(): bool
    {
        return false;
    }
}
