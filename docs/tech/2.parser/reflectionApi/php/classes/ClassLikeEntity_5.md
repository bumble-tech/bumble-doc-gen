<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> ClassLikeEntity<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L44">ClassLikeEntity</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

abstract class ClassLikeEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface, \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface
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
    <a href="#maddplugindata">addPluginData</a>
    - <i>Add information to aт entity object</i></li>
<li>
    <a href="#mcursortodocattributelinkfragment">cursorToDocAttributeLinkFragment</a>
    </li>
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
    <a href="#mgetconstant">getConstant</a>
    - <i>Get the method entity by its name</i></li>
<li>
    <a href="#mgetconstantentitiescollection">getConstantEntitiesCollection</a>
    - <i>Get a collection of constant entities</i></li>
<li>
    <a href="#mgetconstantvalue">getConstantValue</a>
    - <i>Get the compiled value of a constant</i></li>
<li>
    <a href="#mgetconstants">getConstants</a>
    - <i>Get all constants that are available according to the configuration as an array</i></li>
<li>
    <a href="#mgetconstantsdata">getConstantsData</a>
    - <i>Get a list of all constants and classes where they are implemented</i></li>
<li>
    <a href="#mgetconstantsvalues">getConstantsValues</a>
    - <i>Get class constant compiled values according to filters</i></li>
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
    <a href="#mgetdocrender">getDocRender</a>
    </li>
<li>
    <a href="#mgetendline">getEndLine</a>
    - <i>Get the line number of the end of a class code in a file</i></li>
<li>
    <a href="#mgetentitydependencies">getEntityDependencies</a>
    </li>
<li>
    <a href="#mgetexamples">getExamples</a>
    - <i>Get parsed examples from `examples` doc block</i></li>
<li>
    <a href="#mgetfilecontent">getFileContent</a>
    </li>
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
    <a href="#mgetinterfacenames">getInterfaceNames</a>
    - <i>Get a list of class interface names</i></li>
<li>
    <a href="#mgetinterfacesentities">getInterfacesEntities</a>
    - <i>Get a list of interface entities that the current class implements</i></li>
<li>
    <a href="#mgetmethod">getMethod</a>
    - <i>Get the method entity by its name</i></li>
<li>
    <a href="#mgetmethodentitiescollection">getMethodEntitiesCollection</a>
    - <i>Get a collection of method entities</i></li>
<li>
    <a href="#mgetmethods">getMethods</a>
    - <i>Get all methods that are available according to the configuration as an array</i></li>
<li>
    <a href="#mgetmethodsdata">getMethodsData</a>
    - <i>Get a list of all methods and classes where they are implemented</i></li>
<li>
    <a href="#mgetmodifiersstring">getModifiersString</a>
    - <i>Get entity modifiers as a string</i></li>
<li>
    <a href="#mgetname">getName</a>
    - <i>Full name of the entity</i></li>
<li>
    <a href="#mgetnamespacename">getNamespaceName</a>
    - <i>Get the entity namespace name</i></li>
<li>
    <a href="#mgetobjectid">getObjectId</a>
    - <i>Get entity unique ID</i></li>
<li>
    <a href="#mgetparentclass">getParentClass</a>
    - <i>Get the entity of the parent class if it exists</i></li>
<li>
    <a href="#mgetparentclassentities">getParentClassEntities</a>
    - <i>Get a list of parent class entities</i></li>
<li>
    <a href="#mgetparentclassname">getParentClassName</a>
    - <i>Get the name of the parent class entity if it exists</i></li>
<li>
    <a href="#mgetparentclassnames">getParentClassNames</a>
    - <i>Get a list of entity names of parent classes</i></li>
<li>
    <a href="#mgetplugindata">getPluginData</a>
    - <i>Get additional information added using the plugin</i></li>
<li>
    <a href="#mgetproperties">getProperties</a>
    - <i>Get all properties that are available according to the configuration as an array</i></li>
<li>
    <a href="#mgetpropertiesdata">getPropertiesData</a>
    - <i>Get a list of all properties and classes where they are implemented</i></li>
<li>
    <a href="#mgetproperty">getProperty</a>
    - <i>Get the property entity by its name</i></li>
<li>
    <a href="#mgetpropertydefaultvalue">getPropertyDefaultValue</a>
    - <i>Get the compiled value of a property</i></li>
<li>
    <a href="#mgetpropertyentitiescollection">getPropertyEntitiesCollection</a>
    - <i>Get a collection of property entities</i></li>
<li>
    <a href="#mgetrelativefilename">getRelativeFileName</a>
    - <i>File name relative to project_root configuration parameter</i></li>
<li>
    <a href="#mgetrootentitycollection">getRootEntityCollection</a>
    - <i>Get the collection of root entities to which this entity belongs</i></li>
<li>
    <a href="#mgetshortname">getShortName</a>
    - <i>Short name of the entity</i></li>
<li>
    <a href="#mgetstartline">getStartLine</a>
    - <i>Get the line number of the start of a class code in a file</i></li>
<li>
    <a href="#mgetthrows">getThrows</a>
    - <i>Get parsed throws from `throws` doc block</i></li>
<li>
    <a href="#mgetthrowsdocblocklinks">getThrowsDocBlockLinks</a>
    </li>
<li>
    <a href="#mgettraits">getTraits</a>
    - <i>Get a list of trait entities of the current class</i></li>
<li>
    <a href="#mgettraitsnames">getTraitsNames</a>
    - <i>Get a list of class traits names</i></li>
<li>
    <a href="#mhasconstant">hasConstant</a>
    - <i>Check if a constant exists in a class</i></li>
<li>
    <a href="#mhasdescriptionlinks">hasDescriptionLinks</a>
    - <i>Checking if an entity has links in its description</i></li>
<li>
    <a href="#mhasexamples">hasExamples</a>
    - <i>Checking if an entity has `example` docBlock</i></li>
<li>
    <a href="#mhasmethod">hasMethod</a>
    - <i>Check if a method exists in a class</i></li>
<li>
    <a href="#mhasparentclass">hasParentClass</a>
    - <i>Check if a certain parent class exists in a chain of parent classes</i></li>
<li>
    <a href="#mhasproperty">hasProperty</a>
    - <i>Check if a property exists in a class</i></li>
<li>
    <a href="#mhasthrows">hasThrows</a>
    - <i>Checking if an entity has `throws` docBlock</i></li>
<li>
    <a href="#mhastraits">hasTraits</a>
    - <i>Check if the class contains traits</i></li>
<li>
    <a href="#mimplementsinterface">implementsInterface</a>
    - <i>Check if a class implements an interface</i></li>
<li>
    <a href="#misabstract">isAbstract</a>
    - <i>Check that an entity is abstract</i></li>
<li>
    <a href="#misapi">isApi</a>
    - <i>Checking if an entity has `api` docBlock</i></li>
<li>
    <a href="#misclass">isClass</a>
    - <i>Check if an entity is a Class</i></li>
<li>
    <a href="#misclassload">isClassLoad</a>
    </li>
<li>
    <a href="#misdeprecated">isDeprecated</a>
    - <i>Checking if an entity has `deprecated` docBlock</i></li>
<li>
    <a href="#misdocumentcreationallowed">isDocumentCreationAllowed</a>
    </li>
<li>
    <a href="#misentitycacheoutdated">isEntityCacheOutdated</a>
    - <i>Checking if the entity cache is out of date</i></li>
<li>
    <a href="#misentitydatacacheoutdated">isEntityDataCacheOutdated</a>
    </li>
<li>
    <a href="#misentitydatacanbeloaded">isEntityDataCanBeLoaded</a>
    </li>
<li>
    <a href="#misentityfilecanbeload">isEntityFileCanBeLoad</a>
    - <i>Checking if entity data can be retrieved</i></li>
<li>
    <a href="#misentitynamevalid">isEntityNameValid</a>
    - <i>Check if the name is a valid name for ClassLikeEntity</i></li>
<li>
    <a href="#misenum">isEnum</a>
    - <i>Check if an entity is an Enum</i></li>
<li>
    <a href="#misexternallibraryentity">isExternalLibraryEntity</a>
    - <i>Check if a given entity is an entity from a third party library (connected via composer)</i></li>
<li>
    <a href="#misingit">isInGit</a>
    - <i>Checking if class file is in git repository</i></li>
<li>
    <a href="#misinstantiable">isInstantiable</a>
    - <i>Check that an entity is instantiable</i></li>
<li>
    <a href="#misinterface">isInterface</a>
    - <i>Check if an entity is an Interface</i></li>
<li>
    <a href="#misinternal">isInternal</a>
    - <i>Checking if an entity has `internal` docBlock</i></li>
<li>
    <a href="#missubclassof">isSubclassOf</a>
    - <i>Whether the given class is a subclass of the specified class</i></li>
<li>
    <a href="#mistrait">isTrait</a>
    - <i>Check if an entity is a Trait</i></li>
<li>
    <a href="#mnormalizeclassname">normalizeClassName</a>
    - <i>Bring the class name to the standard format used in the system</i></li>
<li>
    <a href="#mreloadentitydependenciescache">reloadEntityDependenciesCache</a>
    - <i>Update entity dependency cache</i></li>
<li>
    <a href="#mremoveentityvaluefromcache">removeEntityValueFromCache</a>
    </li>
<li>
    <a href="#mremovenotusedentitydatacache">removeNotUsedEntityDataCache</a>
    </li>
<li>
    <a href="#msetcustomast">setCustomAst</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L51">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection $entitiesCollection, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper $composerHelper, \BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper $phpParserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $className, string|null $relativeFileName);
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
            <td>$entitiesCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$composerHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ComposerHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$phpParserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/PhpParser/PhpParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper</a></td>
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
<li><a name="maddplugindata" href="#maddplugindata">#</a>
 <b>addPluginData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L258">source code</a></li>
</ul>

```php
public function addPluginData(string $pluginKey, mixed $data): void;
```

<blockquote>Add information to aт entity object</blockquote>

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
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcursortodocattributelinkfragment" href="#mcursortodocattributelinkfragment">#</a>
 <b>cursorToDocAttributeLinkFragment</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1286">source code</a></li>
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
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetast" href="#mgetast">#</a>
 <b>getAst</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L296">source code</a></li>
</ul>

```php
public function getAst(): \PhpParser\Node\Stmt\Class_|\PhpParser\Node\Stmt\Interface_|\PhpParser\Node\Stmt\Trait_|\PhpParser\Node\Stmt\Enum_;
```

<blockquote>Get AST for this entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Class_.php'>\PhpParser\Node\Stmt\Class_</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Interface_.php'>\PhpParser\Node\Stmt\Interface_</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Trait_.php'>\PhpParser\Node\Stmt\Trait_</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Enum_.php'>\PhpParser\Node\Stmt\Enum_</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstant" href="#mgetconstant">#</a>
 <b>getConstant</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L806">source code</a></li>
</ul>

```php
public function getConstant(string $constantName, bool $unsafe = false): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
```

<blockquote>Get the method entity by its name</blockquote>

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
            <td>The name of the constant whose entity you want to get</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Check all constants, not just the constants allowed in the configuration (@see PhpHandlerSettings::getClassConstantEntityFilter())</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstantentitiescollection" href="#mgetconstantentitiescollection">#</a>
 <b>getConstantEntitiesCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L736">source code</a></li>
</ul>

```php
public function getConstantEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntitiesCollection;
```

<blockquote>Get a collection of constant entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/PhpHandlerSettings.md#mgetclassconstantentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getClassConstantEntityFilter()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstantvalue" href="#mgetconstantvalue">#</a>
 <b>getConstantValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L829">source code</a></li>
</ul>

```php
public function getConstantValue(string $constantName): string|array|int|bool|null|float;
```

<blockquote>Get the compiled value of a constant</blockquote>

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
            <td>The name of the constant for which you need to get the value</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.float.php'>float</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/ConstExprEvaluationException.php">\PhpParser\ConstExprEvaluationException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstants" href="#mgetconstants">#</a>
 <b>getConstants</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L765">source code</a></li>
</ul>

```php
public function getConstants(): array;
```

<blockquote>Get all constants that are available according to the configuration as an array</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassLikeEntity_5.md#mgetconstantentitiescollection">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity::getConstantEntitiesCollection()</a>    </li>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/PhpHandlerSettings.md#mgetclassconstantentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getClassConstantEntityFilter()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstantsdata" href="#mgetconstantsdata">#</a>
 <b>getConstantsData</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L661">source code</a></li>
</ul>

```php
public function getConstantsData(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```

<blockquote>Get a list of all constants and classes where they are implemented</blockquote>

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
            <td>$onlyFromCurrentClassAndTraits</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Get data only for constants from the current class</td>
        </tr>
            <tr>
            <td>$flags</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>Get data only for constants corresponding to the visibility modifiers passed in this value</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconstantsvalues" href="#mgetconstantsvalues">#</a>
 <b>getConstantsValues</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L849">source code</a></li>
</ul>

```php
public function getConstantsValues(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```

<blockquote>Get class constant compiled values according to filters</blockquote>

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
            <td>$onlyFromCurrentClassAndTraits</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Get values only for constants from the current class</td>
        </tr>
            <tr>
            <td>$flags</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>Get values only for constants corresponding to the visibility modifiers passed in this value</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/ConstExprEvaluationException.php">\PhpParser\ConstExprEvaluationException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdoccommententity" href="#mgetdoccommententity">#</a>
 <b>getDocCommentEntity</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L236">source code</a></li>
</ul>

```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

<blockquote>Link to an entity where docBlock is implemented for this entity</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocrender" href="#mgetdocrender">#</a>
 <b>getDocRender</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1262">source code</a></li>
</ul>

```php
public function getDocRender(): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php'>\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetendline" href="#mgetendline">#</a>
 <b>getEndLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L469">source code</a></li>
</ul>

```php
public function getEndLine(): int;
```

<blockquote>Get the line number of the end of a class code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitydependencies" href="#mgetentitydependencies">#</a>
 <b>getEntityDependencies</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L171">source code</a></li>
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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilecontent" href="#mgetfilecontent">#</a>
 <b>getFileContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1035">source code</a></li>
</ul>

```php
public function getFileContent(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetimplementingclass" href="#mgetimplementingclass">#</a>
 <b>getImplementingClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L370">source code</a></li>
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
<li><a name="mgetinterfacenames" href="#mgetinterfacenames">#</a>
 <b>getInterfaceNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L530">source code</a></li>
</ul>

```php
public function getInterfaceNames(): array;
```

<blockquote>Get a list of class interface names</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetinterfacesentities" href="#mgetinterfacesentities">#</a>
 <b>getInterfacesEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L587">source code</a></li>
</ul>

```php
public function getInterfacesEntities(): array;
```

<blockquote>Get a list of interface entities that the current class implements</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethod" href="#mgetmethod">#</a>
 <b>getMethod</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1203">source code</a></li>
</ul>

```php
public function getMethod(string $methodName, bool $unsafe = false): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```

<blockquote>Get the method entity by its name</blockquote>

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
            <td>The name of the method whose entity you want to get</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Check all methods, not just the methods allowed in the configuration (@see PhpHandlerSettings::getMethodEntityFilter())</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethodentitiescollection" href="#mgetmethodentitiescollection">#</a>
 <b>getMethodEntitiesCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1133">source code</a></li>
</ul>

```php
public function getMethodEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```

<blockquote>Get a collection of method entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/PhpHandlerSettings.md#mgetmethodentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getMethodEntityFilter()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethods" href="#mgetmethods">#</a>
 <b>getMethods</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1162">source code</a></li>
</ul>

```php
public function getMethods(): array;
```

<blockquote>Get all methods that are available according to the configuration as an array</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassLikeEntity_5.md#mgetmethodentitiescollection">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity::getMethodEntitiesCollection()</a>    </li>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/PhpHandlerSettings.md#mgetmethodentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getMethodEntityFilter()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmethodsdata" href="#mgetmethodsdata">#</a>
 <b>getMethodsData</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1059">source code</a></li>
</ul>

```php
public function getMethodsData(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```

<blockquote>Get a list of all methods and classes where they are implemented</blockquote>

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
            <td>$onlyFromCurrentClassAndTraits</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Get data only for methods from the current class</td>
        </tr>
            <tr>
            <td>$flags</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>Get data only for methods corresponding to the visibility modifiers passed in this value</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a>
 <b>getModifiersString</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L79">source code</a></li>
</ul>

```php
public function getModifiersString(): string;
```

<blockquote>Get entity modifiers as a string</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L378">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L397">source code</a></li>
</ul>

```php
public function getNamespaceName(): string;
```

<blockquote>Get the entity namespace name</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetobjectid" href="#mgetobjectid">#</a>
 <b>getObjectId</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L142">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L516">source code</a></li>
</ul>

```php
public function getParentClass(): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

<blockquote>Get the entity of the parent class if it exists</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparentclassentities" href="#mgetparentclassentities">#</a>
 <b>getParentClassEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L493">source code</a></li>
</ul>

```php
public function getParentClassEntities(): array;
```

<blockquote>Get a list of parent class entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparentclassname" href="#mgetparentclassname">#</a>
 <b>getParentClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L506">source code</a></li>
</ul>

```php
public function getParentClassName(): null|string;
```

<blockquote>Get the name of the parent class entity if it exists</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetparentclassnames" href="#mgetparentclassnames">#</a>
 <b>getParentClassNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L481">source code</a></li>
</ul>

```php
public function getParentClassNames(): array;
```

<blockquote>Get a list of entity names of parent classes</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetplugindata" href="#mgetplugindata">#</a>
 <b>getPluginData</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L270">source code</a></li>
</ul>

```php
public function getPluginData(string $pluginKey): mixed;
```

<blockquote>Get additional information added using the plugin</blockquote>

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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetproperties" href="#mgetproperties">#</a>
 <b>getProperties</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L963">source code</a></li>
</ul>

```php
public function getProperties(): array;
```

<blockquote>Get all properties that are available according to the configuration as an array</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassLikeEntity_5.md#mgetpropertyentitiescollection">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity::getPropertyEntitiesCollection()</a>    </li>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/PhpHandlerSettings.md#mgetpropertyentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getPropertyEntityFilter()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpropertiesdata" href="#mgetpropertiesdata">#</a>
 <b>getPropertiesData</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L872">source code</a></li>
</ul>

```php
public function getPropertiesData(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```

<blockquote>Get a list of all properties and classes where they are implemented</blockquote>

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
            <td>$onlyFromCurrentClassAndTraits</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Get data only for properties from the current class</td>
        </tr>
            <tr>
            <td>$flags</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>Get data only for properties corresponding to the visibility modifiers passed in this value</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetproperty" href="#mgetproperty">#</a>
 <b>getProperty</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1004">source code</a></li>
</ul>

```php
public function getProperty(string $propertyName, bool $unsafe = false): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
```

<blockquote>Get the property entity by its name</blockquote>

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
            <td>The name of the property whose entity you want to get</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Check all properties, not just the properties allowed in the configuration (@see PhpHandlerSettings::getPropertyEntityFilter())</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpropertydefaultvalue" href="#mgetpropertydefaultvalue">#</a>
 <b>getPropertyDefaultValue</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1027">source code</a></li>
</ul>

```php
public function getPropertyDefaultValue(string $propertyName): string|array|int|bool|null|float;
```

<blockquote>Get the compiled value of a property</blockquote>

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
            <td>The name of the property for which you need to get the value</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://www.php.net/manual/en/language.types.float.php'>float</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/ConstExprEvaluationException.php">\PhpParser\ConstExprEvaluationException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpropertyentitiescollection" href="#mgetpropertyentitiescollection">#</a>
 <b>getPropertyEntitiesCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L934">source code</a></li>
</ul>

```php
public function getPropertyEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection;
```

<blockquote>Get a collection of property entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/PhpHandlerSettings.md#mgetpropertyentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getPropertyEntityFilter()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrelativefilename" href="#mgetrelativefilename">#</a>
 <b>getRelativeFileName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L412">source code</a></li>
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
        <a href="/docs/tech/2.parser/reflectionApi/php/classes/Configuration.md#mgetprojectroot">\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a>
 <b>getRootEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L160">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L386">source code</a></li>
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
<li><a name="mgetstartline" href="#mgetstartline">#</a>
 <b>getStartLine</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L457">source code</a></li>
</ul>

```php
public function getStartLine(): int;
```

<blockquote>Get the line number of the start of a class code in a file</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettraits" href="#mgettraits">#</a>
 <b>getTraits</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L629">source code</a></li>
</ul>

```php
public function getTraits(): array;
```

<blockquote>Get a list of trait entities of the current class</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettraitsnames" href="#mgettraitsnames">#</a>
 <b>getTraitsNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L604">source code</a></li>
</ul>

```php
public function getTraitsNames(): array;
```

<blockquote>Get a list of class traits names</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasconstant" href="#mhasconstant">#</a>
 <b>hasConstant</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L785">source code</a></li>
</ul>

```php
public function hasConstant(string $constantName, bool $unsafe = false): bool;
```

<blockquote>Check if a constant exists in a class</blockquote>

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
            <td>The name of the class whose entity you want to check</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Check all constants, not just the constants allowed in the configuration (@see PhpHandlerSettings::getClassConstantEntityFilter())</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasmethod" href="#mhasmethod">#</a>
 <b>hasMethod</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1182">source code</a></li>
</ul>

```php
public function hasMethod(string $methodName, bool $unsafe = false): bool;
```

<blockquote>Check if a method exists in a class</blockquote>

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
            <td>The name of the method whose entity you want to check</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Check all methods, not just the methods allowed in the configuration (@see PhpHandlerSettings::getMethodEntityFilter())</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasparentclass" href="#mhasparentclass">#</a>
 <b>hasParentClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1250">source code</a></li>
</ul>

```php
public function hasParentClass(string $parentClassName): bool;
```

<blockquote>Check if a certain parent class exists in a chain of parent classes</blockquote>

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
            <td>Searched parent class</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasproperty" href="#mhasproperty">#</a>
 <b>hasProperty</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L983">source code</a></li>
</ul>

```php
public function hasProperty(string $propertyName, bool $unsafe = false): bool;
```

<blockquote>Check if a property exists in a class</blockquote>

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
            <td>The name of the property whose entity you want to check</td>
        </tr>
            <tr>
            <td>$unsafe</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Check all properties, not just the properties allowed in the configuration (@see PhpHandlerSettings::getPropertyEntityFilter())</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhastraits" href="#mhastraits">#</a>
 <b>hasTraits</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L644">source code</a></li>
</ul>

```php
public function hasTraits(): bool;
```

<blockquote>Check if the class contains traits</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mimplementsinterface" href="#mimplementsinterface">#</a>
 <b>implementsInterface</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1237">source code</a></li>
</ul>

```php
public function implementsInterface(string $interfaceName): bool;
```

<blockquote>Check if a class implements an interface</blockquote>

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
            <td>Name of the required interface in the interface chain</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misabstract" href="#misabstract">#</a>
 <b>isAbstract</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L445">source code</a></li>
</ul>

```php
public function isAbstract(): bool;
```

<blockquote>Check that an entity is abstract</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misclass" href="#misclass">#</a>
 <b>isClass</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L104">source code</a></li>
</ul>

```php
public function isClass(): bool;
```

<blockquote>Check if an entity is a Class</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misclassload" href="#misclassload">#</a>
 <b>isClassLoad</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L343">source code</a></li>
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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misdocumentcreationallowed" href="#misdocumentcreationallowed">#</a>
 <b>isDocumentCreationAllowed</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L224">source code</a></li>
</ul>

```php
public function isDocumentCreationAllowed(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
<li><a name="misentitydatacanbeloaded" href="#misentitydatacanbeloaded">#</a>
 <b>isEntityDataCanBeLoaded</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L358">source code</a></li>
</ul>

```php
public function isEntityDataCanBeLoaded(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitynamevalid" href="#misentitynamevalid">#</a>
 <b>isEntityNameValid</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L84">source code</a></li>
</ul>

```php
public static function isEntityNameValid(string $entityName): bool;
```

<blockquote>Check if the name is a valid name for ClassLikeEntity</blockquote>

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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L134">source code</a></li>
</ul>

```php
public function isEnum(): bool;
```

<blockquote>Check if an entity is an Enum</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misexternallibraryentity" href="#misexternallibraryentity">#</a>
 <b>isExternalLibraryEntity</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L152">source code</a></li>
</ul>

```php
public function isExternalLibraryEntity(): bool;
```

<blockquote>Check if a given entity is an entity from a third party library (connected via composer)</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misingit" href="#misingit">#</a>
 <b>isInGit</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L205">source code</a></li>
</ul>

```php
public function isInGit(): bool;
```

<blockquote>Checking if class file is in git repository</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinstantiable" href="#misinstantiable">#</a>
 <b>isInstantiable</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L435">source code</a></li>
</ul>

```php
public function isInstantiable(): bool;
```

<blockquote>Check that an entity is instantiable</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misinterface" href="#misinterface">#</a>
 <b>isInterface</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L114">source code</a></li>
</ul>

```php
public function isInterface(): bool;
```

<blockquote>Check if an entity is an Interface</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="missubclassof" href="#missubclassof">#</a>
 <b>isSubclassOf</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1219">source code</a></li>
</ul>

```php
public function isSubclassOf(string $className): bool;
```

<blockquote>Whether the given class is a subclass of the specified class</blockquote>

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
    <a href="/docs/tech/2.parser/reflectionApi/php/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mistrait" href="#mistrait">#</a>
 <b>isTrait</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L124">source code</a></li>
</ul>

```php
public function isTrait(): bool;
```

<blockquote>Check if an entity is a Trait</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mnormalizeclassname" href="#mnormalizeclassname">#</a>
 <b>normalizeClassName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L94">source code</a></li>
</ul>

```php
public static function normalizeClassName(string $name): string;
```

<blockquote>Bring the class name to the standard format used in the system</blockquote>

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

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


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
<div class='method_description-block'>

<ul>
<li><a name="msetcustomast" href="#msetcustomast">#</a>
 <b>setCustomAst</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L284">source code</a></li>
</ul>

```php
public function setCustomAst(\PhpParser\Node\Stmt\Trait_|\PhpParser\Node\Stmt\Enum_|\PhpParser\Node\Stmt\Interface_|\PhpParser\Node\Stmt\Class_|null $customAst): void;
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
            <td>$customAst</td>
            <td><a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Trait_.php'>\PhpParser\Node\Stmt\Trait_</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Enum_.php'>\PhpParser\Node\Stmt\Enum_</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Interface_.php'>\PhpParser\Node\Stmt\Interface_</a> | <a href='https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Class_.php'>\PhpParser\Node\Stmt\Class_</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->