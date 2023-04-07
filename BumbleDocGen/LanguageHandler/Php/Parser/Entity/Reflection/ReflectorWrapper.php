<?php

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\PhpSourceLocatorHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionConstant;
use Roave\BetterReflection\Reflection\ReflectionFunction;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;

final class ReflectorWrapper implements Reflector
{
    private DefaultReflector $reflector;

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(
        Configuration         $configuration,
        PhpHandlerSettings    $phpHandlerSettings,
        PluginEventDispatcher $pluginEventDispatcher,
        BetterReflection      $betterReflection
    )
    {
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

    public function reflectClass(string $identifierName): ReflectionClass
    {
        return $this->reflector->reflectClass($identifierName);
    }

    public function reflectAllClasses(): iterable
    {
        return $this->reflector->reflectAllClasses();
    }

    public function reflectFunction(string $identifierName): ReflectionFunction
    {
        return $this->reflector->reflectFunction($identifierName);
    }

    public function reflectAllFunctions(): iterable
    {
        return $this->reflector->reflectAllFunctions();
    }

    public function reflectConstant(string $identifierName): ReflectionConstant
    {
        return $this->reflector->reflectConstant($identifierName);
    }

    public function reflectAllConstants(): iterable
    {
        return $this->reflector->reflectAllConstants();
    }
}
