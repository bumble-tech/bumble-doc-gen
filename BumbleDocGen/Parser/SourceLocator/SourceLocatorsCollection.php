<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;

final class SourceLocatorsCollection implements \IteratorAggregate
{
    /** @var array<int, SourceLocatorInterface> */
    private array $sourceLocators = [];

    public function getIterator(): \Generator
    {
        yield from $this->sourceLocators;
    }

    public static function create(SourceLocatorInterface ...$sourceLocators): SourceLocatorsCollection
    {
        $sourceLocatorsCollection = new self();
        foreach ($sourceLocators as $sourceLocator) {
            $sourceLocatorsCollection->add($sourceLocator);
        }
        return $sourceLocatorsCollection;
    }

    public function add(SourceLocatorInterface $sourceLocator): SourceLocatorsCollection
    {
        $this->sourceLocators[] = $sourceLocator;
        return $this;
    }

    public function convertToReflectorSourceLocatorsList(Locator $astLocator): array
    {
        $reflectorSourceLocatorsList = [];
        foreach ($this->sourceLocators as $locator) {
            $reflectorSourceLocatorsList[] = $locator->convertToReflectorSourceLocator($astLocator);
        }
        return $reflectorSourceLocatorsList;
    }

    /**
     * @return \Generator|\SplFileInfo[]
     */
    public function getAllFiles(): \Generator
    {
        foreach ($this->sourceLocators as $locator) {
            foreach ($locator->getFiles() as $file) {
                yield $file;
            }
        }
    }
}
