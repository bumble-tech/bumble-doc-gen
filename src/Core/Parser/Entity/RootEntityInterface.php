<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

/**
 * Since the documentation generator supports several programming languages,
 * their entities need to correspond to the same interfaces
 */
interface RootEntityInterface extends EntityInterface
{
    /**
     * Check if entity name is valid
     */
    public static function isEntityNameValid(string $entityName): bool;

    /**
     * Checking if it is possible to get the entity data
     */
    public function isEntityDataCanBeLoaded(): bool;

    /**
     * The entity is loaded from a third party library and should not be treated the same as a standard one
     */
    public function isExternalLibraryEntity(): bool;

    /**
     * @return string[]
     */
    public function getEntityDependencies(): array;

    /**
     * The entity file is in the git repository
     */
    public function isInGit(): bool;

    public function getFileContent(): string;

    public function getFileSourceLink(bool $withLine = true): ?string;
}
