<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ConfigurationParameterBag<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L20">ConfigurationParameterBag</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration;

final class ConfigurationParameterBag
```

<blockquote>Wrapper for getting raw configuration file data</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#maddvaluefromfileifnotexists">addValueFromFileIfNotExists</a>
    </li>
<li>
    <a href="#maddvalueifnotexists">addValueIfNotExists</a>
    </li>
<li>
    <a href="#mget">get</a>
    </li>
<li>
    <a href="#mgetall">getAll</a>
    </li>
<li>
    <a href="#mgetconfigvalues">getConfigValues</a>
    </li>
<li>
    <a href="#mgetsubconfigurationparameterbag">getSubConfigurationParameterBag</a>
    </li>
<li>
    <a href="#mhas">has</a>
    </li>
<li>
    <a href="#mloadfromarray">loadFromArray</a>
    </li>
<li>
    <a href="#mloadfromfiles">loadFromFiles</a>
    </li>
<li>
    <a href="#mresolvevalue">resolveValue</a>
    </li>
<li>
    <a href="#mset">set</a>
    </li>
<li>
    <a href="#mvalidateandgetbooleanvalue">validateAndGetBooleanValue</a>
    </li>
<li>
    <a href="#mvalidateandgetclasslistvalue">validateAndGetClassListValue</a>
    </li>
<li>
    <a href="#mvalidateandgetclassvalue">validateAndGetClassValue</a>
    </li>
<li>
    <a href="#mvalidateandgetdirectorypathvalue">validateAndGetDirectoryPathValue</a>
    </li>
<li>
    <a href="#mvalidateandgetfilepathvalue">validateAndGetFilePathValue</a>
    </li>
<li>
    <a href="#mvalidateandgetstringvalue">validateAndGetStringValue</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L27">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer $valueToClassTransformer, array $resolvers);
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
            <td>$valueToClassTransformer</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ValueTransformer/ValueToClassTransformer.php'>\BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$resolvers</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddvaluefromfileifnotexists" href="#maddvaluefromfileifnotexists">#</a>
 <b>addValueFromFileIfNotExists</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L89">source code</a></li>
</ul>

```php
public function addValueFromFileIfNotExists(string $name, string $fileNames): void;
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
            <tr>
            <td>$fileNames</td>
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
<li><a name="maddvalueifnotexists" href="#maddvalueifnotexists">#</a>
 <b>addValueIfNotExists</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L78">source code</a></li>
</ul>

```php
public function addValueIfNotExists(string $name, mixed $value): void;
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
            <tr>
            <td>$value</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L97">source code</a></li>
</ul>

```php
public function get(string $name, bool $useResolvers = true): mixed;
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
            <tr>
            <td>$useResolvers</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.invalidargumentexception.php">\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetall" href="#mgetall">#</a>
 <b>getAll</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L138">source code</a></li>
</ul>

```php
public function getAll(bool $useResolvers = true): array;
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
            <td>$useResolvers</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconfigvalues" href="#mgetconfigvalues">#</a>
 <b>getConfigValues</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L33">source code</a></li>
</ul>

```php
public function getConfigValues(string $configurationFiles): array;
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
            <td>$configurationFiles</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsubconfigurationparameterbag" href="#mgetsubconfigurationparameterbag">#</a>
 <b>getSubConfigurationParameterBag</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L56">source code</a></li>
</ul>

```php
public function getSubConfigurationParameterBag(string $parentKey): \BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
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
            <td>$parentKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php'>\BumbleDocGen\Core\Configuration\ConfigurationParameterBag</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhas" href="#mhas">#</a>
 <b>has</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L133">source code</a></li>
</ul>

```php
public function has(mixed $name): bool;
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
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mloadfromarray" href="#mloadfromarray">#</a>
 <b>loadFromArray</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L49">source code</a></li>
</ul>

```php
public function loadFromArray(array $parameters): void;
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
            <td>$parameters</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mloadfromfiles" href="#mloadfromfiles">#</a>
 <b>loadFromFiles</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L44">source code</a></li>
</ul>

```php
public function loadFromFiles(string $fileNames): void;
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
            <td>$fileNames</td>
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
<li><a name="mresolvevalue" href="#mresolvevalue">#</a>
 <b>resolveValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L125">source code</a></li>
</ul>

```php
public function resolveValue(mixed $value): mixed;
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
<div class='method_description-block'>

<ul>
<li><a name="mset" href="#mset">#</a>
 <b>set</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L69">source code</a></li>
</ul>

```php
public function set(string $name, mixed $value): void;
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
            <tr>
            <td>$value</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mvalidateandgetbooleanvalue" href="#mvalidateandgetbooleanvalue">#</a>
 <b>validateAndGetBooleanValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L230">source code</a></li>
</ul>

```php
public function validateAndGetBooleanValue(string $parameterName): bool;
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
            <td>$parameterName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mvalidateandgetclasslistvalue" href="#mvalidateandgetclasslistvalue">#</a>
 <b>validateAndGetClassListValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L197">source code</a></li>
</ul>

```php
public function validateAndGetClassListValue(string $parameterName, string $classInterfaceName, bool $nullable = true): array;
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
            <td>$parameterName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classInterfaceName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$nullable</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mvalidateandgetclassvalue" href="#mvalidateandgetclassvalue">#</a>
 <b>validateAndGetClassValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L173">source code</a></li>
</ul>

```php
public function validateAndGetClassValue(string $parameterName, string $classInterfaceName): object;
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
            <td>$parameterName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classInterfaceName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>object</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mvalidateandgetdirectorypathvalue" href="#mvalidateandgetdirectorypathvalue">#</a>
 <b>validateAndGetDirectoryPathValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L268">source code</a></li>
</ul>

```php
public function validateAndGetDirectoryPathValue(string $parameterName, bool $nullable = true): string|null;
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
            <td>$parameterName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$nullable</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mvalidateandgetfilepathvalue" href="#mvalidateandgetfilepathvalue">#</a>
 <b>validateAndGetFilePathValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L243">source code</a></li>
</ul>

```php
public function validateAndGetFilePathValue(string $parameterName, array $fileExtensions, bool $nullable = true): string|null;
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
            <td>$parameterName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fileExtensions</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>string[]</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$nullable</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mvalidateandgetstringvalue" href="#mvalidateandgetstringvalue">#</a>
 <b>validateAndGetStringValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php#L151">source code</a></li>
</ul>

```php
public function validateAndGetStringValue(string $parameterName, bool $nullable = true): string|null;
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
            <td>$parameterName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$nullable</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->