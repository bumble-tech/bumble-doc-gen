#!/usr/bin/env php
<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $docGen = (new \BumbleDocGen\DocGeneratorFactory())->create(__DIR__ . '/demo-config.yaml');
    $docGen->addMissingDocBlocks();
} catch (\Exception | \Psr\Cache\InvalidArgumentException $e) {
    die($e->getMessage());
}
