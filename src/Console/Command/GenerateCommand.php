<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\DocGeneratorFactory;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GenerateCommand extends Command
{
    private array $customConfigOptions = [
        'project_root' => 'Path to the directory of the documented project',
        'templates_dir' => 'Path to directory with documentation templates',
        'output_dir' => 'Path to the directory where the finished documentation will be generated',
        'cache_dir' => 'Configuration parameter: Path to the directory where the documentation generator cache will be saved',
    ];

    protected function configure(): void
    {
        $this->setName('generate')
            ->setDescription('Generate documentation')
            ->addOption(
                'config',
                'c',
                InputOption::VALUE_NEGATABLE,
                'Path to the configuration file, specified as absolute or relative to the working directory <fg=yellow;>[default: "bumble_doc_gen.yaml"]</>',
                'bumble_doc_gen.yaml'
            );

        foreach ($this->customConfigOptions as $optionName => $description) {
            $this->addOption(
                $optionName,
                null,
                InputOption::VALUE_OPTIONAL,
                "<fg=magenta;options=bold>Config parameter:</> {$description}"
            );
        }
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidArgumentException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $docGeneratorFactory = (new DocGeneratorFactory());
        $docGeneratorFactory->setCustomConfigurationParameters(
            $this->getCustomConfigurationParameters($input)
        );

        $configFile = $input->getOption('config');
        if ($configFile && Path::isRelative($configFile)) {
            $configFile = getcwd() . DIRECTORY_SEPARATOR . $configFile;
            $docGeneratorFactory->create($configFile)->generate();
        } else {
            $docGeneratorFactory->create()->generate();
        }

        return self::SUCCESS;
    }

    private function getCustomConfigurationParameters(InputInterface $input): array
    {
        $customConfigurationParameters = [];
        foreach ($this->customConfigOptions as $optionName => $description) {
            $optionValue = $input->getOption($optionName);
            if (!is_null($optionValue)) {
                $customConfigurationParameters[$optionName] = $optionValue;
            }
        }
        return $customConfigurationParameters;
    }
}
