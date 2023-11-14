<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> EntityCacheItemPool<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L13">EntityCacheItemPool</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Cache;

final class EntityCacheItemPool implements \Psr\Cache\CacheItemPoolInterface
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
    <a href="#mclear">clear</a>
    - <i>Deletes all items in the pool.</i></li>
<li>
    <a href="#mcommit">commit</a>
    - <i>Persists any deferred cache items.</i></li>
<li>
    <a href="#mdeleteitem">deleteItem</a>
    - <i>Removes the item from the pool.</i></li>
<li>
    <a href="#mdeleteitems">deleteItems</a>
    - <i>Removes multiple items from the pool.</i></li>
<li>
    <a href="#mgetitem">getItem</a>
    - <i>Returns a Cache Item representing the specified key.</i></li>
<li>
    <a href="#mgetitems">getItems</a>
    - <i>Returns a traversable set of cache items.</i></li>
<li>
    <a href="#mhasitem">hasItem</a>
    - <i>Confirms if the cache contains specified cache item.</i></li>
<li>
    <a href="#msave">save</a>
    - <i>Persists a cache item immediately.</i></li>
<li>
    <a href="#msavedeferred">saveDeferred</a>
    - <i>Sets a cache item to be persisted later.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L20">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration);
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
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mclear" href="#mclear">#</a>
 <b>clear</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L46">source code</a></li>
</ul>

```php
public function clear(): bool;
```

<blockquote>Deletes all items in the pool.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcommit" href="#mcommit">#</a>
 <b>commit</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L71">source code</a></li>
</ul>

```php
public function commit(): bool;
```

<blockquote>Persists any deferred cache items.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdeleteitem" href="#mdeleteitem">#</a>
 <b>deleteItem</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L51">source code</a></li>
</ul>

```php
public function deleteItem(string $key): bool;
```

<blockquote>Removes the item from the pool.</blockquote>

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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The key to delete.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a> - If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException MUST be thrown. </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdeleteitems" href="#mdeleteitems">#</a>
 <b>deleteItems</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L56">source code</a></li>
</ul>

```php
public function deleteItems(array $keys): bool;
```

<blockquote>Removes multiple items from the pool.</blockquote>

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
            <td>$keys</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>string[]</a></td>
            <td>An array of keys that should be removed from the pool.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a> - If any of the keys in $keys are not a legal value a \Psr\Cache\InvalidArgumentException MUST be thrown. </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetitem" href="#mgetitem">#</a>
 <b>getItem</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L31">source code</a></li>
</ul>

```php
public function getItem(string $key): \Psr\Cache\CacheItemInterface;
```

<blockquote>Returns a Cache Item representing the specified key.</blockquote>

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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The key for which to return the corresponding Cache Item.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/php-fig/cache/blob/master/src/CacheItemInterface.php'>\Psr\Cache\CacheItemInterface</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a> - If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException MUST be thrown. </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetitems" href="#mgetitems">#</a>
 <b>getItems</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L36">source code</a></li>
</ul>

```php
public function getItems(array $keys = []): iterable;
```

<blockquote>Returns a traversable set of cache items.</blockquote>

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
            <td>$keys</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>string[]</a></td>
            <td>An indexed array of keys of items to retrieve.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> iterable


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a> - If any of the keys in $keys are not a legal value a \Psr\Cache\InvalidArgumentException MUST be thrown. </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasitem" href="#mhasitem">#</a>
 <b>hasItem</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L41">source code</a></li>
</ul>

```php
public function hasItem(string $key): bool;
```

<blockquote>Confirms if the cache contains specified cache item.</blockquote>

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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The key for which to check existence.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a> - If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException MUST be thrown. </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msave" href="#msave">#</a>
 <b>save</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L61">source code</a></li>
</ul>

```php
public function save(\Psr\Cache\CacheItemInterface $item): bool;
```

<blockquote>Persists a cache item immediately.</blockquote>

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
            <td>$item</td>
            <td><a href='https://github.com/php-fig/cache/blob/master/src/CacheItemInterface.php'>\Psr\Cache\CacheItemInterface</a></td>
            <td>The cache item to save.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msavedeferred" href="#msavedeferred">#</a>
 <b>saveDeferred</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/EntityCacheItemPool.php#L66">source code</a></li>
</ul>

```php
public function saveDeferred(\Psr\Cache\CacheItemInterface $item): bool;
```

<blockquote>Sets a cache item to be persisted later.</blockquote>

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
            <td>$item</td>
            <td><a href='https://github.com/php-fig/cache/blob/master/src/CacheItemInterface.php'>\Psr\Cache\CacheItemInterface</a></td>
            <td>The cache item to save.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->