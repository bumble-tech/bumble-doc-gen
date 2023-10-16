<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use Symfony\Component\Finder\SplFileInfo;

final class TemplateFile
{
    private bool $isTemplate = false;

    public function __construct(private string $realPath, private string $relativeDocPath)
    {
        $this->isTemplate = str_ends_with($realPath, '.twig');
    }

    public function isTemplate(): bool
    {
        return $this->isTemplate;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public static function create(
        SplFileInfo $fileInfo,
        Configuration $configuration,
        PluginEventDispatcher $pluginEventDispatcher
    ): self {
        $realPath = $fileInfo->getRealPath();
        return new self(
            $realPath,
            self::getRelativeDocPathByTemplatePath(
                $realPath,
                $configuration,
                $pluginEventDispatcher
            )
        );
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    public static function getRelativeDocPathByTemplatePath(
        string $templatePath,
        Configuration $configuration,
        PluginEventDispatcher $pluginEventDispatcher,
    ): string {
        $templatePath = str_replace('.twig', '', $templatePath);
        $templatesDir = $configuration->getTemplatesDir();
        $event = $pluginEventDispatcher->dispatch(new OnGetProjectTemplatesDirs([$templatesDir]));
        $templatesDirs = $event->getTemplatesDirs();
        return str_replace($templatesDirs, '', $templatePath);
    }

    public function getRealPath(): string
    {
        return $this->realPath;
    }

    public function getRelativeDocPath(): string
    {
        return str_replace('.twig', '', $this->relativeDocPath);
    }

    public function getRelativeTemplatePath(): ?string
    {
        return $this->isTemplate ? "{$this->getRelativeDocPath()}.twig" : null;
    }
}
