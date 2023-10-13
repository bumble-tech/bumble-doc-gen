<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;

final class TemplateFile
{
    public function __construct(private string $rearPath, private string $relativeDocPath)
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public static function getTemplatePathByRelativeDocPath(
        string $relativeDocPath,
        Configuration $configuration,
        PluginEventDispatcher $pluginEventDispatcher,
    ): string {
        if (!str_ends_with($relativeDocPath, '.twig')) {
            $relativeDocPath .= '.twig';
        }
        $outputDir = $configuration->getTemplatesDir();
        $event = $pluginEventDispatcher->dispatch(new OnGetTemplatePathByRelativeDocPath($relativeDocPath));
        $filePath = $event->getCustomTemplateFilePath();
        return $filePath ?: "{$outputDir}{$relativeDocPath}";
    }

    public function getRealPath(): string
    {
        return $this->rearPath;
    }

    public function getRelativeDocPath(): string
    {
        return $this->relativeDocPath;
    }
}
