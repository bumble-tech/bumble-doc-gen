<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> RootEntityInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L11">RootEntityInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\Entity;

interface RootEntityInterface extends \\BumbleDocGen\Core\Parser\Entity\EntityInterface implements \BumbleDocGen\Core\Parser\Entity\EntityInterface
```

<blockquote>Since the documentation generator supports several programming languages,
their entities need to correspond to the same interfaces</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mentitydatacanbeloaded">entityDataCanBeLoaded</a>
    - <i>Checking if it is possible to get the entity data</i></li>
<li>
    <a href="#mgetentitydependencies">getEntityDependencies</a>
    </li>
<li>
    <a href="#mgetfilecontent">getFileContent</a>
    </li>
<li>
    <a href="#mgetfilesourcelink">getFileSourceLink</a>
    </li>
<li>
    <a href="#misentitynamevalid">isEntityNameValid</a>
    - <i>Check if entity name is valid</i></li>
<li>
    <a href="#misingit">isInGit</a>
    - <i>The entity file is in the git repository</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mentitydatacanbeloaded" href="#mentitydatacanbeloaded">#</a>
 <b>entityDataCanBeLoaded</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L21">source code</a></li>
</ul>

```php
public function entityDataCanBeLoaded(): bool;
```

<blockquote>Checking if it is possible to get the entity data</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitydependencies" href="#mgetentitydependencies">#</a>
 <b>getEntityDependencies</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L26">source code</a></li>
</ul>

```php
public function getEntityDependencies(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilecontent" href="#mgetfilecontent">#</a>
 <b>getFileContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L33">source code</a></li>
</ul>

```php
public function getFileContent(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a>
 <b>getFileSourceLink</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L35">source code</a></li>
</ul>

```php
public function getFileSourceLink(bool $withLine = true): string|null;
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
            <td>$withLine</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitynamevalid" href="#misentitynamevalid">#</a>
 <b>isEntityNameValid</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L16">source code</a></li>
</ul>

```php
public static function isEntityNameValid(string $entityName): bool;
```

<blockquote>Check if entity name is valid</blockquote>

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
<li><a name="misingit" href="#misingit">#</a>
 <b>isInGit</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php#L31">source code</a></li>
</ul>

```php
public function isInGit(): bool;
```

<blockquote>The entity file is in the git repository</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->