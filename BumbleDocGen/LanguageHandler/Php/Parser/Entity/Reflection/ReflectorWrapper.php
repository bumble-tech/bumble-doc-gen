<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection;

use BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Parser\OnLoadSourceLocatorsCollection;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\CustomSourceLocatorInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\CachedSourceLocator;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionConstant;
use Roave\BetterReflection\Reflection\ReflectionFunction;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;

final class ReflectorWrapper implements Reflector
{
    private ?DefaultReflector $reflector = null;

    public function __construct(
        private Configuration              $configuration,
        private PhpHandlerSettings         $phpHandlerSettings,
        private PluginEventDispatcher      $pluginEventDispatcher,
        private BetterReflection           $betterReflection,
        private SourceLocatorCacheItemPool $sourceLocatorCache
    )
    {
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    private function getReflector(): DefaultReflector
    {
        if (!$this->reflector) {
            $sourceLocatorsCollection = $this->pluginEventDispatcher->dispatch(
                new OnLoadSourceLocatorsCollection($this->configuration->getSourceLocators())
            )->getSourceLocatorsCollection();

            $locator = $this->betterReflection->astLocator();

            foreach ($sourceLocatorsCollection as $sourceLocator) {
                if (is_a($sourceLocator, CustomSourceLocatorInterface::class, true)) {
                    $sourceLocators[] = $sourceLocator->getSourceLocator($locator);
                }
            }

            if (!$this->phpHandlerSettings->asyncSourceLoadingEnabled()) {
                $sourceLocators[] = new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
                    new \ArrayIterator(iterator_to_array($sourceLocatorsCollection->getCommonFinder()->getIterator())),
                    $locator
                );
            }
            $sourceLocators[] = $this->betterReflection->sourceLocator();
            $sourceLocator = new CachedSourceLocator(
                new AggregateSourceLocator($sourceLocators),
                $this->configuration,
                $this->sourceLocatorCache
            );
            $this->reflector = new DefaultReflector($sourceLocator);
        }
        return $this->reflector;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function reflectClass(string $identifierName): ReflectionClass
    {
        return $this->getReflector()->reflectClass($identifierName);
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function reflectAllClasses(): iterable
    {
        return $this->getReflector()->reflectAllClasses();
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function reflectFunction(string $identifierName): ReflectionFunction
    {
        return $this->getReflector()->reflectFunction($identifierName);
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function reflectAllFunctions(): iterable
    {
        return $this->getReflector()->reflectAllFunctions();
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function reflectConstant(string $identifierName): ReflectionConstant
    {
        return $this->getReflector()->reflectConstant($identifierName);
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function reflectAllConstants(): iterable
    {
        return $this->getReflector()->reflectAllConstants();
    }
}
