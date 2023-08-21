<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context\Dependency;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\RendererHelper;

final class RendererDependencyFactory
{
    public function __construct(
        private RendererHelper $rendererHelper,
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function createFileDependency(
        string  $filePath,
        ?string $contentFilterRegex = null,
        ?int    $matchIndex = null,
    ): FileDependency
    {
        return FileDependency::create($this->rendererHelper, $filePath, $contentFilterRegex, $matchIndex);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function createDirectoryDependency(string $dirPath): DirectoryDependency
    {
        return DirectoryDependency::create($this->rendererHelper, $dirPath);
    }
}
