<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/01_templates.md">How to create documentation templates?</a> <b>/</b> <a href="/docs/tech/3.renderer/templatesVariables.md">Templates variables</a> <b>/</b> LanguageHandlerInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L12">LanguageHandlerInterface</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler;

interface LanguageHandlerInterface
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetcustomtwigfilters">getCustomTwigFilters</a>
    - <i>Additional twig filters that are added to the built-in ones when a language handler is included</i></li>
<li>
    <a href="#mgetcustomtwigfunctions">getCustomTwigFunctions</a>
    - <i>Additional twig functions that are added to the built-in ones when a language handler is included</i></li>
<li>
    <a href="#mgetentitycollection">getEntityCollection</a>
    </li>
<li>
    <a href="#mgetlanguagekey">getLanguageKey</a>
    - <i>Unique language handler key</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetcustomtwigfilters" href="#mgetcustomtwigfilters">#</a>
 <b>getCustomTwigFilters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L27">source code</a></li>
</ul>

```php
public function getCustomTwigFilters(\BumbleDocGen\Core\Renderer\Context\RendererContext $context): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
```

<blockquote>Additional twig filters that are added to the built-in ones when a language handler is included</blockquote>

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
            <td>$context</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcustomtwigfunctions" href="#mgetcustomtwigfunctions">#</a>
 <b>getCustomTwigFunctions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L22">source code</a></li>
</ul>

```php
public function getCustomTwigFunctions(\BumbleDocGen\Core\Renderer\Context\RendererContext $context): \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
```

<blockquote>Additional twig functions that are added to the built-in ones when a language handler is included</blockquote>

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
            <td>$context</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/CustomFunctionsCollection.php'>\BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitycollection" href="#mgetentitycollection">#</a>
 <b>getEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L29">source code</a></li>
</ul>

```php
public function getEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlanguagekey" href="#mgetlanguagekey">#</a>
 <b>getLanguageKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L17">source code</a></li>
</ul>

```php
public static function getLanguageKey(): string;
```

<blockquote>Unique language handler key</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>

<!-- {% endraw %} -->