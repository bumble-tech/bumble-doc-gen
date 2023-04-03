<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginsCollection;
use BumbleDocGen\Core\Render\PageLinkProcessor\PageLinkProcessorInterface;
use BumbleDocGen\Core\Render\TemplateFiller\TemplateFillersCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
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

    /**
     * @deprecated
     */
    public function clearOutputDirBeforeDocGeneration(): bool;

    public function getPlugins(): PluginsCollection;

    public function getTemplateFillers(): TemplateFillersCollection;

    public function getLanguageHandlersCollection(): LanguageHandlersCollection;

    public function getLogger(): LoggerInterface;

    public function getSourceLocatorCacheItemPool(): CacheItemPoolInterface;

    public function getEntityCacheItemPool(): CacheItemPoolInterface;

    public function getPageLinkProcessor(): PageLinkProcessorInterface;

    public function getGitClientPath(): string;
}
