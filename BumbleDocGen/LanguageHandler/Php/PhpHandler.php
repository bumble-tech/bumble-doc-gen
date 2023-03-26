<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\PhpSourceLocatorHelper;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\GetClassMethodsBodyCode;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;

final class PhpHandler implements LanguageHandlerInterface
{
    private Reflector $reflector;

    public function __construct(
        private ConfigurationInterface      $configuration,
        private PhpHandlerSettingsInterface $phpHandlerSettings,
        private PluginEventDispatcher       $pluginEventDispatcher
    )
    {
        $betterReflection = (new BetterReflection());
        $sourceLocatorsCollection = $pluginEventDispatcher->dispatch(
            new OnLoadSourceLocatorsCollection($configuration->getSourceLocators())
        )->getSourceLocatorsCollection();

        $locator = $betterReflection->astLocator();
        if (!$phpHandlerSettings->asyncSourceLoadingEnabled()) {
            $sourceLocators[] = PhpSourceLocatorHelper::getReflectorSourceLocator($locator, $sourceLocatorsCollection);
        }
        $sourceLocators[] = $betterReflection->sourceLocator();
        $sourceLocator = new CachedSourceLocator(new AggregateSourceLocator($sourceLocators), $configuration);
        $this->reflector = new DefaultReflector($sourceLocator);
    }

    public static function getLanguageKey(): string
    {
        return 'php';
    }

    public function getEntityCollection(): RootEntityCollection
    {
        return ClassEntityCollection::createByReflector(
            $this->configuration,
            $this->phpHandlerSettings,
            $this->reflector,
            $this->pluginEventDispatcher
        );
    }

    public function getCustomTwigFunctions(Context $context): CustomFunctionsCollection
    {
        return CustomFunctionsCollection::create(
            new DrawClassMap($context),
            new GetClassMethodsBodyCode($context)
        );
    }

    public function getCustomTwigFilters(Context $context): CustomFiltersCollection
    {
        return CustomFiltersCollection::create();
    }
}
