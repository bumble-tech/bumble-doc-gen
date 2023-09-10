<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PhpClassToMdDocRenderer<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L18">PhpClassToMdDocRenderer</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd;

class PhpClassToMdDocRenderer implements \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface
```

<blockquote>Rendering PHP classes into md format documents (for display on GitHub)</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

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
    </li>
<li>
    <a href="#misavailableforentity">isAvailableForEntity</a>
    - <i>Can this render be used to create entity documentation</i></li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qblock-after-header"
               href="#qblock-after-header">#</a>
            <code>BLOCK_AFTER_HEADER</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L21">source
                    code</a> </li>
            <li><a name="qblock-after-main-info"
               href="#qblock-after-main-info">#</a>
            <code>BLOCK_AFTER_MAIN_INFO</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L20">source
                    code</a> </li>
            <li><a name="qblock-before-details"
               href="#qblock-before-details">#</a>
            <code>BLOCK_BEFORE_DETAILS</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L22">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L24">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd\PhpClassRendererTwigEnvironment $classRendererTwig);
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
            <td>$classRendererTwig</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassRendererTwigEnvironment.php'>\BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd\PhpClassRendererTwigEnvironment</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocfileextension" href="#mgetdocfileextension">#</a>
 <b>getDocFileExtension</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L29">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L34">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L49">source code</a></li>
</ul>

```php
public function getRenderedText(\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper $entityWrapper): string;
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
            <td>$entityWrapper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/RuntimeError.php">\Twig\Error\RuntimeError</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/SyntaxError.php">\Twig\Error\SyntaxError</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/LoaderError.php">\Twig\Error\LoaderError</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misavailableforentity" href="#misavailableforentity">#</a>
 <b>isAvailableForEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/PhpClassToMd/PhpClassToMdDocRenderer.php#L39">source code</a></li>
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>The entity whose documentation was requested</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->