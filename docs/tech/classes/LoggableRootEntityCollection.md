<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> LoggableRootEntityCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L13">LoggableRootEntityCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

abstract class LoggableRootEntityCollection extends \BumbleDocGen\Core\Parser\Entity\RootEntityCollection implements \IteratorAggregate
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
    <a href="#mgetentitycollectionname">getEntityCollectionName</a>
    </li>
<li>
    <a href="#mgetentitylinkdata">getEntityLinkData</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    </li>
<li>
    <a href="#mgetloadedorcreatenew">getLoadedOrCreateNew</a>
    </li>
<li>
    <a href="#mgetoperationslogcollection">getOperationsLogCollection</a>
    </li>
<li>
    <a href="#mhas">has</a>
    </li>
<li>
    <a href="#misempty">isEmpty</a>
    </li>
<li>
    <a href="#mloadentities">loadEntities</a>
    </li>
<li>
    <a href="#mloadentitiesbyconfiguration">loadEntitiesByConfiguration</a>
    </li>
<li>
    <a href="#mremove">remove</a>
    </li>
<li>
    <a href="#mtoarray">toArray</a>
    </li>
<li>
    <a href="#mupdateentitiescache">updateEntitiesCache</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L18">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L28">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L118">source code</a></li>
</ul>

```php
public function findEntity(string $search, bool $useUnsafeKeys = true): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L86">source code</a></li>
</ul>

```php
public function get(string $objectName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitycollectionname" href="#mgetentitycollectionname">#</a>
 <b>getEntityCollectionName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L34">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L71">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function getEntityLinkData(string $rawLink, string|null $defaultEntityName = null, bool $useUnsafeKeys = true): array;
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L46">source code</a></li>
</ul>

```php
public function getIterator(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetloadedorcreatenew" href="#mgetloadedorcreatenew">#</a>
 <b>getLoadedOrCreateNew</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L102">source code</a></li>
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
        <a href="/docs/tech/classes/RootEntityInterface_2.md#misentitydatacanbeloaded">\BumbleDocGen\Core\Parser\Entity\RootEntityInterface::isEntityDataCanBeLoaded()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoperationslogcollection" href="#mgetoperationslogcollection">#</a>
 <b>getOperationsLogCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L23">source code</a></li>
</ul>

```php
public function getOperationsLogCollection(): \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection</a>


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
<li><a name="mloadentities" href="#mloadentities">#</a>
 <b>loadEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L28">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function loadEntities(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection $sourceLocatorsCollection, \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface|null $filters = null, \BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
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
            <tr>
            <td>$filters</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php'>\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$progressBar</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php'>\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mloadentitiesbyconfiguration" href="#mloadentitiesbyconfiguration">#</a>
 <b>loadEntitiesByConfiguration</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L26">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function loadEntitiesByConfiguration(\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
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
            <td>$progressBar</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php'>\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult</a>


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
<li><a name="mtoarray" href="#mtoarray">#</a>
 <b>toArray</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L99">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function toArray(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mupdateentitiescache" href="#mupdateentitiescache">#</a>
 <b>updateEntitiesCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L76">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

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