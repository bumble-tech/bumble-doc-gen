<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> EntityDocRendererInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php#L13">EntityDocRendererInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\EntityDocRenderer;

interface EntityDocRendererInterface
```

<blockquote>Entity documentation renderer interface</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetdocfileextension">getDocFileExtension</a>
    </li>
<li>
    <a href="#mgetdocfilenamespace">getDocFileNamespace</a>
    </li>
<li>
    <a href="#mgetrenderedtext">getRenderedText</a>
    - <i>Get rendered documentation for an entity</i></li>
<li>
    <a href="#misavailableforentity">isAvailableForEntity</a>
    - <i>Can this render be used to create entity documentation</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetdocfileextension" href="#mgetdocfileextension">#</a>
 <b>getDocFileExtension</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php#L31">source code</a></li>
</ul>

```php
public function getDocFileExtension(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocfilenamespace" href="#mgetdocfilenamespace">#</a>
 <b>getDocFileNamespace</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php#L33">source code</a></li>
</ul>

```php
public function getDocFileNamespace(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrenderedtext" href="#mgetrenderedtext">#</a>
 <b>getRenderedText</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php#L29">source code</a></li>
</ul>

```php
public function getRenderedText(\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper $entityWrapper): string;
```

<blockquote>Get rendered documentation for an entity</blockquote>

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
            <td>$entityWrapper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a></td>
            <td>The entity whose documentation was requested</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misavailableforentity" href="#misavailableforentity">#</a>
 <b>isAvailableForEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php#L21">source code</a></li>
</ul>

```php
public function isAvailableForEntity(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity): bool;
```

<blockquote>Can this render be used to create entity documentation</blockquote>

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
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>The entity whose documentation was requested</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->