<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;

final class RenderHelper
{
    public function __construct(
        private PluginEventDispatcher $pluginEventDispatcher,
        private Configuration         $configuration
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function filePathToFileInternalLink(string $fileName): string
    {
        if (
            !str_starts_with($fileName, $this->configuration->getTemplatesDir()) &&
            !str_starts_with($fileName, $this->configuration->getOutputDir()) &&
            !str_starts_with($fileName, $this->configuration->getWorkingDir()) &&
            !str_starts_with($fileName, $this->configuration->getDocGenLibDir())
        ) {
            throw new \InvalidArgumentException(
                "File `{$fileName}` must belong to one of these directories: template_dir, output_dir, working_dir"
            );
        }

        return str_replace(
            [
                $this->configuration->getTemplatesDir(),
                $this->configuration->getOutputDir(),
                $this->configuration->getWorkingDir(),
                $this->configuration->getDocGenLibDir()
            ],
            [
                '{%templates_dir%}',
                '{%output_dir%}',
                '{%working_dir%}',
                '{%doc_gen_lib_dir%}'
            ],
            $fileName
        );
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function fileInternalLinkToFilePath(string $fileInternalLink): string
    {
        return str_replace(
            [
                '{%templates_dir%}',
                '{%output_dir%}',
                '{%working_dir%}',
                '{%doc_gen_lib_dir%}'
            ],
            [
                $this->configuration->getTemplatesDir(),
                $this->configuration->getOutputDir(),
                $this->configuration->getWorkingDir(),
                $this->configuration->getDocGenLibDir()
            ],
            $fileInternalLink
        );
    }

    public function getPreloadResourceLink(string $resourceName): ?string
    {
        return $this->pluginEventDispatcher->dispatch(
            new OnGettingResourceLink($resourceName)
        )->getResourceUrl();
    }
}
