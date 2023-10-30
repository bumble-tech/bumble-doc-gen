#!/usr/bin/env php
<?php

use BumbleDocGen\AI\Console\GenerateReadMeTemplateCommand;
use BumbleDocGen\Console\App;
use Symfony\Component\Console\Input\ArrayInput;

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $application = new App();
    $input = new ArrayInput([
        'command' => GenerateReadMeTemplateCommand::NAME,
        '--config' => 'demo/demo4-generating-readme-file/demo-config.yaml',
        '--provider' => 'openai',
        '--model' => 'gpt-4',
    ]);
    $application->run($input);
} catch (\Exception $e) {
    die($e->getMessage());
}
