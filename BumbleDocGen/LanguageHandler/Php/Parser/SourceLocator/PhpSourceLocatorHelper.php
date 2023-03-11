<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator;

use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * @internal
 */
final class PhpSourceLocatorHelper
{
    public static function getReflectorSourceLocator(
        Locator                  $astLocator,
        SourceLocatorsCollection $sourceLocatorsCollection
    ): SourceLocator
    {
        return new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
            new \ArrayIterator(iterator_to_array($sourceLocatorsCollection->getCommonFinder()->getIterator())),
            $astLocator
        );
    }
}
