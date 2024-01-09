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

final class ServeCommand extends BaseCommand
{
    protected function getCustomConfigOptionsMap(): array
    {
        return [
            'project_root' => 'Path to the directory of the documented project',
            'templates_dir' => 'Path to directory with documentation templates',
            'use_shared_cache' => 'Enable/disable shared cache when generating documentation <fg=yellow;>(true/false)</>',
        ];
    }

    protected function configure(): void
    {
        $this->setName('serve')
            ->setDescription('Serve documentation')
            ->addOption(
                name: 'use-dev-server',
                mode: InputOption::VALUE_OPTIONAL,
                description: 'Display HTML documentation on dev server. Otherwise update files in output_dir',
                default: 'true'
            )
            ->addOption(
                name: 'dev-server-host',
                mode: InputOption::VALUE_OPTIONAL,
                description: 'Dev server host',
                default: 'localhost'
            )
            ->addOption(
                name: 'dev-server-port',
                mode: InputOption::VALUE_OPTIONAL,
                description: 'Dev server port',
                default: 8085
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
    ): void {
        $asHtml = $input->getOption('use-dev-server');
        if ($asHtml === 'true' || $asHtml === '1') {
            $tmpDir = sys_get_temp_dir() . '/~bumbleDocGen';
            $process = new Process([
                PHP_BINARY,
                dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'vendor/bin/daux',
                'serve',
                "--source={$tmpDir}"
            ]);
            try {
                $filesystem = new Filesystem();
                $filesystem->remove($tmpDir);

                $docGen = $this->createDocGenInstance($input, $output, [
                    'output_dir' => $tmpDir,
                    'render_with_front_matter' => true
                ]);
                $docGen->addPlugin(Daux::class);

                $host = $input->getOption('dev-server-host');
                $port = $input->getOption('dev-server-port');
                $docGen->serve(function () use ($process, $output, $host, $port) {
                    $process->start();
                    $output->writeln("Development server started on: http://{$host}:{$port}/");
                });
            } finally {
                $process->signal(15);
            }
        } else {
            $docGen = $this->createDocGenInstance($input, $output);
            $docGen->serve();
        }
    }
}
