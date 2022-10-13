<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Lazy loading classes. Cannot be used for initial parsing of files, only for getting specific documents
 */
final class AsyncSourceLocator implements SourceLocatorInterface
{
    public function __construct(
        private array $psr4FileMap,
        private array $classMap,
        private ?string $cacheDirName = null
    ) {
    }

    public function getFiles(): \Generator
    {
        yield;
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        $systemAsyncSourceLocator = new \BumbleDocGen\Parser\SourceLocator\Internal\SystemAsyncSourceLocator(
            $astLocator, $this->psr4FileMap, $this->classMap,
        );

        if ($this->cacheDirName) {
            return new CachedSourceLocator($systemAsyncSourceLocator, $this->cacheDirName);
        }
        return new MemoizingSourceLocator($systemAsyncSourceLocator);
    }
}
