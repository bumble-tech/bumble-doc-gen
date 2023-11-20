<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> SourceLocatorsCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php#L9">SourceLocatorsCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\SourceLocator;

final class SourceLocatorsCollection implements \IteratorAggregate
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
    <a href="#mgetcommonfinder">getCommonFinder</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php#L28">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface $sourceLocator): \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorInterface.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreate" href="#mcreate">#</a>
 <b>create</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php#L19">source code</a></li>
</ul>

```php
public static function create(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface ...$sourceLocators): \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
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
            <td>$sourceLocators <i>(variadic)</i></td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorInterface.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcommonfinder" href="#mgetcommonfinder">#</a>
 <b>getCommonFinder</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php#L34">source code</a></li>
</ul>

```php
public function getCommonFinder(): \Symfony\Component\Finder\Finder;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/finder/blob/master/Finder.php'>\Symfony\Component\Finder\Finder</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php#L14">source code</a></li>
</ul>

```php
public function getIterator(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>

<!-- {% endraw %} -->