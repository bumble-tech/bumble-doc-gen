<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;

final class IsPrivateCondition implements ConditionInterface
{
    private VisibilityCondition $visibilityCondition;

    public function __construct()
    {
        $this->visibilityCondition = new VisibilityCondition(VisibilityConditionModifier::PRIVATE);
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        return $this->visibilityCondition->canAddToCollection($entity);
    }
}
