<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;

/**
 * Wrapper for the class that was requested for documentation
 */
final class DocumentedEntityWrapper
{
    private BreadcrumbsHelper $breadcrumbsHelper;

    /**
     * @param ConfigurationInterface $configuration DocGen configuration
     * @param DocumentTransformableEntityInterface $documentTransformableEntity An entity that is allowed to be documented
     * @param string $initiatorFilePath The file in which the documentation of the entity was requested
     */
    public function __construct(
        private ConfigurationInterface $configuration,
        private DocumentTransformableEntityInterface $documentTransformableEntity,
        private string $initiatorFilePath
    ) {
        $this->breadcrumbsHelper = new BreadcrumbsHelper($this->configuration);
    }

    /**
     * Get document key
     */
    public function getKey(): string
    {
        return substr(
            base_convert(
                md5($this->renderBreadcrumbs() . $this->documentTransformableEntity->getName()),
                16,
                32
            ),
            0,
            12
        );
    }

    /**
     * The name of the file to be generated
     */
    public function getFileName(string $fileExtension = 'rst'): string
    {
        $className = str_replace('\\', '_', $this->documentTransformableEntity->getShortName());
        return "{$className}_{$this->getKey()}.{$fileExtension}";
    }

    /**
     * Get entity that is allowed to be documented
     */
    public function getDocumentTransformableEntity(): DocumentTransformableEntityInterface
    {
        return $this->documentTransformableEntity;
    }

    /**
     * Generate breadcrumbs for entity document
     */
    public function renderBreadcrumbs(): string
    {
        return $this->breadcrumbsHelper->renderBreadcrumbs(
            $this->documentTransformableEntity->getShortName(),
            $this->initiatorFilePath
        );
    }

    /**
     * Get the relative path to the document to be generated
     */
    public function getDocUrl(): string
    {
        $pathParts = explode('/', $this->initiatorFilePath);
        array_pop($pathParts);
        $path = implode('/', $pathParts);
        return "{$path}/_Classes/{$this->getFileName()}";
    }
}
