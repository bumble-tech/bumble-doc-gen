<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;

/**
 * Checking the existence of an entity in the specified directories
 */
final class LocatedInCondition implements ConditionInterface
{
    public function __construct(private array $directories = [])
    {
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        $fileName = $entity->getAbsoluteFileName();
        foreach ($this->directories as $directory) {
            $directory = realpath($directory);
            if (str_starts_with($fileName, $directory)) {
                return true;
            }
        }
        return false;
    }
}
