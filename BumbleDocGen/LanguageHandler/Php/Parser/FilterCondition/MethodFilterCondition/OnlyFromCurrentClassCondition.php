<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;

/**
 * Only methods that belong to the current class (not parent)
 */
final class OnlyFromCurrentClassCondition implements ConditionInterface
{
    public function canAddToCollection(EntityInterface $entity): bool
    {
        if (!$entity instanceof MethodEntity) {
            return false;
        }
        return !$entity->isImplementedInParentClass();
    }
}
