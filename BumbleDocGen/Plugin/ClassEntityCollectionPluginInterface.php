<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\Entity\ClassEntityCollection;

/**
 * Plugin for working with ClassEntityCollection
 */
interface ClassEntityCollectionPluginInterface extends PluginInterface
{
    /**
     * The method is called after the ClassEntityCollection has been created using the reflector
     *
     * @see ClassEntityCollection::createByReflector()
     */
    public function afterCreationClassEntityCollection(
        ClassEntityCollection $classEntityCollection
    ): void;
}
