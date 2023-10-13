<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/05_twigCustomFunctions.md">Template functions</a> <b>/</b> GetClassMethodsBodyCode<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L21">GetClassMethodsBodyCode</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

final class GetClassMethodsBodyCode implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```

<blockquote>Get the code of the specified class methods as a formatted string</blockquote>


<b>Examples of using:</b>

```php
{{ getClassMethodsBodyCode('\\BumbleDocGen\\Renderer\\Twig\\MainExtension', ['getFunctions']) }}

```




<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>getClassMethodsBodyCode</b></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L23">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup);
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L51">source code</a></li>
</ul>

```php
public function __invoke(string $className, array $methodsNames): string|null;
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
            <td>$className</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The name of the class whose methods are to be retrieved</td>
        </tr>
            <tr>
            <td>$methodsNames</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>List of class methods whose code needs to be retrieved</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/3.renderer/classes/ReflectionException_3.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_3.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L27">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L32">source code</a></li>
</ul>

```php
public static function getOptions(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->