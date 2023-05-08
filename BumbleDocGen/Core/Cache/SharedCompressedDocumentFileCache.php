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
    private array $usedKeys = [];

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
                $this->cacheData = unserialize(gzuncompress(base64_decode(file_get_contents($this->cacheFileName)))) ?: [];
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
        $this->usedKeys[$key] = $key;
        return $this->cacheData[$key] ?? $defaultValue;
    }

    public function set(string $key, mixed $data): void
    {
        $this->usedKeys[$key] = $key;
        $this->cacheData[$key] = $data;
    }

    public function removeNotUsedKeys(): void
    {
        $this->cacheData = array_filter(
            $this->cacheData,
            fn(string $key) => array_key_exists($key, $this->usedKeys),
            ARRAY_FILTER_USE_KEY
        );
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function saveChanges(): void
    {
        $gitAttributesFile = $this->configuration->getOutputDir() . '/.gitattributes';
        file_put_contents($gitAttributesFile, self::FILE_NAME . ' merge=ours');
        file_put_contents($this->cacheFileName, base64_encode(gzcompress(serialize($this->cacheData))));
    }
}
