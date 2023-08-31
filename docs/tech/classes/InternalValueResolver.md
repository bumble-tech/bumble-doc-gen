<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> InternalValueResolver<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/ValueResolver/InternalValueResolver.php#L18">InternalValueResolver</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration\ValueResolver;

final class InternalValueResolver implements \BumbleDocGen\Core\Configuration\ValueResolver\ValueResolverInterface
```

<blockquote>We supplement the values by replacing the shortcodes with real values by internalValuesMap</blockquote>


<b>Examples of using:</b>

```php
# Configuration processing example.
# $internalValuesMap = ['WORKING_DIR' => 'someValue'];
output_dir: "%WORKING_DIR%/docs"

# After the value processing procedure, output_dir => "someValue/docs"

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
    <a href="#mresolvevalue">resolveValue</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/ValueResolver/InternalValueResolver.php#L23">source code</a></li>
</ul>

```php
public function __construct(array $internalValuesMap);
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
            <td>$internalValuesMap</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>see BumbleDocGen/di-config.php</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mresolvevalue" href="#mresolvevalue">#</a>
 <b>resolveValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/ValueResolver/InternalValueResolver.php#L27">source code</a></li>
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/ConfigurationParameterBag.php'>\BumbleDocGen\Core\Configuration\ConfigurationParameterBag</a></td>
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