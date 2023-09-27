<?php

declare(strict_types=1);

namespace BumbleDocGen\Console;

use BumbleDocGen\Console\Command\GenerateCommand;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\DocGeneratorFactory;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputOption;

class App extends Application
{
    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __construct()
    {
        parent::__construct('Bumble Doc Gen', \BumbleDocGen\DocGenerator::VERSION);
        $inputDefinition = $this->getDefaultInputDefinition();
        $inputDefinition->addOption(
            new InputOption(
                'config',
                'c',
                InputOption::VALUE_OPTIONAL,
                'Path to the configuration file, specified as absolute or relative to the working directory.',
                'bumble_doc_gen.yaml'
            )
        );
        $this->setDefinition($inputDefinition);
        $this->add(new GenerateCommand());
        $this->setExtraCommands();
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    private function setExtraCommands(): void
    {
        $input = new ArgvInput();
        $input->bind($this->getDefinition());
        $configuration = (new DocGeneratorFactory())->createConfiguration($input->getOption('config'));
        foreach ($configuration->getAdditionalConsoleCommands() as $command) {
            $this->add($command);
        }
    }
}
