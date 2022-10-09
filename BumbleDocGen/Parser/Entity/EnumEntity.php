<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

/**
 * Enum class entity
 */
final class EnumEntity extends ClassEntity
{
    public function loadClassMembers(): void
    {
        $this->constantEntityCollection = ConstantEntityCollection::createByReflectionClass(
            $this->configuration,
            $this->reflector,
            $this->getReflection(),
            $this->attributeParser
        );
        $this->methodEntityCollection = MethodEntityCollection::createByClassEntity(
            $this->configuration,
            $this->reflector,
            $this,
            $this->attributeParser
        );
    }

    public function getCasesNames(): array
    {
        $caseNames = [];
        foreach ($this->reflection->getCases() as $case) {
            $caseNames[] = $case->getName();
        }
        return $caseNames;
    }
}