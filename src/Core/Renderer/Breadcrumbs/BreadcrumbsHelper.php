<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Breadcrumbs;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeLoadAllPagesLinks;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\TemplateFile;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Finder\Finder;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Helper entity for working with breadcrumbs
 */
final class BreadcrumbsHelper
{
    /**
     * The name template of the file that will be the entry point when switching between pages
     */
    public const DEFAULT_PREV_PAGE_NAME_TEMPLATE = '/^((readme|index)\.(rst|md)\.twig)/i';

    private array $keyUsageCount = [];

    /**
     * @param string $prevPageNameTemplate Index page for each child section
     */
    public function __construct(
        private Configuration $configuration,
        private LocalObjectCache $localObjectCache,
        private BreadcrumbsTwigEnvironment $breadcrumbsTwig,
        private PluginEventDispatcher $pluginEventDispatcher,
        private string $prevPageNameTemplate = self::DEFAULT_PREV_PAGE_NAME_TEMPLATE
    ) {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function loadTemplateContent(string $templateName): string
    {
        $filePath = TemplateFile::getTemplatePathByRelativeDocPath(
            $templateName,
            $this->configuration,
            $this->pluginEventDispatcher
        );

        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $filePath);
        } catch (ObjectNotFoundException) {
        }

        $templateContent = file_get_contents($filePath) ?: '';
        $this->localObjectCache->cacheMethodResult(__METHOD__, $filePath, $templateContent);
        return $templateContent;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    private function getPrevPage(string $templateName): ?string
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $templateName);
        } catch (ObjectNotFoundException) {
        }
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(prevPage)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            $prevPageKey = array_reverse($matches[8])[0];
            $prevPage = $this->getPageDocFileByKey($prevPageKey);
            if ($prevPage) {
                $this->localObjectCache->cacheMethodResult(__METHOD__, $templateName, $prevPage);
                return $prevPage;
            }
        }
        $pathParts = explode('/', $templateName);
        array_pop($pathParts);
        array_pop($pathParts);

        $prevPage = null;

        if ($pathParts) {
            $subPath = count($pathParts) > 1 ? implode('/', $pathParts) : '';
            $finder = Finder::create()
                ->name('*.twig')
                ->ignoreVCS(true)
                ->ignoreDotFiles(true)
                ->ignoreUnreadableDirs()
                ->depth(0)
                ->in($this->configuration->getTemplatesDir() . '/' . $subPath);

            $indexFile = null;
            foreach ($finder->files() as $file) {
                $indexFile = $file->getFileName();
                if (preg_match($this->prevPageNameTemplate, $indexFile)) {
                    break;
                }
            }

            if ($indexFile) {
                $prevPage = $subPath . "/{$indexFile}";
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $templateName, $prevPage);
        return $prevPage;
    }

    /**
     * Get the name of a template by its URL.
     * Only templates with .twig extension are processed.
     * The title is parsed from the `title` variable in the template
     *
     * @throws InvalidConfigurationParameterException
     * @example
     *  // variable in template:
     *  // {% set title = 'Some template title' %}
     *
     *  $breadcrumbsHelper->getTemplateTitle() == 'Some template title'; // is true
     */
    public function getTemplateTitle(string $templateName): string
    {
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(title)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            return array_reverse($matches[8])[0];
        }

        return pathinfo($templateName, PATHINFO_FILENAME);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplateLinkKey(string $templateName): ?string
    {
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(linkKey)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            return array_reverse($matches[8])[0];
        }

        return null;
    }

    /**
     * Get breadcrumbs as an array
     *
     * @param string $filePatch
     * @param bool $fromCurrent
     *
     * @return array<int, array{url: string, title: string}>
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getBreadcrumbs(string $filePatch, bool $fromCurrent = true): array
    {
        $breadcrumbs = [];
        do {
            if (!$fromCurrent) {
                $fromCurrent = true;
                continue;
            }
            $filePatch = str_replace('.twig', '', $filePatch);
            $breadcrumbs[] = [
                'url' => $this->configuration->getPageLinkProcessor()->getAbsoluteUrl($filePatch),
                'title' => $this->getTemplateTitle($filePatch),
            ];
        } while ($filePatch = $this->getPrevPage($filePatch));
        return array_reverse($breadcrumbs);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getBreadcrumbsForTemplates(string $filePatch, bool $fromCurrent = true): array
    {
        $breadcrumbs = [];
        do {
            if (!$fromCurrent) {
                $fromCurrent = true;
                continue;
            }
            $filePatch = str_replace('.twig', '', $filePatch);
            $templateFilePatch = TemplateFile::getTemplatePathByRelativeDocPath(
                $filePatch,
                $this->configuration,
                $this->pluginEventDispatcher
            );
            $breadcrumbs[] = [
                'template' => $templateFilePatch,
                'title' => $this->getTemplateTitle($filePatch),
            ];
        } while ($filePatch = $this->getPrevPage($filePatch));
        return array_reverse($breadcrumbs);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getAllPageLinks(): array
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $pageLinks = [];
        $templatesDir = $this->configuration->getTemplatesDir();

        $addLinkKey = function (string $key, $value) use (&$pageLinks) {
            $pageLinks[$key] = $value;
            $this->keyUsageCount[$key] ??= 0;
            ++$this->keyUsageCount[$key];
            if (str_starts_with($key, '/')) {
                $key = ltrim($key, '/');
                $pageLinks[$key] = $value;
                $this->keyUsageCount[$key] ??= 0;
                ++$this->keyUsageCount[$key];
            }
        };

        $event = $this->pluginEventDispatcher->dispatch(new BeforeLoadAllPagesLinks([$templatesDir]));

        $finder = Finder::create()
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->sortByName()
            ->in($event->getTemplatesDirs());

        foreach ($finder->files() as $file) {
            $filePatch = str_replace($event->getTemplatesDirs(), '', $file->getRealPath());
            if (!str_ends_with($filePatch, '.twig')) {
                continue;
            }

            $docFilePatch = str_replace('.twig', '', $filePatch);
            $url = $this->configuration->getPageLinkProcessor()->getAbsoluteUrl($docFilePatch);
            $title = $this->getTemplateTitle($filePatch);

            $value = [
                'url' => $url,
                'title' => $title,
                'doc_file' => $docFilePatch,
            ];

            $addLinkKey($filePatch, $value);
            $addLinkKey($docFilePatch, $value);
            $addLinkKey($url, $value);
            $addLinkKey($title, $value);
            $linkKey = $this->getTemplateLinkKey($filePatch);
            if ($linkKey) {
                $addLinkKey($linkKey, $value);
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $pageLinks);
        return $pageLinks;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPageDataByKey(string $key): ?array
    {
        $pageLinks = $this->getAllPageLinks();
        if (!isset($pageLinks[$key])) {
            return null;
        }

        return $pageLinks[$key];
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPageLinkByKey(string $key): ?string
    {
        $pageData = $this->getPageDataByKey($key);
        return $pageData['url'] ?? null;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPageDocFileByKey(string $key): ?string
    {
        $pageData = $this->getPageDataByKey($key);
        return $pageData['doc_file'] ?? null;
    }

    /**
     * Returns an HTML string with rendered breadcrumbs
     *
     * @throws SyntaxError
     * @throws NotFoundException
     * @throws RuntimeError
     * @throws DependencyException
     * @throws LoaderError
     * @throws InvalidConfigurationParameterException
     */
    public function renderBreadcrumbs(string $currentPageTitle, string $filePatch, bool $fromCurrent = true): string
    {
        return $this->breadcrumbsTwig->render('breadcrumbs.html.twig', [
            'currentPageTitle' => $currentPageTitle,
            'breadcrumbs' => $this->getBreadcrumbs($filePatch, $fromCurrent),
        ]);
    }
}
