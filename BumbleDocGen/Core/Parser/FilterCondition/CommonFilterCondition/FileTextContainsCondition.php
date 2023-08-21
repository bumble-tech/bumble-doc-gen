<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;

/**
 * Checking if a file contains a substring
 */
final class FileTextContainsCondition implements ConditionInterface
{
    public function __construct(private string $substring)
    {
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        if (!$entity instanceof RootEntityInterface) {
            return false;
        }
        $fileContent = $entity->getFileContent();
        return str_contains($fileContent, $this->substring);
    }
}
