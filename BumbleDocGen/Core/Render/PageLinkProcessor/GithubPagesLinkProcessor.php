<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\PageLinkProcessor;

use BumbleDocGen\Core\Configuration\Configuration;

class GithubPagesLinkProcessor implements PageLinkProcessorInterface
{
    private array $docFilesExtensions;

    public function __construct(
        private Configuration $configuration,
        array                 $docFilesExtensions = ['md', 'html']
    )
    {
        $this->docFilesExtensions = array_map(fn($ext) => ".{$ext}", $docFilesExtensions);
    }

    public function getAbsoluteUrl(string $relativeUrl): string
    {
        $relativeUrl = str_replace('/readme.md', '/index.md', $relativeUrl);
        $relativeUrl = str_replace($this->docFilesExtensions, '.html', $relativeUrl);
        $link = str_replace('//', '/', "{$this->configuration->getOutputDirBaseUrl()}{$relativeUrl}");
        return str_replace(':/', '://', $link);
    }
}
