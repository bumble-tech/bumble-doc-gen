<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CloneOperation<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/CloneOperation.php#L9">CloneOperation</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class CloneOperation implements \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationInterface
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
    <a href="#mgetkey">getKey</a>
    </li>
<li>
    <a href="#mgetoperationscollection">getOperationsCollection</a>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/CloneOperation.php#L13">source code</a></li>
</ul>

```php
public function __construct(string $functionName, array $args, \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection $operationsCollection);
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
            <td>$operationsCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/CloneOperation.php#L35">source code</a></li>
</ul>

```php
public function call(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetkey" href="#mgetkey">#</a>
 <b>getKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/CloneOperation.php#L25">source code</a></li>
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
<li><a name="mgetoperationscollection" href="#mgetoperationscollection">#</a>
 <b>getOperationsCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/CloneOperation.php#L20">source code</a></li>
</ul>

```php
public function getOperationsCollection(): \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mincrementusagecount" href="#mincrementusagecount">#</a>
 <b>incrementUsageCount</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/CollectionLogOperation/CloneOperation.php#L30">source code</a></li>
</ul>

```php
public function incrementUsageCount(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->