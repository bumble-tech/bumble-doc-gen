<?php

declare(strict_types=1);

namespace BumbleDocGen;

use Bramus\Monolog\Formatter\ColoredLineFormatter;
use BumbleDocGen\Core\Plugin\CorePlugin\LastPageCommitter\LastPageCommitter;
use BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\PageHtmlLinkerPlugin;
use BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\PageRstLinkerPlugin;
use BumbleDocGen\Core\Plugin\PluginsCollection;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRendersCollection;
use BumbleDocGen\Core\Render\PageLinkProcessor\BasePageLinkProcessor;
use BumbleDocGen\Core\Render\PageLinkProcessor\PageLinkProcessorInterface;
use BumbleDocGen\Core\Render\TemplateFiller\TemplateFillersCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\BasePhpStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\ComposerStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PhpDocumentorStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PhpUnitStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\PsrClassesStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\SymfonyComponentStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber\TwigStubberPlugin;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
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

    public function getPlugins(): PluginsCollection
    {
        return PluginsCollection::create(
            new PageRstLinkerPlugin($this->getLogger()),
            new PageHtmlLinkerPlugin($this->getLogger()),
            new LastPageCommitter(),
            new BasePhpStubberPlugin(),
            new TwigStubberPlugin(),
            new PsrClassesStubberPlugin(),
            new ComposerStubberPlugin(),
            new SymfonyComponentStubberPlugin(),
            new PhpUnitStubberPlugin(),
            new PhpDocumentorStubberPlugin()
        );
    }

    public function getTemplateFillers(): TemplateFillersCollection
    {
        return new TemplateFillersCollection();
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

    public function getPageLinkProcessor(): PageLinkProcessorInterface
    {
        static $pageLinkProcessor = null;
        if (is_null($pageLinkProcessor)) {
            $pageLinkProcessor = new BasePageLinkProcessor($this);
        }
        return $pageLinkProcessor;
    }

    public function getGitClientPath(): string
    {
        return 'git';
    }

    public function getFileSourceBaseUrl(): ?string
    {
        return null;
    }
}
