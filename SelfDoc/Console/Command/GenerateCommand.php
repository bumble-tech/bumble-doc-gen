<?php

declare(strict_types=1);

namespace SelfDoc\Console\Command;

use BumbleDocGen\DocGenerator;
use SelfDoc\Configuration\Configuration;
use Symfony\Component\Console\Command\Command;

final class GenerateCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('generate');
    }

    protected function execute(
        \Symfony\Component\Console\Input\InputInterface $input,
        \Symfony\Component\Console\Output\OutputInterface $output
    ): int {
        $configuration = new Configuration();
        $output->writeln('Parsing documentation process');
        DocGenerator::generateDocumentation($configuration);
        $output->writeln('Documentation updated');
        return self::SUCCESS;
    }
}
