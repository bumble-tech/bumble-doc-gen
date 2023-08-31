<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ParserHelper<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L24">ParserHelper</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser;

final class ParserHelper
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
    <a href="#mgetbuiltinclassnames">getBuiltInClassNames</a>
    </li>
<li>
    <a href="#mgetclassfromfile">getClassFromFile</a>
    </li>
<li>
    <a href="#mgetdocblock">getDocBlock</a>
    </li>
<li>
    <a href="#mgetdocblockcontext">getDocBlockContext</a>
    </li>
<li>
    <a href="#mgetfilesingit">getFilesInGit</a>
    </li>
<li>
    <a href="#mgetmethodreturnvalue">getMethodReturnValue</a>
    </li>
<li>
    <a href="#mgetuseslistbyclassentity">getUsesListByClassEntity</a>
    </li>
<li>
    <a href="#misbuiltinclass">isBuiltInClass</a>
    </li>
<li>
    <a href="#misbuiltintype">isBuiltInType</a>
    </li>
<li>
    <a href="#misclassloaded">isClassLoaded</a>
    </li>
<li>
    <a href="#miscorrectclassname">isCorrectClassName</a>
    </li>
<li>
    <a href="#mparsefullclassname">parseFullClassName</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L159">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper $reflector, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Monolog\Logger $logger);
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
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflector</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='#'>\Monolog\Logger</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetbuiltinclassnames" href="#mgetbuiltinclassnames">#</a>
 <b>getBuiltInClassNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L167">source code</a></li>
</ul>

```php
public static function getBuiltInClassNames(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetclassfromfile" href="#mgetclassfromfile">#</a>
 <b>getClassFromFile</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L325">source code</a></li>
</ul>

```php
public function getClassFromFile(mixed $file): string|null;
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
            <td>$file</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocblock" href="#mgetdocblock">#</a>
 <b>getDocBlock</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L491">source code</a></li>
</ul>

```php
public function getDocBlock(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $classEntity, string $docComment, int|null $lineNumber = NULL): \phpDocumentor\Reflection\DocBlock;
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
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$docComment</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$lineNumber</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php'>\phpDocumentor\Reflection\DocBlock</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocblockcontext" href="#mgetdocblockcontext">#</a>
 <b>getDocBlockContext</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L523">source code</a></li>
</ul>

```php
public function getDocBlockContext(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $classEntity): \phpDocumentor\Reflection\Types\Context;
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
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/phpDocumentor/TypeResolver/blob/master/src/Types/Context.php'>\phpDocumentor\Reflection\Types\Context</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilesingit" href="#mgetfilesingit">#</a>
 <b>getFilesInGit</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L463">source code</a></li>
</ul>

```php
public function getFilesInGit(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethodreturnvalue" href="#mgetmethodreturnvalue">#</a>
 <b>getMethodReturnValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L421">source code</a></li>
</ul>

```php
public function getMethodReturnValue(\Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, \Roave\BetterReflection\Reflection\ReflectionMethod $reflectionMethod): mixed;
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
            <td>$reflectionClass</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionClass.php'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflectionMethod</td>
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionMethod.php'>Roave\BetterReflection\Reflection\ReflectionMethod</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetuseslistbyclassentity" href="#mgetuseslistbyclassentity">#</a>
 <b>getUsesListByClassEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L240">source code</a></li>
</ul>

```php
public function getUsesListByClassEntity(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $classEntity, bool $extended = true): array;
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
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$extended</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misbuiltinclass" href="#misbuiltinclass">#</a>
 <b>isBuiltInClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L182">source code</a></li>
</ul>

```php
public static function isBuiltInClass(string $className): bool;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misbuiltintype" href="#misbuiltintype">#</a>
 <b>isBuiltInType</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L188">source code</a></li>
</ul>

```php
public static function isBuiltInType(string $name): bool;
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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misclassloaded" href="#misclassloaded">#</a>
 <b>isClassLoaded</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L223">source code</a></li>
</ul>

```php
public function isClassLoaded(string $className): bool;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="miscorrectclassname" href="#miscorrectclassname">#</a>
 <b>isCorrectClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L215">source code</a></li>
</ul>

```php
public static function isCorrectClassName(string $className, bool $checkBuiltIns = true): bool;
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
            <tr>
            <td>$checkBuiltIns</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mparsefullclassname" href="#mparsefullclassname">#</a>
 <b>parseFullClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php#L280">source code</a></li>
</ul>

```php
public function parseFullClassName(string $searchClassName, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $parentClassEntity, bool $extended = true): string;
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
            <td>$searchClassName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parentClassEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$extended</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->