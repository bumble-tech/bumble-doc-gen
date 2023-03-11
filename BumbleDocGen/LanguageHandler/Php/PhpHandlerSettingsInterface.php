<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRendersCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;

/**
 * Additional settings for the PL handler
 */
interface PhpHandlerSettingsInterface
{
    public function classConstantEntityFilterCondition(ConstantEntity $constantEntity): ConditionInterface;

    public function methodEntityFilterCondition(MethodEntity $methodEntity): ConditionInterface;

    public function propertyEntityFilterCondition(PropertyEntity $propertyEntity): ConditionInterface;

    public function getEntityDocRendersCollection(): EntityDocRendersCollection;

    public function getFileSourceBaseUrl(): ?string;

    public function asyncSourceLoadingEnabled(): bool;
}
