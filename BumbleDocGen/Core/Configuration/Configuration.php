<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Cache\LocalCache\Exception\InvalidCallContextException;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
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
        private LocalObjectCache          $localObjectCache,
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
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $projectRoot = $this->parameterBag->validateAndGetStringValue('project_root', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $projectRoot);
        return $projectRoot;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getSourceLocators(): SourceLocatorsCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $templatesDir = $this->parameterBag->validateAndGetStringValue('templates_dir', false);
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
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $outputDir = $this->parameterBag->validateAndGetStringValue('output_dir', false);
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
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $outputDirBaseUrl = $this->parameterBag->validateAndGetStringValue('output_dir_base_url', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $outputDirBaseUrl);
        return $outputDirBaseUrl;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getLanguageHandlersCollection(): LanguageHandlersCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
     * @throws InvalidConfigurationParameterException
     */
    public function getPlugins(): PluginsCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplateFillers(): TemplateFillersCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $cacheDir = $this->parameterBag->validateAndGetStringValue('cache_dir');
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cacheDir);
        return $cacheDir;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function getCacheItemPool(string $cacheNamespace): CacheItemPoolInterface
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $cacheNamespace);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $cacheItemPool = new FilesystemAdapter($cacheNamespace, 604800, $this->getCacheDir());
        $this->localObjectCache->cacheMethodResult(__METHOD__, $cacheNamespace, $cacheItemPool);
        return $cacheItemPool;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getSourceLocatorCacheItemPool(): CacheItemPoolInterface
    {
        return $this->getCacheItemPool('sourceLocator');
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityCacheItemPool(): CacheItemPoolInterface
    {
        return $this->getCacheItemPool('entity');
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getPageLinkProcessor(): PageLinkProcessorInterface
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $gitClientPath = $this->parameterBag->validateAndGetStringValue('git_client_path', false);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $gitClientPath);
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
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
     * @throws InvalidConfigurationParameterException
     */
    public function getTwigFilters(): CustomFiltersCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
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
}
