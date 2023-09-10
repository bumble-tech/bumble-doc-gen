<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ReflectorWrapper<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L25">ReflectorWrapper</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection;

final class ReflectorWrapper implements \Roave\BetterReflection\Reflector\Reflector
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
    <a href="#mreflectallclasses">reflectAllClasses</a>
    </li>
<li>
    <a href="#mreflectallconstants">reflectAllConstants</a>
    </li>
<li>
    <a href="#mreflectallfunctions">reflectAllFunctions</a>
    </li>
<li>
    <a href="#mreflectclass">reflectClass</a>
    </li>
<li>
    <a href="#mreflectconstant">reflectConstant</a>
    </li>
<li>
    <a href="#mreflectfunction">reflectFunction</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L29">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \Roave\BetterReflection\BetterReflection $betterReflection, \BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool $sourceLocatorCache);
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
            <td>$phpHandlerSettings</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php'>\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php'>\BumbleDocGen\Core\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$betterReflection</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/BetterReflection.php'>Roave\BetterReflection\BetterReflection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$sourceLocatorCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/SourceLocatorCacheItemPool.php'>\BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreflectallclasses" href="#mreflectallclasses">#</a>
 <b>reflectAllClasses</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L90">source code</a></li>
</ul>

```php
public function reflectAllClasses(): iterable;
```



<b>Parameters:</b> not specified

<b>Return value:</b> iterable


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreflectallconstants" href="#mreflectallconstants">#</a>
 <b>reflectAllConstants</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L130">source code</a></li>
</ul>

```php
public function reflectAllConstants(): iterable;
```



<b>Parameters:</b> not specified

<b>Return value:</b> iterable


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreflectallfunctions" href="#mreflectallfunctions">#</a>
 <b>reflectAllFunctions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L110">source code</a></li>
</ul>

```php
public function reflectAllFunctions(): iterable;
```



<b>Parameters:</b> not specified

<b>Return value:</b> iterable


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreflectclass" href="#mreflectclass">#</a>
 <b>reflectClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L80">source code</a></li>
</ul>

```php
public function reflectClass(string $identifierName): \Roave\BetterReflection\Reflection\ReflectionClass;
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
            <td>$identifierName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionClass.php'>\Roave\BetterReflection\Reflection\ReflectionClass</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreflectconstant" href="#mreflectconstant">#</a>
 <b>reflectConstant</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L120">source code</a></li>
</ul>

```php
public function reflectConstant(string $identifierName): \Roave\BetterReflection\Reflection\ReflectionConstant;
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
            <td>$identifierName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionConstant.php'>\Roave\BetterReflection\Reflection\ReflectionConstant</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreflectfunction" href="#mreflectfunction">#</a>
 <b>reflectFunction</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php#L100">source code</a></li>
</ul>

```php
public function reflectFunction(string $identifierName): \Roave\BetterReflection\Reflection\ReflectionFunction;
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
            <td>$identifierName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionFunction.php'>\Roave\BetterReflection\Reflection\ReflectionFunction</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->