<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> LoggableRootEntityCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L13">LoggableRootEntityCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

abstract class LoggableRootEntityCollection extends \BumbleDocGen\Core\Parser\Entity\RootEntityCollection implements \IteratorAggregate, \Traversable
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
    <a href="#mclearoperationslogcollection">clearOperationsLogCollection</a>
    </li>
<li>
    <a href="#mfindentity">findEntity</a>
    </li>
<li>
    <a href="#mget">get</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
<li>
    <a href="#mgetloadedorcreatenew">getLoadedOrCreateNew</a>
    </li>
<li>
    <a href="#mgetoperationslogcollection">getOperationsLogCollection</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L18">source code</a></li>
</ul>

```php
public function __construct();
```



<b>Parameters:</b> not specified



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mclearoperationslogcollection" href="#mclearoperationslogcollection">#</a>
 <b>clearOperationsLogCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L28">source code</a></li>
</ul>

```php
public function clearOperationsLogCollection(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfindentity" href="#mfindentity">#</a>
 <b>findEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L118">source code</a></li>
</ul>

```php
public function findEntity(string $search, bool $useUnsafeKeys = true): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface|null;
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
            <td>$search</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$useUnsafeKeys</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L86">source code</a></li>
</ul>

```php
public function get(string $objectName): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface|null;
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
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L46">source code</a></li>
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
<div class='method_description-block'>

<ul>
<li><a name="mgetloadedorcreatenew" href="#mgetloadedorcreatenew">#</a>
 <b>getLoadedOrCreateNew</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L102">source code</a></li>
</ul>

```php
public function getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
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
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$withAddClassEntityToCollectionEvent</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>



<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/classes/RootEntityInterface.md#mentitydatacanbeloaded">\BumbleDocGen\Core\Parser\Entity\RootEntityInterface::entityDataCanBeLoaded()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoperationslogcollection" href="#mgetoperationslogcollection">#</a>
 <b>getOperationsLogCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/LoggableRootEntityCollection.php#L23">source code</a></li>
</ul>

```php
public function getOperationsLogCollection(): \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection</a>


</div>
<hr>

<!-- {% endraw %} -->