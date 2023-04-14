<?php

namespace BumbleDocGen\Core\Renderer\PageLinkProcessor;

interface PageLinkProcessorInterface
{
    public function getAbsoluteUrl(string $relativeUrl): string;
}
