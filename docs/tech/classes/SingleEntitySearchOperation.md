<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> SingleEntitySearchOperation<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L10">SingleEntitySearchOperation</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class SingleEntitySearchOperation implements \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationInterface
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
    <a href="#mgetargs">getArgs</a>
    </li>
<li>
    <a href="#mgetargshash">getArgsHash</a>
    </li>
<li>
    <a href="#mgetentityname">getEntityName</a>
    </li>
<li>
    <a href="#mgetfunctionname">getFunctionName</a>
    </li>
<li>
    <a href="#mgetkey">getKey</a>
    </li>
<li>
    <a href="#mgetrequestedentityname">getRequestedEntityName</a>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L15">source code</a></li>
</ul>

```php
public function __construct(string $functionName, array $args, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface|null $entity);
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
            <td>$functionName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$args</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L65">source code</a></li>
</ul>

```php
public function call(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface|null;
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

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetargs" href="#mgetargs">#</a>
 <b>getArgs</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L30">source code</a></li>
</ul>

```php
public function getArgs(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetargshash" href="#mgetargshash">#</a>
 <b>getArgsHash</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L40">source code</a></li>
</ul>

```php
public function getArgsHash(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentityname" href="#mgetentityname">#</a>
 <b>getEntityName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L35">source code</a></li>
</ul>

```php
public function getEntityName(): string|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfunctionname" href="#mgetfunctionname">#</a>
 <b>getFunctionName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L25">source code</a></li>
</ul>

```php
public function getFunctionName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetkey" href="#mgetkey">#</a>
 <b>getKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L55">source code</a></li>
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
<li><a name="mgetrequestedentityname" href="#mgetrequestedentityname">#</a>
 <b>getRequestedEntityName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L45">source code</a></li>
</ul>

```php
public function getRequestedEntityName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mincrementusagecount" href="#mincrementusagecount">#</a>
 <b>incrementUsageCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/SingleEntitySearchOperation.php#L60">source code</a></li>
</ul>

```php
public function incrementUsageCount(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->