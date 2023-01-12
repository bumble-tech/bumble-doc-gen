<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;

/**
 * Generate documentation menu in HTML or rst format. To generate the menu, the start page is taken,
 * and all links with this page are recursively collected for it, after which the html menu is created.
 *
 * @note This function initiates the creation of documents for the displayed classes
 * @see GetDocumentedClassUrl
 *
 * @example {{ drawDocumentationMenu() }}
 * @example {{ drawDocumentationMenu('/render/index.rst') }}
 * @example {{ drawDocumentationMenu(_self) }}
 */
final class DrawDocumentationMenu
{
    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    /**
     * @param null|string $startPageKey
     *  Relative path to the page from which the menu will be generated (only child pages will be taken into account).
     *  By default, the main documentation page is used.
     * @param null|int $maxDeep
     *  Maximum parsing depth of documented links starting from the current page.
     *  By default, this restriction is disabled.
     *
     * @return string
     */
    public function __invoke(?string $startPageKey = null, ?int $maxDeep = null): string
    {
        if ($startPageKey) {
            $startPageKey = str_replace('.twig', '', $startPageKey);
        }

        $structure = [];
        $breadcrumbsHelper = $this->context->getBreadcrumbsHelper();
        $templatesDir = $this->context->getConfiguration()->getTemplatesDir();

        $allFiles = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $templatesDir, \FilesystemIterator::SKIP_DOTS
            )
        );
        foreach ($allFiles as $file) {
            /**@var \SplFileInfo $file */
            $filePatch = str_replace($templatesDir, '', $file->getRealPath());
            if (!str_ends_with($filePatch, '.twig')) {
                continue;
            }
            $pageKey = null;
            foreach ($breadcrumbsHelper->getBreadcrumbs($filePatch) as $breadcrumb) {
                if (!is_null($pageKey)) {
                    $structure[$pageKey][$breadcrumb['url']] = $breadcrumb;
                }
                $pageKey = $breadcrumb['url'];
                $structure[$pageKey] ??= [];
            }
        }

        $drawPages = function (array $pagesData, int $currentDeep = 1) use ($structure, $maxDeep, &$drawPages): string {
            ksort($pagesData);
            $html = ' <ul>';
            foreach ($pagesData as $pageData) {
                $html .= "<li>";
                $html .= "<div><a href='{$pageData['url']}'>{$pageData['title']}</a></div>";
                if ($structure[$pageData['url']]) {
                    $nextDeep = $currentDeep + 1;
                    if (!$maxDeep || $nextDeep <= $maxDeep) {
                        $html .= "<div>{$drawPages($structure[$pageData['url']], $nextDeep)}</div>";
                    }
                }
                $html .= "</li>";
            }
            $html .= "</ul>";
            return $html;
        };

        if ($startPageKey) {
            $startPageKey = str_starts_with('/', $startPageKey) ? $startPageKey : "/{$startPageKey}";
            $outputDir = $this->context->getConfiguration()->getOutputDirBaseUrl();
            $startPageKey = str_replace($outputDir, '', $startPageKey);
            $startPageKey = str_replace('//', '/', $outputDir . $startPageKey);
        } else {
            $startPageKey = array_key_first($structure);
        }

        $content = isset($structure[$startPageKey]) ? $drawPages($structure[$startPageKey]) : '';
        $content = "<embed> {$content} </embed>";
        if ($this->context->isCurrentTemplateRst()) {
            $htmlToRstFunction = new HtmlToRst();
            return $htmlToRstFunction($content);
        }
        return $content;
    }
}
