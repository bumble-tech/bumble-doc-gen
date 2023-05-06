<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Plugin\PluginsCollection;
use BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface;
use BumbleDocGen\Core\Renderer\TemplateFiller\TemplateFillerInterface;
use BumbleDocGen\Core\Renderer\TemplateFiller\TemplateFillersCollection;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Configuration wrapper for project documentation
 */
final class Configuration
{
    public const DEFAULT_SETTINGS_FILE = __DIR__ . '/defaultConfiguration.yaml';

    public function __construct(
        private ConfigurationParameterBag $parameterBag,
        private LocalObjectCache          $localObjectCache,
    )
    {
        $parameterBag->addValueFromFileIfNotExists('', self::DEFAULT_SETTINGS_FILE);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getProjectRoot(): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $projectRoot = $this->parameterBag->validateAndGetDirectoryPathValue('project_root', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $projectRoot);
        return $projectRoot;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getSourceLocators(): SourceLocatorsCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $sourceLocators = $this->parameterBag->validateAndGetClassListValue(
            'source_locators',
            SourceLocatorInterface::class
        );
        $cachedSourceLocatorsCollection = SourceLocatorsCollection::create(...$sourceLocators);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cachedSourceLocatorsCollection);
        return $cachedSourceLocatorsCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplatesDir(): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $templatesDir = $this->parameterBag->validateAndGetDirectoryPathValue('templates_dir', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $templatesDir);
        return $templatesDir;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getOutputDir(): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $outputDir = realpath($this->parameterBag->validateAndGetStringValue('output_dir', false));
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $outputDir);
        return $outputDir;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getOutputDirBaseUrl(): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $outputDirBaseUrl = $this->parameterBag->validateAndGetStringValue('output_dir_base_url', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $outputDirBaseUrl);
        return $outputDirBaseUrl;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getLanguageHandlersCollection(): LanguageHandlersCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $languageHandlers = $this->parameterBag->validateAndGetClassListValue(
            'language_handlers',
            LanguageHandlerInterface::class,
            false
        );
        $cachedLanguageHandlersCollection = LanguageHandlersCollection::create(...$languageHandlers);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cachedLanguageHandlersCollection);
        return $cachedLanguageHandlersCollection;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPlugins(): PluginsCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $pluginsList = $this->parameterBag->validateAndGetClassListValue(
            'plugins',
            PluginInterface::class
        );
        $cachedPlugins = PluginsCollection::create(...$pluginsList);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cachedPlugins);
        return $cachedPlugins;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getTemplateFillers(): TemplateFillersCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $templateFillers = $this->parameterBag->validateAndGetClassListValue(
            'template_fillers',
            TemplateFillerInterface::class
        );
        $cachedTemplateFillersCollection = TemplateFillersCollection::create(...$templateFillers);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cachedTemplateFillersCollection);
        return $cachedTemplateFillersCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getCacheDir(): ?string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $cacheDir = $this->parameterBag->validateAndGetDirectoryPathValue('cache_dir');
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cacheDir);
        return $cacheDir;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPageLinkProcessor(): PageLinkProcessorInterface
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        /** @var PageLinkProcessorInterface $pageLinkProcessor */
        $pageLinkProcessor = $this->parameterBag->validateAndGetClassValue(
            'page_link_processor',
            PageLinkProcessorInterface::class
        );
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $pageLinkProcessor);
        return $pageLinkProcessor;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getGitClientPath(): string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $gitClientPath = $this->parameterBag->validateAndGetStringValue('git_client_path', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $gitClientPath);
        return $gitClientPath;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getTwigFunctions(): CustomFunctionsCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $customFunctions = $this->parameterBag->validateAndGetClassListValue(
            'twig_functions',
            CustomFunctionInterface::class
        );
        $customFunctionsCollection = new CustomFunctionsCollection();
        foreach ($customFunctions as $customFunction) {
            $customFunctionsCollection->add($customFunction);
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $customFunctionsCollection);
        return $customFunctionsCollection;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getTwigFilters(): CustomFiltersCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $customFilters = $this->parameterBag->validateAndGetClassListValue(
            'twig_filters',
            CustomFilterInterface::class

        );
        $customFiltersCollection = new CustomFiltersCollection();
        foreach ($customFilters as $customFilter) {
            $customFiltersCollection->add($customFilter);
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $customFiltersCollection);
        return $customFiltersCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function useSharedCache(): bool
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $useSharedCache = $this->parameterBag->validateAndGetBooleanValue('use_shared_cache');
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $useSharedCache);
        return $useSharedCache;
    }

    /**
     * @throws \Exception
     */
    public function getWorkingDir(): string
    {
        $workingDir = getcwd();
        if (!is_string($workingDir)) {
            throw new \Exception('The working directory could not be obtained');
        }
        return $workingDir;
    }

    public function getDocGenLibDir(): string
    {
        return dirname(__DIR__, 2);
    }
}
