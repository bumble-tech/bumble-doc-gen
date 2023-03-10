<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition;

final class ConditionGroup implements ConditionInterface
{
    /**
     * @var ConditionInterface[]
     */
    private array $conditions = [];
    private string $groupType = ConditionGroupTypeEnum::AND;

    public static function create(string $groupType, ConditionInterface ...$conditions): ConditionGroup
    {
        $conditionGroup = new self();
        $conditionGroup->conditions = $conditions;
        $conditionGroup->groupType = $groupType;
        return $conditionGroup;
    }

    public function canAddToCollection(): bool
    {
        if ($this->groupType === ConditionGroupTypeEnum::AND) {
            foreach ($this->conditions as $condition) {
                if (!$condition->canAddToCollection()) {
                    return false;
                }
            }
        } elseif ($this->groupType === ConditionGroupTypeEnum::OR) {
            foreach ($this->conditions as $condition) {
                if ($condition->canAddToCollection()) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }
}
