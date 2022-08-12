<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Plugin\CustomSourceLocatorInterface;
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
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\PhpInternalSourceLocator;

final class ProjectParser
{
    private function __construct(
        private Reflector $reflector,
        private ConfigurationInterface $configuration,
        private LoggerInterface $logger
    ) {
    }

    public static function create(ConfigurationInterface $configuration): ProjectParser
    {
        $parser = (new \PhpParser\ParserFactory)->create(
            \PhpParser\ParserFactory::PREFER_PHP7
        );

        $locator = (new BetterReflection())->astLocator();
        $customSourceLocators = [];
        foreach ($configuration->getPlugins()->getOnlyForSourceLocator() as $plugin) {
            /** @var CustomSourceLocatorInterface $plugin */
            $customSourceLocators[] = $plugin->getSourceLocator()->convertToReflectorSourceLocator($locator);
        }

        $sourceLocator = new AggregateSourceLocator(
            array_merge(
                $configuration->getSourceLocators()->convertToReflectorSourceLocatorsList($locator),
                [
                    new MemoizingSourceLocator(new AutoloadSourceLocator($locator)),
                    new MemoizingSourceLocator(
                        new PhpInternalSourceLocator(
                            $locator, new PhpStormStubsSourceStubber($parser)
                        )
                    ),
                    new EvaledCodeSourceLocator($locator, new ReflectionSourceStubber()),
                ],
                $customSourceLocators
            )
        );

        $reflector = new DefaultReflector($sourceLocator);
        return new self($reflector, $configuration, $configuration->getLogger());
    }

    public function parse(): ClassEntityCollection
    {
        $attributeParser = new AttributeParser($this->reflector, $this->logger);
        return ClassEntityCollection::createByReflector(
            $this->configuration,
            $this->reflector,
            $attributeParser
        );
    }

    public function getReflector(): Reflector
    {
        return $this->reflector;
    }
}
