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
use BumbleDocGen\Plugin\CorePlugin\PageLinker\PageHtmlLinkerPlugin;
use BumbleDocGen\Plugin\CorePlugin\PageLinker\PageRstLinkerPlugin;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;
use BumbleDocGen\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
use BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Basic configuration for project documentation
 */
abstract class BaseConfiguration implements ConfigurationInterface
{
    public function clearOutputDirBeforeDocGeneration(): bool
    {
        return true;
    }

    public function getOutputDir(): string
    {
        return "{$this->getProjectRoot()}{$this->getOutputDirBaseUrl()}";
    }

    public function classConstantEntityFilterCondition(
        ConstantEntity $constantEntity
    ): ConditionInterface
    {
        return new ClassConstantVisibilityCondition(
            $constantEntity, VisibilityConditionModifier::PUBLIC
        );
    }

    public function methodEntityFilterCondition(
        MethodEntity $methodEntity
    ): ConditionInterface
    {
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
    ): ConditionInterface
    {
        return new PropertyVisibilityCondition(
            $propertyEntity, VisibilityConditionModifier::PUBLIC
        );
    }

    public function getPlugins(): PluginsCollection
    {
        return PluginsCollection::create(
            new PageRstLinkerPlugin($this->getLogger()),
            new PageHtmlLinkerPlugin($this->getLogger())
        );
    }

    public function getTemplateFillers(): TemplateFillersCollection
    {
        return new TemplateFillersCollection();
    }

    public function getEntityDocRendersCollection(): EntityDocRendersCollection
    {
        static $entityDocRendersCollection = null;
        if (!$entityDocRendersCollection) {
            $entityDocRendersCollection = new EntityDocRendersCollection();
            $entityDocRendersCollection->add(new PhpClassToMdDocRender());
        }
        return $entityDocRendersCollection;
    }

    public function getCacheDir(): ?string
    {
        return null;
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

    private function getCacheItemPool(string $cacheNamespace): CacheItemPoolInterface
    {
        static $cache = [];
        if (!isset($cache[$cacheNamespace])) {
            $cache[$cacheNamespace] = new FilesystemAdapter($cacheNamespace, 604800, $this->getCacheDir());
        }
        return $cache[$cacheNamespace];
    }

    public function getSourceLocatorCacheItemPool(): CacheItemPoolInterface
    {
        return $this->getCacheItemPool('sourceLocator');
    }

    public function getEntityCacheItemPool(): CacheItemPoolInterface
    {
        return $this->getCacheItemPool('entity');
    }
}
