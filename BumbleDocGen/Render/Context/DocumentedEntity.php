<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;

final class DocumentedEntity
{
    private BreadcrumbsHelper $breadcrumbsHelper;

    public function __construct(
        private ConfigurationInterface $configuration,
        private DocumentTransformableEntityInterface $documentTransformableEntity,
        private string $initiatorFilePath
    ) {
        $this->breadcrumbsHelper = new BreadcrumbsHelper($this->configuration);
    }

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

    public function getFileName(): string
    {
        $className = str_replace('\\', '_', $this->documentTransformableEntity->getShortName());
        return "{$className}_{$this->getKey()}.rst";
    }

    public function getDocumentTransformableEntity(): DocumentTransformableEntityInterface
    {
        return $this->documentTransformableEntity;
    }

    public function renderBreadcrumbs(): string
    {
        return $this->breadcrumbsHelper->renderBreadcrumbs(
            $this->documentTransformableEntity->getShortName(),
            $this->initiatorFilePath
        );
    }

    public function getDocUrl(): string
    {
        $pathParts = explode('/', $this->initiatorFilePath);
        array_pop($pathParts);
        $path = implode('/', $pathParts);
        return "{$path}/_Classes/{$this->getFileName()}";
    }
}
