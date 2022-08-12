<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

final class HasAnnotationCondition implements ConditionInterface
{
    public function __construct(
        private ClassEntity $classEntity,
        private string $className
    ) {
    }

    public function canAddToCollection(): bool
    {
        return $this->classEntity->getAttributeParser()->hasAnnotationIfIsSubclassOf(
            $this->classEntity->getReflection()->getDocComment(),
            $this->className
        );
    }
}
