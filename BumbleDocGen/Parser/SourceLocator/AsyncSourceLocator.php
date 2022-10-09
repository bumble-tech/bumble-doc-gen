<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

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
        private array $classMap
    ) {
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        return new MemoizingSourceLocator(
            new \BumbleDocGen\Parser\SourceLocator\Internal\SystemAsyncSourceLocator(
                $astLocator, $this->psr4FileMap, $this->classMap,
            )
        );
    }
}
