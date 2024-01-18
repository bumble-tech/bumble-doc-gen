<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

/**
 * Adds URLs to empty links in MD format;
 *  Links may contain:
 *  1) Short entity name
 *  2) Full entity name
 *  3) Relative link to the entity file from the root directory of the project
 *  4) Page title ( title )
 *  5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 *  6) Relative reference to the entity document from the root directory of the documentation
 *
 * @example
 *  [a]Existent page name[/a] => [Existent page name](/docs/some/page/targetPage.md)
 *
 * @example
 *  [a x-title="Custom title"]\Namespace\ClassName[/a] => [Custom title](/docs/some/page/ClassName.md)
 *
 * @example
 *  [a]\Namespace\ClassName[/a] => [\Namespace\ClassName](/docs/some/page/ClassName.md)
 *
 * @example
 *  [a]Non-existent page name[/a] => Non-existent page name
 */
final class PageLinkerPlugin extends BasePageLinker
{
    protected function getLinkRegEx(): string
    {
        return '/(\\[a(?![^>]*\bhref\b)[^\\]]*\\])(.*?)(\\[\/a\\])/m';
    }

    protected function getUrlFromMatch(string $match): string
    {
        preg_match($this->getLinkRegEx(), $match, $m);
        return $m[2] ?? '#';
    }

    protected function getCustomTitleFromMatch(string $match): string
    {
        preg_match('/(x-title=("|\')(.*?)("|\'))/', $match, $m);
        return $m[3] ?? '';
    }

    protected function getOutputTemplate(): string
    {
        return '[%title%](%url%)';
    }
}
