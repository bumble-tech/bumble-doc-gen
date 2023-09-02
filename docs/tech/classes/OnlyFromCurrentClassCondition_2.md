<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> OnlyFromCurrentClassCondition<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php#L14">OnlyFromCurrentClassCondition</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

final class OnlyFromCurrentClassCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```

<blockquote>Only properties that belong to the current class (not parent)</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcanaddtocollection">canAddToCollection</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mcanaddtocollection" href="#mcanaddtocollection">#</a>
 <b>canAddToCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php#L16">source code</a></li>
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