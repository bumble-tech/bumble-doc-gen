<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ValueToClassTransformer<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueToClassTransformer.php#L26">ValueToClassTransformer</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration\ValueTransformer;

final class ValueToClassTransformer implements \BumbleDocGen\Core\Configuration\ValueTransformer\ValueTransformerInterface
```

<blockquote>Standard text-to-class transformer</blockquote>


<b>Examples of using:</b>

```php
# The list of class names will be converted to an array of objects
someKey:
    - class: \Namespace\ClassName
    - class: \Namespace\ClassName2

```

```php
# One class in configuration will be converted to one object
someKey:
    class: \Namespace\ClassName

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
    <a href="#mcantransform">canTransform</a>
    </li>
<li>
    <a href="#mtransform">transform</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueToClassTransformer.php#L28">source code</a></li>
</ul>

```php
public function __construct(\DI\Container $diContainer);
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
            <td>$diContainer</td>
            <td>\DI\Container</td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcantransform" href="#mcantransform">#</a>
 <b>canTransform</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueToClassTransformer.php#L32">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueToClassTransformer.php#L41">source code</a></li>
</ul>

```php
public function transform(mixed $value): object|null;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>object</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->