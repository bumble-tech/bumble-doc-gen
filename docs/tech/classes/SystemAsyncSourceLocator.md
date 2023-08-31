<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> SystemAsyncSourceLocator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L20">SystemAsyncSourceLocator</a> class:
</h1>




<b>:warning: Is internal</b>
```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal;

final class SystemAsyncSourceLocator extends \Roave\BetterReflection\SourceLocator\Type\AbstractSourceLocator implements \Roave\BetterReflection\SourceLocator\Type\SourceLocator
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
    <a href="#mgetclassloader">getClassLoader</a>
    </li>
<li>
    <a href="#mgetlocatedsource">getLocatedSource</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L22">source code</a></li>
</ul>

```php
public function __construct(\Roave\BetterReflection\SourceLocator\Ast\Locator $astLocator, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, array $psr4FileMap, array $classMap);
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
            <td>$astLocator</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/SourceLocator/Ast/Locator.php'>Roave\BetterReflection\SourceLocator\Ast\Locator</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$psr4FileMap</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classMap</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetclassloader" href="#mgetclassloader">#</a>
 <b>getClassLoader</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L45">source code</a></li>
</ul>

```php
public function getClassLoader(array $psr4FileMap, array $classMap): \Composer\Autoload\ClassLoader;
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
            <td>$psr4FileMap</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classMap</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/composer/composer/blob/master/src/Composer/Autoload/ClassLoader.php'>\Composer\Autoload\ClassLoader</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlocatedsource" href="#mgetlocatedsource">#</a>
 <b>getLocatedSource</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L61">source code</a></li>
</ul>

```php
public function getLocatedSource(string $className): \Roave\BetterReflection\SourceLocator\Located\LocatedSource|null;
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
            <td>$className</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/SourceLocator/Located/LocatedSource.php'>\Roave\BetterReflection\SourceLocator\Located\LocatedSource</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>

<!-- {% endraw %} -->