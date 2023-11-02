<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/entity.md">Entities and entities collections</a> <b>/</b> ClassEntity<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L38">ClassEntity</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

class ClassEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface, \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface
```

<blockquote>Class entity</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcursortodocattributelinkfragment">cursorToDocAttributeLinkFragment</a>
    </li>
<li>
    <a href="#mdocumentcreationallowed">documentCreationAllowed</a>
    </li>
<li>
    <a href="#mentitycacheisoutdated">entityCacheIsOutdated</a>
    </li>
<li>
    <a href="#mentitydatacanbeloaded">entityDataCanBeLoaded</a>
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
    <a href="#mgetcasesnames">getCasesNames</a>
    </li>
<li>
    <a href="#mgetconstant">getConstant</a>
    </li>
<li>
    <a href="#mgetconstantentity">getConstantEntity</a>
    </li>
<li>
    <a href="#mgetconstantentitycollection">getConstantEntityCollection</a>
    </li>
<li>
    <a href="#mgetconstants">getConstants</a>
    </li>
<li>
    <a href="#mgetconstantsdata">getConstantsData</a>
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
    <a href="#mgetdocrender">getDocRender</a>
    </li>
<li>
    <a href="#mgetendline">getEndLine</a>
    </li>
<li>
    <a href="#mgetentitydependencies">getEntityDependencies</a>
    </li>
<li>
    <a href="#mgetexamples">getExamples</a>
    - <i>Get parsed examples from `examples` doc block</i></li>
<li>
    <a href="#mgetextends">getExtends</a>
    </li>
<li>
    <a href="#mgetfilecontent">getFileContent</a>
    </li>
<li>
    <a href="#mgetfilename">getFileName</a>
    - <i>Returns the relative path to a file if it can be retrieved and if the file is in the project directory</i></li>
<li>
    <a href="#mgetfilesourcelink">getFileSourceLink</a>
    </li>
<li>
    <a href="#mgetfirstexample">getFirstExample</a>
    - <i>Get first example from @examples doc block</i></li>
<li>
    <a href="#mgetfullfilename">getFullFileName</a>
    </li>
<li>
    <a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a>
    </li>
<li>
    <a href="#mgetinterfacenames">getInterfaceNames</a>
    </li>
<li>
    <a href="#mgetinterfacesentities">getInterfacesEntities</a>
    </li>
<li>
    <a href="#mgetinterfacesstring">getInterfacesString</a>
    </li>
<li>
    <a href="#mgetmethodentity">getMethodEntity</a>
    </li>
<li>
    <a href="#mgetmethodentitycollection">getMethodEntityCollection</a>
    </li>
<li>
    <a href="#mgetmethodsdata">getMethodsData</a>
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
    <a href="#mgetobjectid">getObjectId</a>
    - <i>Get entity unique ID</i></li>
<li>
    <a href="#mgetparentclass">getParentClass</a>
    </li>
<li>
    <a href="#mgetparentclassname">getParentClassName</a>
    </li>
<li>
    <a href="#mgetparentclassnames">getParentClassNames</a>
    </li>
<li>
    <a href="#mgetphphandlersettings">getPhpHandlerSettings</a>
    </li>
<li>
    <a href="#mgetplugindata">getPluginData</a>
    </li>
<li>
    <a href="#mgetpropertiesdata">getPropertiesData</a>
    </li>
<li>
    <a href="#mgetpropertyentity">getPropertyEntity</a>
    </li>
<li>
    <a href="#mgetpropertyentitycollection">getPropertyEntityCollection</a>
    </li>
<li>
    <a href="#mgetreflector">getReflector</a>
    </li>
<li>
    <a href="#mgetrelativefilename">getRelativeFileName</a>
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
    <a href="#mgettraitsnames">getTraitsNames</a>
    </li>
<li>
    <a href="#mhasannotationkey">hasAnnotationKey</a>
    </li>
<li>
    <a href="#mhasconstant">hasConstant</a>
    </li>
<li>
    <a href="#mhasdescriptionlinks">hasDescriptionLinks</a>
    </li>
<li>
    <a href="#mhasexamples">hasExamples</a>
    </li>
<li>
    <a href="#mhasmethod">hasMethod</a>
    </li>
<li>
    <a href="#mhasparentclass">hasParentClass</a>
    </li>
<li>
    <a href="#mhasproperty">hasProperty</a>
    </li>
<li>
    <a href="#mhasthrows">hasThrows</a>
    </li>
<li>
    <a href="#mhastraits">hasTraits</a>
    </li>
<li>
    <a href="#mimplementsinterface">implementsInterface</a>
    </li>
<li>
    <a href="#misabstract">isAbstract</a>
    </li>
<li>
    <a href="#misclassload">isClassLoad</a>
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
    <a href="#misentitynamevalid">isEntityNameValid</a>
    - <i>Check if entity name is valid</i></li>
<li>
    <a href="#misenum">isEnum</a>
    </li>
<li>
    <a href="#misexternallibraryentity">isExternalLibraryEntity</a>
    - <i>The entity is loaded from a third party library and should not be treated the same as a standard one</i></li>
<li>
    <a href="#misingit">isInGit</a>
    - <i>Checking if class file is in git repository</i></li>
<li>
    <a href="#misinstantiable">isInstantiable</a>
    </li>
<li>
    <a href="#misinterface">isInterface</a>
    </li>
<li>
    <a href="#misinternal">isInternal</a>
    </li>
<li>
    <a href="#missubclassof">isSubclassOf</a>
    </li>
<li>
    <a href="#mistrait">isTrait</a>
    </li>
<li>
    <a href="#mloadplugindata">loadPluginData</a>
    </li>
<li>
    <a href="#mreloadentitydependenciescache">reloadEntityDependenciesCache</a>
    </li>
<li>
    <a href="#mremoveentityvaluefromcache">removeEntityValueFromCache</a>
    </li>
<li>
    <a href="#mremovenotusedentitydatacache">removeNotUsedEntityDataCache</a>
    </li>
<li>
    <a href="#msetreflectionclass">setReflectionClass</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L47">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper $reflector, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection $classEntityCollection, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\LanguageHandler\Php\Parser\ComposerParser $composerParser, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $className, string|null $relativeFileName);
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
            <td>$phpHandlerSettings</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php'>\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflector</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classEntityCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntityCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$composerParser</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ComposerParser.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ComposerParser</a></td>
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
            <td>$className</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$relativeFileName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcursortodocattributelinkfragment" href="#mcursortodocattributelinkfragment">#</a>
 <b>cursorToDocAttributeLinkFragment</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L965">source code</a></li>
</ul>

```php
public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string;
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
            <td>$cursor</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$isForDocument</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdocumentcreationallowed" href="#mdocumentcreationallowed">#</a>
 <b>documentCreationAllowed</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L175">source code</a></li>
</ul>

```php
public function documentCreationAllowed(): bool;
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
<li><a name="mentitycacheisoutdated" href="#mentitycacheisoutdated">#</a>
 <b>entityCacheIsOutdated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L566">source code</a></li>
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
<li><a name="mentitydatacanbeloaded" href="#mentitydatacanbeloaded">#</a>
 <b>entityDataCanBeLoaded</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L311">source code</a></li>
</ul>

```php
public function entityDataCanBeLoaded(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a>
 <b>getAbsoluteFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L85">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L20">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L489">source code</a></li>
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
<li><a name="mgetcasesnames" href="#mgetcasesnames">#</a>
 <b>getCasesNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L735">source code</a></li>
</ul>

```php
public function getCasesNames(): array;
```



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
<li><a name="mgetconstant" href="#mgetconstant">#</a>
 <b>getConstant</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L896">source code</a></li>
</ul>

```php
public function getConstant(string $name): string|array|int|bool|null|float;
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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.float.php'>float</a>


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
<li><a name="mgetconstantentity" href="#mgetconstantentity">#</a>
 <b>getConstantEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L629">source code</a></li>
</ul>

```php
public function getConstantEntity(string $constantName, bool $unsafe = true): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity|null;
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
            <td>$constantName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstantentitycollection" href="#mgetconstantentitycollection">#</a>
 <b>getConstantEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L608">source code</a></li>
</ul>

```php
public function getConstantEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntityCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ConstantEntityCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntityCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstants" href="#mgetconstants">#</a>
 <b>getConstants</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L933">source code</a></li>
</ul>

```php
public function getConstants(): array;
```



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
<li><a name="mgetconstantsdata" href="#mgetconstantsdata">#</a>
 <b>getConstantsData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L799">source code</a></li>
</ul>

```php
public function getConstantsData(): array;
```



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
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L716">source code</a></li>
</ul>

```php
public function getDescription(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescriptionlinks" href="#mgetdescriptionlinks">#</a>
 <b>getDescriptionLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L325">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L149">source code</a></li>
</ul>

```php
public function getDocBlock(): \phpDocumentor\Reflection\DocBlock;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php'>\phpDocumentor\Reflection\DocBlock</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccomment" href="#mgetdoccomment">#</a>
 <b>getDocComment</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L466">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L186">source code</a></li>
</ul>

```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocnote" href="#mgetdocnote">#</a>
 <b>getDocNote</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L453">source code</a></li>
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
<li><a name="mgetdocrender" href="#mgetdocrender">#</a>
 <b>getDocRender</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L942">source code</a></li>
</ul>

```php
public function getDocRender(): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php'>\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface</a>


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
<li><a name="mgetendline" href="#mgetendline">#</a>
 <b>getEndLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L397">source code</a></li>
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
<li><a name="mgetentitydependencies" href="#mgetentitydependencies">#</a>
 <b>getEntityDependencies</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L118">source code</a></li>
</ul>

```php
public function getEntityDependencies(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetexamples" href="#mgetexamples">#</a>
 <b>getExamples</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L430">source code</a></li>
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
<li><a name="mgetextends" href="#mgetextends">#</a>
 <b>getExtends</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L438">source code</a></li>
</ul>

```php
public function getExtends(): string|null;
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
<li><a name="mgetfilecontent" href="#mgetfilecontent">#</a>
 <b>getFileContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L749">source code</a></li>
</ul>

```php
public function getFileContent(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilename" href="#mgetfilename">#</a>
 <b>getFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L366">source code</a></li>
</ul>

```php
public function getFileName(): string|null;
```

<blockquote>Returns the relative path to a file if it can be retrieved and if the file is in the project directory</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a>
 <b>getFileSourceLink</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L127">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L447">source code</a></li>
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
<li><a name="mgetfullfilename" href="#mgetfullfilename">#</a>
 <b>getFullFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L375">source code</a></li>
</ul>

```php
public function getFullFileName(): string|null;
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
<li><a name="mgetimplementingreflectionclass" href="#mgetimplementingreflectionclass">#</a>
 <b>getImplementingReflectionClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L276">source code</a></li>
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
<li><a name="mgetinterfacenames" href="#mgetinterfacenames">#</a>
 <b>getInterfaceNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L499">source code</a></li>
</ul>

```php
public function getInterfaceNames(): array;
```



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
<li><a name="mgetinterfacesentities" href="#mgetinterfacesentities">#</a>
 <b>getInterfacesEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L457">source code</a></li>
</ul>

```php
public function getInterfacesEntities(): array;
```



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
<li><a name="mgetinterfacesstring" href="#mgetinterfacesstring">#</a>
 <b>getInterfacesString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L579">source code</a></li>
</ul>

```php
public function getInterfacesString(): string;
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
<li><a name="mgetmethodentity" href="#mgetmethodentity">#</a>
 <b>getMethodEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L701">source code</a></li>
</ul>

```php
public function getMethodEntity(string $methodName, bool $unsafe = true): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity|null;
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
            <td>$methodName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethodentitycollection" href="#mgetmethodentitycollection">#</a>
 <b>getMethodEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L680">source code</a></li>
</ul>

```php
public function getMethodEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntityCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/MethodEntityCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntityCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethodsdata" href="#mgetmethodsdata">#</a>
 <b>getMethodsData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L765">source code</a></li>
</ul>

```php
public function getMethodsData(): array;
```



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
<li><a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a>
 <b>getModifiersString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L406">source code</a></li>
</ul>

```php
public function getModifiersString(): string;
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
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L286">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L334">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L75">source code</a></li>
</ul>

```php
public function getObjectId(): string;
```

<blockquote>Get entity unique ID</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparentclass" href="#mgetparentclass">#</a>
 <b>getParentClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L566">source code</a></li>
</ul>

```php
public function getParentClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


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
<li><a name="mgetparentclassname" href="#mgetparentclassname">#</a>
 <b>getParentClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L554">source code</a></li>
</ul>

```php
public function getParentClassName(): string|null;
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
<li><a name="mgetparentclassnames" href="#mgetparentclassnames">#</a>
 <b>getParentClassNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L472">source code</a></li>
</ul>

```php
public function getParentClassNames(): array;
```



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
<li><a name="mgetphphandlersettings" href="#mgetphphandlersettings">#</a>
 <b>getPhpHandlerSettings</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L100">source code</a></li>
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
<li><a name="mgetplugindata" href="#mgetplugindata">#</a>
 <b>getPluginData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L221">source code</a></li>
</ul>

```php
public function getPluginData(string $pluginKey): array|null;
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
            <td>$pluginKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpropertiesdata" href="#mgetpropertiesdata">#</a>
 <b>getPropertiesData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L782">source code</a></li>
</ul>

```php
public function getPropertiesData(): array;
```



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
<li><a name="mgetpropertyentity" href="#mgetpropertyentity">#</a>
 <b>getPropertyEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L665">source code</a></li>
</ul>

```php
public function getPropertyEntity(string $propertyName, bool $unsafe = true): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity|null;
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
            <td>$propertyName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PropertyEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpropertyentitycollection" href="#mgetpropertyentitycollection">#</a>
 <b>getPropertyEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L644">source code</a></li>
</ul>

```php
public function getPropertyEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntityCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PropertyEntityCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntityCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetreflector" href="#mgetreflector">#</a>
 <b>getReflector</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L95">source code</a></li>
</ul>

```php
public function getReflector(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Reflection/ReflectorWrapper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrelativefilename" href="#mgetrelativefilename">#</a>
 <b>getRelativeFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L343">source code</a></li>
</ul>

```php
public function getRelativeFileName(bool $loadIfEmpty = true): string|null;
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
            <td>$loadIfEmpty</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

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
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L105">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L324">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L388">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L380">source code</a></li>
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
<li><a name="mgettraitsnames" href="#mgettraitsnames">#</a>
 <b>getTraitsNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L588">source code</a></li>
</ul>

```php
public function getTraitsNames(): array;
```



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
<li><a name="mhasannotationkey" href="#mhasannotationkey">#</a>
 <b>hasAnnotationKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L281">source code</a></li>
</ul>

```php
public function hasAnnotationKey(string $annotationKey): bool;
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
            <td>$annotationKey</td>
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
<li><a name="mhasconstant" href="#mhasconstant">#</a>
 <b>hasConstant</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L870">source code</a></li>
</ul>

```php
public function hasConstant(string $constant): bool;
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
            <td>$constant</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

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
<li><a name="mhasdescriptionlinks" href="#mhasdescriptionlinks">#</a>
 <b>hasDescriptionLinks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L180">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L419">source code</a></li>
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
<li><a name="mhasmethod" href="#mhasmethod">#</a>
 <b>hasMethod</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L852">source code</a></li>
</ul>

```php
public function hasMethod(string $method): bool;
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
            <td>$method</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

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
<li><a name="mhasparentclass" href="#mhasparentclass">#</a>
 <b>hasParentClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L919">source code</a></li>
</ul>

```php
public function hasParentClass(string $parentClassName): bool;
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
            <td>$parentClassName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

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
<li><a name="mhasproperty" href="#mhasproperty">#</a>
 <b>hasProperty</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L861">source code</a></li>
</ul>

```php
public function hasProperty(string $property): bool;
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
            <td>$property</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

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
<li><a name="mhasthrows" href="#mhasthrows">#</a>
 <b>hasThrows</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L331">source code</a></li>
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
<li><a name="mhastraits" href="#mhastraits">#</a>
 <b>hasTraits</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L597">source code</a></li>
</ul>

```php
public function hasTraits(): bool;
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
<li><a name="mimplementsinterface" href="#mimplementsinterface">#</a>
 <b>implementsInterface</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L905">source code</a></li>
</ul>

```php
public function implementsInterface(string $interfaceName): bool;
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
            <td>$interfaceName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

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
<li><a name="misabstract" href="#misabstract">#</a>
 <b>isAbstract</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L825">source code</a></li>
</ul>

```php
public function isAbstract(): bool;
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
<li><a name="misclassload" href="#misclassload">#</a>
 <b>isClassLoad</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L294">source code</a></li>
</ul>

```php
public function isClassLoad(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misdeprecated" href="#misdeprecated">#</a>
 <b>isDeprecated</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L170">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L77">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L75">source code</a></li>
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
<li><a name="misentitynamevalid" href="#misentitynamevalid">#</a>
 <b>isEntityNameValid</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L70">source code</a></li>
</ul>

```php
public static function isEntityNameValid(string $entityName): bool;
```

<blockquote>Check if entity name is valid</blockquote>

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
            <td>$entityName</td>
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
<li><a name="misenum" href="#misenum">#</a>
 <b>isEnum</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L726">source code</a></li>
</ul>

```php
public function isEnum(): bool;
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
<li><a name="misexternallibraryentity" href="#misexternallibraryentity">#</a>
 <b>isExternalLibraryEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L84">source code</a></li>
</ul>

```php
public function isExternalLibraryEntity(): bool;
```

<blockquote>The entity is loaded from a third party library and should not be treated the same as a standard one</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misingit" href="#misingit">#</a>
 <b>isInGit</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L161">source code</a></li>
</ul>

```php
public function isInGit(): bool;
```

<blockquote>Checking if class file is in git repository</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinstantiable" href="#misinstantiable">#</a>
 <b>isInstantiable</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L816">source code</a></li>
</ul>

```php
public function isInstantiable(): bool;
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
<li><a name="misinterface" href="#misinterface">#</a>
 <b>isInterface</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L834">source code</a></li>
</ul>

```php
public function isInterface(): bool;
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L163">source code</a></li>
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
<li><a name="missubclassof" href="#missubclassof">#</a>
 <b>isSubclassOf</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L879">source code</a></li>
</ul>

```php
public function isSubclassOf(string $className): bool;
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
<li><a name="mistrait" href="#mistrait">#</a>
 <b>isTrait</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L843">source code</a></li>
</ul>

```php
public function isTrait(): bool;
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
<li><a name="mloadplugindata" href="#mloadplugindata">#</a>
 <b>loadPluginData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L216">source code</a></li>
</ul>

```php
public function loadPluginData(string $pluginKey, array $data): void;
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
            <td>$pluginKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$data</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreloadentitydependenciescache" href="#mreloadentitydependenciescache">#</a>
 <b>reloadEntityDependenciesCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L507">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function reloadEntityDependenciesCache(): array;
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
<li><a name="mremoveentityvaluefromcache" href="#mremoveentityvaluefromcache">#</a>
 <b>removeEntityValueFromCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L65">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L97">source code</a></li>
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
<div class='method_description-block'>

<ul>
<li><a name="msetreflectionclass" href="#msetreflectionclass">#</a>
 <b>setReflectionClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php#L89">source code</a></li>
</ul>

```php
public function setReflectionClass(\Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass): void;
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
            <td><a href='https://github.com/Roave/BetterReflection/blob/master/src/Reflection/ReflectionClass.php'>\Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->