<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CachedSourceLocator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/CachedSourceLocator.php#L26">CachedSourceLocator</a> class:
</h1>




<b>:warning: Is internal</b>
```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal;

final class CachedSourceLocator implements \Roave\BetterReflection\SourceLocator\Type\SourceLocator
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
    <a href="#mlocateidentifier">locateIdentifier</a>
    </li>
<li>
    <a href="#mlocateidentifiersbytype">locateIdentifiersByType</a>
    - <i>Find all identifiers of a type</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/CachedSourceLocator.php#L34">source code</a></li>
</ul>

```php
public function __construct(\Roave\BetterReflection\SourceLocator\Type\SourceLocator $sourceLocator, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool $cache);
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
            <td>$sourceLocator</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/SourceLocator/Type/SourceLocator.php'>Roave\BetterReflection\SourceLocator\Type\SourceLocator</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/SourceLocatorCacheItemPool.php'>\BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mlocateidentifier" href="#mlocateidentifier">#</a>
 <b>locateIdentifier</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/CachedSourceLocator.php#L45">source code</a></li>
</ul>

```php
public function locateIdentifier(\Roave\BetterReflection\Reflector\Reflector $reflector, \Roave\BetterReflection\Identifier\Identifier $identifier): \Roave\BetterReflection\Reflection\Reflection|null;
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
            <td>$reflector</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$identifier</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Identifier/Identifier.php'>Roave\BetterReflection\Identifier\Identifier</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/Reflection.php'>\Roave\BetterReflection\Reflection\Reflection</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mlocateidentifiersbytype" href="#mlocateidentifiersbytype">#</a>
 <b>locateIdentifiersByType</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/SourceLocator/Internal/CachedSourceLocator.php#L111">source code</a></li>
</ul>

```php
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
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$identifierType</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Identifier/IdentifierType.php'>Roave\BetterReflection\Identifier\IdentifierType</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->