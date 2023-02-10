<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\PageLinkProcessor;

use BumbleDocGen\ConfigurationInterface;

class GithubPagesLinkProcessor implements PageLinkProcessorInterface
{
    private array $docFilesExtensions;

    public function __construct(
        private ConfigurationInterface $configuration,
        array                          $docFilesExtensions = ['md', 'html']
    )
    {
        $this->docFilesExtensions = array_map(fn($ext) => ".{$ext}", $docFilesExtensions);
    }

    public function getAbsoluteUrl(string $relativeUrl): string
    {
        $relativeUrl = str_replace($this->docFilesExtensions, '', $relativeUrl);
        return "{$this->configuration->getOutputDirBaseUrl()}{$relativeUrl}";
    }
}
