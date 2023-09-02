<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> RootEntityCollectionsGroup<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L9">RootEntityCollectionsGroup</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

final class RootEntityCollectionsGroup implements \IteratorAggregate, \Traversable
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#madd">add</a>
    </li>
<li>
    <a href="#mclearoperationslog">clearOperationsLog</a>
    </li>
<li>
    <a href="#mget">get</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
<li>
    <a href="#mgetoperationslog">getOperationsLog</a>
    </li>
<li>
    <a href="#mgetoperationslogwithoutduplicates">getOperationsLogWithoutDuplicates</a>
    </li>
<li>
    <a href="#misfoundentitiesoperationslogcacheoutdated">isFoundEntitiesOperationsLogCacheOutdated</a>
    </li>
<li>
    <a href="#mupdateallentitiescache">updateAllEntitiesCache</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L21">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection): void;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mclearoperationslog" href="#mclearoperationslog">#</a>
 <b>clearOperationsLog</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L31">source code</a></li>
</ul>

```php
public function clearOperationsLog(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L26">source code</a></li>
</ul>

```php
public function get(string $collectionName): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection|null;
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
            <td>$collectionName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L16">source code</a></li>
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
<li><a name="mgetoperationslog" href="#mgetoperationslog">#</a>
 <b>getOperationsLog</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L40">source code</a></li>
</ul>

```php
public function getOperationsLog(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoperationslogwithoutduplicates" href="#mgetoperationslogwithoutduplicates">#</a>
 <b>getOperationsLogWithoutDuplicates</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L53">source code</a></li>
</ul>

```php
public function getOperationsLogWithoutDuplicates(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misfoundentitiesoperationslogcacheoutdated" href="#misfoundentitiesoperationslogcacheoutdated">#</a>
 <b>isFoundEntitiesOperationsLogCacheOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L67">source code</a></li>
</ul>

```php
public function isFoundEntitiesOperationsLogCacheOutdated(array $classEntityCollectionOperationsLog): bool;
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
            <td>$classEntityCollectionOperationsLog</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mupdateallentitiescache" href="#mupdateallentitiescache">#</a>
 <b>updateAllEntitiesCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L81">source code</a></li>
</ul>

```php
public function updateAllEntitiesCache(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->