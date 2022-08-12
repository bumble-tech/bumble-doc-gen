<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

interface MethodEntityInterface
{

    public function getName(): string;

    public function getFileName(): ?string;

    public function getLine(): int;

    public function getModifiersString(): string;

    public function getReturnType(): string;

    public function getParameters(): array;

    public function getParametersString(): string;

    public function getImplementingClassName(): string;

    public function getDescription(): string;

    public function isInitialization(): bool;

    public function isDynamic(): bool;
}
