<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

interface OperationInterface
{
    public function getKey(): string;

    public function incrementUsageCount(): void;
}
