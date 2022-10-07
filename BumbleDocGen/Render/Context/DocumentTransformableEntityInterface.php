<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

/**
 * Interface for entities that can be generated into documents
 */
interface DocumentTransformableEntityInterface
{
    public function getName(): string;

    public function getShortName(): string;
}
