<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ConstantEntity;
use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\Entity\PropertyEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;
use Psr\Log\LoggerInterface;

interface ConfigurationInterface
{
    public function getProjectRoot(): string;

    public function getSourceLocators(): SourceLocatorsCollection;

    public function getTemplatesDir(): string;

    public function getClassTemplatesDir(): string;

    public function getOutputDir(): string;

    public function getOutputDirBaseUrl(): string;

    public function clearOutputDirBeforeDocGeneration(): bool;

    public function classEntityFilterCondition(ClassEntity $classEntity): ConditionInterface;

    public function classConstantEntityFilterCondition(ConstantEntity $constantEntity): ConditionInterface;

    public function methodEntityFilterCondition(MethodEntity $methodEntity): ConditionInterface;

    public function propertyEntityFilterCondition(PropertyEntity $propertyEntity): ConditionInterface;

    public function getPlugins(): PluginsCollection;

    public function getTemplateFillers(): TemplateFillersCollection;

    public function getLogger(): LoggerInterface;
}
