<?php

namespace BumbleDocGen\Core\Render\PageLinkProcessor;

interface PageLinkProcessorInterface
{
    public function getAbsoluteUrl(string $relativeUrl): string;
}
