<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CacheableEntityInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L9">CacheableEntityInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\Cache;

interface CacheableEntityInterface extends \BumbleDocGen\Core\Parser\Entity\EntityInterface
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetabsolutefilename">getAbsoluteFileName</a>
    - <i>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</i></li>
<li>
    <a href="#mgetcachekey">getCacheKey</a>
    - <i>Get the cache key</i></li>
<li>
    <a href="#mgetname">getName</a>
    - <i>Full name of the entity</i></li>
<li>
    <a href="#mgetobjectid">getObjectId</a>
    - <i>Entity object ID</i></li>
<li>
    <a href="#mgetrelativefilename">getRelativeFileName</a>
    - <i>File name relative to project_root configuration parameter</i></li>
<li>
    <a href="#mgetrootentitycollection">getRootEntityCollection</a>
    - <i>Get parent collection of entities</i></li>
<li>
    <a href="#mgetshortname">getShortName</a>
    - <i>Short name of the entity</i></li>
<li>
    <a href="#misentitycacheoutdated">isEntityCacheOutdated</a>
    - <i>Checking if the entity cache is out of date</i></li>
<li>
    <a href="#misentitydatacacheoutdated">isEntityDataCacheOutdated</a>
    - <i>Checking if the local entity cache is out of date</i></li>
<li>
    <a href="#misentityfilecanbeload">isEntityFileCanBeLoad</a>
    - <i>Checking if the current entity file can be loaded</i></li>
<li>
    <a href="#mreloadentitydependenciescache">reloadEntityDependenciesCache</a>
    - <i>Update entity dependency cache</i></li>
<li>
    <a href="#mremovenotusedentitydatacache">removeNotUsedEntityDataCache</a>
    - <i>Delete current entity cache that was not used the last time documentation was generated</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a>
 <b>getAbsoluteFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L53">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getAbsoluteFileName(): null|string;
```

<blockquote>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachekey" href="#mgetcachekey">#</a>
 <b>getCacheKey</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L16">source code</a></li>
</ul>

```php
public function getCacheKey(): string;
```

<blockquote>Get the cache key</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L30">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getName(): string;
```

<blockquote>Full name of the entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetobjectid" href="#mgetobjectid">#</a>
 <b>getObjectId</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L16">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getObjectId(): string;
```

<blockquote>Entity object ID</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrelativefilename" href="#mgetrelativefilename">#</a>
 <b>getRelativeFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L46">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getRelativeFileName(): null|string;
```

<blockquote>File name relative to project_root configuration parameter</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/classes/Configuration_2.md#mgetprojectroot">\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L23">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getRootEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```

<blockquote>Get parent collection of entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetshortname" href="#mgetshortname">#</a>
 <b>getShortName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L37">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getShortName(): string;
```

<blockquote>Short name of the entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a>
 <b>isEntityCacheOutdated</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L23">source code</a></li>
</ul>

```php
public function isEntityCacheOutdated(): bool;
```

<blockquote>Checking if the entity cache is out of date</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitydatacacheoutdated" href="#misentitydatacacheoutdated">#</a>
 <b>isEntityDataCacheOutdated</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L37">source code</a></li>
</ul>

```php
public function isEntityDataCacheOutdated(): bool;
```

<blockquote>Checking if the local entity cache is out of date</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentityfilecanbeload" href="#misentityfilecanbeload">#</a>
 <b>isEntityFileCanBeLoad</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L30">source code</a></li>
</ul>

```php
public function isEntityFileCanBeLoad(): bool;
```

<blockquote>Checking if the current entity file can be loaded</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreloadentitydependenciescache" href="#mreloadentitydependenciescache">#</a>
 <b>reloadEntityDependenciesCache</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L44">source code</a></li>
</ul>

```php
public function reloadEntityDependenciesCache(): array;
```

<blockquote>Update entity dependency cache</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovenotusedentitydatacache" href="#mremovenotusedentitydatacache">#</a>
 <b>removeNotUsedEntityDataCache</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityInterface.php#L51">source code</a></li>
</ul>

```php
public function removeNotUsedEntityDataCache(): void;
```

<blockquote>Delete current entity cache that was not used the last time documentation was generated</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->