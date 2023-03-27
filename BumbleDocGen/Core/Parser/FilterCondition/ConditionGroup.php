<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;

final class ConditionGroup implements ConditionInterface
{
    /**
     * @var ConditionInterface[]
     */
    private array $conditions;

    public function __construct(private string $groupType, ConditionInterface ...$conditions)
    {
        $this->conditions = $conditions;
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        if ($this->groupType === ConditionGroupTypeEnum::AND) {
            foreach ($this->conditions as $condition) {
                if (!$condition->canAddToCollection($entity)) {
                    return false;
                }
            }
        } elseif ($this->groupType === ConditionGroupTypeEnum::OR) {
            foreach ($this->conditions as $condition) {
                if ($condition->canAddToCollection($entity)) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }
}
