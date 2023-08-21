<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\PageLinkProcessor;

use BumbleDocGen\Core\Configuration\Configuration;

class BasePageLinkProcessor implements PageLinkProcessorInterface
{
    public function __construct(private Configuration $configuration)
    {
    }

    public function getAbsoluteUrl(string $relativeUrl): string
    {
        $link = str_replace('//', '/', "{$this->configuration->getOutputDirBaseUrl()}{$relativeUrl}");
        return str_replace(':/', '://', $link);
    }
}
