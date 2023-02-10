<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Breadcrumbs;

use BumbleDocGen\ConfigurationInterface;
use Symfony\Component\Finder\Finder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Helper class for working with breadcrumbs
 */
final class BreadcrumbsHelper
{
    /**
     * The name template of the file that will be the entry point when switching between pages
     */
    public const DEFAULT_PREV_PAGE_NAME_TEMPLATE = '/^((readme|index)\.(rst|md)\.twig)/';

    /**
     * @param ConfigurationInterface $configuration
     * @param string $prevPageNameTemplate Index page for each child section
     */
    public function __construct(
        private ConfigurationInterface $configuration,
        private string                 $prevPageNameTemplate = self::DEFAULT_PREV_PAGE_NAME_TEMPLATE
    )
    {
    }

    private function loadTemplateContent(string $templateName): string
    {
        static $templateContentCache = [];
        if (!isset($templateContentCache[$templateName])) {
            $outputDir = $this->configuration->getTemplatesDir();
            $filePath = "{$outputDir}{$templateName}";
            if (!file_exists($filePath)) {
                if (!str_ends_with($filePath, '.twig')) {
                    $templateName .= '.twig';
                    $templateContentCache[$templateName] = $this->loadTemplateContent($templateName);
                } else {
                    $templateContentCache[$templateName] = '';
                }
                return $templateContentCache[$templateName];
            }
            $templateContentCache[$templateName] = file_get_contents($filePath);
        }
        return $templateContentCache[$templateName];
    }

    private function getPrevPage(string $templateName): ?string
    {
        static $prevPagesCache = [];
        if (!isset($prevPagesCache[$templateName])) {
            $code = $this->loadTemplateContent($templateName);
            if (preg_match_all('/({%)( ?)(set)( )(prevPage)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
                return array_reverse($matches[8])[0];
            }
            $pathParts = explode('/', $templateName);
            array_pop($pathParts);
            array_pop($pathParts);

            $prevPagesCache[$templateName] = null;

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
                    $prevPagesCache[$templateName] = $subPath . "/{$indexFile}";
                }
            }
        }
        return $prevPagesCache[$templateName];
    }

    /**
     * Get the name of a template by its URL.
     * Only templates with .twig extension are processed.
     * The title is parsed from the `title` variable in the template
     */
    public function getTemplateTitle(string $templateName): string
    {
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(title)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            return array_reverse($matches[8])[0];
        }

        return pathinfo($templateName, PATHINFO_FILENAME);
    }

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
     * Returns an HTML string with rendered breadcrumbs
     */
    public function renderBreadcrumbs(string $currentPageTitle, string $filePatch, bool $fromCurrent = true): string
    {
        static $twig;
        if (!$twig) {
            $loader = new FilesystemLoader([
                __DIR__ . '/templates',
            ]);
            $twig = new Environment($loader);
        }
        return $twig->render('breadcrumbs.html.twig', [
            'currentPageTitle' => $currentPageTitle,
            'breadcrumbs' => $this->getBreadcrumbs($filePatch, $fromCurrent),
        ]);
    }
}
