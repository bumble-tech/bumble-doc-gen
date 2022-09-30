<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Render\Context\Context;

final class DrawDocumentationMenu
{
    public function __construct(private Context $context)
    {
    }

    public function __invoke(?string $startPageKey = null, ?int $maxDeep = null): string
    {
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
        return isset($structure[$startPageKey]) ? $drawPages($structure[$startPageKey]) : '';
    }
}
