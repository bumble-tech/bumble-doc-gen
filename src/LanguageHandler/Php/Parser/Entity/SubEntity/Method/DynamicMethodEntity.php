<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

/**
 * Method obtained by parsing the "method" annotation
 */
class DynamicMethodEntity implements MethodEntityInterface
{
    public function __construct(
        private Configuration $configuration,
        private ParserHelper $parserHelper,
        private ClassLikeEntity $classEntity,
        private Method $annotationMethod
    ) {
    }

    public function getRootEntity(): ClassLikeEntity
    {
        return $this->classEntity;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->annotationMethod->getMethodName();
    }

    /**
     * @inheritDoc
     */
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
            $callMethod = $this->classEntity->getMethod('__callStatic', true);
        } else {
            $callMethod = $this->classEntity->getMethod('__call', true);
        }
        return $callMethod;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function getRelativeFileName(): ?string
    {
        return $this->getImplementingClass()->getRelativeFileName();
    }

    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function getStartLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getStartLine();
    }

    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function getStartColumn(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getStartColumn();
    }

    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function getEndLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getEndLine();
    }

    /**
     * @inheritDoc
     */
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
     * @inheritDoc
     *
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

    /**
     * @inheritDoc
     */
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

    /**
     * @inheritDoc
     */
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
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function getImplementingClassName(): string
    {
        return $this->getImplementingClass()->getName();
    }

    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return (string)$this->annotationMethod->getDescription();
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function isInitialization(): bool
    {
        $initializationReturnTypes = [
            'self',
            'static',
            'this',
            $this->getImplementingClass()->getName(),
            $this->getImplementingClass()->getShortName(),
        ];
        return $this->isStatic() && in_array($this->getReturnType(), $initializationReturnTypes);
    }

    /**
     * @inheritDoc
     */
    public function getImplementingClass(): ClassLikeEntity
    {
        return $this->classEntity;
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    /**
     * @inheritDoc
     */
    public function isPublic(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isProtected(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function isPrivate(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function isDynamic(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getFirstReturnValue(): mixed
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getBodyCode(): string
    {
        return '';
    }

    public function getObjectId(): string
    {
        return "{$this->getRootEntity()->getName()}:{$this->getName()}";
    }

    /**
     * @inheritDoc
     */
    public function getRootEntityCollection(): RootEntityCollection
    {
        return $this->getRootEntity()->getRootEntityCollection();
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getAbsoluteFileName(): ?string
    {
        $relativeFileName = $this->getRelativeFileName();
        return $relativeFileName ? $this->configuration->getProjectRoot() . $relativeFileName : null;
    }

    /**
     * @internal
     */
    public function entityCacheIsOutdated(): bool
    {
        return false;
    }
}
