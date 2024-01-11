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
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;
use Todaymade\Daux\ConfigBuilder;

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
                name: 'as-html',
                mode: InputOption::VALUE_NONE,
                description: 'Display HTML documentation on dev server. Otherwise update files in output_dir',
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
        $asHtml = $input->getOption('as-html');
        if ($asHtml) {
            $tmpDir = sys_get_temp_dir();
            $tmpDocDir = "{$tmpDir}/~bumbleDocGen";
            if (!is_dir($tmpDocDir)) {
                mkdir($tmpDocDir);
            }
            $host = $input->getOption('dev-server-host');
            $port = $input->getOption('dev-server-port');
            $process = $this->createDauxProcess($tmpDir, $tmpDocDir, $input, $output);
            try {
                $filesystem = new Filesystem();
                $filesystem->remove($tmpDocDir);

                $docGen = $this->createDocGenInstance($input, $output, [
                    'output_dir' => $tmpDocDir,
                    'render_with_front_matter' => true
                ]);
                $docGen->addPlugin(Daux::class);

                $docGen->serve(function () use ($process, $output, $host, $port) {
                    $process->start();
                    $output->writeln("Development server started on: http://{$host}:{$port}/");
                }, function () use (&$process, $tmpDir, $tmpDocDir, $input, $output) {
                    $process->stop(0, 9);
                    $process = $this->createDauxProcess($tmpDir, $tmpDocDir, $input, $output);
                    $process->restart();
                });
            } finally {
                $process->stop(0, 9);
            }
        } else {
            $docGen = $this->createDocGenInstance($input, $output);
            $docGen->serve();
        }
    }

    private function createDauxProcess(
        string $tmpConfigDir,
        string $tmpDocDir,
        InputInterface $input,
        OutputInterface $output
    ): Process {
        $builder = ConfigBuilder::withMode(\Todaymade\Daux\Daux::LIVE_MODE);
        $builder->withFormat('html');
        $builder->withDocumentationDirectory($tmpDocDir);
        $builder->withCache(false);
        $daux = new \Todaymade\Daux\Daux($builder->build(), $output);

        $path = "{$tmpConfigDir}/bumbleDocGenDaux.config";
        file_put_contents($path, serialize($daux->getConfig()));

        $host = $input->getOption('dev-server-host');
        $port = $input->getOption('dev-server-port');
        $binary = escapeshellarg((new PhpExecutableFinder())->find(false));

        $script = <<<EOT
                #!/bin/bash
                cd vendor/daux/daux.io
                $binary -S $host:$port index.php
            EOT;

        $process = new Process(['bash', '-c', $script], null, [
            'DAUX_CONFIG' => $path,
            'DAUX_VERBOSITY' => $output->getVerbosity()
        ]);
        $process->setTimeout(3600);
        $process->disableOutput();
        return $process;
    }
}
