<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\Daux\Daux;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

final class GenerateCommand extends BaseCommand
{
    protected function getCustomConfigOptionsMap(): array
    {
        return [
            'project_root' => 'Path to the directory of the documented project',
            'templates_dir' => 'Path to directory with documentation templates',
            'output_dir' => 'Path to the directory where the finished documentation will be generated',
            'cache_dir' => 'Configuration parameter: Path to the directory where the documentation generator cache will be saved',
            'use_shared_cache' => 'Enable/disable shared cache when generating documentation <fg=yellow;>(true/false)</>',
        ];
    }

    protected function configure(): void
    {
        $this->setName('generate')
            ->setDescription('Generate documentation')
            ->addOption(
                name: 'as-html',
                mode: InputOption::VALUE_NONE,
                description: 'Generate documentation in HTML format',
            );
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidArgumentException
     * @throws InvalidConfigurationParameterException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {

        $asHtml = $input->getOption('as-html');
        if ($asHtml) {
            $tmpDir = sys_get_temp_dir() . '/~bumbleDocGen';
            $filesystem = new Filesystem();
            $filesystem->remove($tmpDir);

            $docGen = $this->createDocGenInstance($input, $output, [
                'output_dir' => $tmpDir
            ]);
            $docGen->addPlugin(Daux::class);
            $docGen->generate();

            $docGen = $this->createDocGenInstance($input, $output)->getConfiguration();
            $process = new Process([
                PHP_BINARY,
                dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'vendor/bin/daux',
                'generate',
                "--source={$tmpDir}",
                "--destination={$docGen->getOutputDir()}/html"
            ]);
            $process->setTty(true);
            $process->run();
        } else {
            $this->createDocGenInstance($input, $output)->generate();
        }

        return self::SUCCESS;
    }
}
