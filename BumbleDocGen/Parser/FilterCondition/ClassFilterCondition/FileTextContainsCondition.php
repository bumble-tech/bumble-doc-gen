<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Checking if a file contains a substring
 */
final class FileTextContainsCondition implements ConditionInterface
{
    public function __construct(
        private ClassEntity $classEntity,
        private string $substring
    ) {
    }

    public function canAddToCollection(): bool
    {
        $fileContent = $this->classEntity->getReflection()->getLocatedSource()->getSource();
        return str_contains($fileContent, $this->substring);
    }
}
