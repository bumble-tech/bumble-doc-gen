<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> MethodEntity<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L27">MethodEntity</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

class MethodEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface, \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface
```

<blockquote>Class method entity</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetbodycode">getBodyCode</a>
    </li>
<li>
    <a href="#mgetdescription">getDescription</a>
    </li>
<li>
    <a href="#mgetdocblock">getDocBlock</a>
    </li>
<li>
    <a href="#mgetdoccomment">getDocComment</a>
    - <i>Get the doc comment of an entity</i></li>
<li>
    <a href="#mgetdoccommententity">getDocCommentEntity</a>
    </li>
<li>
    <a href="#mgetdoccommentline">getDocCommentLine</a>
    </li>
<li>
    <a href="#mgetdoccommentlinerecursive">getDocCommentLineRecursive</a>
    </li>
<li>
    <a href="#mgetdoccommentrecursive">getDocCommentRecursive</a>
    </li>
<li>
    <a href="#mgetendline">getEndLine</a>
    </li>
<li>
    <a href="#mgetfilename">getFileName</a>
    </li>
<li>
    <a href="#mgetfirstreturnvalue">getFirstReturnValue</a>
    </li>
<li>
    <a href="#mgetimplementingclass">getImplementingClass</a>
    </li>
<li>
    <a href="#mgetimplementingclassname">getImplementingClassName</a>
    </li>
<li>
    <a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a>
    </li>
<li>
    <a href="#mgetmodifiersstring">getModifiersString</a>
    </li>
<li>
    <a href="#mgetname">getName</a>
    </li>
<li>
    <a href="#mgetnamespacename">getNamespaceName</a>
    </li>
<li>
    <a href="#mgetparameters">getParameters</a>
    </li>
<li>
    <a href="#mgetparametersstring">getParametersString</a>
    </li>
<li>
    <a href="#mgetphphandlersettings">getPhpHandlerSettings</a>
    </li>
<li>
    <a href="#mgetprototype">getPrototype</a>
    </li>
<li>
    <a href="#mgetreturntype">getReturnType</a>
    </li>
<li>
    <a href="#mgetrootentity">getRootEntity</a>
    </li>
<li>
    <a href="#mgetrootentitycollection">getRootEntityCollection</a>
    - <i>Get parent collection of entities</i></li>
<li>
    <a href="#mgetshortname">getShortName</a>
    </li>
<li>
    <a href="#mgetsignature">getSignature</a>
    </li>
<li>
    <a href="#mgetstartcolumn">getStartColumn</a>
    </li>
<li>
    <a href="#mgetstartline">getStartLine</a>
    </li>
<li>
    <a href="#misconstructor">isConstructor</a>
    </li>
<li>
    <a href="#misdynamic">isDynamic</a>
    </li>
<li>
    <a href="#misimplementedinparentclass">isImplementedInParentClass</a>
    </li>
<li>
    <a href="#misinitialization">isInitialization</a>
    </li>
<li>
    <a href="#misprivate">isPrivate</a>
    </li>
<li>
    <a href="#misprotected">isProtected</a>
    </li>
<li>
    <a href="#mispublic">isPublic</a>
    </li>
<li>
    <a href="#misstatic">isStatic</a>
    </li>
<li>
    <a href="#mparseannotationparams">parseAnnotationParams</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L31">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $methodName, string $declaringClassName, string $implementingClassName);
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
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='https://github.com/php-fig/log/blob/master/src/LoggerInterface.php'>Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$methodName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$declaringClassName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$implementingClassName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetbodycode" href="#mgetbodycode">#</a>
 <b>getBodyCode</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L558">source code</a></li>
</ul>

```php
public function getBodyCode(): string;
```



<b>Parameters:</b> not specified

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
<div class='method_description-block'>

<ul>
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L443">source code</a></li>
</ul>

```php
public function getDescription(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocblock" href="#mgetdocblock">#</a>
 <b>getDocBlock</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L82">source code</a></li>
</ul>

```php
public function getDocBlock(bool $recursive = true): \phpDocumentor\Reflection\DocBlock;
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
            <td>$recursive</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php'>\phpDocumentor\Reflection\DocBlock</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccomment" href="#mgetdoccomment">#</a>
 <b>getDocComment</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L563">source code</a></li>
</ul>

```php
public function getDocComment(): string;
```

<blockquote>Get the doc comment of an entity</blockquote>

<b>Parameters:</b> not specified

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
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommententity" href="#mgetdoccommententity">#</a>
 <b>getDocCommentEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L126">source code</a></li>
</ul>

```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommentline" href="#mgetdoccommentline">#</a>
 <b>getDocCommentLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L223">source code</a></li>
</ul>

```php
public function getDocCommentLine(): int|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


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
<li><a name="mgetdoccommentlinerecursive" href="#mgetdoccommentlinerecursive">#</a>
 <b>getDocCommentLineRecursive</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L210">source code</a></li>
</ul>

```php
public function getDocCommentLineRecursive(): int|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommentrecursive" href="#mgetdoccommentrecursive">#</a>
 <b>getDocCommentRecursive</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L192">source code</a></li>
</ul>

```php
public function getDocCommentRecursive(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetendline" href="#mgetendline">#</a>
 <b>getEndLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L537">source code</a></li>
</ul>

```php
public function getEndLine(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


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
<li><a name="mgetfilename" href="#mgetfilename">#</a>
 <b>getFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L253">source code</a></li>
</ul>

```php
public function getFileName(): string|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


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
<li><a name="mgetfirstreturnvalue" href="#mgetfirstreturnvalue">#</a>
 <b>getFirstReturnValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L546">source code</a></li>
</ul>

```php
public function getFirstReturnValue(): mixed;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


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
<li><a name="mgetimplementingclass" href="#mgetimplementingclass">#</a>
 <b>getImplementingClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L101">source code</a></li>
</ul>

```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a>
 <b>getImplementingClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L432">source code</a></li>
</ul>

```php
public function getImplementingClassName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingreflectionclass" href="#mgetimplementingreflectionclass">#</a>
 <b>getImplementingReflectionClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L96">source code</a></li>
</ul>

```php
public function getImplementingReflectionClass(): \Roave\BetterReflection\Reflection\ReflectionClass;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionClass.php'>\Roave\BetterReflection\Reflection\ReflectionClass</a>


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
<li><a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a>
 <b>getModifiersString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L262">source code</a></li>
</ul>

```php
public function getModifiersString(): string;
```



<b>Parameters:</b> not specified

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
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L239">source code</a></li>
</ul>

```php
public function getName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetnamespacename" href="#mgetnamespacename">#</a>
 <b>getNamespaceName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L115">source code</a></li>
</ul>

```php
public function getNamespaceName(): string;
```



<b>Parameters:</b> not specified

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
<div class='method_description-block'>

<ul>
<li><a name="mgetparameters" href="#mgetparameters">#</a>
 <b>getParameters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L347">source code</a></li>
</ul>

```php
public function getParameters(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparametersstring" href="#mgetparametersstring">#</a>
 <b>getParametersString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L417">source code</a></li>
</ul>

```php
public function getParametersString(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetphphandlersettings" href="#mgetphphandlersettings">#</a>
 <b>getPhpHandlerSettings</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L66">source code</a></li>
</ul>

```php
public function getPhpHandlerSettings(): \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/PhpHandlerSettings.php'>\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprototype" href="#mgetprototype">#</a>
 <b>getPrototype</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L161">source code</a></li>
</ul>

```php
public function getPrototype(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetreturntype" href="#mgetreturntype">#</a>
 <b>getReturnType</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L288">source code</a></li>
</ul>

```php
public function getReturnType(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentity" href="#mgetrootentity">#</a>
 <b>getRootEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L61">source code</a></li>
</ul>

```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L71">source code</a></li>
</ul>

```php
public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
```

<blockquote>Get parent collection of entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/ClassEntityCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetshortname" href="#mgetshortname">#</a>
 <b>getShortName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L106">source code</a></li>
</ul>

```php
public function getShortName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsignature" href="#mgetsignature">#</a>
 <b>getSignature</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L234">source code</a></li>
</ul>

```php
public function getSignature(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetstartcolumn" href="#mgetstartcolumn">#</a>
 <b>getStartColumn</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L528">source code</a></li>
</ul>

```php
public function getStartColumn(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


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
<li><a name="mgetstartline" href="#mgetstartline">#</a>
 <b>getStartLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L519">source code</a></li>
</ul>

```php
public function getStartLine(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


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
<li><a name="misconstructor" href="#misconstructor">#</a>
 <b>isConstructor</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L244">source code</a></li>
</ul>

```php
public function isConstructor(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misdynamic" href="#misdynamic">#</a>
 <b>isDynamic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L474">source code</a></li>
</ul>

```php
public function isDynamic(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misimplementedinparentclass" href="#misimplementedinparentclass">#</a>
 <b>isImplementedInParentClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L427">source code</a></li>
</ul>

```php
public function isImplementedInParentClass(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinitialization" href="#misinitialization">#</a>
 <b>isInitialization</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L455">source code</a></li>
</ul>

```php
public function isInitialization(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprivate" href="#misprivate">#</a>
 <b>isPrivate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L510">source code</a></li>
</ul>

```php
public function isPrivate(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


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
<li><a name="misprotected" href="#misprotected">#</a>
 <b>isProtected</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L501">source code</a></li>
</ul>

```php
public function isProtected(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


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
<li><a name="mispublic" href="#mispublic">#</a>
 <b>isPublic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L483">source code</a></li>
</ul>

```php
public function isPublic(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


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
<li><a name="misstatic" href="#misstatic">#</a>
 <b>isStatic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L492">source code</a></li>
</ul>

```php
public function isStatic(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


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
<li><a name="mparseannotationparams" href="#mparseannotationparams">#</a>
 <b>parseAnnotationParams</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/Entity/MethodEntity.php#L315">source code</a></li>
</ul>

```php
public static function parseAnnotationParams(array $params): array;
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
            <td>$params</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>

<!-- {% endraw %} -->