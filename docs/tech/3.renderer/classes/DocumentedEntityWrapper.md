<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/twigCustomFunctions.md">Template functions</a> <b>/</b> DocumentedEntityWrapper<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L14">DocumentedEntityWrapper</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Context;

final class DocumentedEntityWrapper
```

<blockquote>Wrapper for the entity that was requested for documentation</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetdocrender">getDocRender</a>
    </li>
<li>
    <a href="#mgetdocurl">getDocUrl</a>
    - <i>Get the relative path to the document to be generated</i></li>
<li>
    <a href="#mgetdocumenttransformableentity">getDocumentTransformableEntity</a>
    - <i>Get entity that is allowed to be documented</i></li>
<li>
    <a href="#mgetentityname">getEntityName</a>
    </li>
<li>
    <a href="#mgetfilename">getFileName</a>
    - <i>The name of the file to be generated</i></li>
<li>
    <a href="#mgetinitiatorfilepath">getInitiatorFilePath</a>
    </li>
<li>
    <a href="#mgetkey">getKey</a>
    - <i>Get document key</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L20">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface $documentTransformableEntity, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, string $initiatorFilePath);
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
            <td>$documentTransformableEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php'>\BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface</a></td>
            <td>An entity that is allowed to be documented</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$initiatorFilePath</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The file in which the documentation of the entity was requested</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocrender" href="#mgetdocrender">#</a>
 <b>getDocRender</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L27">source code</a></li>
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
<li><a name="mgetdocurl" href="#mgetdocurl">#</a>
 <b>getDocUrl</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L88">source code</a></li>
</ul>

```php
public function getDocUrl(): string;
```

<blockquote>Get the relative path to the document to be generated</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocumenttransformableentity" href="#mgetdocumenttransformableentity">#</a>
 <b>getDocumentTransformableEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L80">source code</a></li>
</ul>

```php
public function getDocumentTransformableEntity(): \BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface;
```

<blockquote>Get entity that is allowed to be documented</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php'>\BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentityname" href="#mgetentityname">#</a>
 <b>getEntityName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L40">source code</a></li>
</ul>

```php
public function getEntityName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilename" href="#mgetfilename">#</a>
 <b>getFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L72">source code</a></li>
</ul>

```php
public function getFileName(): string;
```

<blockquote>The name of the file to be generated</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetinitiatorfilepath" href="#mgetinitiatorfilepath">#</a>
 <b>getInitiatorFilePath</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L96">source code</a></li>
</ul>

```php
public function getInitiatorFilePath(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetkey" href="#mgetkey">#</a>
 <b>getKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L35">source code</a></li>
</ul>

```php
public function getKey(): string;
```

<blockquote>Get document key</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>

<!-- {% endraw %} -->