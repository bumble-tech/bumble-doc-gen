<?php

declare(strict_types=1);

namespace BumbleDocGen;

use Bramus\Monolog\Formatter\ColoredLineFormatter;
use BumbleDocGen\Parser\Entity\ConstantEntity;
use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\Entity\PropertyEntity;
use BumbleDocGen\Parser\FilterCondition\ClassConstantFilterCondition\VisibilityCondition as ClassConstantVisibilityCondition;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\Parser\FilterCondition\ConditionGroup;
use BumbleDocGen\Parser\FilterCondition\ConditionGroupTypeEnum;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Parser\FilterCondition\MethodFilterCondition\OnlyFromCurrentClassCondition as MethodOnlyFromCurrentClassCondition;
use BumbleDocGen\Parser\FilterCondition\MethodFilterCondition\VisibilityCondition as MethodVisibilityCondition;
use BumbleDocGen\Parser\FilterCondition\PropertyFilterCondition\VisibilityCondition as PropertyVisibilityCondition;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

abstract class BaseConfiguration implements ConfigurationInterface
{
    public function getClassTemplatesDir(): string
    {
        return __DIR__ . '/Render/baseTemplates';
    }

    public function clearOutputDirBeforeDocGeneration(): bool
    {
        return true;
    }

    public function classConstantEntityFilterCondition(
        ConstantEntity $constantEntity
    ): ConditionInterface {
        return new ClassConstantVisibilityCondition(
            $constantEntity, VisibilityConditionModifier::PUBLIC
        );
    }

    public function methodEntityFilterCondition(
        MethodEntity $methodEntity
    ): ConditionInterface {
        return ConditionGroup::create(
            ConditionGroupTypeEnum::AND,
            new MethodVisibilityCondition(
                $methodEntity, VisibilityConditionModifier::PUBLIC
            ),
            new MethodOnlyFromCurrentClassCondition(
                $methodEntity
            )
        );
    }

    public function propertyEntityFilterCondition(
        PropertyEntity $propertyEntity
    ): ConditionInterface {
        return new PropertyVisibilityCondition(
            $propertyEntity, VisibilityConditionModifier::PUBLIC
        );
    }

    public function getPlugins(): PluginsCollection
    {
        return PluginsCollection::create();
    }

    public function getTemplateFillers(): TemplateFillersCollection
    {
        return new TemplateFillersCollection();
    }

    public function getLogger(): LoggerInterface
    {
        static $logger = null;
        if (is_null($logger)) {
            $logger = new Logger('Bumble doc gen');
            $handler = new StreamHandler('php://stdout', Logger::INFO);
            $handler->setFormatter(new ColoredLineFormatter(null, '%level_name%: %message%'));
            $logger->pushHandler($handler);
        }
        return $logger;
    }
}
