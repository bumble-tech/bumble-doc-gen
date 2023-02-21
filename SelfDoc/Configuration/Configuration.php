<?php

declare(strict_types=1);

namespace SelfDoc\Configuration;

use BumbleDocGen\BaseConfiguration;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\PhpHandler;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\BasePhpStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\ComposerStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PhpDocumentorStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PhpUnitStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PsrClassesStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\SymfonyComponentStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\TwigStubberPlugin;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Parser\SourceLocator\RecursiveDirectoriesSourceLocator;
use BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\PageLinkProcessor\BasePageLinkProcessor;
use BumbleDocGen\Render\PageLinkProcessor\PageLinkProcessorInterface;
use SelfDoc\Configuration\Plugin\RoaveStubber\BetterReflectionStubberPlugin;
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
        $plugins->add(
            new BasePhpStubberPlugin(),
            new TwigStubberPlugin(),
            new PsrClassesStubberPlugin(),
            new ComposerStubberPlugin(),
            new SymfonyComponentStubberPlugin(),
            new PhpUnitStubberPlugin(),
            new PhpDocumentorStubberPlugin(),
            new TwigFunctionClassParserPlugin(),
            new TwigFilterClassParserPlugin(),
            new BetterReflectionStubberPlugin()
        );
        return $plugins;
    }

    public function getCacheDir(): ?string
    {
        return dirname(__DIR__) . '/__cache';
    }

    public function getPageLinkProcessor(): PageLinkProcessorInterface
    {
        static $pageLinkProcessor = null;
        if (is_null($pageLinkProcessor)) {
            $pageLinkProcessor = new BasePageLinkProcessor($this);
        }
        return $pageLinkProcessor;
    }

    public function getLanguageHandlersCollection(PluginEventDispatcher $pluginEventDispatcher): LanguageHandlersCollection
    {
        static $languageHandlersCollection = null;
        if (is_null($languageHandlersCollection)) {
            return LanguageHandlersCollection::create(
                PhpHandler::create($this, new PhpHandlerSettings(), $pluginEventDispatcher)
            );
        }
        return $languageHandlersCollection;
    }

    public function getFileSourceBaseUrl(): ?string
    {
        return 'https://***REMOVED***/blob/master';
    }

    public function getOutputDirBaseUrl(): string
    {
        //return 'https://***REMOVED***/pages/bumble-tech/bumble-doc-gen';
        return "/docs";
    }
}
