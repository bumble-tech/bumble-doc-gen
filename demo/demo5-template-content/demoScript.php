#!/usr/bin/env php
<?php

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    copyTemplateDir(); // Copy templates dir from demo2-templates-generation if we don't have it already

    $docGen = (new \BumbleDocGen\DocGeneratorFactory())->create(__DIR__ . '/demo-config.yaml');
    $docGen->generateProjectTemplatesStructure();
    $docGen->generateProjectTemplates();
} catch (\Exception | \Psr\Cache\InvalidArgumentException $e) {
    die($e->getMessage());
}

function copyTemplateDir()
{
    $filesystem = new Filesystem();
    $finder = new Finder();
    $targetDir = __DIR__ . '/templates';
    $sourceDir = __DIR__ . '/../demo5-templates-generation/templates';

    if (!$filesystem->exists($targetDir)) {
        $filesystem->mkdir($targetDir);
    } else {
        return;
    }

    $finder->in($sourceDir)->files()->ignoreDotFiles(false);

    foreach ($finder as $file) {
        // Get the relative path of the file
        $relativePath = $file->getRelativePathname();
        // Copy the file to the target directory
        $filesystem->copy($file->getRealPath(), $targetDir . '/' . $relativePath);
    }
}
