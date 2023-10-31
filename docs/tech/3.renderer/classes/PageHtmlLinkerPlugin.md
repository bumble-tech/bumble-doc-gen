<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/01_templates.md">How to create documentation templates?</a> <b>/</b> <a href="/docs/tech/3.renderer/templatesLinking.md">Linking templates</a> <b>/</b> PageHtmlLinkerPlugin<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/PageHtmlLinkerPlugin.php#L29">PageHtmlLinkerPlugin</a> class:
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
<a x-title="Custom title">\Namespace\ClassName</a> => <a href="/docs/some/page/ClassName.md">Custom title</a>

```

```php
<a>\Namespace\ClassName</a> => <a href="/docs/some/page/ClassName.md">\Namespace\ClassName</a>

```

```php
<a>Non-existent page name</a> => Non-existent page name

```






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mbeforecreatingdocfile">beforeCreatingDocFile</a>
    </li>
<li>
    <a href="#mgetsubscribedevents">getSubscribedEvents</a>
    - <i>Returns an array of event names this subscriber wants to listen to.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L20">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker

public function __construct(\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction, \Psr\Log\LoggerInterface $logger);
```



<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$breadcrumbsHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php'>\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rootEntityCollectionsGroup</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$getDocumentedEntityUrlFunction</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php'>\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='https://github.com/php-fig/log/blob/master/src/LoggerInterface.php'>\Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mbeforecreatingdocfile" href="#mbeforecreatingdocfile">#</a>
 <b>beforeCreatingDocFile</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L73">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker

public function beforeCreatingDocFile(\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile $event): void;
```



<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$event</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/ReflectionException_2.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L60">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker

public static function getSubscribedEvents(): array;
```

<blockquote>Returns an array of event names this subscriber wants to listen to.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->