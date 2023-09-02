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

final class GenerateCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('generate')
            ->setDescription('Generate documentation')
            ->addOption(
                'config',
                'c',
                InputOption::VALUE_OPTIONAL,
                'Path to the configuration file, specified as absolute or relative to the working directory.',
                'bumble_doc_gen.yaml'
            );
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidArgumentException
     */
    protected function execute(
        \Symfony\Component\Console\Input\InputInterface $input,
        \Symfony\Component\Console\Output\OutputInterface $output
    ): int {
        $configFile = $input->getOption('config');
        if (Path::isRelative($configFile)) {
            $configFile = getcwd() . DIRECTORY_SEPARATOR . $configFile;
        }
        $docGenerator = (new DocGeneratorFactory())->create($configFile);
        $docGenerator->generate();
        return self::SUCCESS;
    }
}