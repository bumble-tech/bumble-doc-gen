<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/twigCustomFunctions.md">Template functions</a> <b>/</b> RootEntityCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L13">RootEntityCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

abstract class RootEntityCollection extends \BumbleDocGen\Core\Parser\Entity\BaseEntityCollection implements \IteratorAggregate, \Traversable
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mfindentity">findEntity</a>
    </li>
<li>
    <a href="#mget">get</a>
    </li>
<li>
    <a href="#mgetentitycollectionname">getEntityCollectionName</a>
    </li>
<li>
    <a href="#mgetentitylinkdata">getEntityLinkData</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
<li>
    <a href="#mgetloadedorcreatenew">getLoadedOrCreateNew</a>
    </li>
<li>
    <a href="#mhas">has</a>
    </li>
<li>
    <a href="#misempty">isEmpty</a>
    </li>
<li>
    <a href="#mremove">remove</a>
    </li>
<li>
    <a href="#mupdateentitiescache">updateEntitiesCache</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mfindentity" href="#mfindentity">#</a>
 <b>findEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L34">source code</a></li>
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

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L21">source code</a></li>
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

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitycollectionname" href="#mgetentitycollectionname">#</a>
 <b>getEntityCollectionName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L26">source code</a></li>
</ul>

```php
public function getEntityCollectionName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitylinkdata" href="#mgetentitylinkdata">#</a>
 <b>getEntityLinkData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L44">source code</a></li>
</ul>

```php
public function getEntityLinkData(string $rawLink, string|null $defaultEntityName = NULL, bool $useUnsafeKeys = true): array;
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
            <td>$rawLink</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Raw link to an entity or entity element</td>
        </tr>
            <tr>
            <td>$defaultEntityName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>Entity name to use if the link does not contain a valid or existing entity name,
 but only a cursor on an entity element</td>
        </tr>
            <tr>
            <td>$useUnsafeKeys</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L11">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L32">source code</a></li>
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

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>



<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/3.renderer/classes/RootEntityInterface.md#mentitydatacanbeloaded">\BumbleDocGen\Core\Parser\Entity\RootEntityInterface::entityDataCanBeLoaded()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhas" href="#mhas">#</a>
 <b>has</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L27">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function has(string $objectName): bool;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misempty" href="#misempty">#</a>
 <b>isEmpty</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L32">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function isEmpty(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremove" href="#mremove">#</a>
 <b>remove</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L22">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function remove(string $objectName): void;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mupdateentitiescache" href="#mupdateentitiescache">#</a>
 <b>updateEntitiesCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L49">source code</a></li>
</ul>

```php
public function updateEntitiesCache(): void;
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