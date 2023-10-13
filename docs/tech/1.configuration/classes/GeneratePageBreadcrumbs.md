<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/1.configuration/readme.md">Configuration files</a> <b>/</b> GeneratePageBreadcrumbs<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L20">GeneratePageBreadcrumbs</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class GeneratePageBreadcrumbs implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```

<blockquote>Function to generate breadcrumbs on the page</blockquote>




<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>generatePageBreadcrumbs</b></td>
    </tr>
</table>




<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#m-invoke">__invoke</a>
    </li>
<li>
    <a href="#mgetname">getName</a>
    </li>
<li>
    <a href="#mgetoptions">getOptions</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L22">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory $dependencyFactory);
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
            <td>$breadcrumbsHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php'>\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rendererContext</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$dependencyFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php'>\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-invoke" href="#m-invoke">#</a>
 <b>__invoke</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L57">source code</a></li>
</ul>

```php
public function __invoke(string $currentPageTitle, string $templatePath, bool $skipFirstTemplatePage = true): string;
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
            <td>$currentPageTitle</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Title of the current page</td>
        </tr>
            <tr>
            <td>$templatePath</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Path to the template from which the breadcrumbs will be generated</td>
        </tr>
            <tr>
            <td>$skipFirstTemplatePage</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>If set to true, the page from which parsing starts will not participate in the formation of breadcrumbs
 This option is useful when working with the _self value in a template, as it returns the full path to the
 current template, and the reference to it in breadcrumbs should not be clickable.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/RuntimeError.php">\Twig\Error\RuntimeError</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/LoaderError.php">\Twig\Error\LoaderError</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/SyntaxError.php">\Twig\Error\SyntaxError</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/1.configuration/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L29">source code</a></li>
</ul>

```php
public static function getName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoptions" href="#mgetoptions">#</a>
 <b>getOptions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L34">source code</a></li>
</ul>

```php
public static function getOptions(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->