<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

/**
 * Since the documentation generator supports several programming languages,
 * their entities need to correspond to the same interfaces
 */
interface RootEntityInterface
{
    /**
     * Check if entity name is valid
     */
    public static function isEntityNameValid(string $entityName): bool;

    public function getObjectId(): string;

    /**
     * Checking if it is possible to get the entity data
     */
    public function entityDataCanBeLoaded(): bool;

    /**
     * @return string[]
     */
    public function getEntityDependencies(): array;

    /**
     * Get parent collection of entities
     */
    public function getRootEntityCollection(): RootEntityCollection;

    /**
     * The entity file is in the git repository
     */
    public function isInGit(): bool;

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

    public function getFileContent(): string;

    public function getFileSourceLink(bool $withLine = true): ?string;
}
