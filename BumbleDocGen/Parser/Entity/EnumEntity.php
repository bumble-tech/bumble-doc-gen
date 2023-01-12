<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

/**
 * Enum class entity
 */
final class EnumEntity extends ClassEntity
{
    public function getPropertyEntityCollection(): PropertyEntityCollection
    {
        static $propertyEntityCollection = [];
        if (!isset($propertyEntityCollection[$this->getObjectId()])) {
            $propertyEntityCollection[$this->getObjectId()] = new PropertyEntityCollection();
        }
        return $propertyEntityCollection[$this->getObjectId()];
    }

    public function getCasesNames(): array
    {
        $caseNames = [];
        foreach ($this->getReflection()->getCases() as $case) {
            $caseNames[] = $case->getName();
        }
        return $caseNames;
    }
}