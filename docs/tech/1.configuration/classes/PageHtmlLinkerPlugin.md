<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/1.configuration/readme.md">Configuration files</a> <b>/</b> PageHtmlLinkerPlugin<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/CorePlugin/PageLinker/PageHtmlLinkerPlugin.php#L23">PageHtmlLinkerPlugin</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

final class PageHtmlLinkerPlugin extends \BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

<blockquote>Adds URLs to empty links in HTML format;
 Links may contain:
 1) Short entity name
 2) Full entity name
 3) Relative link to the entity file from the root directory of the project
 4) Page title ( title )
 5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 6) Relative reference to the entity document from the root directory of the documentation</blockquote>


<b>Examples of using:</b>

```php
<a>Existent page name</a> => <a href="/docs/some/page/targetPage.html">Existent page name</a>

```

```php
<a>Non-existent page name</a> => Non-existent page name

```















<!-- {% endraw %} -->