<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
use BumbleDocGen\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;

final class PhpHandler implements LanguageHandlerInterface
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private PhpHandlerSettings     $phpHandlerSettings,
        private Reflector              $reflector,
        private PluginEventDispatcher  $pluginEventDispatcher
    )
    {
    }

    public static function getLanguageKey(): string
    {
        return 'php';
    }

    public static function create(
        ConfigurationInterface $configuration,
        PhpHandlerSettings     $phpHandlerSettings
    ): self
    {
        $betterReflection = (new BetterReflection());
        $pluginEventDispatcher = new PluginEventDispatcher($configuration);
        $sourceLocatorsCollection = $pluginEventDispatcher->dispatch(
            new OnLoadSourceLocatorsCollection($configuration->getSourceLocators())
        )->getSourceLocatorsCollection();

        $locator = $betterReflection->astLocator();
        $sourceLocators = $sourceLocatorsCollection->convertToReflectorSourceLocatorsList($locator);
        $sourceLocators[] = $betterReflection->sourceLocator();
        $sourceLocator = new CachedSourceLocator(new AggregateSourceLocator($sourceLocators), $configuration);
        $reflector = new DefaultReflector($sourceLocator);
        return new self($configuration, $phpHandlerSettings, $reflector, $pluginEventDispatcher);
    }

    public function getEntityDocRender(): EntityDocRenderInterface
    {
        return new PhpClassToMdDocRender();
    }

    public function loadEntityCollection(): RootEntityCollection
    {
        return ClassEntityCollection::createByReflector(
            $this->configuration,
            $this->reflector,
            $this->pluginEventDispatcher
        );
    }
}