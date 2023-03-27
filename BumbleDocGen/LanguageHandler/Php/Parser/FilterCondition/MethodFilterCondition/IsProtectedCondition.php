<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;

final class IsProtectedCondition implements ConditionInterface
{
    private VisibilityCondition $visibilityCondition;

    public function __construct()
    {
        $this->visibilityCondition = new VisibilityCondition(VisibilityConditionModifier::PROTECTED);
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        return $this->visibilityCondition->canAddToCollection($entity);
    }
}
