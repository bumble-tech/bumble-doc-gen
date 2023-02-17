<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

use BumbleDocGen\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Checking the existence of an entity in the specified directories
 */
final class LocatedInCondition implements ConditionInterface
{
    public function __construct(
        private RootEntityInterface $entity,
        private array $directories = []
    ) {
    }

    public function canAddToCollection(): bool
    {
        $fileName = $this->entity->getAbsoluteFileName();
        foreach ($this->directories as $directory) {
            if (str_starts_with($fileName, $directory)) {
                return true;
            }
        }
        return false;
    }
}
