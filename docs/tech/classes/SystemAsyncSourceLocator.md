<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> SystemAsyncSourceLocator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L20">SystemAsyncSourceLocator</a> class:
</h1>




<b>:warning: Is internal</b>
```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal;

final class SystemAsyncSourceLocator extends \Roave\BetterReflection\SourceLocator\Type\AbstractSourceLocator
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
<li>
    <a href="#mlocateidentifier">locateIdentifier</a>
    - <i>Locate some source code.</i></li>
<li>
    <a href="#mlocateidentifiersbytype">locateIdentifiersByType</a>
    - <i>Find all identifiers of a type</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L22">source code</a></li>
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
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/SourceLocator/Ast/Locator.php'>\Roave\BetterReflection\SourceLocator\Ast\Locator</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L45">source code</a></li>
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

<b>Return value:</b> \Composer\Autoload\ClassLoader


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlocatedsource" href="#mgetlocatedsource">#</a>
 <b>getLocatedSource</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L61">source code</a></li>
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
<div class='method_description-block'>

<ul>
<li><a name="mlocateidentifier" href="#mlocateidentifier">#</a>
 <b>locateIdentifier</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/roave/better-reflection/src/SourceLocator/Type/AbstractSourceLocator.php#L37">source code</a></li>
</ul>

```php
// Implemented in Roave\BetterReflection\SourceLocator\Type\AbstractSourceLocator

public function locateIdentifier(\Roave\BetterReflection\Reflector\Reflector $reflector, \Roave\BetterReflection\Identifier\Identifier $identifier): \Roave\BetterReflection\Reflection\Reflection|null;
```

<blockquote>Locate some source code.</blockquote>

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
            <td>$reflector</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflector/Reflector.php'>\Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$identifier</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Identifier/Identifier.php'>\Roave\BetterReflection\Identifier\Identifier</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/Reflection.php'>\Roave\BetterReflection\Reflection\Reflection</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mlocateidentifiersbytype" href="#mlocateidentifiersbytype">#</a>
 <b>locateIdentifiersByType</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/roave/better-reflection/src/SourceLocator/Type/AbstractSourceLocator.php#L57">source code</a></li>
</ul>

```php
// Implemented in Roave\BetterReflection\SourceLocator\Type\AbstractSourceLocator

public function locateIdentifiersByType(\Roave\BetterReflection\Reflector\Reflector $reflector, \Roave\BetterReflection\Identifier\IdentifierType $identifierType): array;
```

<blockquote>Find all identifiers of a type</blockquote>

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
            <td>$reflector</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflector/Reflector.php'>\Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$identifierType</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Identifier/IdentifierType.php'>\Roave\BetterReflection\Identifier\IdentifierType</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->