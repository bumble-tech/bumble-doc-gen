<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> BasePageLinker<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L18">BasePageLinker</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

abstract class BasePageLinker implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L40">source code</a></li>
</ul>

```php
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
            <td><a href='https://github.com/php-fig/log/blob/master/src/LoggerInterface.php'>Psr\Log\LoggerInterface</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L61">source code</a></li>
</ul>

```php
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
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L48">source code</a></li>
</ul>

```php
public static function getSubscribedEvents(): array;
```

<blockquote>Returns an array of event names this subscriber wants to listen to.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->