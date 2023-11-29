<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

interface EntitiesLoaderProgressBarInterface
{
    public function setName(string $name): void;

    public function setStepDescription(string $stepDescription): void;

    public function iterate(iterable $iterable, ?int $max = null): \Generator;
}
