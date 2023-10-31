<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/entity.md">Entities and entities collections</a> <b>/</b> ConstantEntity<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L25">ConstantEntity</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

class ConstantEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface
```

<blockquote>Class constant entity</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mentitycacheisoutdated">entityCacheIsOutdated</a>
    </li>
<li>
    <a href="#mgetabsolutefilename">getAbsoluteFileName</a>
    - <i>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</i></li>
<li>
    <a href="#mgetcachekey">getCacheKey</a>
    </li>
<li>
    <a href="#mgetcachedentitydependencies">getCachedEntityDependencies</a>
    </li>
<li>
    <a href="#mgetdescription">getDescription</a>
    </li>
<li>
    <a href="#mgetdescriptionlinks">getDescriptionLinks</a>
    - <i>Get parsed links from description and doc blocks `see` and `link`</i></li>
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
    <a href="#mgetdocnote">getDocNote</a>
    </li>
<li>
    <a href="#mgetendline">getEndLine</a>
    </li>
<li>
    <a href="#mgetexamples">getExamples</a>
    - <i>Get parsed examples from `examples` doc block</i></li>
<li>
    <a href="#mgetfilename">getFileName</a>
    </li>
<li>
    <a href="#mgetfilesourcelink">getFileSourceLink</a>
    </li>
<li>
    <a href="#mgetfirstexample">getFirstExample</a>
    - <i>Get first example from @examples doc block</i></li>
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
    <a href="#mgetname">getName</a>
    </li>
<li>
    <a href="#mgetnamespacename">getNamespaceName</a>
    </li>
<li>
    <a href="#mgetobjectid">getObjectId</a>
    - <i>Get entity unique ID</i></li>
<li>
    <a href="#mgetphphandlersettings">getPhpHandlerSettings</a>
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
    <a href="#mgetstartline">getStartLine</a>
    </li>
<li>
    <a href="#mgetthrows">getThrows</a>
    - <i>Get parsed throws from `throws` doc block</i></li>
<li>
    <a href="#mhasdescriptionlinks">hasDescriptionLinks</a>
    </li>
<li>
    <a href="#mhasexamples">hasExamples</a>
    </li>
<li>
    <a href="#mhasthrows">hasThrows</a>
    </li>
<li>
    <a href="#misdeprecated">isDeprecated</a>
    </li>
<li>
    <a href="#misentitydatacacheoutdated">isEntityDataCacheOutdated</a>
    </li>
<li>
    <a href="#misentityfilecanbeload">isEntityFileCanBeLoad</a>
    </li>
<li>
    <a href="#misinternal">isInternal</a>
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
    <a href="#mreloadentitydependenciescache">reloadEntityDependenciesCache</a>
    </li>
<li>
    <a href="#mremovenotusedentitydatacache">removeNotUsedEntityDataCache</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L29">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $constantName, string $declaringClassName, string $implementingClassName);
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
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='https://github.com/php-fig/log/blob/master/src/LoggerInterface.php'>\Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$constantName</td>
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
<li><a name="mentitycacheisoutdated" href="#mentitycacheisoutdated">#</a>
 <b>entityCacheIsOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L556">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function entityCacheIsOutdated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a>
 <b>getAbsoluteFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L84">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getAbsoluteFileName(): string|null;
```

<blockquote>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachekey" href="#mgetcachekey">#</a>
 <b>getCacheKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L622">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCacheKey(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachedentitydependencies" href="#mgetcachedentitydependencies">#</a>
 <b>getCachedEntityDependencies</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L488">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCachedEntityDependencies(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L149">source code</a></li>
</ul>

```php
public function getDescription(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescriptionlinks" href="#mgetdescriptionlinks">#</a>
 <b>getDescriptionLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L324">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDescriptionLinks(): array;
```

<blockquote>Get parsed links from description and doc blocks `see` and `link`</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocblock" href="#mgetdocblock">#</a>
 <b>getDocBlock</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L61">source code</a></li>
</ul>

```php
public function getDocBlock(): \phpDocumentor\Reflection\DocBlock;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php'>\phpDocumentor\Reflection\DocBlock</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccomment" href="#mgetdoccomment">#</a>
 <b>getDocComment</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L465">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocComment(): string;
```

<blockquote>Get the doc comment of an entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommententity" href="#mgetdoccommententity">#</a>
 <b>getDocCommentEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L103">source code</a></li>
</ul>

```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocnote" href="#mgetdocnote">#</a>
 <b>getDocNote</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L452">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocNote(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetendline" href="#mgetendline">#</a>
 <b>getEndLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L195">source code</a></li>
</ul>

```php
public function getEndLine(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetexamples" href="#mgetexamples">#</a>
 <b>getExamples</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L429">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getExamples(): array;
```

<blockquote>Get parsed examples from `examples` doc block</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilename" href="#mgetfilename">#</a>
 <b>getFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L140">source code</a></li>
</ul>

```php
public function getFileName(): string|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a>
 <b>getFileSourceLink</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L126">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFileSourceLink(bool $withLine = true): string|null;
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
            <td>$withLine</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfirstexample" href="#mgetfirstexample">#</a>
 <b>getFirstExample</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L446">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFirstExample(): string;
```

<blockquote>Get first example from @examples doc block</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclass" href="#mgetimplementingclass">#</a>
 <b>getImplementingClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L98">source code</a></li>
</ul>

```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a>
 <b>getImplementingClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L93">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L88">source code</a></li>
</ul>

```php
public function getImplementingReflectionClass(): \Roave\BetterReflection\Reflection\ReflectionClass;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionClass.php'>\Roave\BetterReflection\Reflection\ReflectionClass</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L117">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L131">source code</a></li>
</ul>

```php
public function getNamespaceName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetobjectid" href="#mgetobjectid">#</a>
 <b>getObjectId</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L138">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getObjectId(): string;
```

<blockquote>Get entity unique ID</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetphphandlersettings" href="#mgetphphandlersettings">#</a>
 <b>getPhpHandlerSettings</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L47">source code</a></li>
</ul>

```php
public function getPhpHandlerSettings(): \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php'>\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentity" href="#mgetrootentity">#</a>
 <b>getRootEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L67">source code</a></li>
</ul>

```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L52">source code</a></li>
</ul>

```php
public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
```

<blockquote>Get parent collection of entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntityCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetshortname" href="#mgetshortname">#</a>
 <b>getShortName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L122">source code</a></li>
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
<li><a name="mgetstartline" href="#mgetstartline">#</a>
 <b>getStartLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L186">source code</a></li>
</ul>

```php
public function getStartLine(): int;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetthrows" href="#mgetthrows">#</a>
 <b>getThrows</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L379">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getThrows(): array;
```

<blockquote>Get parsed throws from `throws` doc block</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasdescriptionlinks" href="#mhasdescriptionlinks">#</a>
 <b>hasDescriptionLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L179">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasDescriptionLinks(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasexamples" href="#mhasexamples">#</a>
 <b>hasExamples</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L418">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasExamples(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasthrows" href="#mhasthrows">#</a>
 <b>hasThrows</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L330">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasThrows(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misdeprecated" href="#misdeprecated">#</a>
 <b>isDeprecated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L169">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isDeprecated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitydatacacheoutdated" href="#misentitydatacacheoutdated">#</a>
 <b>isEntityDataCacheOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L60">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function isEntityDataCacheOutdated(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentityfilecanbeload" href="#misentityfilecanbeload">#</a>
 <b>isEntityFileCanBeLoad</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L74">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityFileCanBeLoad(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinternal" href="#misinternal">#</a>
 <b>isInternal</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L162">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isInternal(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprivate" href="#misprivate">#</a>
 <b>isPrivate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L177">source code</a></li>
</ul>

```php
public function isPrivate(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprotected" href="#misprotected">#</a>
 <b>isProtected</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L168">source code</a></li>
</ul>

```php
public function isProtected(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mispublic" href="#mispublic">#</a>
 <b>isPublic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php#L159">source code</a></li>
</ul>

```php
public function isPublic(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreloadentitydependenciescache" href="#mreloadentitydependenciescache">#</a>
 <b>reloadEntityDependenciesCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L506">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function reloadEntityDependenciesCache(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovenotusedentitydatacache" href="#mremovenotusedentitydatacache">#</a>
 <b>removeNotUsedEntityDataCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L80">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function removeNotUsedEntityDataCache(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->