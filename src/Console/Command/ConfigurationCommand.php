<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ConfigurationCommand extends BaseCommand
{
    protected function configure(): void
    {
        $this
            ->setName('configuration')
            ->setDescription('Display list of configured plugins, programming language handlers, etc')
            ->addArgument('key', InputArgument::OPTIONAL, 'Configuration key to display')
        ;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $generator = $this->createDocGenInstance($input, $output);

        $key = $input->getArgument('key');
        if ($key === null) {
            $generator->getConfigurationKeys();
        } else {
            $generator->getConfigurationKey($key);
        }

        return self::SUCCESS;
    }
}
