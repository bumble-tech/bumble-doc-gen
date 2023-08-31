<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> EntityDocRenderersCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRenderersCollection.php#L9">EntityDocRenderersCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\EntityDocRenderer;

final class EntityDocRenderersCollection implements \IteratorAggregate, \Traversable
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#madd">add</a>
    </li>
<li>
    <a href="#mgetfirstmatchingrender">getFirstMatchingRender</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRenderersCollection.php#L19">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface $entityDocRenderer): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRenderersCollection;
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
            <td>$entityDocRenderer</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php'>\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRenderersCollection.php'>\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRenderersCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfirstmatchingrender" href="#mgetfirstmatchingrender">#</a>
 <b>getFirstMatchingRender</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRenderersCollection.php#L25">source code</a></li>
</ul>

```php
public function getFirstMatchingRender(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface|null;
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
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php'>\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRenderersCollection.php#L14">source code</a></li>
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