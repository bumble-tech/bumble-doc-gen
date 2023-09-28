<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use DI\DependencyException;
use DI\NotFoundException;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GenerateCommand extends BaseCommand
{
    protected function getCustomConfigOptionsMap(): array
    {
        return [
            'project_root' => 'Path to the directory of the documented project',
            'templates_dir' => 'Path to directory with documentation templates',
            'output_dir' => 'Path to the directory where the finished documentation will be generated',
            'cache_dir' => 'Configuration parameter: Path to the directory where the documentation generator cache will be saved',
        ];
    }

    protected function configure(): void
    {
        $this->setName('generate')->setDescription('Generate documentation');
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
        $docGeneratorFactory = $this->getDocGeneratorFactory($input, $output);
        $configFile = $input->getOption('config');
        if ($configFile && Path::isRelative($configFile)) {
            $configFile = getcwd() . DIRECTORY_SEPARATOR . $configFile;
            $docGeneratorFactory->create($configFile)->generate();
        } else {
            $docGeneratorFactory->create()->generate();
        }

        return self::SUCCESS;
    }
}
