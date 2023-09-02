<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ValueTransformerInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueTransformerInterface.php#L10">ValueTransformerInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration\ValueTransformer;

interface ValueTransformerInterface
```

<blockquote>Interface defining classes that transform text configuration values into objects</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcantransform">canTransform</a>
    </li>
<li>
    <a href="#mtransform">transform</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mcantransform" href="#mcantransform">#</a>
 <b>canTransform</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueTransformerInterface.php#L12">source code</a></li>
</ul>

```php
public function canTransform(mixed $value): bool;
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
            <td>$value</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mtransform" href="#mtransform">#</a>
 <b>transform</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueTransformerInterface.php#L14">source code</a></li>
</ul>

```php
public function transform(mixed $value): mixed;
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
            <td>$value</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>

<!-- {% endraw %} -->