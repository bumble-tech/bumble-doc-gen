<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

/**
 * Adds URLs to empty links in rst format;
 *  Links may contain:
 *  1) Short entity name
 *  2) Full entity name
 *  3) Relative link to the entity file from the root directory of the project
 *  4) Page title ( title )
 *  5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 *  6) Relative reference to the entity document from the root directory of the documentation
 *
 * @example
 *  `Existent page name`_ => `Existent page name </docs/some/page/targetPage.rst>`_
 *
 * @example
 *  `Non-existent page name`_ => Non-existent page name
 */
final class PageRstLinkerPlugin extends BasePageLinker
{
    function getLinkRegEx(): string
    {
        return '/(`)([^<>`\n]+?)(`_)/m';
    }

    function getGroupRegExNumber(): int
    {
        return 2;
    }

    function getOutputTemplate(): string
    {
        return "`%title% <%url%>`_";
    }

    protected function getFilledOutputTemplate(string $title, string $url): string
    {
        return str_replace(
            ['%title%', '%url%'],
            [quotemeta($title), $url],
            $this->getOutputTemplate()
        );
    }
}
