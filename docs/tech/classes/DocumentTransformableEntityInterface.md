<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> DocumentTransformableEntityInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L13">DocumentTransformableEntityInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Context;

interface DocumentTransformableEntityInterface
```

<blockquote>Interface for entities that can be generated into documents</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcursortodocattributelinkfragment">cursorToDocAttributeLinkFragment</a>
    </li>
<li>
    <a href="#mdocumentcreationallowed">documentCreationAllowed</a>
    </li>
<li>
    <a href="#mentitycacheisoutdated">entityCacheIsOutdated</a>
    </li>
<li>
    <a href="#mgetdocrender">getDocRender</a>
    </li>
<li>
    <a href="#mgetname">getName</a>
    </li>
<li>
    <a href="#mgetrootentitycollection">getRootEntityCollection</a>
    </li>
<li>
    <a href="#mgetshortname">getShortName</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mcursortodocattributelinkfragment" href="#mcursortodocattributelinkfragment">#</a>
 <b>cursorToDocAttributeLinkFragment</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L27">source code</a></li>
</ul>

```php
public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string;
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
            <td>$cursor</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$isForDocument</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdocumentcreationallowed" href="#mdocumentcreationallowed">#</a>
 <b>documentCreationAllowed</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L19">source code</a></li>
</ul>

```php
public function documentCreationAllowed(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mentitycacheisoutdated" href="#mentitycacheisoutdated">#</a>
 <b>entityCacheIsOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L23">source code</a></li>
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
<li><a name="mgetdocrender" href="#mgetdocrender">#</a>
 <b>getDocRender</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L25">source code</a></li>
</ul>

```php
public function getDocRender(): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php'>\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L17">source code</a></li>
</ul>

```php
public function getName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L15">source code</a></li>
</ul>

```php
public function getRootEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetshortname" href="#mgetshortname">#</a>
 <b>getShortName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php#L21">source code</a></li>
</ul>

```php
public function getShortName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>

<!-- {% endraw %} -->