<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;

interface ClassEntityPluginInterface extends PluginInterface
{
    public function beforeAddingClassEntity(
        ClassEntity $classEntity,
        ClassEntityCollection $classEntityCollection
    ): ClassEntity;
}
