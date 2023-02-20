<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;

interface PhpHandlerSettings
{
    public function classConstantEntityFilterCondition(ConstantEntity $constantEntity): ConditionInterface;

    public function methodEntityFilterCondition(MethodEntity $methodEntity): ConditionInterface;

    public function propertyEntityFilterCondition(PropertyEntity $propertyEntity): ConditionInterface;

    public function getEntityDocRendersCollection(): EntityDocRendersCollection;
}