<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;

abstract class ReflectionApiConfig
{
    protected string $projectRoot = '%WORKING_DIR%';
    protected ?string $cacheDir = null;

    final public function getCacheDir(): ?string
    {
        return $this->cacheDir;
    }

    final public function setProjectRoot(string $projectRoot): void
    {
        $this->projectRoot = $projectRoot;
    }

    final public function getProjectRoot(): string
    {
        return $this->projectRoot;
    }

    final public function setCacheDir(?string $cacheDir): void
    {
        $this->cacheDir = $cacheDir;
    }

    /**
     * @return class-string<LanguageHandlerInterface>
     */
    abstract public function getLanguageHandlerClassName(): string;

    abstract public function toConfigArray(): array;
}
