<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\DocGeneratorFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\OutputStyle;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class BaseCommand extends Command
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);

        foreach ($this->getCustomConfigOptionsMap() as $optionName => $description) {
            $this->addOption(
                $optionName,
                null,
                InputOption::VALUE_OPTIONAL,
                "<fg=magenta;options=bold>Config parameter:</> {$description}"
            );
        }
    }

    final protected function getDocGeneratorFactory(
        InputInterface $input,
        OutputInterface $output
    ): DocGeneratorFactory {
        $docGeneratorFactory = (new DocGeneratorFactory());
        $docGeneratorFactory->setCustomConfigurationParameters(
            $this->getCustomConfigurationParameters($input)
        );
        $docGeneratorFactory->setCustomDiDefinitions([
            OutputStyle::class => new SymfonyStyle($input, $output),
        ]);

        return $docGeneratorFactory;
    }

    final protected function getCustomConfigurationParameters(InputInterface $input): array
    {
        $customConfigurationParameters = [];
        foreach ($this->getCustomConfigOptionsMap() as $optionName => $description) {
            $optionValue = $input->getOption($optionName);
            if (!is_null($optionValue)) {
                $customConfigurationParameters[$optionName] = $optionValue;
            }
        }
        return $customConfigurationParameters;
    }

    protected function getCustomConfigOptionsMap(): array
    {
        return [];
    }
}
