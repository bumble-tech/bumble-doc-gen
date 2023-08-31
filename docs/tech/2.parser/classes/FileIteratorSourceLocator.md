<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/sourceLocator.md">Source locators</a> <b>/</b> FileIteratorSourceLocator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/SourceLocator/FileIteratorSourceLocator.php#L10">FileIteratorSourceLocator</a> class:
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








<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/SourceLocator/FileIteratorSourceLocator.php#L12">source code</a></li>
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

<!-- {% endraw %} -->