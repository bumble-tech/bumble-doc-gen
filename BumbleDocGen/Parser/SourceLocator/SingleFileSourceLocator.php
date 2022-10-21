<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Loads one specific file by its path
 */
final class SingleFileSourceLocator extends BaseSourceLocator
{
    public function __construct(
        string $filename,
        ?CacheItemPoolInterface $cache = null
    ) {
        parent::__construct($cache);
        $this->getFinder()->append([new \SplFileInfo($filename)]);
    }
}
