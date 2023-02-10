<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\PageLinkProcessor;

use BumbleDocGen\ConfigurationInterface;

class BasePageLinkProcessor implements PageLinkProcessorInterface
{
    public function __construct(private ConfigurationInterface $configuration)
    {
    }

    public function getAbsoluteUrl(string $relativeUrl): string
    {
        return "{$this->configuration->getOutputDirBaseUrl()}{$relativeUrl}";
    }
}
