<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

/**
 * Adds URLs to empty links in HTML format;
 *  Links may contain:
 *  1) Short entity name
 *  2) Full entity name
 *  3) Relative link to the entity file from the root directory of the project
 *  4) Page title ( title )
 *  5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 *  6) Relative reference to the entity document from the root directory of the documentation
 *
 * @example
 *  <a>Existent page name</a> => <a href="/docs/some/page/targetPage.html">Existent page name</a>
 *
 * @example
 *  <a>Non-existent page name</a> => Non-existent page name
 */
final class PageHtmlLinkerPlugin extends BasePageLinker
{
    protected function getLinkRegEx(): string
    {
        return '/(<a>)([^<>\n]+?)(<\/a>)/m';
    }

    protected function getGroupRegExNumber(): int
    {
        return 2;
    }

    protected function getOutputTemplate(): string
    {
        return '<a href="%url%">%title%</a>';
    }
}
