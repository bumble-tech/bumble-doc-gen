<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/02_parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/02_parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> RootEntityCollectionsGroup<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L10">RootEntityCollectionsGroup</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

final class RootEntityCollectionsGroup implements \IteratorAggregate
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
    </li>
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
    <a href="#mloadbylanguagehandlers">loadByLanguageHandlers</a>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L36">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L46">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L41">source code</a></li>
</ul>

```php
public function get(string $collectionName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L17">source code</a></li>
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
<li><a name="mgetoperationslog" href="#mgetoperationslog">#</a>
 <b>getOperationsLog</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L55">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L68">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L82">source code</a></li>
</ul>

```php
public function isFoundEntitiesOperationsLogCacheOutdated(array $entitiesCollectionOperationsLog): bool;
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
            <td>$entitiesCollectionOperationsLog</td>
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
<li><a name="mloadbylanguagehandlers" href="#mloadbylanguagehandlers">#</a>
 <b>loadByLanguageHandlers</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L22">source code</a></li>
</ul>

```php
public function loadByLanguageHandlers(\BumbleDocGen\LanguageHandler\LanguageHandlersCollection $languageHandlersCollection, \BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionGroupLoadEntitiesResult;
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
            <td>$languageHandlersCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlersCollection.php'>\BumbleDocGen\LanguageHandler\LanguageHandlersCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$progressBar</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php'>\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionGroupLoadEntitiesResult.php'>\BumbleDocGen\Core\Parser\Entity\CollectionGroupLoadEntitiesResult</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mupdateallentitiescache" href="#mupdateallentitiescache">#</a>
 <b>updateAllEntitiesCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L96">source code</a></li>
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
