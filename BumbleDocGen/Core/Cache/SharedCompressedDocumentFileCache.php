<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Cache;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;

final class SharedCompressedDocumentFileCache
{
    private const FILE_NAME = 'shared_c.cache';

    private string $cacheFileName;
    private array $cacheData = [];

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(
        private Configuration $configuration
    )
    {
        $this->cacheFileName = $this->configuration->getOutputDir() . '/' . self::FILE_NAME;
        try {
            if (file_exists($this->cacheFileName)) {
                $this->cacheData = unserialize(gzuncompress(file_get_contents($this->cacheFileName))) ?: [];
            }
        } catch (\Exception) {
        }
    }

    public function getCacheFileName(): string
    {
        return $this->cacheFileName;
    }

    public function get(string $key, mixed $defaultValue = null): mixed
    {
        return $this->cacheData[$key] ?? $defaultValue;
    }

    public function set(string $key, mixed $data): void
    {
        $this->cacheData[$key] = $data;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function saveChanges(): void
    {
        $gitAttributesFile = $this->configuration->getOutputDir() . '/.gitattributes';
        file_put_contents($gitAttributesFile, self::FILE_NAME . ' merge=ours');
        file_put_contents($this->cacheFileName, gzcompress(serialize($this->cacheData)));
    }
}
