<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ReflectionApiConfig;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\ProjectParser;
use DI\Container;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Log\LoggerInterface;

final class DocGeneratorFactory
{
    private ContainerBuilder $containerBuilder;
    private array $customConfigurationParameters = [];
    private array $customDefinitions = [];

    public function __construct(
        private string $diConfig = __DIR__ . '/di-config.php'
    ) {
        $this->containerBuilder = new \DI\ContainerBuilder();
        $this->containerBuilder->useAutowiring(true);
        $this->containerBuilder->useAttributes(true);
        $this->containerBuilder->addDefinitions($this->diConfig);
    }

    public function setCustomConfigurationParameters(array $customConfigurationParameters): void
    {
        $this->customConfigurationParameters = $customConfigurationParameters;
    }

    public function setCustomDiDefinitions(array $definitions): void
    {
        $this->customDefinitions = $definitions;
    }

    /**
     * Creates a documentation generator instance using configuration files
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \Exception
     */
    public function create(?string ...$configurationFiles): DocGenerator
    {
        $diContainer = $this->buildDiContainer();
        $logger = $diContainer->get(LoggerInterface::class);
        try {
            /** @var ConfigurationParameterBag $configurationParameterBag */
            $configurationParameterBag = $diContainer->get(ConfigurationParameterBag::class);
            $configurationParameterBag->loadFromFiles(...$configurationFiles);
            $configurationParameterBag->loadFromArray($this->customConfigurationParameters);
            return $diContainer->get(DocGenerator::class);
        } catch (\Exception $e) {
            $logger->error("{$e->getMessage()} ( {$e->getFile()}:{$e->getLine()} )");
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * Creates a documentation generator instance using an array containing the configuration
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \Exception
     */
    public function createByConfigArray(array $config): DocGenerator
    {
        $diContainer = $this->buildDiContainer();
        $logger = $diContainer->get(LoggerInterface::class);
        try {
            /** @var ConfigurationParameterBag $configurationParameterBag */
            $configurationParameterBag = $diContainer->get(ConfigurationParameterBag::class);
            $configurationParameterBag->loadFromArray($config);
            $configurationParameterBag->loadFromArray($this->customConfigurationParameters);
            return $diContainer->get(DocGenerator::class);
        } catch (\Exception $e) {
            $logger->error("{$e->getMessage()} ( {$e->getFile()}:{$e->getLine()} )");
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * Creating a project configuration instance
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \Exception
     */
    public function createConfiguration(string ...$configurationFiles): Configuration
    {
        $diContainer = $this->buildDiContainer();
        $logger = $diContainer->get(LoggerInterface::class);
        try {
            /** @var ConfigurationParameterBag $configurationParameterBag */
            $configurationParameterBag = $diContainer->get(ConfigurationParameterBag::class);
            $configurationParameterBag->loadFromFiles(...$configurationFiles);
            $configurationParameterBag->loadFromArray($this->customConfigurationParameters);
            return $diContainer->get(Configuration::class);
        } catch (\Exception $e) {
            $logger->error("{$e->getMessage()} ( {$e->getFile()}:{$e->getLine()} )");
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * Creating a collection of entities (see `ReflectionAPI`)
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \Exception
     */
    public function createRootEntitiesCollection(ReflectionApiConfig $reflectionApiConfig): RootEntityCollection
    {
        $diContainer = $this->buildDiContainer();
        $logger = $diContainer->get(LoggerInterface::class);
        try {
            /** @var ConfigurationParameterBag $configurationParameterBag */
            $configurationParameterBag = $diContainer->get(ConfigurationParameterBag::class);
            $configurationParameterBag->loadFromArray($reflectionApiConfig->toConfigArray());
            $entitiesCollection =  $diContainer->get(ProjectParser::class)->getEntityCollectionForPL(
                $reflectionApiConfig->getLanguageHandlerClassName()
            );
        } catch (\Exception $e) {
            $logger->error("{$e->getMessage()} ( {$e->getFile()}:{$e->getLine()} )");
            throw new \RuntimeException($e->getMessage());
        }
        if (!$entitiesCollection) {
            throw new \InvalidArgumentException('The collection could not be created');
        }
        return $entitiesCollection;
    }

    /**
     * @throws \Exception
     */
    private function buildDiContainer(): Container
    {
        $diContainer = $this->containerBuilder->build();
        foreach ($this->customDefinitions as $name => $definition) {
            $diContainer->set($name, $definition);
        }
        return $diContainer;
    }
}
