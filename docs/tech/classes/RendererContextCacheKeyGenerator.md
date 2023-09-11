<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> RendererContextCacheKeyGenerator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheKey/RendererContextCacheKeyGenerator.php#L10">RendererContextCacheKeyGenerator</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\Cache\CacheKey;

final class RendererContextCacheKeyGenerator implements \BumbleDocGen\Core\Parser\Entity\Cache\CacheKey\CacheKeyGeneratorInterface
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgeneratekey">generateKey</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgeneratekey" href="#mgeneratekey">#</a>
 <b>generateKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheKey/RendererContextCacheKeyGenerator.php#L12">source code</a></li>
</ul>

```php
public static function generateKey(string $cacheNamespace, \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface $entity, array $args): string;
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
            <td>$cacheNamespace</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$args</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>

<!-- {% endraw %} -->