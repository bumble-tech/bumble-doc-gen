<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> StylizedProgressBar<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L10">StylizedProgressBar</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Console;

final class StylizedProgressBar
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
    <a href="#madvance">advance</a>
    </li>
<li>
    <a href="#mfinish">finish</a>
    </li>
<li>
    <a href="#miterate">iterate</a>
    </li>
<li>
    <a href="#msetmaxsteps">setMaxSteps</a>
    </li>
<li>
    <a href="#msetname">setName</a>
    </li>
<li>
    <a href="#msetstepdescription">setStepDescription</a>
    </li>
<li>
    <a href="#mstart">start</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L16">source code</a></li>
</ul>

```php
public function __construct(\Symfony\Component\Console\Style\OutputStyle $io);
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
            <td>$io</td>
            <td><a href='https://github.com/symfony/console/blob/master/Style/OutputStyle.php'>Symfony\Component\Console\Style\OutputStyle</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="madvance" href="#madvance">#</a>
 <b>advance</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L79">source code</a></li>
</ul>

```php
public function advance(int $step): void;
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
            <td>$step</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfinish" href="#mfinish">#</a>
 <b>finish</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L84">source code</a></li>
</ul>

```php
public function finish(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="miterate" href="#miterate">#</a>
 <b>iterate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L57">source code</a></li>
</ul>

```php
public function iterate(iterable $iterable, int|null $max = NULL): \Generator;
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
            <td>$iterable</td>
            <td>iterable</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$max</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetmaxsteps" href="#msetmaxsteps">#</a>
 <b>setMaxSteps</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L74">source code</a></li>
</ul>

```php
public function setMaxSteps(int $maxSteps): void;
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
            <td>$maxSteps</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetname" href="#msetname">#</a>
 <b>setName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L43">source code</a></li>
</ul>

```php
public function setName(string $name): void;
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
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetstepdescription" href="#msetstepdescription">#</a>
 <b>setStepDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L50">source code</a></li>
</ul>

```php
public function setStepDescription(string $stepDescription): void;
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
            <td>$stepDescription</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mstart" href="#mstart">#</a>
 <b>start</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Console/StylizedProgressBar.php#L69">source code</a></li>
</ul>

```php
public function start(int|null $max = NULL): void;
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
            <td>$max</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->