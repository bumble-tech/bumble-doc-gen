<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Render\Breadcrumbs\BreadcrumbsHelper;

/**
 * Document rendering context
 */
final class Context
{
    private string $currentTemplateFilePath = '';
    private DocumentedEntityWrappersCollection $entityWrappersCollection;

    public function __construct(
        private Configuration              $configuration,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private BreadcrumbsHelper          $breadcrumbsHelper,
        private PluginEventDispatcher      $pluginEventDispatcher
    )
    {
        $this->entityWrappersCollection = new DocumentedEntityWrappersCollection();
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

    public function isCurrentTemplateRst(): bool
    {
        return str_ends_with($this->getCurrentTemplateFilePatch(), '.rst.twig');
    }

    public function isCurrentTemplateMd(): bool
    {
        return str_ends_with($this->getCurrentTemplateFilePatch(), '.md.twig');
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function getRootEntityCollectionsGroup(): RootEntityCollectionsGroup
    {
        return $this->rootEntityCollectionsGroup;
    }

    public function getRootEntityCollection(string $collectionName): ?RootEntityCollection
    {
        return $this->rootEntityCollectionsGroup->get($collectionName);
    }

    public function getEntityWrappersCollection(): DocumentedEntityWrappersCollection
    {
        return $this->entityWrappersCollection;
    }

    public function getBreadcrumbsHelper(): BreadcrumbsHelper
    {
        return $this->breadcrumbsHelper;
    }

    public function getPluginEventDispatcher(): PluginEventDispatcher
    {
        return $this->pluginEventDispatcher;
    }
}
