<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PageRstLinkerPlugin<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/CorePlugin/PageLinker/PageRstLinkerPlugin.php#L23">PageRstLinkerPlugin</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

final class PageRstLinkerPlugin extends \BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

<blockquote>Adds URLs to empty links in rst format;
 Links may contain:
 1) Short entity name
 2) Full entity name
 3) Relative link to the entity file from the root directory of the project
 4) Page title ( title )
 5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 6) Relative reference to the entity document from the root directory of the documentation</blockquote>


<b>Examples of using:</b>

```php
`Existent page name`_ => `Existent page name </docs/some/page/targetPage.rst>`_

```

```php
`Non-existent page name`_ => Non-existent page name

```















<!-- {% endraw %} -->