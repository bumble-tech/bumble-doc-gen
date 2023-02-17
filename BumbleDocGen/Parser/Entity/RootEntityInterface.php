<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

/**
 * Since the documentation generator supports several programming languages,
 * their entities need to correspond to the same interfaces
 */
interface RootEntityInterface
{
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
