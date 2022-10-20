<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ConstantEntity;
use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\Entity\PropertyEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;
use BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

/**
 * Documentation generator configuration
 */
interface ConfigurationInterface
{
    /**
     * Get project root (absolute path)
     */
    public function getProjectRoot(): string;

    /**
     * Get a collection of source locators
     */
    public function getSourceLocators(): SourceLocatorsCollection;

    /**
     * Directory with documentation templates (absolute path)
     */
    public function getTemplatesDir(): string;

    /**
     * Directory where the documentation will be generated (absolute path)
     */
    public function getOutputDir(): string;

    /**
     * Base URL of the generated document
     */
    public function getOutputDirBaseUrl(): string;

    public function getCacheDir(): ?string;

    public function clearOutputDirBeforeDocGeneration(): bool;

    public function classEntityFilterCondition(ClassEntity $classEntity): ConditionInterface;

    public function classConstantEntityFilterCondition(ConstantEntity $constantEntity): ConditionInterface;

    public function methodEntityFilterCondition(MethodEntity $methodEntity): ConditionInterface;

    public function propertyEntityFilterCondition(PropertyEntity $propertyEntity): ConditionInterface;

    public function getPlugins(): PluginsCollection;

    public function getTemplateFillers(): TemplateFillersCollection;

    public function getEntityDocRendersCollection(): EntityDocRendersCollection;

    public function getLogger(): LoggerInterface;

    public function getSourceLocatorCacheItemPool(): CacheItemPoolInterface;
}
