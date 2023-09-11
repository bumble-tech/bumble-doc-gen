<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CacheableMethod<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableMethod.php#L11">CacheableMethod</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\Cache;

final class CacheableMethod
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
    <a href="#mgetcachekeygeneratorclass">getCacheKeyGeneratorClass</a>
    </li>
<li>
    <a href="#mgetcacheseconds">getCacheSeconds</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qday-seconds"
               href="#qday-seconds">#</a>
            <code>DAY_SECONDS</code>                   <b>|</b> <a href="/src/Core/Parser/Entity/Cache/CacheableMethod.php#L15">source
                    code</a> </li>
            <li><a name="qhour-seconds"
               href="#qhour-seconds">#</a>
            <code>HOUR_SECONDS</code>                   <b>|</b> <a href="/src/Core/Parser/Entity/Cache/CacheableMethod.php#L14">source
                    code</a> </li>
            <li><a name="qmonth-seconds"
               href="#qmonth-seconds">#</a>
            <code>MONTH_SECONDS</code>                   <b>|</b> <a href="/src/Core/Parser/Entity/Cache/CacheableMethod.php#L16">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableMethod.php#L18">source code</a></li>
</ul>

```php
public function __construct(int $cacheSeconds = \BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod::MONTH_SECONDS, string $cacheKeyGeneratorClass = \BumbleDocGen\Core\Parser\Entity\Cache\CacheKey\DefaultCacheKeyGenerator::class);
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
            <td>$cacheSeconds</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cacheKeyGeneratorClass</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachekeygeneratorclass" href="#mgetcachekeygeneratorclass">#</a>
 <b>getCacheKeyGeneratorClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableMethod.php#L35">source code</a></li>
</ul>

```php
public function getCacheKeyGeneratorClass(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcacheseconds" href="#mgetcacheseconds">#</a>
 <b>getCacheSeconds</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableMethod.php#L30">source code</a></li>
</ul>

```php
public function getCacheSeconds(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>

<!-- {% endraw %} -->