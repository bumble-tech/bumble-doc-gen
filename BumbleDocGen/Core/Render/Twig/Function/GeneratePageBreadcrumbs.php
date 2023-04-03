<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Function;

use BumbleDocGen\Core\Render\Breadcrumbs\BreadcrumbsHelper;

/**
 * Function to generate breadcrumbs on the page
 */
final class GeneratePageBreadcrumbs implements CustomFunctionInterface
{
    public function __construct(private BreadcrumbsHelper $breadcrumbsHelper)
    {
    }

    public static function getName(): string
    {
        return 'generatePageBreadcrumbs';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $currentPageTitle Title of the current page
     * @param string $templatePath Path to the template from which the breadcrumbs will be generated
     * @param bool $skipFirstTemplatePage
     *  If set to true, the page from which parsing starts will not participate in the formation of breadcrumbs
     *  This option is useful when working with the _self value in a template, as it returns the full path to the
     *  current template, and the reference to it in breadcrumbs should not be clickable.
     *
     * @return string
     */
    public function __invoke(
        string $currentPageTitle,
        string $templatePath,
        bool   $skipFirstTemplatePage = true
    ): string
    {
        $content = $this->breadcrumbsHelper->renderBreadcrumbs(
            $currentPageTitle,
            $templatePath,
            !$skipFirstTemplatePage
        );
        return "<embed> {$content} </embed>";
    }
}
