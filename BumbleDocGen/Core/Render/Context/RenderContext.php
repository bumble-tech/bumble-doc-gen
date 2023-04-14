<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Render\RenderHelper;

/**
 * Document rendering context
 */
final class RenderContext
{
    private array $dependencies = [];
    private string $currentTemplateFilePath = '';
    private ?DocumentedEntityWrapper $currentDocumentedEntityWrapper = null;

    public function __construct(
        private RenderHelper $renderHelper
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
    public function addFileDependency(string $filePath): void
    {
        $fileInternalLink = $this->renderHelper->filePathToFileInternalLink($filePath);
        $this->dependencies[$fileInternalLink] = md5_file($filePath);
    }

    public function getFilesDependencies(): array
    {
        return $this->dependencies;
    }
}
