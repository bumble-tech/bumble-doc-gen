<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\BasePhpStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\ComposerStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PhpDocumentorStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PhpUnitStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PsrClassesStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\SymfonyComponentStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\TwigStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\GetClassMethodsBodyCode;
use BumbleDocGen\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\Context\Context;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;

final class PhpHandler implements LanguageHandlerInterface
{
    private function __construct(
        private ConfigurationInterface      $configuration,
        private PhpHandlerSettingsInterface $phpHandlerSettings,
        private Reflector                   $reflector,
        private PluginEventDispatcher       $pluginEventDispatcher
    )
    {
    }

    public static function getLanguageKey(): string
    {
        return 'php';
    }

    public static function create(
        ConfigurationInterface $configuration,
        PhpHandlerSettingsInterface $phpHandlerSettings
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

    public function getEntityCollection(): RootEntityCollection
    {
        return ClassEntityCollection::createByReflector(
            $this->configuration,
            $this->reflector,
            $this->pluginEventDispatcher
        );
    }

    public function getCustomTwigFunctions(Context $context): array
    {
        return [
            new DrawClassMap($context),
            new GetClassMethodsBodyCode($context)
        ];
    }

    public function getCustomTwigFilters(Context $context): array
    {
        return [];
    }

    public function getExtraPlugins(): PluginsCollection
    {
        return PluginsCollection::create(
            new BasePhpStubberPlugin(),
            new TwigStubberPlugin(),
            new PsrClassesStubberPlugin(),
            new ComposerStubberPlugin(),
            new SymfonyComponentStubberPlugin(),
            new PhpUnitStubberPlugin(),
            new PhpDocumentorStubberPlugin()
        );
    }
}
