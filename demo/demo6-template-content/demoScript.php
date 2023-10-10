#!/usr/bin/env php
<?php

use Symfony\Component\Finder\Finder;

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $docGen = (new \BumbleDocGen\DocGeneratorFactory())->create(__DIR__ . '/demo-config.yaml');
    generateTemplateStructureIfNeeded($docGen);
    $docGen->generateProjectTemplates();
} catch (\Exception | \Psr\Cache\InvalidArgumentException $e) {
    die($e->getMessage());
}

function generateTemplateStructureIfNeeded(\BumbleDocGen\DocGenerator $docGen)
{
    $finder = new Finder();
    $targetDir = __DIR__ . '/templates';
    $finder->files()->in($targetDir);
    $fileCount = iterator_count($finder);

    if ($fileCount === 0) {
        $docGen->generateProjectTemplatesStructure();
    }
}
