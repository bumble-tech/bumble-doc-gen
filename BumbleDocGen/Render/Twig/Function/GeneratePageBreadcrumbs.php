<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;

/**
 * Function to generate breadcrumbs on the page
 */
final class GeneratePageBreadcrumbs
{
    /**
     * @param Context $context Render context
     * @param string $templateType The type of string to be generated ( html or rst )
     */
    public function __construct(private Context $context, private string $templateType = 'rst')
    {
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
        bool $skipFirstTemplatePage = true
    ): string {
        $content = $this->context->getBreadcrumbsHelper()->renderBreadcrumbs(
            $currentPageTitle,
            $templatePath,
            !$skipFirstTemplatePage
        );

        if ($this->templateType == 'rst') {
            $htmlToRstFunction = new HtmlToRst();
            return $htmlToRstFunction($content);
        }
        return $content;
    }
}