<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
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
        private ConfigurationInterface $configuration,
        private RootEntityCollection   $rootEntityCollection,
        private BreadcrumbsHelper      $breadcrumbsHelper,
        private PluginEventDispatcher  $pluginEventDispatcher
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

    public function getConfiguration(): ConfigurationInterface
    {
        return $this->configuration;
    }

    public function getRootEntityCollection(): RootEntityCollection
    {
        return $this->rootEntityCollection;
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
