#!/usr/bin/env php
<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

$demoConfig = new class extends BumbleDocGen\BaseConfiguration {
    public function getProjectRoot(): string
    {
        return dirname(__DIR__, 2) . '/vendor/doctrine';
    }

    public function getTemplatesDir(): string
    {
        return __DIR__ . '/templates';
    }

    public function getOutputDirBaseUrl(): string
    {
        return '/demo/demo1/result';
    }

    public function getOutputDir(): string
    {
        return dirname(__DIR__, 2) . $this->getOutputDirBaseUrl();
    }

    public function getSourceLocators(): \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection
    {
        return \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection::create(
            new \BumbleDocGen\Core\Parser\SourceLocator\RecursiveDirectoriesSourceLocator([
                $this->getProjectRoot(),
            ]),
        );
    }

    public function classEntityFilterCondition(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $classEntity
    ): \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface {
        return new \BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition();
    }
};

\BumbleDocGen\DocGenerator::generateDocumentation($demoConfig);