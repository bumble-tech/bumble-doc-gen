<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use Psr\Cache\CacheItemPoolInterface;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use Symfony\Component\Finder\Finder;

/**
 * Lazy loading classes. Cannot be used for initial parsing of files, only for getting specific documents
 */
final class AsyncSourceLocator implements SourceLocatorInterface
{
    public function __construct(
        private array $psr4FileMap,
        private array $classMap,
        private ?CacheItemPoolInterface $cache = null
    ) {
    }

    /**
     * @warning Initial file parsing disabled
     */
    public function getFinder(): Finder
    {
        return new Finder();
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        $systemAsyncSourceLocator = new \BumbleDocGen\Parser\SourceLocator\Internal\SystemAsyncSourceLocator(
            $astLocator, $this->psr4FileMap, $this->classMap,
        );

        if ($this->cache) {
            return new CachedSourceLocator($systemAsyncSourceLocator, $this->cache);
        }
        return new MemoizingSourceLocator($systemAsyncSourceLocator);
    }
}
