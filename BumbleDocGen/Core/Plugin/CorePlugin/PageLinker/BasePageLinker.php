<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

use BumbleDocGen\Core\Cache\LocalCache\Exception\InvalidCallContextException;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Render\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Render\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Render\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Log\LoggerInterface;

abstract class BasePageLinker implements PluginInterface
{
    private array $keyUsageCount = [];

    /**
     * Template to search for empty links
     *
     * @example /(`)([^<>\n]+?)(`_)/m
     */
    abstract function getLinkRegEx(): string;

    /**
     * Group number of the regular expression that contains the text that will be used to search for the link
     */
    abstract function getGroupRegExNumber(): int;

    /**
     * Template of the result of processing an empty link by a plugin.
     * Keys %title% and %url% will be replaced with real data
     *
     * @example `%title% <%url%>`_
     */
    abstract function getOutputTemplate(): string;

    public function __construct(
        private Configuration              $configuration,
        private BreadcrumbsHelper          $breadcrumbsHelper,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private GetDocumentedEntityUrl     $getDocumentedEntityUrlFunction,
        private LocalObjectCache           $localObjectCache,
        private LoggerInterface            $logger,
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeCreatingDocFile::class => 'beforeCreatingDocFile',
        ];
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    final public function beforeCreatingDocFile(BeforeCreatingDocFile $event): void
    {
        $pageLinks = $this->getAllPageLinks();

        $content = preg_replace_callback(
            $this->getLinkRegEx(),
            function (array $matches) use ($pageLinks) {
                $linkString = $matches[$this->getGroupRegExNumber()];
                if (array_key_exists($linkString, $pageLinks)) {
                    $breadcrumb = $pageLinks[$linkString];
                    $this->checkKey($linkString, $this->logger);
                    return $this->getFilledOutputTemplate($breadcrumb['title'], $breadcrumb['url']);
                } else {
                    foreach ($this->rootEntityCollectionsGroup as $rootEntityCollection) {
                        $entityUrlData = $rootEntityCollection->gelEntityLinkData($linkString);
                        if ($entityUrlData['entityName'] ?? null) {
                            $getDocumentedEntityUrl = $this->getDocumentedEntityUrlFunction;
                            $entityUrlData['url'] = $getDocumentedEntityUrl(
                                $rootEntityCollection,
                                $entityUrlData['entityName'],
                                $entityUrlData['cursor']
                            );
                            return $this->getFilledOutputTemplate($entityUrlData['title'], $entityUrlData['url']);
                        }
                    }
                }

                $this->logger->warning("PageLinkerPlugin: Key `{$linkString}` not found to get document link.");
                return $linkString;
            },
            $event->getContent()
        );

        $event->setContent($content);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function getAllPageLinks(): array
    {
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult('');
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $pageLinks = [];
        $templatesDir = $this->configuration->getTemplatesDir();

        $addLinkKey = function (string $key, array $breadcrumb) use (&$pageLinks) {
            $this->keyUsageCount[$key] ??= 0;
            ++$this->keyUsageCount[$key];
            $pageLinks[$key] = $breadcrumb;
        };

        /**@var \SplFileInfo[] $allFiles */
        $allFiles = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $templatesDir, \FilesystemIterator::SKIP_DOTS
            )
        );
        foreach ($allFiles as $file) {
            $filePatch = str_replace($templatesDir, '', $file->getRealPath());
            if (!str_ends_with($filePatch, '.twig')) {
                continue;
            }
            foreach ($this->breadcrumbsHelper->getBreadcrumbs($filePatch) as $breadcrumb) {
                $addLinkKey($breadcrumb['url'], $breadcrumb);
                $addLinkKey($breadcrumb['title'], $breadcrumb);
                $linkKey = $this->breadcrumbsHelper->getTemplateLinkKey($filePatch);
                if ($linkKey) {
                    $addLinkKey($linkKey, $breadcrumb);
                }
            }
        }
        $this->localObjectCache->cacheCurrentMethodResultSilently('', $pageLinks);
        return $pageLinks;
    }

    private function checkKey(string $key, LoggerInterface $logger): void
    {
        if (($this->keyUsageCount[$key] ?? 0) > 1) {
            $logger->warning(
                "PageLinkerPlugin: Key `{$key}` refers to multiple templates ({$this->keyUsageCount[$key]}). Use a unique link key to avoid mistakes"
            );
        }
    }

    protected function getFilledOutputTemplate(string $title, string $url): string
    {
        return str_replace(
            ['%title%', '%url%'],
            [$title, $url],
            $this->getOutputTemplate()
        );
    }
}
