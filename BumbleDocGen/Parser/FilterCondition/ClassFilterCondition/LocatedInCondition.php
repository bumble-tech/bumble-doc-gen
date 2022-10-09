<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Checking the existence of a class in the specified directories
 */
final class LocatedInCondition implements ConditionInterface
{
    public function __construct(
        private ClassEntity $classEntity,
        private array $directories = []
    ) {
    }

    public function canAddToCollection(): bool
    {
        $fileName = $this->classEntity->getReflection()->getFileName();
        foreach ($this->directories as $directory) {
            if (str_starts_with($fileName, $directory)) {
                return true;
            }
        }
        return false;
    }
}
