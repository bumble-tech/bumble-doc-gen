<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/entityFilterCondition.md">Entity filter conditions</a> <b>/</b> VisibilityCondition<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/VisibilityCondition.php#L15">VisibilityCondition</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

final class VisibilityCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```

<blockquote>Property access modifier check</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcanaddtocollection">canAddToCollection</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/VisibilityCondition.php#L19">source code</a></li>
</ul>

```php
public function __construct(string ...$visibilityModifiers);
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
            <td>$visibilityModifiers <i>(variadic)</i></td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcanaddtocollection" href="#mcanaddtocollection">#</a>
 <b>canAddToCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/VisibilityCondition.php#L24">source code</a></li>
</ul>

```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
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
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\EntityInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->