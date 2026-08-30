<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Configuration\ReflectionApiConfig;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use DI\DependencyException;
use DI\NotFoundException;

final class PhpReflectionApiConfig extends ReflectionApiConfig
{
    private ConditionInterface $classFilter;
    private ConditionInterface $classConstantFilter;
    private ConditionInterface $methodFilter;
    private ConditionInterface $propertyFilter;
    private bool $useComposerAutoload = true;
    private string $composerConfigFile = '%project_root%/composer.json';
    private string $composerVendorDir = "%project_root%/vendor";
    private array $psr4Map = [];

    private function __construct()
    {
        $this->classFilter = new TrueCondition();
        $this->classConstantFilter = new TrueCondition();
        $this->methodFilter = new TrueCondition();
        $this->propertyFilter = new TrueCondition();
    }

    public static function create(): self
    {
        return new self();
    }

    public function getLanguageHandlerClassName(): string
    {
        return PhpHandler::class;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public static function createByConfiguration(Configuration $configuration): self
    {
        $phpHandler = $configuration->getLanguageHandlersCollection()->get(PhpHandler::class);
        if (!$phpHandler) {
            throw new \RuntimeException();
        }
        $phpHandlerSettings = $phpHandler->getPhpHandlerSettings();

        $self = new self();
        $self->projectRoot = $configuration->getProjectRoot();
        $self->cacheDir = $configuration->getCacheDir();
        $self->useComposerAutoload = $phpHandlerSettings->getUseComposerAutoload();
        $self->composerConfigFile = $phpHandlerSettings->getComposerConfigFile();
        $self->composerVendorDir = $phpHandlerSettings->getComposerVendorDir();
        $self->psr4Map = $phpHandlerSettings->getPsr4Map();
        return $self;
    }

    public function setClassFilter(ConditionInterface $classFilter): void
    {
        $this->classFilter = $classFilter;
    }

    public function setClassConstantFilter(ConditionInterface $classConstantFilter): void
    {
        $this->classConstantFilter = $classConstantFilter;
    }

    public function setPropertyFilter(ConditionInterface $propertyFilter): void
    {
        $this->propertyFilter = $propertyFilter;
    }

    public function setMethodFilter(ConditionInterface $methodFilter): void
    {
        $this->methodFilter = $methodFilter;
    }

    public function useComposerAutoload(): void
    {
        $this->useComposerAutoload = true;
    }

    public function disableComposerAutoload(): void
    {
        $this->useComposerAutoload = false;
    }

    public function setComposerConfigFile(string $composerConfigFile): void
    {
        $this->composerConfigFile = $composerConfigFile;
    }

    public function setComposerVendorPath(string $composerInstalledFile): void
    {
        $this->composerVendorDir = $composerInstalledFile;
    }

    public function setPsr4Map(array $psr4Map): void
    {
        $this->psr4Map = $psr4Map;
    }

    public function toConfigArray(): array
    {
        return [
            'project_root' => $this->getProjectRoot(),
            'cache_dir' => $this->getCacheDir(),
            'language_handlers' => [
                'php' => [
                    'class' => $this->getLanguageHandlerClassName(),
                    'settings' => [
                        'use_composer_autoload' => $this->useComposerAutoload,
                        'composer_config_file' => $this->composerConfigFile,
                        'composer_vendor_dir' => $this->composerVendorDir,
                        'psr4_map' => $this->psr4Map,
                        'class_filter' => $this->classFilter,
                        'class_constant_filter' => $this->classConstantFilter,
                        'method_filter' => $this->methodFilter,
                        'property_filter' => $this->propertyFilter
                    ]
                ]
            ]
        ];
    }
}
