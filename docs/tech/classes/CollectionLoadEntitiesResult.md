<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CollectionLoadEntitiesResult<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L7">CollectionLoadEntitiesResult</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

final class CollectionLoadEntitiesResult
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
    <a href="#mgetentitiesaddedbypluginscount">getEntitiesAddedByPluginsCount</a>
    </li>
<li>
    <a href="#mgetprocessedentitiescount">getProcessedEntitiesCount</a>
    </li>
<li>
    <a href="#mgetprocessedfilescount">getProcessedFilesCount</a>
    </li>
<li>
    <a href="#mgetskippedentitiescount">getSkippedEntitiesCount</a>
    </li>
<li>
    <a href="#mgettotaladdedentities">getTotalAddedEntities</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L9">source code</a></li>
</ul>

```php
public function __construct(int $processedFilesCount, int $processedEntitiesCount, int $skippedEntitiesCount, int $entitiesAddedByPluginsCount, int $totalAddedEntities);
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
            <td>$processedFilesCount</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$processedEntitiesCount</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$skippedEntitiesCount</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$entitiesAddedByPluginsCount</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$totalAddedEntities</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitiesaddedbypluginscount" href="#mgetentitiesaddedbypluginscount">#</a>
 <b>getEntitiesAddedByPluginsCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L18">source code</a></li>
</ul>

```php
public function getEntitiesAddedByPluginsCount(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprocessedentitiescount" href="#mgetprocessedentitiescount">#</a>
 <b>getProcessedEntitiesCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L23">source code</a></li>
</ul>

```php
public function getProcessedEntitiesCount(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprocessedfilescount" href="#mgetprocessedfilescount">#</a>
 <b>getProcessedFilesCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L28">source code</a></li>
</ul>

```php
public function getProcessedFilesCount(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetskippedentitiescount" href="#mgetskippedentitiescount">#</a>
 <b>getSkippedEntitiesCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L33">source code</a></li>
</ul>

```php
public function getSkippedEntitiesCount(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettotaladdedentities" href="#mgettotaladdedentities">#</a>
 <b>getTotalAddedEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php#L38">source code</a></li>
</ul>

```php
public function getTotalAddedEntities(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>

<!-- {% endraw %} -->