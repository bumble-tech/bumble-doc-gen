<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin;

interface OnlySingleExecutionEvent
{
    public function getUniqueExecutionId(): string;
}
