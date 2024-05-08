<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/01_configuration.md">Configuration</a> <b>/</b> Implode<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L10">Implode</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class Implode implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```

<blockquote>Join array elements with a string</blockquote>

See:
<ul>
    <li>
        <a href="https://www.php.net/manual/en/function.implode.php">https://www.php.net/manual/en/function.implode.php</a>    </li>
</ul>




<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>implode</b></td>
    </tr>
</table>





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
<li><a name="m-invoke" href="#m-invoke">#</a>
 <b>__invoke</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L17">source code</a></li>
</ul>

```php
public function __invoke(array $elements, string $separator = ', '): string;
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
            <td>$elements</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>The array to implode</td>
        </tr>
            <tr>
            <td>$separator</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Element separator in result string</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L22">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L27">source code</a></li>
</ul>

```php
public static function getOptions(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
