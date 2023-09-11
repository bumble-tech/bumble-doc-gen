<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ValueResolverInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueResolver/ValueResolverInterface.php#L12">ValueResolverInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration\ValueResolver;

interface ValueResolverInterface
```

<blockquote>Class interface to resolve value from config file</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mresolvevalue">resolveValue</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mresolvevalue" href="#mresolvevalue">#</a>
 <b>resolveValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueResolver/ValueResolverInterface.php#L14">source code</a></li>
</ul>

```php
public function resolveValue(\BumbleDocGen\Core\Configuration\ConfigurationParameterBag $parameterBag, mixed $value): mixed;
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
            <td>$parameterBag</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php'>\BumbleDocGen\Core\Configuration\ConfigurationParameterBag</a></td>
            <td>-</td>
        </tr>
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