#!/usr/bin/env php
<?php

use BumbleDocGen\AI\Console\GenerateTemplatesContentCommand;
use BumbleDocGen\AI\Console\InitDocsStructureCommand;
use BumbleDocGen\Console\App;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Finder\Finder;

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $application = new App();

    generateStructureIfNotExists($application);

    $input = new ArrayInput([
        'command' => GenerateTemplatesContentCommand::NAME,
        '--config' => 'demo/demo7-template-content/demo-config.yaml',
        '--provider' => 'openai',
        '--model' => 'gpt-4',
    ]);

    $application->run($input);
} catch (\Exception $e) {
    die($e->getMessage());
}

function generateStructureIfNotExists(App $application): void
{
    $finder = new Finder();
    $targetDir = __DIR__ . '/templates';
    $fileCount = 0;

    if (is_dir($targetDir)) {
        $finder->files()->in($targetDir);
        $fileCount = iterator_count($finder);
    }

    if ($fileCount === 0) {
        $input = new ArrayInput([
            'command' => InitDocsStructureCommand::NAME,
            '--config' => 'demo/demo7-template-content/demo-config.yaml',
            '--provider' => 'openai',
            '--model' => 'gpt-4',
        ]);
        $application->run($input);
    }
}
