<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Breadcrumbs;

use BumbleDocGen\ConfigurationInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Helper class for working with breadcrumbs
 */
final class BreadcrumbsHelper
{
    /**
     * Main documentation page name
     */
    public const DEFAULT_MAIN_PAGE_NAME = 'readme.rst';
    /**
     * The name of the file that will be the entry point when switching between pages
     */
    public const DEFAULT_PREV_PAGE_NAME = 'index.rst';

    /**
     * @param ConfigurationInterface $configuration
     * @param string $mainPageName Main documentation page name
     * @param string $prevPageName Index page for each child section
     */
    public function __construct(
        private ConfigurationInterface $configuration,
        private string $mainPageName = self::DEFAULT_MAIN_PAGE_NAME,
        private string $prevPageName = self::DEFAULT_PREV_PAGE_NAME
    ) {
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
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(prevPage)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            return array_reverse($matches[8])[0];
        }
        $pathParts = explode('/', $templateName);
        array_pop($pathParts);
        array_pop($pathParts);
        $defaultValue = (count($pathParts) == 1 ? $this->mainPageName : $this->prevPageName);
        return $pathParts ? implode('/', $pathParts) . "/{$defaultValue}" : null;
    }

    /**
     * Get the name of a template by its URL.
     * Only templates with .twig extension are processed.
     * The title is parsed from the `title` variable in the template
     *
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
                'url' => $this->configuration->getOutputDirBaseUrl() . $filePatch,
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
