<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\Core\Configuration\Configuration;

interface EntityInterface
{
    /**
     * Entity object ID
     *
     * @api
     */
    public function getObjectId(): string;

    /**
     * Get parent collection of entities
     *
     * @api
     */
    public function getRootEntityCollection(): RootEntityCollection;

    /**
     * Full name of the entity
     *
     * @api
     */
    public function getName(): string;

    /**
     * Short name of the entity
     *
     * @api
     */
    public function getShortName(): string;

    /**
     * File name relative to project_root configuration parameter
     *
     * @api
     *
     * @see Configuration::getProjectRoot()
     */
    public function getRelativeFileName(): ?string;

    /**
     * Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
     *
     * @api
     */
    public function getAbsoluteFileName(): ?string;

    /**
     * @internal
     */
    public function isEntityCacheOutdated(): bool;
}
