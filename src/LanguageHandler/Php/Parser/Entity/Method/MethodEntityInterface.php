<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Method;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;

interface MethodEntityInterface extends EntityInterface
{
    public function getName(): string;

    public function getFileName(): ?string;

    public function getStartLine(): int;

    public function getStartColumn(): int;

    public function getEndLine(): int;

    public function getModifiersString(): string;

    public function getReturnType(): string;

    public function getParameters(): array;

    public function getParametersString(): string;

    public function getImplementingClassName(): string;

    public function getDescription(): string;

    public function isInitialization(): bool;

    public function isPublic(): bool;

    public function isProtected(): bool;

    public function isPrivate(): bool;

    public function isDynamic(): bool;

    public function getFirstReturnValue(): mixed;

    public function getBodyCode(): string;

    public function getImplementingClass(): ClassEntity;
}
