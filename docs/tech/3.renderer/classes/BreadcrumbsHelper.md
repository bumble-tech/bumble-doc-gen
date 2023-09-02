<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/breadcrumbs.md">Documentation structure and breadcrumbs</a> <b>/</b> BreadcrumbsHelper<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L21">BreadcrumbsHelper</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Breadcrumbs;

final class BreadcrumbsHelper
```

<blockquote>Helper entity for working with breadcrumbs</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetallpagelinks">getAllPageLinks</a>
    </li>
<li>
    <a href="#mgetbreadcrumbs">getBreadcrumbs</a>
    - <i>Get breadcrumbs as an array</i></li>
<li>
    <a href="#mgetbreadcrumbsfortemplates">getBreadcrumbsForTemplates</a>
    </li>
<li>
    <a href="#mgetpagedatabykey">getPageDataByKey</a>
    </li>
<li>
    <a href="#mgetpagedocfilebykey">getPageDocFileByKey</a>
    </li>
<li>
    <a href="#mgetpagelinkbykey">getPageLinkByKey</a>
    </li>
<li>
    <a href="#mgettemplatelinkkey">getTemplateLinkKey</a>
    </li>
<li>
    <a href="#mgettemplatetitle">getTemplateTitle</a>
    - <i>Get the name of a template by its URL.</i></li>
<li>
    <a href="#mrenderbreadcrumbs">renderBreadcrumbs</a>
    - <i>Returns an HTML string with rendered breadcrumbs</i></li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qdefault-prev-page-name-template"
               href="#qdefault-prev-page-name-template">#</a>
            <code>DEFAULT_PREV_PAGE_NAME_TEMPLATE</code>                   <b>|</b> <a href="/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L26">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L33">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsTwigEnvironment $breadcrumbsTwig, string $prevPageNameTemplate = \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper::DEFAULT_PREV_PAGE_NAME_TEMPLATE);
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
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$breadcrumbsTwig</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsTwigEnvironment.php'>\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsTwigEnvironment</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$prevPageNameTemplate</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Index page for each child section</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetallpagelinks" href="#mgetallpagelinks">#</a>
 <b>getAllPageLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L207">source code</a></li>
</ul>

```php
public function getAllPageLinks(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetbreadcrumbs" href="#mgetbreadcrumbs">#</a>
 <b>getBreadcrumbs</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L161">source code</a></li>
</ul>

```php
public function getBreadcrumbs(string $filePatch, bool $fromCurrent = true): array;
```

<blockquote>Get breadcrumbs as an array</blockquote>

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
            <td>$filePatch</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fromCurrent</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetbreadcrumbsfortemplates" href="#mgetbreadcrumbsfortemplates">#</a>
 <b>getBreadcrumbsForTemplates</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L183">source code</a></li>
</ul>

```php
public function getBreadcrumbsForTemplates(string $templateFilePatch, bool $fromCurrent = true): array;
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
            <td>$templateFilePatch</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fromCurrent</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpagedatabykey" href="#mgetpagedatabykey">#</a>
 <b>getPageDataByKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L269">source code</a></li>
</ul>

```php
public function getPageDataByKey(string $key): array|null;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpagedocfilebykey" href="#mgetpagedocfilebykey">#</a>
 <b>getPageDocFileByKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L295">source code</a></li>
</ul>

```php
public function getPageDocFileByKey(string $key): string|null;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpagelinkbykey" href="#mgetpagelinkbykey">#</a>
 <b>getPageLinkByKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L284">source code</a></li>
</ul>

```php
public function getPageLinkByKey(string $key): string|null;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettemplatelinkkey" href="#mgettemplatelinkkey">#</a>
 <b>getTemplateLinkKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L140">source code</a></li>
</ul>

```php
public function getTemplateLinkKey(string $templateName): string|null;
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
            <td>$templateName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettemplatetitle" href="#mgettemplatetitle">#</a>
 <b>getTemplateTitle</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L127">source code</a></li>
</ul>

```php
public function getTemplateTitle(string $templateName): string;
```

<blockquote>Get the name of a template by its URL.</blockquote>

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
            <td>$templateName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>



<b>Examples of using:</b>

```php
// variable in template:
// {% set title = 'Some template title' %}

$breadcrumbsHelper->getTemplateTitle() == 'Some template title'; // is true
```

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mrenderbreadcrumbs" href="#mrenderbreadcrumbs">#</a>
 <b>renderBreadcrumbs</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L311">source code</a></li>
</ul>

```php
public function renderBreadcrumbs(string $currentPageTitle, string $filePatch, bool $fromCurrent = true): string;
```

<blockquote>Returns an HTML string with rendered breadcrumbs</blockquote>

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
            <td>$currentPageTitle</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$filePatch</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fromCurrent</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/SyntaxError.php">\Twig\Error\SyntaxError</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/RuntimeError.php">\Twig\Error\RuntimeError</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/LoaderError.php">\Twig\Error\LoaderError</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_5.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->