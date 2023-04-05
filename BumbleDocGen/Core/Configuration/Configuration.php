<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Plugin\PluginsCollection;
use BumbleDocGen\Core\Render\PageLinkProcessor\PageLinkProcessorInterface;
use BumbleDocGen\Core\Render\TemplateFiller\TemplateFillerInterface;
use BumbleDocGen\Core\Render\TemplateFiller\TemplateFillersCollection;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFilterInterface;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Configuration wrapper for project documentation
 */
final class Configuration
{
    public const DEFAULT_SETTINGS_FILE = __DIR__ . '/defaultConfiguration.yaml';

    public function __construct(
        private ConfigurationParameterBag $parameterBag,
        private LoggerInterface           $logger
    )
    {
        $parameterBag->addValueFromFileIfNotExists(
            '',
            self::DEFAULT_SETTINGS_FILE,
        );
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getProjectRoot(): string
    {
        static $projectRoot = null;
        if (is_null($projectRoot)) {
            $projectRoot = $this->parameterBag->validateAndGetStringValue('project_root', false);
        }
        return $projectRoot;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getSourceLocators(): SourceLocatorsCollection
    {
        static $cachedSourceLocatorsCollection = null;
        if (!$cachedSourceLocatorsCollection) {
            $sourceLocators = $this->parameterBag->validateAndGetClassListValue(
                'source_locators',
                SourceLocatorInterface::class
            );
            $cachedSourceLocatorsCollection = SourceLocatorsCollection::create(...$sourceLocators);
        }
        return $cachedSourceLocatorsCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplatesDir(): string
    {
        static $templatesDir = null;
        if (is_null($templatesDir)) {
            $templatesDir = $this->parameterBag->validateAndGetStringValue('templates_dir', false);
        }
        return $templatesDir;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getOutputDir(): string
    {
        static $outputDir = null;
        if (is_null($outputDir)) {
            $outputDir = $this->parameterBag->validateAndGetStringValue('output_dir', false);
        }
        return $outputDir;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getOutputDirBaseUrl(): string
    {
        static $outputDirBaseUrl = null;
        if (is_null($outputDirBaseUrl)) {
            $outputDirBaseUrl = $this->parameterBag->validateAndGetStringValue('output_dir_base_url', false);
        }
        return $outputDirBaseUrl;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getLanguageHandlersCollection(): LanguageHandlersCollection
    {
        static $cachedLanguageHandlersCollection = null;
        if (!$cachedLanguageHandlersCollection) {
            $languageHandlers = $this->parameterBag->validateAndGetClassListValue(
                'language_handlers',
                LanguageHandlerInterface::class,
                false
            );
            $cachedLanguageHandlersCollection = LanguageHandlersCollection::create(...$languageHandlers);
        }
        return $cachedLanguageHandlersCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getPlugins(): PluginsCollection
    {
        static $cachedPlugins = null;
        if (!$cachedPlugins) {
            $pluginsList = $this->parameterBag->validateAndGetClassListValue(
                'plugins',
                PluginInterface::class
            );
            $cachedPlugins = PluginsCollection::create(...$pluginsList);
        }
        return $cachedPlugins;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplateFillers(): TemplateFillersCollection
    {
        static $cachedTemplateFillersCollection = null;
        if (!$cachedTemplateFillersCollection) {
            $templateFillers = $this->parameterBag->validateAndGetClassListValue(
                'template_fillers',
                TemplateFillerInterface::class
            );
            $cachedTemplateFillersCollection = TemplateFillersCollection::create(...$templateFillers);
        }
        return $cachedTemplateFillersCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getCacheDir(): ?string
    {
        static $cacheDir = -1;
        if ($cacheDir === -1) {
            $cacheDir = $this->parameterBag->validateAndGetStringValue('cache_dir');
        }
        return $cacheDir;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    private function getCacheItemPool(string $cacheNamespace): CacheItemPoolInterface
    {
        static $cache = [];
        if (!isset($cache[$cacheNamespace])) {
            $cache[$cacheNamespace] = new FilesystemAdapter($cacheNamespace, 604800, $this->getCacheDir());
        }
        return $cache[$cacheNamespace];
    }

    public function getSourceLocatorCacheItemPool(): CacheItemPoolInterface
    {
        return $this->getCacheItemPool('sourceLocator');
    }

    public function getEntityCacheItemPool(): CacheItemPoolInterface
    {
        return $this->getCacheItemPool('entity');
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getPageLinkProcessor(): PageLinkProcessorInterface
    {
        static $pageLinkProcessor = null;
        if (is_null($pageLinkProcessor)) {
            /** @var PageLinkProcessorInterface $pageLinkProcessor */
            $pageLinkProcessor = $this->parameterBag->validateAndGetClassValue(
                'page_link_processor',
                PageLinkProcessorInterface::class
            );
        }
        return $pageLinkProcessor;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getGitClientPath(): string
    {
        static $gitClientPath = null;
        if (is_null($gitClientPath)) {
            $gitClientPath = $this->parameterBag->validateAndGetStringValue('git_client_path', false);
        }
        return $gitClientPath;
    }

    public function clearOutputDirBeforeDocGeneration(): bool
    {
        return true;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTwigFunctions(): CustomFunctionsCollection
    {
        static $customFunctionsCollection = null;
        if (!$customFunctionsCollection) {
            $customFunctions = $this->parameterBag->validateAndGetClassListValue(
                'twig_functions',
                CustomFunctionInterface::class
            );
            $customFunctionsCollection = new CustomFunctionsCollection();
            foreach ($customFunctions as $customFunction) {
                $customFunctionsCollection->add($customFunction);
            }
        }
        return $customFunctionsCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTwigFilters(): CustomFiltersCollection
    {
        static $customFiltersCollection = null;
        if (!$customFiltersCollection) {
            $customFilters = $this->parameterBag->validateAndGetClassListValue(
                'twig_filters',
                CustomFilterInterface::class

            );
            $customFiltersCollection = new CustomFiltersCollection();
            foreach ($customFilters as $customFilter) {
                $customFiltersCollection->add($customFilter);
            }
        }
        return $customFiltersCollection;
    }
}
