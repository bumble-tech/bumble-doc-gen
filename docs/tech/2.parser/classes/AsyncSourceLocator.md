<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/sourceLocator.md">Source locators</a> <b>/</b> AsyncSourceLocator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/AsyncSourceLocator.php#L16">AsyncSourceLocator</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator;

final class AsyncSourceLocator implements \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface, \BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\CustomSourceLocatorInterface
```

<blockquote>Lazy loading classes. Cannot be used for initial parsing of files, only for getting specific documents</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetfinder">getFinder</a>
    </li>
<li>
    <a href="#mgetsourcelocator">getSourceLocator</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/AsyncSourceLocator.php#L18">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, array $psr4FileMap, array $classMap);
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
<li><a name="mgetfinder" href="#mgetfinder">#</a>
 <b>getFinder</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/AsyncSourceLocator.php#L28">source code</a></li>
</ul>

```php
public function getFinder(): \Symfony\Component\Finder\Finder|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/finder/blob/master/Finder.php'>\Symfony\Component\Finder\Finder</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsourcelocator" href="#mgetsourcelocator">#</a>
 <b>getSourceLocator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/AsyncSourceLocator.php#L33">source code</a></li>
</ul>

```php
public function getSourceLocator(\Roave\BetterReflection\SourceLocator\Ast\Locator $astLocator): \Roave\BetterReflection\SourceLocator\Type\SourceLocator;
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
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/SourceLocator/Type/SourceLocator.php'>\Roave\BetterReflection\SourceLocator\Type\SourceLocator</a>


</div>
<hr>

<!-- {% endraw %} -->