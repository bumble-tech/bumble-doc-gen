<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;

/**
 * Only properties that belong to the current class (not parent)
 */
final class OnlyFromCurrentClassCondition implements ConditionInterface
{
    public function __construct(
        private PropertyEntity $propertyEntity
    ) {
    }

    public function canAddToCollection(): bool
    {
        return !$this->propertyEntity->isImplementedInParentClass();
    }
}
