<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ClassConstantEntity<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L23">ClassConstantEntity</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant;

class ClassConstantEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface
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
    <a href="#mgetabsolutefilename">getAbsoluteFileName</a>
    - <i>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</i></li>
<li>
    <a href="#mgetast">getAst</a>
    - <i>Get AST for this entity</i></li>
<li>
    <a href="#mgetcachekey">getCacheKey</a>
    </li>
<li>
    <a href="#mgetcachedentitydependencies">getCachedEntityDependencies</a>
    </li>
<li>
    <a href="#mgetcurrentrootentity">getCurrentRootEntity</a>
    </li>
<li>
    <a href="#mgetdescription">getDescription</a>
    - <i>Get entity description</i></li>
<li>
    <a href="#mgetdescriptionlinks">getDescriptionLinks</a>
    - <i>Get parsed links from description and doc blocks `see` and `link`</i></li>
<li>
    <a href="#mgetdocblock">getDocBlock</a>
    - <i>Get DocBlock for current entity</i></li>
<li>
    <a href="#mgetdoccomment">getDocComment</a>
    - <i>Get the doc comment of an entity</i></li>
<li>
    <a href="#mgetdoccommententity">getDocCommentEntity</a>
    - <i>Link to an entity where docBlock is implemented for this entity</i></li>
<li>
    <a href="#mgetdoccommentline">getDocCommentLine</a>
    - <i>Get the code line number where the docBlock of the current entity begins</i></li>
<li>
    <a href="#mgetdocnote">getDocNote</a>
    - <i>Get the note annotation value</i></li>
<li>
    <a href="#mgetendline">getEndLine</a>
    - <i>Get the line number of the end of a constant's code in a file</i></li>
<li>
    <a href="#mgetexamples">getExamples</a>
    - <i>Get parsed examples from `examples` doc block</i></li>
<li>
    <a href="#mgetfilesourcelink">getFileSourceLink</a>
    </li>
<li>
    <a href="#mgetfirstexample">getFirstExample</a>
    - <i>Get first example from `examples` doc block</i></li>
<li>
    <a href="#mgetimplementingclass">getImplementingClass</a>
    - <i>Get the class like entity in which the current entity was implemented</i></li>
<li>
    <a href="#mgetimplementingclassname">getImplementingClassName</a>
    </li>
<li>
    <a href="#mgetname">getName</a>
    - <i>Constant name</i></li>
<li>
    <a href="#mgetnamespacename">getNamespaceName</a>
    - <i>Get the name of the namespace where the current class is implemented</i></li>
<li>
    <a href="#mgetobjectid">getObjectId</a>
    - <i>Get entity unique ID</i></li>
<li>
    <a href="#mgetrelativefilename">getRelativeFileName</a>
    - <i>File name relative to project_root configuration parameter</i></li>
<li>
    <a href="#mgetrootentity">getRootEntity</a>
    - <i>Get the class like entity where this constant was obtained</i></li>
<li>
    <a href="#mgetrootentitycollection">getRootEntityCollection</a>
    - <i>Get the collection of root entities to which this entity belongs</i></li>
<li>
    <a href="#mgetshortname">getShortName</a>
    - <i>Constant short name</i></li>
<li>
    <a href="#mgetstartline">getStartLine</a>
    - <i>Get the line number of the beginning of the constant code in a file</i></li>
<li>
    <a href="#mgetthrows">getThrows</a>
    - <i>Get parsed throws from `throws` doc block</i></li>
<li>
    <a href="#mgetthrowsdocblocklinks">getThrowsDocBlockLinks</a>
    </li>
<li>
    <a href="#mgetvalue">getValue</a>
    - <i>Get the compiled value of a constant</i></li>
<li>
    <a href="#mhasdescriptionlinks">hasDescriptionLinks</a>
    - <i>Checking if an entity has links in its description</i></li>
<li>
    <a href="#mhasexamples">hasExamples</a>
    - <i>Checking if an entity has `example` docBlock</i></li>
<li>
    <a href="#mhasthrows">hasThrows</a>
    - <i>Checking if an entity has `throws` docBlock</i></li>
<li>
    <a href="#misapi">isApi</a>
    - <i>Checking if an entity has `api` docBlock</i></li>
<li>
    <a href="#misdeprecated">isDeprecated</a>
    - <i>Checking if an entity has `deprecated` docBlock</i></li>
<li>
    <a href="#misentitycacheoutdated">isEntityCacheOutdated</a>
    - <i>Checking if the entity cache is out of date</i></li>
<li>
    <a href="#misentitydatacacheoutdated">isEntityDataCacheOutdated</a>
    </li>
<li>
    <a href="#misentityfilecanbeload">isEntityFileCanBeLoad</a>
    - <i>Checking if entity data can be retrieved</i></li>
<li>
    <a href="#misinternal">isInternal</a>
    - <i>Checking if an entity has `internal` docBlock</i></li>
<li>
    <a href="#misprivate">isPrivate</a>
    - <i>Check if a constant is a private constant</i></li>
<li>
    <a href="#misprotected">isProtected</a>
    - <i>Check if a constant is a protected constant</i></li>
<li>
    <a href="#mispublic">isPublic</a>
    - <i>Check if a constant is a public constant</i></li>
<li>
    <a href="#mreloadentitydependenciescache">reloadEntityDependenciesCache</a>
    - <i>Update entity dependency cache</i></li>
<li>
    <a href="#mremoveentityvaluefromcache">removeEntityValueFromCache</a>
    </li>
<li>
    <a href="#mremovenotusedentitydatacache">removeNotUsedEntityDataCache</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qmodifiers-flag-is-private"
               href="#qmodifiers-flag-is-private">#</a>
            <code>MODIFIERS_FLAG_IS_PRIVATE</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L44">source
                    code</a> </li>
            <li><a name="qmodifiers-flag-is-protected"
               href="#qmodifiers-flag-is-protected">#</a>
            <code>MODIFIERS_FLAG_IS_PROTECTED</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L37">source
                    code</a> </li>
            <li><a name="qmodifiers-flag-is-public"
               href="#qmodifiers-flag-is-public">#</a>
            <code>MODIFIERS_FLAG_IS_PUBLIC</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L30">source
                    code</a> </li>
            <li><a name="qvisibility-modifiers-flag-any"
               href="#qvisibility-modifiers-flag-any">#</a>
            <code>VISIBILITY_MODIFIERS_FLAG_ANY</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L46">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L54">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $constantName, string $implementingClassName);
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a></td>
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
<li><a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a>
 <b>getAbsoluteFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L102">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getAbsoluteFileName(): null|string;
```

<blockquote>Returns the absolute path to a file if it can be retrieved and if the file is in the project directory</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetast" href="#mgetast">#</a>
 <b>getAst</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L92">source code</a></li>
</ul>

```php
public function getAst(): \PhpParser\Node\Stmt\ClassConst;
```

<blockquote>Get AST for this entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/ClassConst.php'>\PhpParser\Node\Stmt\ClassConst</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcachekey" href="#mgetcachekey">#</a>
 <b>getCacheKey</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L23">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

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
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L660">source code</a></li>
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

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcurrentrootentity" href="#mgetcurrentrootentity">#</a>
 <b>getCurrentRootEntity</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L636">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCurrentRootEntity(): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L127">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDescription(): string;
```

<blockquote>Get entity description</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescriptionlinks" href="#mgetdescriptionlinks">#</a>
 <b>getDescriptionLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L419">source code</a></li>
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
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocblock" href="#mgetdocblock">#</a>
 <b>getDocBlock</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L213">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocBlock(): \phpDocumentor\Reflection\DocBlock;
```

<blockquote>Get DocBlock for current entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php'>\phpDocumentor\Reflection\DocBlock</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccomment" href="#mgetdoccomment">#</a>
 <b>getDocComment</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L627">source code</a></li>
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
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommententity" href="#mgetdoccommententity">#</a>
 <b>getDocCommentEntity</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L128">source code</a></li>
</ul>

```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
```

<blockquote>Link to an entity where docBlock is implemented for this entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommentline" href="#mgetdoccommentline">#</a>
 <b>getDocCommentLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L200">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocCommentLine(): null|int;
```

<blockquote>Get the code line number where the docBlock of the current entity begins</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocnote" href="#mgetdocnote">#</a>
 <b>getDocNote</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L614">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocNote(): string;
```

<blockquote>Get the note annotation value</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetendline" href="#mgetendline">#</a>
 <b>getEndLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L216">source code</a></li>
</ul>

```php
public function getEndLine(): int;
```

<blockquote>Get the line number of the end of a constant&#039;s code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetexamples" href="#mgetexamples">#</a>
 <b>getExamples</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L580">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getExamples(): array;
```

<blockquote>Get parsed examples from `examples` doc block</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a>
 <b>getFileSourceLink</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L171">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFileSourceLink(bool $withLine = true): null|string;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfirstexample" href="#mgetfirstexample">#</a>
 <b>getFirstExample</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L601">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFirstExample(): string;
```

<blockquote>Get first example from `examples` doc block</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclass" href="#mgetimplementingclass">#</a>
 <b>getImplementingClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L120">source code</a></li>
</ul>

```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

<blockquote>Get the class like entity in which the current entity was implemented</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a>
 <b>getImplementingClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L112">source code</a></li>
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
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L136">source code</a></li>
</ul>

```php
public function getName(): string;
```

<blockquote>Constant name</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetnamespacename" href="#mgetnamespacename">#</a>
 <b>getNamespaceName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L156">source code</a></li>
</ul>

```php
public function getNamespaceName(): string;
```

<blockquote>Get the name of the namespace where the current class is implemented</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetobjectid" href="#mgetobjectid">#</a>
 <b>getObjectId</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L185">source code</a></li>
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
<li><a name="mgetrelativefilename" href="#mgetrelativefilename">#</a>
 <b>getRelativeFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L90">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

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
<li><a name="mgetrootentity" href="#mgetrootentity">#</a>
 <b>getRootEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L82">source code</a></li>
</ul>

```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

<blockquote>Get the class like entity where this constant was obtained</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L74">source code</a></li>
</ul>

```php
public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get the collection of root entities to which this entity belongs</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetshortname" href="#mgetshortname">#</a>
 <b>getShortName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L146">source code</a></li>
</ul>

```php
public function getShortName(): string;
```

<blockquote>Constant short name</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/classes/ClassConstantEntity_2.md#mgetname">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity::getName()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetstartline" href="#mgetstartline">#</a>
 <b>getStartLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L204">source code</a></li>
</ul>

```php
public function getStartLine(): int;
```

<blockquote>Get the line number of the beginning of the constant code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetthrows" href="#mgetthrows">#</a>
 <b>getThrows</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L485">source code</a></li>
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
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetthrowsdocblocklinks" href="#mgetthrowsdocblocklinks">#</a>
 <b>getThrowsDocBlockLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L443">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getThrowsDocBlockLinks(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetvalue" href="#mgetvalue">#</a>
 <b>getValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L231">source code</a></li>
</ul>

```php
public function getValue(): string|array|int|bool|null|float;
```

<blockquote>Get the compiled value of a constant</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.float.php'>float</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/ConstExprEvaluationException.php">\PhpParser\ConstExprEvaluationException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasdescriptionlinks" href="#mhasdescriptionlinks">#</a>
 <b>hasDescriptionLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L272">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasDescriptionLinks(): bool;
```

<blockquote>Checking if an entity has links in its description</blockquote>

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L565">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasExamples(): bool;
```

<blockquote>Checking if an entity has `example` docBlock</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasthrows" href="#mhasthrows">#</a>
 <b>hasThrows</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L432">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasThrows(): bool;
```

<blockquote>Checking if an entity has `throws` docBlock</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misapi" href="#misapi">#</a>
 <b>isApi</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L244">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isApi(): bool;
```

<blockquote>Checking if an entity has `api` docBlock</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misdeprecated" href="#misdeprecated">#</a>
 <b>isDeprecated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L258">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isDeprecated(): bool;
```

<blockquote>Checking if an entity has `deprecated` docBlock</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a>
 <b>isEntityCacheOutdated</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L763">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityCacheOutdated(): bool;
```

<blockquote>Checking if the entity cache is out of date</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitydatacacheoutdated" href="#misentitydatacacheoutdated">#</a>
 <b>isEntityDataCacheOutdated</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L94">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L115">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityFileCanBeLoad(): bool;
```

<blockquote>Checking if entity data can be retrieved</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinternal" href="#misinternal">#</a>
 <b>isInternal</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L230">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isInternal(): bool;
```

<blockquote>Checking if an entity has `internal` docBlock</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprivate" href="#misprivate">#</a>
 <b>isPrivate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L192">source code</a></li>
</ul>

```php
public function isPrivate(): bool;
```

<blockquote>Check if a constant is a private constant</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misprotected" href="#misprotected">#</a>
 <b>isProtected</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L180">source code</a></li>
</ul>

```php
public function isProtected(): bool;
```

<blockquote>Check if a constant is a protected constant</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mispublic" href="#mispublic">#</a>
 <b>isPublic</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L168">source code</a></li>
</ul>

```php
public function isPublic(): bool;
```

<blockquote>Check if a constant is a public constant</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException_2.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreloadentitydependenciescache" href="#mreloadentitydependenciescache">#</a>
 <b>reloadEntityDependenciesCache</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L680">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function reloadEntityDependenciesCache(): array;
```

<blockquote>Update entity dependency cache</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremoveentityvaluefromcache" href="#mremoveentityvaluefromcache">#</a>
 <b>removeEntityValueFromCache</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L80">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function removeEntityValueFromCache(string $key): void;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovenotusedentitydatacache" href="#mremovenotusedentitydatacache">#</a>
 <b>removeNotUsedEntityDataCache</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L116">source code</a></li>
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