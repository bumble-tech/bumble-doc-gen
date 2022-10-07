<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * Document rendering context
 */
final class Context
{
    private string $currentTemplateFilePath = '';
    private DocumentedEntityWrappersCollection $entityWrappersCollection;

    public function __construct(
        private Reflector $reflector,
        private ConfigurationInterface $configuration,
        private ClassEntityCollection $classEntityCollection,
        private BreadcrumbsHelper $breadcrumbsHelper
    ) {
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
}
