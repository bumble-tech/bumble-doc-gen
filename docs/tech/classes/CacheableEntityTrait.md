<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CacheableEntityTrait<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L10">CacheableEntityTrait</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\Cache;

trait CacheableEntityTrait
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mentitycacheisoutdated">entityCacheIsOutdated</a>
    </li>
<li>
    <a href="#mgetcachekey">getCacheKey</a>
    </li>
<li>
    <a href="#misentitydatacacheoutdated">isEntityDataCacheOutdated</a>
    </li>
<li>
    <a href="#mremovenotusedentitydatacache">removeNotUsedEntityDataCache</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mentitycacheisoutdated" href="#mentitycacheisoutdated">#</a>
 <b>entityCacheIsOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L19">source code</a></li>
</ul>

```php
public function entityCacheIsOutdated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachekey" href="#mgetcachekey">#</a>
 <b>getCacheKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L17">source code</a></li>
</ul>

```php
public function getCacheKey(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitydatacacheoutdated" href="#misentitydatacacheoutdated">#</a>
 <b>isEntityDataCacheOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L60">source code</a></li>
</ul>

```php
public function isEntityDataCacheOutdated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovenotusedentitydatacache" href="#mremovenotusedentitydatacache">#</a>
 <b>removeNotUsedEntityDataCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L80">source code</a></li>
</ul>

```php
public function removeNotUsedEntityDataCache(): void;
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