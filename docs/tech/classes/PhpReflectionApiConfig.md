<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PhpReflectionApiConfig<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L15">PhpReflectionApiConfig</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php;

final class PhpReflectionApiConfig extends \BumbleDocGen\Core\Configuration\ReflectionApiConfig
```








<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#mcreate">create</a>
    </li>
<li>
    <a href="#mcreatebyconfiguration">createByConfiguration</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mdisablecomposerautoload">disableComposerAutoload</a>
    </li>
<li>
    <a href="#mgetcachedir">getCacheDir</a>
    </li>
<li>
    <a href="#mgetlanguagehandlerclassname">getLanguageHandlerClassName</a>
    </li>
<li>
    <a href="#mgetprojectroot">getProjectRoot</a>
    </li>
<li>
    <a href="#msetcachedir">setCacheDir</a>
    </li>
<li>
    <a href="#msetclassconstantfilter">setClassConstantFilter</a>
    </li>
<li>
    <a href="#msetclassfilter">setClassFilter</a>
    </li>
<li>
    <a href="#msetcomposerconfigfile">setComposerConfigFile</a>
    </li>
<li>
    <a href="#msetcomposervendorpath">setComposerVendorPath</a>
    </li>
<li>
    <a href="#msetmethodfilter">setMethodFilter</a>
    </li>
<li>
    <a href="#msetprojectroot">setProjectRoot</a>
    </li>
<li>
    <a href="#msetpropertyfilter">setPropertyFilter</a>
    </li>
<li>
    <a href="#msetpsr4map">setPsr4Map</a>
    </li>
<li>
    <a href="#mtoconfigarray">toConfigArray</a>
    </li>
<li>
    <a href="#musecomposerautoload">useComposerAutoload</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mcreate" href="#mcreate">#</a>
 <b>create</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L34">source code</a></li>
</ul>

```php
public static function create(): self;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>self</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreatebyconfiguration" href="#mcreatebyconfiguration">#</a>
 <b>createByConfiguration</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L49">source code</a></li>
</ul>

```php
public static function createByConfiguration(\BumbleDocGen\Core\Configuration\Configuration $configuration): self;
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
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>self</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdisablecomposerautoload" href="#mdisablecomposerautoload">#</a>
 <b>disableComposerAutoload</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L92">source code</a></li>
</ul>

```php
public function disableComposerAutoload(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachedir" href="#mgetcachedir">#</a>
 <b>getCacheDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ReflectionApiConfig.php#L14">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Configuration\ReflectionApiConfig

public function getCacheDir(): null|string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlanguagehandlerclassname" href="#mgetlanguagehandlerclassname">#</a>
 <b>getLanguageHandlerClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L39">source code</a></li>
</ul>

```php
public function getLanguageHandlerClassName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprojectroot" href="#mgetprojectroot">#</a>
 <b>getProjectRoot</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ReflectionApiConfig.php#L24">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Configuration\ReflectionApiConfig

public function getProjectRoot(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcachedir" href="#msetcachedir">#</a>
 <b>setCacheDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ReflectionApiConfig.php#L29">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Configuration\ReflectionApiConfig

public function setCacheDir(string|null $cacheDir): void;
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
            <td>$cacheDir</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetclassconstantfilter" href="#msetclassconstantfilter">#</a>
 <b>setClassConstantFilter</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L72">source code</a></li>
</ul>

```php
public function setClassConstantFilter(\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface $classConstantFilter): void;
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
            <td>$classConstantFilter</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php'>\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetclassfilter" href="#msetclassfilter">#</a>
 <b>setClassFilter</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L67">source code</a></li>
</ul>

```php
public function setClassFilter(\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface $classFilter): void;
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
            <td>$classFilter</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php'>\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcomposerconfigfile" href="#msetcomposerconfigfile">#</a>
 <b>setComposerConfigFile</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L97">source code</a></li>
</ul>

```php
public function setComposerConfigFile(string $composerConfigFile): void;
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
            <td>$composerConfigFile</td>
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
<li><a name="msetcomposervendorpath" href="#msetcomposervendorpath">#</a>
 <b>setComposerVendorPath</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L102">source code</a></li>
</ul>

```php
public function setComposerVendorPath(string $composerInstalledFile): void;
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
            <td>$composerInstalledFile</td>
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
<li><a name="msetmethodfilter" href="#msetmethodfilter">#</a>
 <b>setMethodFilter</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L82">source code</a></li>
</ul>

```php
public function setMethodFilter(\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface $methodFilter): void;
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
            <td>$methodFilter</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php'>\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetprojectroot" href="#msetprojectroot">#</a>
 <b>setProjectRoot</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ReflectionApiConfig.php#L19">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Configuration\ReflectionApiConfig

public function setProjectRoot(string $projectRoot): void;
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
            <td>$projectRoot</td>
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
<li><a name="msetpropertyfilter" href="#msetpropertyfilter">#</a>
 <b>setPropertyFilter</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L77">source code</a></li>
</ul>

```php
public function setPropertyFilter(\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface $propertyFilter): void;
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
            <td>$propertyFilter</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php'>\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetpsr4map" href="#msetpsr4map">#</a>
 <b>setPsr4Map</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L107">source code</a></li>
</ul>

```php
public function setPsr4Map(array $psr4Map): void;
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
            <td>$psr4Map</td>
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
<li><a name="mtoconfigarray" href="#mtoconfigarray">#</a>
 <b>toConfigArray</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L112">source code</a></li>
</ul>

```php
public function toConfigArray(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="musecomposerautoload" href="#musecomposerautoload">#</a>
 <b>useComposerAutoload</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpReflectionApiConfig.php#L87">source code</a></li>
</ul>

```php
public function useComposerAutoload(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->