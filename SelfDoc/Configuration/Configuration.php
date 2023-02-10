<?php

declare(strict_types=1);

namespace SelfDoc\Configuration;

use BumbleDocGen\BaseConfiguration;
use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Parser\SourceLocator\RecursiveDirectoriesSourceLocator;
use BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginsCollection;
use SelfDoc\Configuration\Plugin\TwigFilterClassParser\TwigFilterClassParserPlugin;
use SelfDoc\Configuration\Plugin\TwigFunctionClassParser\TwigFunctionClassParserPlugin;

final class Configuration extends BaseConfiguration
{
    public function getProjectRoot(): string
    {
        return dirname(__DIR__, 2);
    }

    public function getTemplatesDir(): string
    {
        return __DIR__ . '/templates';
    }

    public function getOutputDir(): string
    {
        return "{$this->getProjectRoot()}/docs";
    }

    public function getSourceLocators(): SourceLocatorsCollection
    {
        return SourceLocatorsCollection::create(
            new RecursiveDirectoriesSourceLocator([
                "{$this->getProjectRoot()}/BumbleDocGen",
                "{$this->getProjectRoot()}/SelfDoc",
            ], []),
        );
    }

    public function classEntityFilterCondition(ClassEntity $classEntity): ConditionInterface
    {
        return new TrueCondition();
    }

    public function getPlugins(): PluginsCollection
    {
        $plugins = parent::getPlugins();
        $plugins->add(new TwigFunctionClassParserPlugin());
        $plugins->add(new TwigFilterClassParserPlugin());
        return $plugins;
    }

    public function getCacheDir(): ?string
    {
        return dirname(__DIR__) . '/__cache';
    }

    public function getFileSourceBaseUrl(): ?string
    {
        return 'https://***REMOVED***/blob/master';
    }

    public function getOutputDirBaseUrl(): string
    {
        return 'https://***REMOVED***/pages/bumble-tech/bumble-doc-gen';
    }
}
