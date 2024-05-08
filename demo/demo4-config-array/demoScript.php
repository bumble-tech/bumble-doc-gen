#!/usr/bin/env php
<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $docGen = (new \BumbleDocGen\DocGeneratorFactory())
        ->createByConfigArray([
            'project_root' => '%WORKING_DIR%/vendor/doctrine',
            'demo_dir' => '%WORKING_DIR%/demo/demo4-config-array', // <= custom parameter
            'cache_dir' => '%demo_dir%/.cache',
            'templates_dir' => '%demo_dir%/templates',
            'output_dir' => "%demo_dir%/docs",
            'output_dir_base_url' => "%demo_dir%/docs",
            'check_file_in_git_before_creating_doc' => false,
            'language_handlers' => [
                'php' => [
                    'class' => \BumbleDocGen\LanguageHandler\Php\PhpHandler::class,
                ]
            ],
            'source_locators' => [
                [
                    'class' => \BumbleDocGen\Core\Parser\SourceLocator\RecursiveDirectoriesSourceLocator::class,
                    'arguments' => [
                        'directories' => [
                            '%project_root%'
                        ]
                    ]
                ]
            ],
        ]);
    $docGen->generate();
} catch (\Exception | \Psr\Cache\InvalidArgumentException $e) {
    die($e->getMessage());
}
