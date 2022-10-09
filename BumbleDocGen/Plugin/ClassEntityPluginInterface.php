<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;

/**
 * Plugin for working with class entities
 */
interface ClassEntityPluginInterface extends PluginInterface
{
    /**
     * The method is executed before adding an already created entity to the ClassEntityCollection
     *
     * @param ClassEntity $classEntity
     * @param ClassEntityCollection $classEntityCollection
     * @return ClassEntity
     */
    public function beforeAddingClassEntity(
        ClassEntity $classEntity,
        ClassEntityCollection $classEntityCollection
    ): ClassEntity;
}
