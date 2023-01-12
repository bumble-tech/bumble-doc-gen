<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * Document rendering context
 */
final class Context
{
    private string $currentTemplateFilePath = '';
    private DocumentedEntityWrappersCollection $entityWrappersCollection;
    private Reflector $reflector;

    public function __construct(
        private ConfigurationInterface $configuration,
        private ClassEntityCollection  $classEntityCollection,
        private BreadcrumbsHelper      $breadcrumbsHelper,
        private PluginEventDispatcher  $pluginEventDispatcher
    )
    {
        $this->entityWrappersCollection = new DocumentedEntityWrappersCollection();
        $this->reflector = $classEntityCollection->getReflector();
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

    public function getReflector(): Reflector
    {
        return $this->reflector;
    }

    public function getConfiguration(): ConfigurationInterface
    {
        return $this->configuration;
    }

    public function getClassEntityCollection(): ClassEntityCollection
    {
        return $this->classEntityCollection;
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
