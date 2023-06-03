<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

interface EntityInterface
{
    public function getObjectId(): string;

    /**
     * Get parent collection of entities
     */
    public function getRootEntityCollection(): RootEntityCollection;

    public function getName(): string;

    public function getShortName(): string;

    /**
     * Returns the relative path to a file if it can be retrieved and if the file is in the project directory
     */
    public function getFileName(): ?string;

    /**
     * Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
     */
    public function getAbsoluteFileName(): ?string;

    public function entityCacheIsOutdated(): bool;
}
