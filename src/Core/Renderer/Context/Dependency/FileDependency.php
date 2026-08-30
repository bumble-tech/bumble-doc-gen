<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context\Dependency;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\RendererHelper;

final class FileDependency implements RendererDependencyInterface
{
    public function __construct(
        private string $fileInternalLink,
        private string $hash,
        private ?string $contentFilterRegex,
        private ?int $matchIndex,
    ) {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public static function create(
        RendererHelper $rendererHelper,
        string $filePath,
        ?string $contentFilterRegex,
        ?int $matchIndex,
    ): FileDependency {
        $fileInternalLink = $rendererHelper->filePathToFileInternalLink($filePath);
        if (!file_exists($filePath) || !is_readable($filePath)) {
            return new self($fileInternalLink, '', $contentFilterRegex, $matchIndex);
        }

        $hash = '';
        if ($contentFilterRegex && $matchIndex) {
            $fileContent = file_get_contents($filePath);
            if ($fileContent && preg_match($contentFilterRegex, $fileContent, $matches) && isset($matches[$matchIndex])) {
                $hash = md5($matches[$matchIndex]);
            }
        } else {
            $hash = md5_file($filePath);
        }
        return new self($fileInternalLink, $hash, $contentFilterRegex, $matchIndex);
    }

    public function __serialize(): array
    {
        return [
            'fileInternalLink' => $this->fileInternalLink,
            'contentFilterRegex' => $this->contentFilterRegex,
            'matchIndex' => $this->matchIndex,
            'hash' => $this->hash,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->fileInternalLink = $data['fileInternalLink'];
        $this->contentFilterRegex = $data['contentFilterRegex'];
        $this->matchIndex = $data['matchIndex'];
        $this->hash = $data['hash'];
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function isChanged(RendererHelper $rendererHelper): bool
    {
        $fileName = $rendererHelper->fileInternalLinkToFilePath($this->fileInternalLink);
        $newHash = '';
        if ($this->contentFilterRegex && $this->matchIndex) {
            $fileContent = @file_get_contents($fileName);
            if (!$fileContent) {
                return true;
            }

            if (
                preg_match(
                    $this->contentFilterRegex,
                    $fileContent,
                    $matches
                ) &&
                isset($matches[$this->matchIndex])
            ) {
                $newHash = md5($matches[$this->matchIndex]);
            }
        } else {
            $newHash = md5_file($fileName);
        }
        if ($newHash !== $this->hash) {
            return true;
        }
        return false;
    }
}
