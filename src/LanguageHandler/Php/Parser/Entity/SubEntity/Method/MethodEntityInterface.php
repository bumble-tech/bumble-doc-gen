<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;

interface MethodEntityInterface extends EntityInterface
{
    /**
     * Get method name
     */
    public function getName(): string;

    /**
     * Get the line number of the beginning of the method code in a file
     */
    public function getStartLine(): int;

    /**
     * Get the column number of the beginning of the method code in a file
     */
    public function getStartColumn(): int;

    /**
     * Get the line number of the end of a method's code in a file
     */
    public function getEndLine(): int;

    /**
     * Get a text representation of method modifiers
     */
    public function getModifiersString(): string;

    /**
     * Get the return type of method
     */
    public function getReturnType(): string;

    /**
     * Get a list of method parameters
     *
     * @return string[]
     */
    public function getParameters(): array;

    /**
     * Get a list of method parameters as a string
     */
    public function getParametersString(): string;

    /**
     * Get the name of the class in which this method is implemented
     */
    public function getImplementingClassName(): string;

    /**
     * Get the ClassLike entity in which this method was implemented
     */
    public function getImplementingClass(): ClassLikeEntity;

    /**
     * Get a description of this method
     */
    public function getDescription(): string;

    /**
     * Check if a method is an initialization method
     */
    public function isInitialization(): bool;

    /**
     * Check if a method is a public method
     */
    public function isPublic(): bool;

    /**
     * Check if a method is a protected method
     */
    public function isProtected(): bool;

    /**
     * Check if a method is a private method
     */
    public function isPrivate(): bool;

    /**
     * Check if a method is a dynamic method, that is, implementable using __call or __callStatic
     */
    public function isDynamic(): bool;

    /**
     * Get the compiled first return value of a method (if possible)
     *
     * @return mixed compiled value
     */
    public function getFirstReturnValue(): mixed;

    /**
     * Get the code for this method
     */
    public function getBodyCode(): string;

    /**
     * Check if this method is static
     */
    public function isStatic(): bool;

    /**
     * Check if this method is implemented in the parent class
     */
    public function isImplementedInParentClass(): bool;
}
