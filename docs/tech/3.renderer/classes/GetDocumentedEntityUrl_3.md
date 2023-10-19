<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/04_twigCustomFilters.md">Template filters</a> <b>/</b> GetDocumentedEntityUrl<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L38">GetDocumentedEntityUrl</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class GetDocumentedEntityUrl implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```

<blockquote>Get the URL of a documented entity by its name. If the entity is found, next to the file where this method was called,
the `EntityDocRendererInterface::getDocFileExtension()` directory will be created, in which the documented entity file will be created</blockquote>

See:
<ul>
    <li>
        <a href="/docs/tech/3.renderer/classes/DocumentedEntityWrapper_3.md">\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a>    </li>
    <li>
        <a href="/docs/tech/3.renderer/classes/DocumentedEntityWrappersCollection_3.md">\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection</a>    </li>
    <li>
        <a href="/docs/tech/3.renderer/classes/RendererContext_3.md#pentitywrapperscollection">\BumbleDocGen\Core\Renderer\Context\RendererContext::$entityWrappersCollection</a>    </li>
</ul>


<b>Examples of using:</b>

```php
{{ getDocumentedEntityUrl(phpClassEntityCollection, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension', 'getFunctions') }}
The function returns a reference to the documented entity, anchored to the getFunctions method

```

```php
{{ getDocumentedEntityUrl(phpClassEntityCollection, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension') }}
The function returns a reference to the documented entity MainExtension

```

```php
{{ getDocumentedEntityUrl(phpClassEntityCollection, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension', '', false) }}
The function returns a link to the file MainExtension

```




<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>getDocumentedEntityUrl</b></td>
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


<h2>Constants:</h2>
<ul>
            <li><a name="qdefault-url"
               href="#qdefault-url">#</a>
            <code>DEFAULT_URL</code>                   <b>|</b> <a href="/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L40">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L42">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\RendererHelper $rendererHelper, \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection $documentedEntityWrappersCollection, \BumbleDocGen\Core\Configuration\Configuration $configuration, \Monolog\Logger $logger);
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
            <td>$rendererHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererHelper.php'>\BumbleDocGen\Core\Renderer\RendererHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$documentedEntityWrappersCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td>\Monolog\Logger</td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L78">source code</a></li>
</ul>

```php
public function __invoke(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, string $entityName, string $cursor = '', bool $createDocument = true): string;
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
            <td>$entityName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The full name of the entity for which the URL will be retrieved.
 If the entity is not found, the DEFAULT_URL value will be returned.</td>
        </tr>
            <tr>
            <td>$cursor</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Cursor on the page of the documented entity (for example, the name of a method or property)</td>
        </tr>
            <tr>
            <td>$createDocument</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>If true, creates an entity document. Otherwise, just gives a reference to the entity code</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/InvalidConfigurationParameterException_4.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/3.renderer/classes/ReflectionException_4.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L50">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L55">source code</a></li>
</ul>

```php
public static function getOptions(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->