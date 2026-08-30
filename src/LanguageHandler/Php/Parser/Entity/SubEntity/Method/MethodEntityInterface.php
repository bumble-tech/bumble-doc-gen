<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;

interface MethodEntityInterface extends EntityInterface
{
    /**
     * Namespace of the class that contains this method
     *
     * @api
     */
    public function getNamespaceName(): string;

    /**
     * Get the line number of the beginning of the method code in a file
     *
     * @api
     */
    public function getStartLine(): int;

    /**
     * Get the column number of the beginning of the method code in a file
     *
     * @api
     */
    public function getStartColumn(): int;

    /**
     * Get the line number of the end of a method's code in a file
     *
     * @api
     */
    public function getEndLine(): int;

    /**
     * Get a text representation of method modifiers
     *
     * @api
     */
    public function getModifiersString(): string;

    /**
     * Get the return type of method
     *
     * @api
     */
    public function getReturnType(): string;

    /**
     * Get a list of method parameters
     *
     * @api
     *
     * @return string[]
     */
    public function getParameters(): array;

    /**
     * Get a list of method parameters as a string
     *
     * @api
     */
    public function getParametersString(): string;

    /**
     * Get the name of the class in which this method is implemented
     *
     * @api
     */
    public function getImplementingClassName(): string;

    /**
     * Get the ClassLike entity in which this method was implemented
     *
     * @api
     */
    public function getImplementingClass(): ClassLikeEntity;

    /**
     * Get a description of this method
     *
     * @api
     */
    public function getDescription(): string;

    /**
     * Check if a method is an initialization method
     *
     * @api
     */
    public function isInitialization(): bool;

    /**
     * Check if a method is a public method
     *
     * @api
     */
    public function isPublic(): bool;

    /**
     * Check if a method is a protected method
     *
     * @api
     */
    public function isProtected(): bool;

    /**
     * Check if a method is a private method
     *
     * @api
     */
    public function isPrivate(): bool;

    /**
     * Check if a method is a dynamic method, that is, implementable using __call or __callStatic
     *
     * @api
     */
    public function isDynamic(): bool;

    /**
     * Get the compiled first return value of a method (if possible)
     *
     * @api
     *
     * @return mixed compiled value
     */
    public function getFirstReturnValue(): mixed;

    /**
     * Get the code for this method
     *
     * @api
     */
    public function getBodyCode(): string;

    /**
     * Check if this method is static
     *
     * @api
     */
    public function isStatic(): bool;

    /**
     * Check if this method is implemented in the parent class
     *
     * @api
     */
    public function isImplementedInParentClass(): bool;

    /**
     * Get the method signature as a string
     *
     * @api
     */
    public function getSignature(): string;
}
