<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context;

use BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyInterface;

/**
 * Document rendering context
 */
final class RendererContext
{
    /**
     * @var RendererDependencyInterface[]
     */
    private array $dependencies = [];
    private string $currentTemplateFilePath = '';
    private ?DocumentedEntityWrapper $currentDocumentedEntityWrapper = null;

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
        $this->setCurrentTemplateFilePatch($currentDocumentedEntityWrapper->getParentDocFilePath());
    }

    public function getCurrentDocumentedEntityWrapper(): ?DocumentedEntityWrapper
    {
        return $this->currentDocumentedEntityWrapper;
    }

    public function clearDependencies(): void
    {
        $this->dependencies = [];
    }

    public function addDependency(RendererDependencyInterface $dependency): void
    {
        $this->dependencies[] = $dependency;
    }

    public function getDependencies(): array
    {
        return $this->dependencies;
    }
}
