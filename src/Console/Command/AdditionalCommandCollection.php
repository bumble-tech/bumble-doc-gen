<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use Symfony\Component\Console\Command\Command;

final class AdditionalCommandCollection implements \IteratorAggregate
{
    /** @var array<int, Command> */
    private array $commands = [];

    public function getIterator(): \Generator
    {
        yield from $this->commands;
    }

    public static function create(Command ...$commands): AdditionalCommandCollection
    {
        $additionalCommandCollection = new self();
        foreach ($commands as $command) {
            $additionalCommandCollection->add($command);
        }
        return $additionalCommandCollection;
    }

    public function add(Command $command): AdditionalCommandCollection
    {
        $this->commands[] = $command;
        return $this;
    }
}
