<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;

interface ConditionInterface
{
    public function canAddToCollection(EntityInterface $entity): bool;
}
