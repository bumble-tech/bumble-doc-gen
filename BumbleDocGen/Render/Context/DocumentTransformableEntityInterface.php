<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;

/**
 * Interface for entities that can be generated into documents
 */
interface DocumentTransformableEntityInterface
{
    public function getConfiguration(): ConfigurationInterface;

    public function getName(): string;

    public function getShortName(): string;
}
