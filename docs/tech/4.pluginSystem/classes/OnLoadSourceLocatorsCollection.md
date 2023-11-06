<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/4.pluginSystem/readme.md">Plugin system</a> <b>/</b> OnLoadSourceLocatorsCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Parser/OnLoadSourceLocatorsCollection.php#L13">OnLoadSourceLocatorsCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\Event\Parser;

final class OnLoadSourceLocatorsCollection extends \Symfony\Contracts\EventDispatcher\Event
```

<blockquote>Called when source locators are loaded</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetsourcelocatorscollection">getSourceLocatorsCollection</a>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Parser/OnLoadSourceLocatorsCollection.php#L15">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection $sourceLocatorsCollection);
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
            <td>$sourceLocatorsCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsourcelocatorscollection" href="#mgetsourcelocatorscollection">#</a>
 <b>getSourceLocatorsCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Parser/OnLoadSourceLocatorsCollection.php#L19">source code</a></li>
</ul>

```php
public function getSourceLocatorsCollection(): \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection</a>


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