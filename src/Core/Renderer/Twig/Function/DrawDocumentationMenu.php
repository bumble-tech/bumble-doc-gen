<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Finder\Finder;

use function BumbleDocGen\Core\calculate_relative_url;

/**
 * Generate documentation menu in MD format. To generate the menu, the start page is taken,
 * and all links with this page are recursively collected for it, after which the html menu is created.
 *
 * @note This function initiates the creation of documents for the displayed entities
 * @see GetDocumentedEntityUrl
 *
 * @example {{ drawDocumentationMenu() }} - The menu contains links to all documents
 * @example {{ drawDocumentationMenu('/render/index.md') }} - The menu contains links to all child documents from the /render/index.md file (for example /render/test/index.md)
 * @example {{ drawDocumentationMenu(_self) }} - The menu contains links to all child documents from the file where this function was called
 * @example {{ drawDocumentationMenu(_self, 2) }} - The menu contains links to all child documents from the file where this function was called, but no more than 2 in depth
 */
final class DrawDocumentationMenu implements CustomFunctionInterface
{
    public function __construct(
        private readonly Configuration $configuration,
        private readonly BreadcrumbsHelper $breadcrumbsHelper,
        private readonly RendererContext $rendererContext,
        private readonly RendererDependencyFactory $dependencyFactory,
    ) {
    }

    public static function getName(): string
    {
        return 'drawDocumentationMenu';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
            'needs_context' => true,
        ];
    }

    /**
     * @param array $context
     * @param null|string $startPageKey
     *  Relative path to the page from which the menu will be generated (only child pages will be taken into account).
     *  By default, the main documentation page (readme.md) is used.
     * @param null|int $maxDeep
     *  Maximum parsing depth of documented links starting from the current page.
     *  By default, this restriction is disabled.
     *
     * @return string
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function __invoke(
        array $context,
        ?string $startPageKey = null,
        ?int $maxDeep = null
    ): string {
        if ($startPageKey) {
            $startPageKey = str_replace('.twig', '', $startPageKey);
        }

        $structure = [];
        $templatesDir = $this->configuration->getTemplatesDir();

        $dirDependency = $this->dependencyFactory->createDirectoryDependency($templatesDir);
        $this->rendererContext->addDependency($dirDependency);

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
        }

        $callingTemplate = $context[MainTwigEnvironment::CURRENT_TEMPLATE_NAME_KEY] ?? null;
        if ($callingTemplate) {
            $callingTemplate = "{$this->configuration->getOutputDirBaseUrl()}{$callingTemplate}";
        }

        $drawPages = function (array $pagesData, int $currentDeep = 1) use ($callingTemplate, $structure, $maxDeep, &$drawPages): string {
            $addIndentFromLeft = new AddIndentFromLeft();
            $md = '';
            foreach ($pagesData as $pageData) {
                $md .= "\n- ";
                $url = $pageData['url'];
                if ($callingTemplate) {
                    $url = calculate_relative_url($callingTemplate, $pageData['url']);
                }
                $md .= "[{$pageData['title']}]({$url})";
                if ($structure[$pageData['url']]) {
                    $nextDeep = $currentDeep + 1;
                    if (!$maxDeep || $nextDeep <= $maxDeep) {
                        $md .= "{$addIndentFromLeft($drawPages($structure[$pageData['url']], $nextDeep), 4)}";
                    }
                }
            }
            return $md;
        };

        if ($startPageKey) {
            $startPageKey = str_starts_with('/', $startPageKey) ? $startPageKey : "/{$startPageKey}";
            $startPageKey = str_replace('//', '/', $startPageKey);
            $startPageKey = $this->configuration->getPageLinkProcessor()->getAbsoluteUrl($startPageKey);
        } else {
            $startPageKey = array_key_first($structure);
        }

        return isset($structure[$startPageKey]) ? $drawPages($structure[$startPageKey]) : '';
    }
}
