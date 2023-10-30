<?php

declare(strict_types=1);

namespace BumbleDocGen\Console;

use BumbleDocGen\AI\Console\AddDocBlocksCommand;
use BumbleDocGen\AI\Console\GenerateReadMeTemplateCommand;
use BumbleDocGen\AI\Console\InitDocsStructureCommand;
use BumbleDocGen\AI\Console\GenerateTemplatesContentCommand;
use BumbleDocGen\Console\Command\GenerateCommand;
use BumbleDocGen\DocGeneratorFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\CompleteCommand;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputOption;

class App extends Application
{
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
        $this->add(new GenerateReadMeTemplateCommand());
        $this->add(new AddDocBlocksCommand());
        $this->add(new InitDocsStructureCommand());
        $this->add(new GenerateTemplatesContentCommand());
        $this->setExtraCommands();
    }

    protected function getDefaultCommands(): array
    {
        return [new HelpCommand(), new ListCommand(), new CompleteCommand()];
    }

    private function setExtraCommands(): void
    {
        try {
            $input = new ArgvInput();
            $input->bind($this->getDefinition());
            $configuration = (new DocGeneratorFactory())->createConfiguration($input->getOption('config'));
            foreach ($configuration->getAdditionalConsoleCommands() as $command) {
                $this->add($command);
            }
        } catch (\Exception) {
        }
    }
}
