<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> IterateEntitiesOperation<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L10">IterateEntitiesOperation</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class IterateEntitiesOperation implements \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationInterface
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
    <a href="#mcall">call</a>
    </li>
<li>
    <a href="#mgetentitiesdata">getEntitiesData</a>
    </li>
<li>
    <a href="#mgetkey">getKey</a>
    </li>
<li>
    <a href="#mhasentity">hasEntity</a>
    </li>
<li>
    <a href="#mincrementusagecount">incrementUsageCount</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L15">source code</a></li>
</ul>

```php
public function __construct(array $entities);
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
            <td>$entities</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcall" href="#mcall">#</a>
 <b>call</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L45">source code</a></li>
</ul>

```php
public function call(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection): array;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitiesdata" href="#mgetentitiesdata">#</a>
 <b>getEntitiesData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L37">source code</a></li>
</ul>

```php
public function getEntitiesData(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetkey" href="#mgetkey">#</a>
 <b>getKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L27">source code</a></li>
</ul>

```php
public function getKey(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasentity" href="#mhasentity">#</a>
 <b>hasEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L22">source code</a></li>
</ul>

```php
public function hasEntity(string $entityName): bool;
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
            <td>$entityName</td>
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
<li><a name="mincrementusagecount" href="#mincrementusagecount">#</a>
 <b>incrementUsageCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/IterateEntitiesOperation.php#L32">source code</a></li>
</ul>

```php
public function incrementUsageCount(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->