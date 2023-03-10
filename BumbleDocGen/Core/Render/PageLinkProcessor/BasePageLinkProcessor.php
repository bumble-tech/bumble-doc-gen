<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\PageLinkProcessor;

use BumbleDocGen\ConfigurationInterface;

class BasePageLinkProcessor implements PageLinkProcessorInterface
{
    public function __construct(private ConfigurationInterface $configuration)
    {
    }

    public function getAbsoluteUrl(string $relativeUrl): string
    {
        $link = str_replace('//', '/', "{$this->configuration->getOutputDirBaseUrl()}{$relativeUrl}");
        return str_replace(':/', '://', $link);
    }
}
