<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Render\Twig\BreadcrumbsHelper;
use Roave\BetterReflection\Reflector\Reflector;

final class Context
{
    private string $currentTemplateFilePath = '';
    private DocumentedClassesCollection $documentedClassesCollection;

    public function __construct(
        private Reflector $reflector,
        private ConfigurationInterface $configuration,
        private ClassEntityCollection $classEntityCollection,
        private BreadcrumbsHelper $breadcrumbsHelper
    ) {
        $this->documentedClassesCollection = new DocumentedClassesCollection();
    }

    public function setCurrentTemplateFilePatch(string $currentTemplateFilePath): void
    {
        $this->currentTemplateFilePath = $currentTemplateFilePath;
    }

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

    public function getDocumentedClassesCollection(): DocumentedClassesCollection
    {
        return $this->documentedClassesCollection;
    }

    public function getBreadcrumbsHelper(): BreadcrumbsHelper
    {
        return $this->breadcrumbsHelper;
    }
}
