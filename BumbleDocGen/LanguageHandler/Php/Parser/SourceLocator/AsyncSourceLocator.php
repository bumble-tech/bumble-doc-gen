<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator;

use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use Symfony\Component\Finder\Finder;

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

    /**
     * @warning Initial file parsing disabled
     */
    public function getFinder(): ?Finder
    {
        return null;
    }

    public function getSourceLocator(Locator $astLocator): SourceLocator
    {
        return new \BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\SystemAsyncSourceLocator(
            $astLocator, $this->psr4FileMap, $this->classMap,
        );
    }
}
