<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/sourceLocator.md">Source locators</a> <b>/</b> FileIteratorSourceLocator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/FileIteratorSourceLocator.php#L10">FileIteratorSourceLocator</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Parser\SourceLocator;

final class FileIteratorSourceLocator extends \BumbleDocGen\Core\Parser\SourceLocator\BaseSourceLocator implements \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface
```

<blockquote>Loads all files using an iterator</blockquote>






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
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/FileIteratorSourceLocator.php#L12">source code</a></li>
</ul>

```php
public function __construct(\Iterator $fileInfoIterator);
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
            <td>$fileInfoIterator</td>
            <td><a href='https://www.php.net/manual/en/class.iterator.php'>Iterator</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/BaseSourceLocator.php#L19">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\SourceLocator\BaseSourceLocator

public function getFinder(): \Symfony\Component\Finder\Finder;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/finder/blob/master/Finder.php'>\Symfony\Component\Finder\Finder</a>


</div>
<hr>

<!-- {% endraw %} -->