<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/1.configuration/readme.md">Configuration files</a> <b>/</b> DocumentedEntityWrappersCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L10">DocumentedEntityWrappersCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Context;

final class DocumentedEntityWrappersCollection implements \IteratorAggregate, \Traversable, \Countable
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
    <a href="#mcount">count</a>
    - <i>Count elements of an object</i></li>
<li>
    <a href="#mcreateandadddocumentedentitywrapper">createAndAddDocumentedEntityWrapper</a>
    </li>
<li>
    <a href="#mgetdocumentedentitiesrelations">getDocumentedEntitiesRelations</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L17">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache);
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
            <td>$rendererContext</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcount" href="#mcount">#</a>
 <b>count</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L58">source code</a></li>
</ul>

```php
public function count(): int;
```

<blockquote>Count elements of an object</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/countable.count.php">https://php.net/manual/en/countable.count.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreateandadddocumentedentitywrapper" href="#mcreateandadddocumentedentitywrapper">#</a>
 <b>createAndAddDocumentedEntityWrapper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L33">source code</a></li>
</ul>

```php
public function createAndAddDocumentedEntityWrapper(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $rootEntity): \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
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
            <td>$rootEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocumentedentitiesrelations" href="#mgetdocumentedentitiesrelations">#</a>
 <b>getDocumentedEntitiesRelations</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L53">source code</a></li>
</ul>

```php
public function getDocumentedEntitiesRelations(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L23">source code</a></li>
</ul>

```php
public function getIterator(): \Generator;
```

<blockquote>Retrieve an external iterator</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a> - on failure. </li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/iteratoraggregate.getiterator.php">https://php.net/manual/en/iteratoraggregate.getiterator.php</a>    </li>
</ul>
</div>
<hr>

<!-- {% endraw %} -->