<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/03_renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/03_renderer/05_twigCustomFunctions.md">Template functions</a> <b>/</b> DrawClassMap<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L24">DrawClassMap</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

final class DrawClassMap implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```

<blockquote>Generate class map in HTML format</blockquote>


<b>Examples of using:</b>

```php
{{ drawClassMap(phpEntities.filterByPaths(['/src/Renderer'])) }}

```

```php
{{ drawClassMap(phpEntities) }}

```




<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>drawClassMap</b></td>
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
    <a href="#mconvertdirectorystructuretoformattedstring">convertDirectoryStructureToFormattedString</a>
    </li>
<li>
    <a href="#mgetdirectorystructure">getDirectoryStructure</a>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L29">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup);
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
            <td>$getDocumentedEntityUrlFunction</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php'>\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rootEntityCollectionsGroup</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L57">source code</a></li>
</ul>

```php
public function __invoke(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection ...$entitiesCollections): string;
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
            <td>$entitiesCollections <i>(variadic)</i></td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a></td>
            <td>The collection of entities for which the class map will be generated</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/03_renderer/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mconvertdirectorystructuretoformattedstring" href="#mconvertdirectorystructuretoformattedstring">#</a>
 <b>convertDirectoryStructureToFormattedString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L132">source code</a></li>
</ul>

```php
public function convertDirectoryStructureToFormattedString(array $structure, string $prefix = '│', string $path = '/'): string;
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
            <td>$structure</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$prefix</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$path</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdirectorystructure" href="#mgetdirectorystructure">#</a>
 <b>getDirectoryStructure</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L97">source code</a></li>
</ul>

```php
public function getDirectoryStructure(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection ...$entitiesCollections): array;
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
            <td>$entitiesCollections <i>(variadic)</i></td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/03_renderer/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L35">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L40">source code</a></li>
</ul>

```php
public static function getOptions(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>