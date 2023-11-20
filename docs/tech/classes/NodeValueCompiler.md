<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> NodeValueCompiler<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpParser/NodeValueCompiler.php#L19">NodeValueCompiler</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpParser;

final class NodeValueCompiler
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcompile">compile</a>
    - <i>Compile an expression from a node into a value if it possible</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mcompile" href="#mcompile">#</a>
 <b>compile</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpParser/NodeValueCompiler.php#L30">source code</a></li>
</ul>

```php
public static function compile(\PhpParser\Node\Stmt\Expression|\PhpParser\Node $node, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $entity): mixed;
```

<blockquote>Compile an expression from a node into a value if it possible</blockquote>

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
            <td>$node</td>
            <td><a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Expression.php'>\PhpParser\Node\Stmt\Expression</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node.php'>\PhpParser\Node</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PropertyEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/ConstExprEvaluationException.php">\PhpParser\ConstExprEvaluationException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->