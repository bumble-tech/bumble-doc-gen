<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tectalic\OpenAi\ClientException;

final class FillInReadmeMdTemplateCommand extends BaseCommand
{
    protected function getCustomConfigOptionsMap(): array
    {
        return [
            'project_root' => 'Path to the directory of the documented project',
            'templates_dir' => 'Path to directory with documentation templates',
            'cache_dir' => 'Configuration parameter: Path to the directory where the documentation generator cache will be saved',
        ];
    }

    protected function configure(): void
    {
        $this->setName('ai-fill-in-readme-md-template')
            ->setDescription('Filling the readme file template with data using LLMs tools');
    }

    /**
     * @throws InvalidArgumentException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws ClientException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $docGeneratorFactory = $this->getDocGeneratorFactory($input, $output);
        $configFile = $input->getOption('config');
        if ($configFile && Path::isRelative($configFile)) {
            $configFile = getcwd() . DIRECTORY_SEPARATOR . $configFile;
            $docGeneratorFactory->create($configFile)->fillInReadmeMdTemplate();
        } else {
            $docGeneratorFactory->create()->generate();
        }

        return self::SUCCESS;
    }
}
