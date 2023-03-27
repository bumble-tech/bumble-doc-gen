<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRenderInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRendersCollection;

final class PhpHandlerSettings implements PhpHandlerSettingsInterface
{
    public const SETTINGS_PREFIX = 'language_handlers.php.settings';
    public const DEFAULT_SETTINGS_FILE = __DIR__ . '/phpHandlerDefaultSettings.yaml';

    public function __construct(
        private ValueToClassTransformer   $valueToClassTransformer,
        private ConfigurationParameterBag $parameterBag
    )
    {
        $this->parameterBag->addValueFromFileIfNotExists(
            self::SETTINGS_PREFIX,
            self::DEFAULT_SETTINGS_FILE,
        );
    }

    private function getSettingsKey(string $key): string
    {
        return self::SETTINGS_PREFIX . ".{$key}";
    }

    public function getClassEntityFilter(): ConditionInterface
    {
        static $classEntityFilter = null;
        if (!$classEntityFilter) {
            $filterClassValue = $this->parameterBag->get($this->getSettingsKey('class_filter'));
            $classEntityFilter = $this->valueToClassTransformer->transform($filterClassValue);
            if (!$classEntityFilter) {
                $classEntityFilter = new TrueCondition();
            }
        }
        return $classEntityFilter;
    }

    public function getClassConstantEntityFilter(): ConditionInterface
    {
        static $constantEntityFilter = null;
        if (!$constantEntityFilter) {
            $filterClassConstantValue = $this->parameterBag->get($this->getSettingsKey('class_constant_filter'));
            $constantEntityFilter = $this->valueToClassTransformer->transform($filterClassConstantValue);
            if (!$constantEntityFilter) {
                $constantEntityFilter = new TrueCondition();
            }
        }
        return $constantEntityFilter;
    }

    public function getMethodEntityFilter(): ConditionInterface
    {
        static $methodEntityFilter = null;
        if (!$methodEntityFilter) {
            $filterMethodValue = $this->parameterBag->get($this->getSettingsKey('method_filter'));
            $methodEntityFilter = $this->valueToClassTransformer->transform($filterMethodValue);
            if (!$methodEntityFilter) {
                $methodEntityFilter = new TrueCondition();
            }
        }
        return $methodEntityFilter;
    }

    public function getPropertyEntityFilter(): ConditionInterface
    {
        static $propertyEntityFilter = null;
        if (!$propertyEntityFilter) {
            $filterPropertyValue = $this->parameterBag->get($this->getSettingsKey('property_filter'));
            $propertyEntityFilter = $this->valueToClassTransformer->transform($filterPropertyValue);
            if (!$propertyEntityFilter) {
                $propertyEntityFilter = new TrueCondition();
            }
        }
        return $propertyEntityFilter;
    }

    public function getEntityDocRendersCollection(): EntityDocRendersCollection
    {
        static $entityDocRendersCollection = null;
        if (!$entityDocRendersCollection) {
            $entityDocRendersCollection = new EntityDocRendersCollection();
            $docRendersConfigs = $this->parameterBag->get($this->getSettingsKey('doc_renders'));
            foreach ($docRendersConfigs as $docRendersConfig) {
                $entityDocRender = $this->valueToClassTransformer->transform($docRendersConfig);
                if ($entityDocRender instanceof EntityDocRenderInterface) {
                    $entityDocRendersCollection->add($entityDocRender);
                }
            }
        }
        return $entityDocRendersCollection;
    }

    public function getFileSourceBaseUrl(): ?string
    {
        $fileSourceBaseUrl = $this->parameterBag->get($this->getSettingsKey('file_source_base_url'));
        if (!is_string($fileSourceBaseUrl) && !is_null($fileSourceBaseUrl)) {
            return null;
        }
        return $fileSourceBaseUrl;
    }

    public function asyncSourceLoadingEnabled(): bool
    {
        return (bool)$this->parameterBag->get($this->getSettingsKey('async_source_loading_enabled'));
    }
}
