<?php

namespace BumbleDocGen\Render\PageLinkProcessor;

interface PageLinkProcessorInterface
{
    public function getAbsoluteUrl(string $relativeUrl): string;
}
