#!/usr/bin/env php
<?php

use BumbleDocGen\AI\Console\InitDocsStructureCommand;
use BumbleDocGen\Console\App;
use Symfony\Component\Console\Input\ArrayInput;

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $application = new App();
    $input = new ArrayInput([
        'command' => InitDocsStructureCommand::NAME,
        '--config' => 'demo/demo2-templates-generation/demo-config.yaml',
        '--provider' => 'openai',
        '--model' => 'gpt-4',
    ]);
    $application->run($input);
} catch (\Exception $e) {
    die($e->getMessage());
}
