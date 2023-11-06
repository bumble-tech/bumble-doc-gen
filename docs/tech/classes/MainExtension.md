<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> MainExtension<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L18">MainExtension</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig;

final class MainExtension extends \Twig\Extension\AbstractExtension
```

<blockquote>This is an extension that is used to generate documents from templates</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetfilters">getFilters</a>
    - <i>List of twig filters</i></li>
<li>
    <a href="#mgetfunctions">getFunctions</a>
    - <i>List of twig functions</i></li>
<li>
    <a href="#mgetlanguagehandlerscollection">getLanguageHandlersCollection</a>
    </li>
<li>
    <a href="#mgetnodevisitors">getNodeVisitors</a>
    - <i>Returns the node visitor instances to add to the existing list.</i></li>
<li>
    <a href="#mgetoperators">getOperators</a>
    - <i>Returns a list of operators to add to the existing list.</i></li>
<li>
    <a href="#mgettests">getTests</a>
    - <i>Returns a list of tests to add to the existing list.</i></li>
<li>
    <a href="#mgettokenparsers">getTokenParsers</a>
    - <i>Returns the token parser instances to add to the existing list.</i></li>
<li>
    <a href="#msetdefaultfilters">setDefaultFilters</a>
    </li>
<li>
    <a href="#msetdefaultfunctions">setDefaultFunctions</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L26">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $context, \BumbleDocGen\Core\Configuration\Configuration $configuration);
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
            <td>$context</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilters" href="#mgetfilters">#</a>
 <b>getFilters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L81">source code</a></li>
</ul>

```php
public function getFilters(): \Generator;
```

<blockquote>List of twig filters</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfunctions" href="#mgetfunctions">#</a>
 <b>getFunctions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L73">source code</a></li>
</ul>

```php
public function getFunctions(): \Generator;
```

<blockquote>List of twig functions</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlanguagehandlerscollection" href="#mgetlanguagehandlerscollection">#</a>
 <b>getLanguageHandlersCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L37">source code</a></li>
</ul>

```php
public function getLanguageHandlersCollection(): \BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlersCollection.php'>\BumbleDocGen\LanguageHandler\LanguageHandlersCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetnodevisitors" href="#mgetnodevisitors">#</a>
 <b>getNodeVisitors</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/twig/twig/src/Extension/AbstractExtension.php#L21">source code</a></li>
</ul>

```php
// Implemented in Twig\Extension\AbstractExtension

public function getNodeVisitors(): \Twig\NodeVisitor\NodeVisitorInterface[];
```

<blockquote>Returns the node visitor instances to add to the existing list.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>\Twig\NodeVisitor\NodeVisitorInterface[]</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoperators" href="#mgetoperators">#</a>
 <b>getOperators</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/twig/twig/src/Extension/AbstractExtension.php#L41">source code</a></li>
</ul>

```php
// Implemented in Twig\Extension\AbstractExtension

public function getOperators(): array[];
```

<blockquote>Returns a list of operators to add to the existing list.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array[]</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettests" href="#mgettests">#</a>
 <b>getTests</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/twig/twig/src/Extension/AbstractExtension.php#L31">source code</a></li>
</ul>

```php
// Implemented in Twig\Extension\AbstractExtension

public function getTests(): \Twig\TwigTest[];
```

<blockquote>Returns a list of tests to add to the existing list.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>\Twig\TwigTest[]</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettokenparsers" href="#mgettokenparsers">#</a>
 <b>getTokenParsers</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/twig/twig/src/Extension/AbstractExtension.php#L16">source code</a></li>
</ul>

```php
// Implemented in Twig\Extension\AbstractExtension

public function getTokenParsers(): \Twig\TokenParser\TokenParserInterface[];
```

<blockquote>Returns the token parser instances to add to the existing list.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>\Twig\TokenParser\TokenParserInterface[]</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdefaultfilters" href="#msetdefaultfilters">#</a>
 <b>setDefaultFilters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L59">source code</a></li>
</ul>

```php
public function setDefaultFilters(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdefaultfunctions" href="#msetdefaultfunctions">#</a>
 <b>setDefaultFunctions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php#L45">source code</a></li>
</ul>

```php
public function setDefaultFunctions(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->