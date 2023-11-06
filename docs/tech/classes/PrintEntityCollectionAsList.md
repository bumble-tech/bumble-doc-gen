<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PrintEntityCollectionAsList<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L21">PrintEntityCollectionAsList</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class PrintEntityCollectionAsList implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```

<blockquote>Outputting entity data as HTML list</blockquote>


<b>Examples of using:</b>

```php
{{ printEntityCollectionAsList(phpClassEntityCollection.filterByInterfaces(['ScriptFramework\\ScriptInterface', 'ScriptFramework\\TestScriptInterface'])) }}
The function will output a list of PHP classes that match the ScriptFramework\ScriptInterface and ScriptFramework\TestScriptInterface interfaces

```

```php
{{ printEntityCollectionAsList(phpClassEntityCollection) }}
The function will list all documented PHP classes

```




<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>printEntityCollectionAsList</b></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L23">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction);
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
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-invoke" href="#m-invoke">#</a>
 <b>__invoke</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L47">source code</a></li>
</ul>

```php
public function __invoke(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, string $type = 'ul', bool $skipDescription = false, bool $useFullName = false): string;
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
            <td>$rootEntityCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a></td>
            <td>Processed entity collection</td>
        </tr>
            <tr>
            <td>$type</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>List tag type (<ul>/<ol>)</td>
        </tr>
            <tr>
            <td>$skipDescription</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Don't print description of this entities</td>
        </tr>
            <tr>
            <td>$useFullName</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Use the full name of the entity in the list</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L27">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L32">source code</a></li>
</ul>

```php
public static function getOptions(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->