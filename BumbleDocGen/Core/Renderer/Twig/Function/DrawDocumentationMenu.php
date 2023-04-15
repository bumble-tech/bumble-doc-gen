<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use Symfony\Component\Finder\Finder;

/**
 * Generate documentation menu in HTML format. To generate the menu, the start page is taken,
 * and all links with this page are recursively collected for it, after which the html menu is created.
 *
 * @note This function initiates the creation of documents for the displayed entities
 * @see GetDocumentedEntityUrl
 *
 * @example {{ drawDocumentationMenu() }}
 * @example {{ drawDocumentationMenu('/render/index.mr') }}
 * @example {{ drawDocumentationMenu(_self) }}
 */
final class DrawDocumentationMenu implements CustomFunctionInterface
{
    public function __construct(
        private Configuration     $configuration,
        private BreadcrumbsHelper $breadcrumbsHelper,
        private RendererContext $renderContext
    )
    {
    }

    public static function getName(): string
    {
        return 'drawDocumentationMenu';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
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
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(?string $startPageKey = null, ?int $maxDeep = null): string
    {
        if ($startPageKey) {
            $startPageKey = str_replace('.twig', '', $startPageKey);
        }

        $structure = [];
        $templatesDir = $this->configuration->getTemplatesDir();

        $finder = Finder::create()
            ->name('*.twig')
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->sortByName()
            ->in($templatesDir);

        foreach ($finder->files() as $file) {
            /**@var \SplFileInfo $file */
            $filePatch = str_replace($templatesDir, '', $file->getRealPath());
            $pageKey = null;
            foreach ($this->breadcrumbsHelper->getBreadcrumbs($filePatch) as $breadcrumb) {
                if (!is_null($pageKey)) {
                    $structure[$pageKey][$breadcrumb['url']] = $breadcrumb;
                }
                $pageKey = $breadcrumb['url'];
                $structure[$pageKey] ??= [];
            }
            $this->renderContext->addFileDependency($file->getRealPath());
        }

        $drawPages = function (array $pagesData, int $currentDeep = 1) use ($structure, $maxDeep, &$drawPages): string {
            $html = '<ul>';
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
            $startPageKey = str_replace('//', '/', $startPageKey);
            $startPageKey = $this->configuration->getPageLinkProcessor()->getAbsoluteUrl($startPageKey);
        } else {
            $startPageKey = array_key_first($structure);
        }

        $content = isset($structure[$startPageKey]) ? $drawPages($structure[$startPageKey]) : '';
        return "<embed> {$content} </embed>";
    }
}
