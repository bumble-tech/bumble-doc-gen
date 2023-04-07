<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;

/**
 * Method obtained by parsing the "method" annotation
 */
class DynamicMethodEntity implements MethodEntityInterface
{
    private function __construct(
        private Configuration $configuration,
        private ClassEntity   $classEntity,
        private Method        $annotationMethod
    )
    {
    }

    /**
     * @throws \Exception
     */
    public static function createByAnnotationMethod(
        ClassEntity $classEntity,
        Method      $annotationMethod
    ): DynamicMethodEntity
    {
        $dynamicMethodEntity = new static($classEntity->getConfiguration(), $classEntity, $annotationMethod);
        $dynamicMethodEntity->getCallMethod();
        return $dynamicMethodEntity;
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityDependencies(): array
    {
        return $this->getRootEntity()->getEntityDependencies();
    }

    #[CacheableMethod] public function getName(): string
    {
        return $this->annotationMethod->getMethodName();
    }

    #[CacheableMethod] public function isStatic(): bool
    {
        return $this->annotationMethod->isStatic();
    }

    /**
     * @throws \Exception
     */
    private function getCallMethod(): ReflectionMethod
    {
        if ($this->isStatic()) {
            $callMethod = $this->classEntity->getReflection()->getMethod('__callStatic');
        } else {
            $callMethod = $this->classEntity->getReflection()->getMethod('__call');
        }
        return $callMethod;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    #[CacheableMethod] public function getFileName(): ?string
    {
        $fullFileName = $this->getImplementingReflectionClass()->getFileName();
        if (!$fullFileName || !str_starts_with($fullFileName, $this->configuration->getProjectRoot())) {
            return null;
        }

        return str_replace(
            $this->configuration->getProjectRoot(),
            '',
            $fullFileName
        );
    }

    /**
     * @throws \Exception
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getStartLine();
    }

    /**
     * @throws \Exception
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getEndLine();
    }

    #[CacheableMethod] public function getModifiersString(): string
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
    #[CacheableMethod] public function getReturnType(): string
    {
        $returnType = (string)$this->annotationMethod->getReturnType();
        $returnType = ltrim($returnType, '\\');
        if (!str_contains($returnType, '\\')) {
            $uses = ParserHelper::getUsesList($this->classEntity->getReflection());
            if (isset($uses[$returnType])) {
                $returnType = $uses[$returnType];
            } else {
                $newClassName = "{$this->classEntity->getReflection()->getNamespaceName()}\\{$returnType}";
                if (ParserHelper::isClassLoaded($this->classEntity->getReflector(), $newClassName)) {
                    $returnType = $newClassName;
                }
            }
        }
        return $returnType;
    }

    #[CacheableMethod] public function getParameters(): array
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

    #[CacheableMethod] public function getParametersString(): string
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
        return $callMethod->getImplementingClass();
    }

    /**
     * @throws \Exception
     */
    #[CacheableMethod] public function getImplementingClassName(): string
    {
        return $this->getImplementingReflectionClass()->getName();
    }

    #[CacheableMethod] public function getDescription(): string
    {
        return (string)$this->annotationMethod->getDescription();
    }


    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    #[CacheableMethod] public function isInitialization(): bool
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
}
