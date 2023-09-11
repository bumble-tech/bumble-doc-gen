<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> OperationsCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L9">OperationsCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class OperationsCollection implements \IteratorAggregate, \Traversable
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#m-serialize">__serialize</a>
    </li>
<li>
    <a href="#m-unserialize">__unserialize</a>
    </li>
<li>
    <a href="#madd">add</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
<li>
    <a href="#misfoundentitiescacheoutdated">isFoundEntitiesCacheOutdated</a>
    </li>
<li>
    <a href="#mremovesearchduplicates">removeSearchDuplicates</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-serialize" href="#m-serialize">#</a>
 <b>__serialize</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L130">source code</a></li>
</ul>

```php
public function __serialize(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-unserialize" href="#m-unserialize">#</a>
 <b>__unserialize</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L137">source code</a></li>
</ul>

```php
public function __unserialize(array $data): void;
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
            <td>$data</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L22">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationInterface $operation): void;
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
            <td>$operation</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationInterface.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L17">source code</a></li>
</ul>

```php
public function getIterator(): \Traversable;
```

<blockquote>Retrieve an external iterator</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/class.traversable.php'>\Traversable</a>


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
<li><a name="misfoundentitiescacheoutdated" href="#misfoundentitiescacheoutdated">#</a>
 <b>isFoundEntitiesCacheOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L78">source code</a></li>
</ul>

```php
public function isFoundEntitiesCacheOutdated(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection): bool;
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
            <td>$rootEntityCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovesearchduplicates" href="#mremovesearchduplicates">#</a>
 <b>removeSearchDuplicates</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php#L35">source code</a></li>
</ul>

```php
public function removeSearchDuplicates(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->