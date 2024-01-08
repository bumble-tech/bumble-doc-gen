<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Console\Command\AdditionalCommandCollection;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Plugin\PluginsCollection;
use BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;

/**
 * Configuration project documentation
 */
final class Configuration
{
    public const DEFAULT_SETTINGS_FILE = __DIR__ . '/defaultConfiguration.yaml';

    public function __construct(
        private ConfigurationParameterBag $parameterBag,
        private LocalObjectCache $localObjectCache,
        private LoggerInterface $logger,
    ) {
        $parameterBag->addValueFromFileIfNotExists('', self::DEFAULT_SETTINGS_FILE);
    }

    public function getConfigurationVersion(): string
    {
        return $this->parameterBag->getConfigVersion();
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
        $projectRoot = $this->parameterBag->validateAndGetDirectoryPathValue(ConfigurationKey::PROJECT_ROOT, false);
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
            ConfigurationKey::SOURCE_LOCATORS,
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
        $templatesDir = $this->parameterBag->validateAndGetStringValue(ConfigurationKey::TEMPLATES_DIR, false);
        $parentDir = dirname($templatesDir);
        if (!$parentDir || !is_dir($parentDir)) {
            throw new InvalidConfigurationParameterException(
                sprintf(
                    "`%s` cannot be created because parent directory `{$parentDir}` does not exist",
                    ConfigurationKey::TEMPLATES_DIR
                )
            );
        }
        if (!file_exists($templatesDir)) {
            $this->logger->notice("Creating `{$templatesDir}` directory");
            mkdir($templatesDir);
        }
        $templatesDir = realpath($templatesDir);
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
        $outputDir = $this->parameterBag->validateAndGetStringValue(ConfigurationKey::OUTPUT_DIR, false);
        $parentDir = dirname($outputDir);
        if (!$parentDir || !is_dir($parentDir)) {
            throw new InvalidConfigurationParameterException(
                sprintf(
                    "`%s` cannot be created because parent directory `{$parentDir}` does not exist",
                    ConfigurationKey::OUTPUT_DIR
                )
            );
        }

        if (!is_writable($parentDir)) {
            throw new InvalidConfigurationParameterException(
                sprintf(
                    "`%s` cannot be created because parent directory `{$parentDir}` is not writable",
                    ConfigurationKey::OUTPUT_DIR
                )
            );
        }

        if (!file_exists($outputDir)) {
            $this->logger->notice("Creating `{$outputDir}` directory");
            mkdir($outputDir);
        }
        $outputDir = realpath($outputDir);
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
        $outputDirBaseUrl = $this->parameterBag->validateAndGetStringValue(ConfigurationKey::OUTPUT_DIR_BASE_URL, false);
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
            ConfigurationKey::LANGUAGE_HANDLERS,
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
            ConfigurationKey::PLUGINS,
            PluginInterface::class
        );
        $cachedPlugins = PluginsCollection::create(...$pluginsList);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $cachedPlugins);
        return $cachedPlugins;
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

        $cacheDir = $this->parameterBag->validateAndGetStringValue(ConfigurationKey::CACHE_DIR);
        if ($cacheDir) {
            $parentDir = dirname($cacheDir);
            if (!is_dir($parentDir)) {
                throw new InvalidConfigurationParameterException(
                    sprintf(
                        "`%s` cannot be created because parent directory `{$parentDir}` does not exist",
                        ConfigurationKey::CACHE_DIR
                    )
                );
            }
            if (!file_exists($cacheDir)) {
                $this->logger->notice("Creating `{$cacheDir}` directory");
                mkdir($cacheDir);
            }
            $cacheDir = realpath($cacheDir);
        }
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
            ConfigurationKey::PAGE_LINK_PROCESSOR,
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
        $gitClientPath = $this->parameterBag->validateAndGetStringValue(ConfigurationKey::GIT_CLIENT_PATH, false);
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
            ConfigurationKey::TWIG_FUNCTIONS,
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
            ConfigurationKey::TWIG_FILTERS,
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
        $useSharedCache = $this->parameterBag->validateAndGetBooleanValue(ConfigurationKey::USE_SHARED_CACHE);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $useSharedCache);
        return $useSharedCache;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function renderWithFrontMatter(): bool
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $renderWithFrontMatter = $this->parameterBag->validateAndGetBooleanValue(ConfigurationKey::RENDER_WITH_FRONT_MATTER);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $renderWithFrontMatter);
        return $renderWithFrontMatter;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function isCheckFileInGitBeforeCreatingDocEnabled(): bool
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $useSharedCache = $this->parameterBag->validateAndGetBooleanValue(ConfigurationKey::CHECK_FILE_IN_GIT_BEFORE_CREATING_DOC);
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

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getAdditionalConsoleCommands(): AdditionalCommandCollection
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $customFilters = $this->parameterBag->validateAndGetClassListValue(
            ConfigurationKey::ADDITIONAL_CONSOLE_COMMANDS,
            Command::class
        );
        $additionalCommandCollection = AdditionalCommandCollection::create(...$customFilters);
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $additionalCommandCollection);
        return $additionalCommandCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getIfExists($key): ?string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $key);
        } catch (ObjectNotFoundException) {
        }

        if (!$this->parameterBag->has($key)) {
            return null;
        }
        $value = $this->parameterBag->validateAndGetStringValue($key, false);

        $this->localObjectCache->cacheMethodResult(__METHOD__, $key, $value);
        return $value;
    }
}
