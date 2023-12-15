<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> MethodEntityInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L10">MethodEntityInterface</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

interface MethodEntityInterface extends \BumbleDocGen\Core\Parser\Entity\EntityInterface
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetabsolutefilename">getAbsoluteFileName</a>
    - <i>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</i></li>
<li>
    <a href="#mgetbodycode">getBodyCode</a>
    - <i>Get the code for this method</i></li>
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
<li><a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a>
 <b>getAbsoluteFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L53">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L140">source code</a></li>
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
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L89">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L38">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L133">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L82">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L75">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L45">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L30">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L17">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L16">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L61">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L68">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L46">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L52">source code</a></li>
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
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L23">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L37">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L161">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L31">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L24">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L124">source code</a></li>
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
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L58">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function isEntityCacheOutdated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misimplementedinparentclass" href="#misimplementedinparentclass">#</a>
 <b>isImplementedInParentClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L154">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L96">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L117">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L110">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L103">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php#L147">source code</a></li>
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