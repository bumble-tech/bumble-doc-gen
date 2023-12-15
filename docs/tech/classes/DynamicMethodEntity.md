<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> DynamicMethodEntity<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L18">DynamicMethodEntity</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

class DynamicMethodEntity implements \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface
```

<blockquote>Method obtained by parsing the "method" annotation</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetabsolutefilename">getAbsoluteFileName</a>
    - <i>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</i></li>
<li>
    <a href="#mgetbodycode">getBodyCode</a>
    - <i>Get the code for this method</i></li>
<li>
    <a href="#mgetcallmethod">getCallMethod</a>
    - <i>Get the entity of the magic method that will be called instead of the current virtual one</i></li>
<li>
    <a href="#mgetdescription">getDescription</a>
    - <i>Get a description of this method</i></li>
<li>
    <a href="#mgetendline">getEndLine</a>
    - <i>Get the line number of the end of a method's code in a file</i></li>
<li>
    <a href="#mgetfirstreturnvalue">getFirstReturnValue</a>
    - <i>Get the compiled first return value of a method (if possible)</i></li>
<li>
    <a href="#mgetimplementingclass">getImplementingClass</a>
    - <i>Get the ClassLike entity in which this method was implemented</i></li>
<li>
    <a href="#mgetimplementingclassname">getImplementingClassName</a>
    - <i>Get the name of the class in which this method is implemented</i></li>
<li>
    <a href="#mgetmodifiersstring">getModifiersString</a>
    - <i>Get a text representation of method modifiers</i></li>
<li>
    <a href="#mgetname">getName</a>
    - <i>Full name of the entity</i></li>
<li>
    <a href="#mgetnamespacename">getNamespaceName</a>
    - <i>Namespace of the class that contains this method</i></li>
<li>
    <a href="#mgetobjectid">getObjectId</a>
    - <i>Entity object ID</i></li>
<li>
    <a href="#mgetparameters">getParameters</a>
    - <i>Get a list of method parameters</i></li>
<li>
    <a href="#mgetparametersstring">getParametersString</a>
    - <i>Get a list of method parameters as a string</i></li>
<li>
    <a href="#mgetrelativefilename">getRelativeFileName</a>
    - <i>File name relative to project_root configuration parameter</i></li>
<li>
    <a href="#mgetreturntype">getReturnType</a>
    - <i>Get the return type of method</i></li>
<li>
    <a href="#mgetrootentity">getRootEntity</a>
    - <i>Get the class like entity where this method was obtained</i></li>
<li>
    <a href="#mgetrootentitycollection">getRootEntityCollection</a>
    - <i>Get parent collection of entities</i></li>
<li>
    <a href="#mgetshortname">getShortName</a>
    - <i>Short name of the entity</i></li>
<li>
    <a href="#mgetsignature">getSignature</a>
    - <i>Get the method signature as a string</i></li>
<li>
    <a href="#mgetstartcolumn">getStartColumn</a>
    - <i>Get the column number of the beginning of the method code in a file</i></li>
<li>
    <a href="#mgetstartline">getStartLine</a>
    - <i>Get the line number of the beginning of the method code in a file</i></li>
<li>
    <a href="#misdynamic">isDynamic</a>
    - <i>Check if a method is a dynamic method, that is, implementable using __call or __callStatic</i></li>
<li>
    <a href="#misentitycacheoutdated">isEntityCacheOutdated</a>
    </li>
<li>
    <a href="#misimplementedinparentclass">isImplementedInParentClass</a>
    - <i>Check if this method is implemented in the parent class</i></li>
<li>
    <a href="#misinitialization">isInitialization</a>
    - <i>Check if a method is an initialization method</i></li>
<li>
    <a href="#misprivate">isPrivate</a>
    - <i>Check if a method is a private method</i></li>
<li>
    <a href="#misprotected">isProtected</a>
    - <i>Check if a method is a protected method</i></li>
<li>
    <a href="#mispublic">isPublic</a>
    - <i>Check if a method is a public method</i></li>
<li>
    <a href="#misstatic">isStatic</a>
    - <i>Check if this method is static</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L20">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \phpDocumentor\Reflection\DocBlock\Tags\Method $annotationMethod);
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$annotationMethod</td>
            <td><a href='https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock/Tags/Method.php'>\phpDocumentor\Reflection\DocBlock\Tags\Method</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a>
 <b>getAbsoluteFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L327">source code</a></li>
</ul>

```php
public function getAbsoluteFileName(): null|string;
```

<blockquote>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetbodycode" href="#mgetbodycode">#</a>
 <b>getBodyCode</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L304">source code</a></li>
</ul>

```php
public function getBodyCode(): string;
```

<blockquote>Get the code for this method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcallmethod" href="#mgetcallmethod">#</a>
 <b>getCallMethod</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L67">source code</a></li>
</ul>

```php
public function getCallMethod(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```

<blockquote>Get the entity of the magic method that will be called instead of the current virtual one</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L214">source code</a></li>
</ul>

```php
public function getDescription(): string;
```

<blockquote>Get a description of this method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetendline" href="#mgetendline">#</a>
 <b>getEndLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L115">source code</a></li>
</ul>

```php
public function getEndLine(): int;
```

<blockquote>Get the line number of the end of a method&#039;s code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfirstreturnvalue" href="#mgetfirstreturnvalue">#</a>
 <b>getFirstReturnValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L296">source code</a></li>
</ul>

```php
public function getFirstReturnValue(): mixed;
```

<blockquote>Get the compiled first return value of a method (if possible)</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclass" href="#mgetimplementingclass">#</a>
 <b>getImplementingClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L240">source code</a></li>
</ul>

```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

<blockquote>Get the ClassLike entity in which this method was implemented</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a>
 <b>getImplementingClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L196">source code</a></li>
</ul>

```php
public function getImplementingClassName(): string;
```

<blockquote>Get the name of the class in which this method is implemented</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a>
 <b>getModifiersString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L124">source code</a></li>
</ul>

```php
public function getModifiersString(): string;
```

<blockquote>Get a text representation of method modifiers</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L39">source code</a></li>
</ul>

```php
public function getName(): string;
```

<blockquote>Full name of the entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetnamespacename" href="#mgetnamespacename">#</a>
 <b>getNamespaceName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L256">source code</a></li>
</ul>

```php
public function getNamespaceName(): string;
```

<blockquote>Namespace of the class that contains this method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetobjectid" href="#mgetobjectid">#</a>
 <b>getObjectId</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L309">source code</a></li>
</ul>

```php
public function getObjectId(): string;
```

<blockquote>Entity object ID</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparameters" href="#mgetparameters">#</a>
 <b>getParameters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L161">source code</a></li>
</ul>

```php
public function getParameters(): array;
```

<blockquote>Get a list of method parameters</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparametersstring" href="#mgetparametersstring">#</a>
 <b>getParametersString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L181">source code</a></li>
</ul>

```php
public function getParametersString(): string;
```

<blockquote>Get a list of method parameters as a string</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrelativefilename" href="#mgetrelativefilename">#</a>
 <b>getRelativeFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L83">source code</a></li>
</ul>

```php
public function getRelativeFileName(): null|string;
```

<blockquote>File name relative to project_root configuration parameter</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/classes/Configuration_2.md#mgetprojectroot">\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetreturntype" href="#mgetreturntype">#</a>
 <b>getReturnType</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L140">source code</a></li>
</ul>

```php
public function getReturnType(): string;
```

<blockquote>Get the return type of method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentity" href="#mgetrootentity">#</a>
 <b>getRootEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L31">source code</a></li>
</ul>

```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

<blockquote>Get the class like entity where this method was obtained</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L317">source code</a></li>
</ul>

```php
public function getRootEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```

<blockquote>Get parent collection of entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetshortname" href="#mgetshortname">#</a>
 <b>getShortName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L248">source code</a></li>
</ul>

```php
public function getShortName(): string;
```

<blockquote>Short name of the entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsignature" href="#mgetsignature">#</a>
 <b>getSignature</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L49">source code</a></li>
</ul>

```php
public function getSignature(): string;
```

<blockquote>Get the method signature as a string</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetstartcolumn" href="#mgetstartcolumn">#</a>
 <b>getStartColumn</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L104">source code</a></li>
</ul>

```php
public function getStartColumn(): int;
```

<blockquote>Get the column number of the beginning of the method code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetstartline" href="#mgetstartline">#</a>
 <b>getStartLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L93">source code</a></li>
</ul>

```php
public function getStartLine(): int;
```

<blockquote>Get the line number of the beginning of the method code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misdynamic" href="#misdynamic">#</a>
 <b>isDynamic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L288">source code</a></li>
</ul>

```php
public function isDynamic(): bool;
```

<blockquote>Check if a method is a dynamic method, that is, implementable using __call or __callStatic</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a>
 <b>isEntityCacheOutdated</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L339">source code</a></li>
</ul>

```php
public function isEntityCacheOutdated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misimplementedinparentclass" href="#misimplementedinparentclass">#</a>
 <b>isImplementedInParentClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L206">source code</a></li>
</ul>

```php
public function isImplementedInParentClass(): bool;
```

<blockquote>Check if this method is implemented in the parent class</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinitialization" href="#misinitialization">#</a>
 <b>isInitialization</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L225">source code</a></li>
</ul>

```php
public function isInitialization(): bool;
```

<blockquote>Check if a method is an initialization method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprivate" href="#misprivate">#</a>
 <b>isPrivate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L280">source code</a></li>
</ul>

```php
public function isPrivate(): bool;
```

<blockquote>Check if a method is a private method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprotected" href="#misprotected">#</a>
 <b>isProtected</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L272">source code</a></li>
</ul>

```php
public function isProtected(): bool;
```

<blockquote>Check if a method is a protected method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mispublic" href="#mispublic">#</a>
 <b>isPublic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L264">source code</a></li>
</ul>

```php
public function isPublic(): bool;
```

<blockquote>Check if a method is a public method</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misstatic" href="#misstatic">#</a>
 <b>isStatic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L57">source code</a></li>
</ul>

```php
public function isStatic(): bool;
```

<blockquote>Check if this method is static</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->