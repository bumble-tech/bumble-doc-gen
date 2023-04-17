<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\RendererHelper;

/**
 * Document rendering context
 */
final class RendererContext
{
    private array $dependencies = [];
    private string $currentTemplateFilePath = '';
    private ?DocumentedEntityWrapper $currentDocumentedEntityWrapper = null;

    public function __construct(
        private RendererHelper $rendererHelper
    )
    {
    }

    /**
     * Saving the path to the template file that is currently being worked on in the context
     */
    public function setCurrentTemplateFilePatch(string $currentTemplateFilePath): void
    {
        $this->currentTemplateFilePath = $currentTemplateFilePath;
    }

    /**
     * Getting the path to the template file that is currently being worked on
     */
    public function getCurrentTemplateFilePatch(): string
    {
        return $this->currentTemplateFilePath;
    }

    public function setCurrentDocumentedEntityWrapper(DocumentedEntityWrapper $currentDocumentedEntityWrapper): void
    {
        $this->currentDocumentedEntityWrapper = $currentDocumentedEntityWrapper;
        $this->setCurrentTemplateFilePatch($currentDocumentedEntityWrapper->getInitiatorFilePath());
    }

    public function getCurrentDocumentedEntityWrapper(): ?DocumentedEntityWrapper
    {
        return $this->currentDocumentedEntityWrapper;
    }

    public function clearFilesDependencies(): void
    {
        $this->dependencies = [];
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function addFileDependency(
        string  $filePath,
        ?string $contentFilterRegex = null,
        ?int    $matchIndex = null
    ): void
    {
        $hash = '';
        $fileInternalLink = $this->rendererHelper->filePathToFileInternalLink($filePath);
        if ($contentFilterRegex && $matchIndex) {
            if (preg_match($contentFilterRegex, file_get_contents($filePath), $matches) && isset($matches[$matchIndex])) {
                $hash = md5($matches[$matchIndex]);
            }
        } else {
            $hash = md5_file($filePath);
        }

        $this->dependencies[$fileInternalLink] = [
            'contentFilterRegex' => $contentFilterRegex,
            'matchIndex' => $matchIndex,
            'hash' => $hash
        ];
    }

    public function getFilesDependencies(): array
    {
        return $this->dependencies;
    }
}
