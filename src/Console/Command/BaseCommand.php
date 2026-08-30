<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\DocGenerator;
use BumbleDocGen\DocGeneratorFactory;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\OutputStyle;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Path;

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

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    protected function createDocGenInstance(
        InputInterface $input,
        OutputInterface $output,
        array $customConfigurationParameters = []
    ): DocGenerator {
        $docGeneratorFactory = (new DocGeneratorFactory());
        $docGeneratorFactory->setCustomConfigurationParameters(
            array_merge($this->getCustomConfigurationParameters($input), $customConfigurationParameters)
        );
        $docGeneratorFactory->setCustomDiDefinitions([
            OutputStyle::class => new SymfonyStyle($input, $output),
        ]);

        $configFile = $input->getOption('config');
        if ($configFile && Path::isRelative($configFile)) {
            $configFile = getcwd() . DIRECTORY_SEPARATOR . $configFile;
            return $docGeneratorFactory->create($configFile);
        }

        return $docGeneratorFactory->create();
    }

    private function prepareCustomConfigurationParameterValue(string $optionName, string $rawValue): string|bool|int|float
    {
        return match ($optionName) {
            'use_shared_cache' => (fn($rawValue): bool => !($rawValue === 'false') && $rawValue)($rawValue),
            default => $rawValue,
        };
    }

    final protected function getCustomConfigurationParameters(InputInterface $input): array
    {
        $customConfigurationParameters = [];
        foreach ($this->getCustomConfigOptionsMap() as $optionName => $description) {
            $optionValue = $input->getOption($optionName);
            if (!is_null($optionValue)) {
                $customConfigurationParameters[$optionName] = $this->prepareCustomConfigurationParameterValue($optionName, $optionValue);
            }
        }
        return $customConfigurationParameters;
    }

    protected function getCustomConfigOptionsMap(): array
    {
        return [];
    }
}
