<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> CustomSourceLocatorInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/CustomSourceLocatorInterface.php#L10">CustomSourceLocatorInterface</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator;

interface CustomSourceLocatorInterface
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetsourcelocator">getSourceLocator</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetsourcelocator" href="#mgetsourcelocator">#</a>
 <b>getSourceLocator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/SourceLocator/CustomSourceLocatorInterface.php#L12">source code</a></li>
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