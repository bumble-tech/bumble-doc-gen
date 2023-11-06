<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/4.pluginSystem/readme.md">Plugin system</a> <b>/</b> OnCreateDocumentedEntityWrapper<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php#L13">OnCreateDocumentedEntityWrapper</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnCreateDocumentedEntityWrapper extends \Symfony\Contracts\EventDispatcher\Event
```

<blockquote>The event occurs when an entity is added to the list for documentation</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetdocumentedentitywrapper">getDocumentedEntityWrapper</a>
    </li>
<li>
    <a href="#mispropagationstopped">isPropagationStopped</a>
    - <i>Is propagation stopped?</i></li>
<li>
    <a href="#mstoppropagation">stopPropagation</a>
    - <i>Stops the propagation of the event to further event listeners.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php#L15">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper $documentedEntityWrapper);
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
            <td>$documentedEntityWrapper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocumentedentitywrapper" href="#mgetdocumentedentitywrapper">#</a>
 <b>getDocumentedEntityWrapper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php#L20">source code</a></li>
</ul>

```php
public function getDocumentedEntityWrapper(): \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mispropagationstopped" href="#mispropagationstopped">#</a>
 <b>isPropagationStopped</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher-contracts/Event.php#L38">source code</a></li>
</ul>

```php
// Implemented in Symfony\Contracts\EventDispatcher\Event

public function isPropagationStopped(): bool;
```

<blockquote>Is propagation stopped?</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mstoppropagation" href="#mstoppropagation">#</a>
 <b>stopPropagation</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher-contracts/Event.php#L50">source code</a></li>
</ul>

```php
// Implemented in Symfony\Contracts\EventDispatcher\Event

public function stopPropagation(): void;
```

<blockquote>Stops the propagation of the event to further event listeners.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->