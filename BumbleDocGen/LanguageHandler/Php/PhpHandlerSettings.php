<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Configuration\ValueGetter\ConfigBooleanValueGetter;
use BumbleDocGen\Core\Configuration\ValueGetter\ConfigClassListValueGetter;
use BumbleDocGen\Core\Configuration\ValueGetter\ConfigClassValueGetter;
use BumbleDocGen\Core\Configuration\ValueGetter\ConfigStringValueGetter;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRenderInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRendersCollection;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFilterInterface;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;

final class PhpHandlerSettings
{
    public const SETTINGS_PREFIX = 'language_handlers.php.settings';
    public const DEFAULT_SETTINGS_FILE = __DIR__ . '/phpHandlerDefaultSettings.yaml';

    public function __construct(
        ConfigurationParameterBag          $parameterBag,
        private ConfigClassListValueGetter $classListValueGetter,
        private ConfigClassValueGetter     $classValueGetter,
        private ConfigBooleanValueGetter   $booleanValueGetter,
        private ConfigStringValueGetter    $stringValueGetter
    )
    {
        $parameterBag->addValueFromFileIfNotExists(
            self::SETTINGS_PREFIX,
            self::DEFAULT_SETTINGS_FILE,
        );
    }

    private function getSettingsKey(string $key): string
    {
        return self::SETTINGS_PREFIX . ".{$key}";
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getClassEntityFilter(): ConditionInterface
    {
        static $classEntityFilter = null;
        if (!$classEntityFilter) {
            /** @var ConditionInterface $classEntityFilter */
            $classEntityFilter = $this->classValueGetter->validateAndGet(
                $this->getSettingsKey('class_filter'),
                ConditionInterface::class
            );
        }
        return $classEntityFilter;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getClassConstantEntityFilter(): ConditionInterface
    {
        static $constantEntityFilter = null;
        if (!$constantEntityFilter) {
            /** @var ConditionInterface $constantEntityFilter */
            $constantEntityFilter = $this->classValueGetter->validateAndGet(
                $this->getSettingsKey('class_constant_filter'),
                ConditionInterface::class
            );
        }
        return $constantEntityFilter;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getMethodEntityFilter(): ConditionInterface
    {
        static $methodEntityFilter = null;
        if (!$methodEntityFilter) {
            /** @var ConditionInterface $methodEntityFilter */
            $methodEntityFilter = $this->classValueGetter->validateAndGet(
                $this->getSettingsKey('method_filter'),
                ConditionInterface::class
            );
        }
        return $methodEntityFilter;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getPropertyEntityFilter(): ConditionInterface
    {
        static $propertyEntityFilter = null;
        if (!$propertyEntityFilter) {
            /** @var ConditionInterface $propertyEntityFilter */
            $propertyEntityFilter = $this->classValueGetter->validateAndGet(
                $this->getSettingsKey('property_filter'),
                ConditionInterface::class
            );
        }
        return $propertyEntityFilter;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityDocRendersCollection(): EntityDocRendersCollection
    {
        static $entityDocRendersCollection = null;
        if (!$entityDocRendersCollection) {
            $entityDocRendersCollection = new EntityDocRendersCollection();
            $entityDocRenders = $this->classListValueGetter->validateAndGet(
                $this->getSettingsKey('doc_renders'),
                EntityDocRenderInterface::class
            );
            foreach ($entityDocRenders as $entityDocRender) {
                $entityDocRendersCollection->add($entityDocRender);
            }
        }
        return $entityDocRendersCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFileSourceBaseUrl(): ?string
    {
        static $fileSourceBaseUrl = -1;
        if ($fileSourceBaseUrl === -1) {
            $fileSourceBaseUrl = $this->stringValueGetter->validateAndGet(
                $this->getSettingsKey('file_source_base_url')
            );
        }
        return $fileSourceBaseUrl;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function asyncSourceLoadingEnabled(): bool
    {
        static $asyncSourceLoadingEnabled = null;
        if (is_null($asyncSourceLoadingEnabled)) {
            $asyncSourceLoadingEnabled = $this->booleanValueGetter->validateAndGet(
                $this->getSettingsKey('async_source_loading_enabled')
            );
        }
        return $asyncSourceLoadingEnabled;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getCustomTwigFunctions(): CustomFunctionsCollection
    {
        static $customFunctionsCollection = null;
        if (!$customFunctionsCollection) {
            $customFunctions = $this->classListValueGetter->validateAndGet(
                $this->getSettingsKey('custom_twig_functions'),
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
    public function getCustomTwigFilters(): CustomFiltersCollection
    {
        static $customFiltersCollection = null;
        if (!$customFiltersCollection) {
            $customFilters = $this->classListValueGetter->validateAndGet(
                $this->getSettingsKey('custom_twig_filters'),
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
