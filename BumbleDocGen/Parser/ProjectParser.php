<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;

/**
 * Class for project parsing using source locators
 */
final class ProjectParser
{
    private function __construct(
        private Reflector              $reflector,
        private ConfigurationInterface $configuration,
        private PluginEventDispatcher  $pluginEventDispatcher
    )
    {
    }

    public static function create(
        ConfigurationInterface $configuration,
        PluginEventDispatcher  $pluginEventDispatcher
    ): ProjectParser
    {
        $betterReflection = (new BetterReflection());

        $sourceLocatorsCollection = $pluginEventDispatcher->dispatch(
            new OnLoadSourceLocatorsCollection($configuration->getSourceLocators())
        )->getSourceLocatorsCollection();

        $locator = $betterReflection->astLocator();
        $sourceLocators = $sourceLocatorsCollection->convertToReflectorSourceLocatorsList($locator);
        $sourceLocators[] = $betterReflection->sourceLocator();
        $sourceLocator = new CachedSourceLocator(new AggregateSourceLocator($sourceLocators), $configuration);

        $reflector = new DefaultReflector($sourceLocator);
        return new self($reflector, $configuration, $pluginEventDispatcher);
    }

    public function parse(): ClassEntityCollection
    {
        return ClassEntityCollection::createByReflector(
            $this->configuration,
            $this->reflector,
            $this->pluginEventDispatcher
        );
    }
}
