<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

use BumbleDocGen\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Checking if a file contains a substring
 */
final class FileTextContainsCondition implements ConditionInterface
{
    public function __construct(
        private RootEntityInterface $entity,
        private string $substring
    ) {
    }

    public function canAddToCollection(): bool
    {
        $fileContent = $this->entity->getFileContent();
        return str_contains($fileContent, $this->substring);
    }
}
