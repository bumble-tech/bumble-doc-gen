<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CustomFiltersCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php#L7">CustomFiltersCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class CustomFiltersCollection implements \IteratorAggregate
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#madd">add</a>
    </li>
<li>
    <a href="#mcreate">create</a>
    </li>
<li>
    <a href="#mget">get</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    </li>
<li>
    <a href="#mgettwigfilters">getTwigFilters</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php#L36">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface ...$filters): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
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
            <td>$filters <i>(variadic)</i></td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFilterInterface.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreate" href="#mcreate">#</a>
 <b>create</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php#L31">source code</a></li>
</ul>

```php
public static function create(\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface ...$filters): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
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
            <td>$filters <i>(variadic)</i></td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFilterInterface.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php#L44">source code</a></li>
</ul>

```php
public function get(string $key): null|\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFilterInterface.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php#L12">source code</a></li>
</ul>

```php
public function getIterator(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettwigfilters" href="#mgettwigfilters">#</a>
 <b>getTwigFilters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php#L17">source code</a></li>
</ul>

```php
public function getTwigFilters(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>

<!-- {% endraw %} -->