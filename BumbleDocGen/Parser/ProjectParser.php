<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use Psr\Log\LoggerInterface;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber;
use Roave\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\AutoloadSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\EvaledCodeSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\PhpInternalSourceLocator;

/**
 * Class for project parsing using source locators
 */
final class ProjectParser
{
    private function __construct(
        private Reflector $reflector,
        private ConfigurationInterface $configuration,
        private PluginEventDispatcher $pluginEventDispatcher,
        private LoggerInterface $logger
    ) {
    }

    public static function create(
        ConfigurationInterface $configuration,
        PluginEventDispatcher $pluginEventDispatcher
    ): ProjectParser {
        $parser = (new \PhpParser\ParserFactory)->create(
            \PhpParser\ParserFactory::PREFER_PHP7
        );

        $sourceLocatorsCollection = $pluginEventDispatcher->dispatch(
            new OnLoadSourceLocatorsCollection($configuration->getSourceLocators())
        )->getSourceLocatorsCollection();

        $locator = (new BetterReflection())->astLocator();

        $sourceLocator = new AggregateSourceLocator(
            array_merge(
                $sourceLocatorsCollection->convertToReflectorSourceLocatorsList($locator),
                [
                    new CachedSourceLocator(
                        new AutoloadSourceLocator($locator), $configuration->getSourceLocatorCacheItemPool()
                    ),
                    new CachedSourceLocator(
                        new PhpInternalSourceLocator(
                            $locator, new PhpStormStubsSourceStubber($parser)
                        ), $configuration->getSourceLocatorCacheItemPool()
                    ),
                    new EvaledCodeSourceLocator($locator, new ReflectionSourceStubber()),
                ],
            )
        );

        $reflector = new DefaultReflector($sourceLocator);
        return new self($reflector, $configuration, $pluginEventDispatcher, $configuration->getLogger());
    }

    public function parse(): ClassEntityCollection
    {
        $attributeParser = new AttributeParser($this->reflector, $this->logger);
        return ClassEntityCollection::createByReflector(
            $this->configuration,
            $this->reflector,
            $attributeParser,
            $this->pluginEventDispatcher
        );
    }

    public function getReflector(): Reflector
    {
        return $this->reflector;
    }
}
