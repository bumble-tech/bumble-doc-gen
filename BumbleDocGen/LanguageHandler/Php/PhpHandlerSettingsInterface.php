<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRendersCollection;

/**
 * Additional settings for the PL handler
 */
interface PhpHandlerSettingsInterface
{
    public function getClassEntityFilter(): ConditionInterface;

    public function getClassConstantEntityFilter(): ConditionInterface;

    public function getMethodEntityFilter(): ConditionInterface;

    public function getPropertyEntityFilter(): ConditionInterface;

    public function getEntityDocRendersCollection(): EntityDocRendersCollection;

    public function getFileSourceBaseUrl(): ?string;

    public function asyncSourceLoadingEnabled(): bool;
}
