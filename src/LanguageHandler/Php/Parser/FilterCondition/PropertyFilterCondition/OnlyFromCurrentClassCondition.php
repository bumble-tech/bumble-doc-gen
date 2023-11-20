<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;

/**
 * Only properties that belong to the current class (not parent)
 */
final class OnlyFromCurrentClassCondition implements ConditionInterface
{
    public function canAddToCollection(EntityInterface $entity): bool
    {
        if (!$entity instanceof PropertyEntity) {
            return false;
        }
        return !$entity->isImplementedInParentClass();
    }
}
