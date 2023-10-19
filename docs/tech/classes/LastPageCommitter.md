<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> LastPageCommitter<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L15">LastPageCommitter</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\CorePlugin\LastPageCommitter;

final class LastPageCommitter implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

<blockquote>Plugin for adding a block with information about the last commit and date of page update to the generated document</blockquote>






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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L17">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $context, \BumbleDocGen\Core\Configuration\Configuration $configuration);
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
            <td>$context</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L30">source code</a></li>
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


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L23">source code</a></li>
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