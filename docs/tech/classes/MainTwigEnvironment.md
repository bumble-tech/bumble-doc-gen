<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> MainTwigEnvironment<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainTwigEnvironment.php#L15">MainTwigEnvironment</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig;

final class MainTwigEnvironment
```








<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mrender">render</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainTwigEnvironment.php#L22">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Renderer\Twig\MainExtension $mainExtension);
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
            <td>$mainExtension</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainExtension.php'>\BumbleDocGen\Core\Renderer\Twig\MainExtension</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mrender" href="#mrender">#</a>
 <b>render</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/MainTwigEnvironment.php#L37">source code</a></li>
</ul>

```php
public function render(mixed $name, array $context = [ ]): string;
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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
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
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/RuntimeError.php">\Twig\Error\RuntimeError</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/LoaderError.php">\Twig\Error\LoaderError</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->