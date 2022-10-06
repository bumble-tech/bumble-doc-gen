<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\Entity\ClassEntityCollection;

interface ClassEntityCollectionPluginInterface extends PluginInterface
{
    public function afterCreationClassEntityCollectionByReflector(
        ClassEntityCollection $classEntityCollection
    ): void;
}
