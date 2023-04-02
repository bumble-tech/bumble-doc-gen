<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;

final class DocGeneratorFactory
{
    private ContainerBuilder $containerBuilder;
    private array $customConfigurationParameters = [];

    public function __construct(
        private string $diConfig = __DIR__ . '/di-config.php'
    )
    {
        $this->containerBuilder = new \DI\ContainerBuilder();
        $this->containerBuilder->useAutowiring(true);
        $this->containerBuilder->addDefinitions($this->diConfig);
    }

    public function setCustomConfigurationParameters(array $customConfigurationParameters): void
    {
        $this->customConfigurationParameters = $customConfigurationParameters;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \Exception
     */
    public function create(string ...$configurationFiles): DocGenerator
    {
        $diContainer = $this->containerBuilder->build();
        /** @var ConfigurationParameterBag $configurationParameterBag */
        $configurationParameterBag = $diContainer->get(ConfigurationParameterBag::class);
        $configurationParameterBag->loadFromFiles(...$configurationFiles);
        $configurationParameterBag->loadFromArray($this->customConfigurationParameters);
        return $diContainer->get(DocGenerator::class);
    }
}
