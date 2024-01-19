[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entities and entities collections](../entity.md) **/**
EnumEntity

---


# [EnumEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L19) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

class EnumEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity implements \BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface, \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface
```
Enumeration

***Links:***
- [https://www.php.net/manual/en/language.enumerations.php](https://www.php.net/manual/en/language.enumerations.php)

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [addPluginData](#maddplugindata) - Add information to aт entity object
1. [cursorToDocAttributeLinkFragment](#mcursortodocattributelinkfragment) 
1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getAst](#mgetast) - Get AST for this entity
1. [getCacheKey](#mgetcachekey) 
1. [getCachedEntityDependencies](#mgetcachedentitydependencies) 
1. [getCasesNames](#mgetcasesnames) - Get enum cases names
1. [getConstant](#mgetconstant) - Get the method entity by its name
1. [getConstantEntitiesCollection](#mgetconstantentitiescollection) - Get a collection of constant entities
1. [getConstantValue](#mgetconstantvalue) - Get the compiled value of a constant
1. [getConstants](#mgetconstants) - Get all constants that are available according to the configuration as an array
1. [getConstantsData](#mgetconstantsdata) - Get a list of all constants and classes where they are implemented
1. [getConstantsValues](#mgetconstantsvalues) - Get class constant compiled values according to filters
1. [getCurrentRootEntity](#mgetcurrentrootentity) 
1. [getDescription](#mgetdescription) - Get entity description
1. [getDescriptionLinks](#mgetdescriptionlinks) - Get parsed links from description and doc blocks `see` and `link`
1. [getDocBlock](#mgetdocblock) - Get DocBlock for current entity
1. [getDocComment](#mgetdoccomment) - Get the doc comment of an entity
1. [getDocCommentEntity](#mgetdoccommententity) - Link to an entity where docBlock is implemented for this entity
1. [getDocCommentLine](#mgetdoccommentline) - Get the code line number where the docBlock of the current entity begins
1. [getDocNote](#mgetdocnote) - Get the note annotation value
1. [getDocRender](#mgetdocrender) 
1. [getEndLine](#mgetendline) - Get the line number of the end of a class code in a file
1. [getEntityDependencies](#mgetentitydependencies) 
1. [getEnumCaseValue](#mgetenumcasevalue) - Get enum case value
1. [getEnumCases](#mgetenumcases) - Get enum cases values
1. [getExamples](#mgetexamples) - Get parsed examples from `examples` doc block
1. [getFileContent](#mgetfilecontent) 
1. [getFileSourceLink](#mgetfilesourcelink) 
1. [getFirstExample](#mgetfirstexample) - Get first example from `examples` doc block
1. [getImplementingClass](#mgetimplementingclass) - Get the class like entity in which the current entity was implemented
1. [getInterfaceNames](#mgetinterfacenames) - Get a list of class interface names
1. [getInterfacesEntities](#mgetinterfacesentities) - Get a list of interface entities that the current class implements
1. [getMethod](#mgetmethod) - Get the method entity by its name
1. [getMethodEntitiesCollection](#mgetmethodentitiescollection) - Get a collection of method entities
1. [getMethods](#mgetmethods) - Get all methods that are available according to the configuration as an array
1. [getMethodsData](#mgetmethodsdata) - Get a list of all methods and classes where they are implemented
1. [getModifiersString](#mgetmodifiersstring) - Get entity modifiers as a string
1. [getName](#mgetname) - Full name of the entity
1. [getNamespaceName](#mgetnamespacename) - Get the entity namespace name
1. [getObjectId](#mgetobjectid) - Get entity unique ID
1. [getParentClass](#mgetparentclass) - Get the entity of the parent class if it exists
1. [getParentClassEntities](#mgetparentclassentities) - Get a list of parent class entities
1. [getParentClassName](#mgetparentclassname) - Get the name of the parent class entity if it exists
1. [getParentClassNames](#mgetparentclassnames) - Get a list of entity names of parent classes
1. [getPluginData](#mgetplugindata) - Get additional information added using the plugin
1. [getProperties](#mgetproperties) - Get all properties that are available according to the configuration as an array
1. [getPropertiesData](#mgetpropertiesdata) - Get a list of all properties and classes where they are implemented
1. [getProperty](#mgetproperty) - Get the property entity by its name
1. [getPropertyDefaultValue](#mgetpropertydefaultvalue) - Get the compiled value of a property
1. [getPropertyEntitiesCollection](#mgetpropertyentitiescollection) - Get a collection of property entities
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getRootEntityCollection](#mgetrootentitycollection) - Get the collection of root entities to which this entity belongs
1. [getShortName](#mgetshortname) - Short name of the entity
1. [getStartLine](#mgetstartline) - Get the line number of the start of a class code in a file
1. [getThrows](#mgetthrows) - Get parsed throws from `throws` doc block
1. [getTraits](#mgettraits) - Get a list of trait entities of the current class
1. [getTraitsNames](#mgettraitsnames) - Get a list of class traits names
1. [hasConstant](#mhasconstant) - Check if a constant exists in a class
1. [hasDescriptionLinks](#mhasdescriptionlinks) - Checking if an entity has links in its description
1. [hasExamples](#mhasexamples) - Checking if an entity has `example` docBlock
1. [hasMethod](#mhasmethod) - Check if a method exists in a class
1. [hasParentClass](#mhasparentclass) - Check if a certain parent class exists in a chain of parent classes
1. [hasProperty](#mhasproperty) - Check if a property exists in a class
1. [hasThrows](#mhasthrows) - Checking if an entity has `throws` docBlock
1. [hasTraits](#mhastraits) - Check if the class contains traits
1. [implementsInterface](#mimplementsinterface) - Check if a class implements an interface
1. [isAbstract](#misabstract) - Check that an entity is abstract
1. [isApi](#misapi) - Checking if an entity has `api` docBlock
1. [isClass](#misclass) - Check if an entity is a Class
1. [isClassLoad](#misclassload) 
1. [isDeprecated](#misdeprecated) - Checking if an entity has `deprecated` docBlock
1. [isDocumentCreationAllowed](#misdocumentcreationallowed) 
1. [isEntityCacheOutdated](#misentitycacheoutdated) - Checking if the entity cache is out of date
1. [isEntityDataCacheOutdated](#misentitydatacacheoutdated) 
1. [isEntityDataCanBeLoaded](#misentitydatacanbeloaded) 
1. [isEntityFileCanBeLoad](#misentityfilecanbeload) - Checking if entity data can be retrieved
1. [isEntityNameValid](#misentitynamevalid) - Check if the name is a valid name for ClassLikeEntity
1. [isEnum](#misenum) - Check if an entity is an Enum
1. [isExternalLibraryEntity](#misexternallibraryentity) - Check if a given entity is an entity from a third party library (connected via composer)
1. [isInGit](#misingit) - Checking if class file is in git repository
1. [isInstantiable](#misinstantiable) - Check that an entity is instantiable
1. [isInterface](#misinterface) - Check if an entity is an Interface
1. [isInternal](#misinternal) - Checking if an entity has `internal` docBlock
1. [isSubclassOf](#missubclassof) - Whether the given class is a subclass of the specified class
1. [isTrait](#mistrait) - Check if an entity is a Trait
1. [normalizeClassName](#mnormalizeclassname) - Bring the class name to the standard format used in the system
1. [reloadEntityDependenciesCache](#mreloadentitydependenciescache) - Update entity dependency cache
1. [removeEntityValueFromCache](#mremoveentityvaluefromcache) 
1. [removeNotUsedEntityDataCache](#mremovenotusedentitydatacache) 
1. [setCustomAst](#msetcustomast) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L51)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection $entitiesCollection, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper $composerHelper, \BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper $phpParserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $className, string|null $relativeFileName);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$phpHandlerSettings | [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php) | - |
$entitiesCollection | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php) | - |
$parserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php) | - |
$composerHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ComposerHelper.php) | - |
$phpParserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/PhpParser/PhpParserHelper.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |
$className | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$relativeFileName | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

---

<a name="maddplugindata" href="#maddplugindata">#</a> `addPluginData`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L258)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function addPluginData(string $pluginKey, mixed $data): void;
```
Add information to aт entity object

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$pluginKey | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$data | [mixed](https://www.php.net/manual/en/language.types.mixed.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mcursortodocattributelinkfragment" href="#mcursortodocattributelinkfragment">#</a> `cursorToDocAttributeLinkFragment` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1286)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$cursor | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$isForDocument | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a> `getAbsoluteFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L104)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getAbsoluteFileName(): null|string;
```
Returns the absolute path to a file if it can be retrieved and if the file is in the project directory

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetast" href="#mgetast">#</a> `getAst`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L296)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getAst(): \PhpParser\Node\Stmt\Class_|\PhpParser\Node\Stmt\Interface_|\PhpParser\Node\Stmt\Trait_|\PhpParser\Node\Stmt\Enum_;
```
Get AST for this entity

***Return value:*** [\PhpParser\Node\Stmt\Class_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Class_.php) | [\PhpParser\Node\Stmt\Interface_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Interface_.php) | [\PhpParser\Node\Stmt\Trait_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Trait_.php) | [\PhpParser\Node\Stmt\Enum_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Enum_.php)

---

<a name="mgetcachekey" href="#mgetcachekey">#</a> `getCacheKey` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L23)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function getCacheKey(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetcachedentitydependencies" href="#mgetcachedentitydependencies">#</a> `getCachedEntityDependencies` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L573)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCachedEntityDependencies(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetcasesnames" href="#mgetcasesnames">#</a> `getCasesNames`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L74)
```php
public function getCasesNames(): array;
```
Get enum cases names

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetconstant" href="#mgetconstant">#</a> `getConstant`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L806)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getConstant(string $constantName, bool $unsafe = false): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
```
Get the method entity by its name

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$constantName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the constant whose entity you want to get |
$unsafe | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Check all constants, not just the constants allowed in the configuration (@see PhpHandlerSettings::getClassConstantEntityFilter()) |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php)

---

<a name="mgetconstantentitiescollection" href="#mgetconstantentitiescollection">#</a> `getConstantEntitiesCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L736)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getConstantEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntitiesCollection;
```
Get a collection of constant entities

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntitiesCollection.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getClassConstantEntityFilter()](PhpHandlerSettings.md#mgetclassconstantentityfilter)

---

<a name="mgetconstantvalue" href="#mgetconstantvalue">#</a> `getConstantValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L829)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getConstantValue(string $constantName): string|array|int|bool|null|float;
```
Get the compiled value of a constant

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$constantName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the constant for which you need to get the value |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php) | [array](https://www.php.net/manual/en/language.types.array.php) | [int](https://www.php.net/manual/en/language.types.integer.php) | [bool](https://www.php.net/manual/en/language.types.boolean.php) | [null](https://www.php.net/manual/en/language.types.null.php) | [float](https://www.php.net/manual/en/language.types.float.php)

---

<a name="mgetconstants" href="#mgetconstants">#</a> `getConstants`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L765)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getConstants(): array;
```
Get all constants that are available according to the configuration as an array

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity::getConstantEntitiesCollection()](ClassLikeEntity.md#mgetconstantentitiescollection)
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getClassConstantEntityFilter()](PhpHandlerSettings.md#mgetclassconstantentityfilter)

---

<a name="mgetconstantsdata" href="#mgetconstantsdata">#</a> `getConstantsData` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L661)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getConstantsData(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```
Get a list of all constants and classes where they are implemented

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$onlyFromCurrentClassAndTraits | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Get data only for constants from the current class |
$flags | [int](https://www.php.net/manual/en/language.types.integer.php) | Get data only for constants corresponding to the visibility modifiers passed in this value |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetconstantsvalues" href="#mgetconstantsvalues">#</a> `getConstantsValues`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L849)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getConstantsValues(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```
Get class constant compiled values according to filters

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$onlyFromCurrentClassAndTraits | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Get values only for constants from the current class |
$flags | [int](https://www.php.net/manual/en/language.types.integer.php) | Get values only for constants corresponding to the visibility modifiers passed in this value |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetcurrentrootentity" href="#mgetcurrentrootentity">#</a> `getCurrentRootEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L549)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCurrentRootEntity(): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetdescription" href="#mgetdescription">#</a> `getDescription`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L129)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDescription(): string;
```
Get entity description

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdescriptionlinks" href="#mgetdescriptionlinks">#</a> `getDescriptionLinks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L289)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDescriptionLinks(): array;
```
Get parsed links from description and doc blocks `see` and `link`

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetdocblock" href="#mgetdocblock">#</a> `getDocBlock` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L215)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocBlock(): \phpDocumentor\Reflection\DocBlock;
```
Get DocBlock for current entity

***Return value:*** [\phpDocumentor\Reflection\DocBlock](https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php)

---

<a name="mgetdoccomment" href="#mgetdoccomment">#</a> `getDocComment`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L540)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocComment(): string;
```
Get the doc comment of an entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdoccommententity" href="#mgetdoccommententity">#</a> `getDocCommentEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L236)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Link to an entity where docBlock is implemented for this entity

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetdoccommentline" href="#mgetdoccommentline">#</a> `getDocCommentLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L202)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocCommentLine(): null|int;
```
Get the code line number where the docBlock of the current entity begins

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetdocnote" href="#mgetdocnote">#</a> `getDocNote`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L527)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocNote(): string;
```
Get the note annotation value

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdocrender" href="#mgetdocrender">#</a> `getDocRender` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1262)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getDocRender(): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php)

---

<a name="mgetendline" href="#mgetendline">#</a> `getEndLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L469)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getEndLine(): int;
```
Get the line number of the end of a class code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetentitydependencies" href="#mgetentitydependencies">#</a> `getEntityDependencies`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L171)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getEntityDependencies(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetenumcasevalue" href="#mgetenumcasevalue">#</a> `getEnumCaseValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L87)
```php
public function getEnumCaseValue(string $name): mixed;
```
Get enum case value

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$name | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [mixed](https://www.php.net/manual/en/language.types.mixed.php)

---

<a name="mgetenumcases" href="#mgetenumcases">#</a> `getEnumCases`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L45)
```php
public function getEnumCases(): array;
```
Get enum cases values

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetexamples" href="#mgetexamples">#</a> `getExamples`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L493)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getExamples(): array;
```
Get parsed examples from `examples` doc block

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetfilecontent" href="#mgetfilecontent">#</a> `getFileContent`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1035)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getFileContent(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a> `getFileSourceLink` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L173)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFileSourceLink(bool $withLine = true): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$withLine | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetfirstexample" href="#mgetfirstexample">#</a> `getFirstExample`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L514)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFirstExample(): string;
```
Get first example from `examples` doc block

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetimplementingclass" href="#mgetimplementingclass">#</a> `getImplementingClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L370)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the class like entity in which the current entity was implemented

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetinterfacenames" href="#mgetinterfacenames">#</a> `getInterfaceNames`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L32)
```php
public function getInterfaceNames(): array;
```
Get a list of class interface names

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetinterfacesentities" href="#mgetinterfacesentities">#</a> `getInterfacesEntities`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L587)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getInterfacesEntities(): array;
```
Get a list of interface entities that the current class implements

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetmethod" href="#mgetmethod">#</a> `getMethod`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1203)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getMethod(string $methodName, bool $unsafe = false): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```
Get the method entity by its name

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$methodName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the method whose entity you want to get |
$unsafe | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Check all methods, not just the methods allowed in the configuration (@see PhpHandlerSettings::getMethodEntityFilter()) |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php)

---

<a name="mgetmethodentitiescollection" href="#mgetmethodentitiescollection">#</a> `getMethodEntitiesCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1133)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getMethodEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```
Get a collection of method entities

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getMethodEntityFilter()](PhpHandlerSettings.md#mgetmethodentityfilter)

---

<a name="mgetmethods" href="#mgetmethods">#</a> `getMethods`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1162)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getMethods(): array;
```
Get all methods that are available according to the configuration as an array

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity::getMethodEntitiesCollection()](ClassLikeEntity.md#mgetmethodentitiescollection)
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getMethodEntityFilter()](PhpHandlerSettings.md#mgetmethodentityfilter)

---

<a name="mgetmethodsdata" href="#mgetmethodsdata">#</a> `getMethodsData` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1059)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getMethodsData(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```
Get a list of all methods and classes where they are implemented

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$onlyFromCurrentClassAndTraits | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Get data only for methods from the current class |
$flags | [int](https://www.php.net/manual/en/language.types.integer.php) | Get data only for methods corresponding to the visibility modifiers passed in this value |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a> `getModifiersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L95)
```php
public function getModifiersString(): string;
```
Get entity modifiers as a string

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L378)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getName(): string;
```
Full name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetnamespacename" href="#mgetnamespacename">#</a> `getNamespaceName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L397)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getNamespaceName(): string;
```
Get the entity namespace name

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetobjectid" href="#mgetobjectid">#</a> `getObjectId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L142)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getObjectId(): string;
```
Get entity unique ID

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetparentclass" href="#mgetparentclass">#</a> `getParentClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L516)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getParentClass(): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the entity of the parent class if it exists

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetparentclassentities" href="#mgetparentclassentities">#</a> `getParentClassEntities`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L493)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getParentClassEntities(): array;
```
Get a list of parent class entities

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetparentclassname" href="#mgetparentclassname">#</a> `getParentClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L506)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getParentClassName(): null|string;
```
Get the name of the parent class entity if it exists

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetparentclassnames" href="#mgetparentclassnames">#</a> `getParentClassNames`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L481)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getParentClassNames(): array;
```
Get a list of entity names of parent classes

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetplugindata" href="#mgetplugindata">#</a> `getPluginData`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L270)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getPluginData(string $pluginKey): mixed;
```
Get additional information added using the plugin

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$pluginKey | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [mixed](https://www.php.net/manual/en/language.types.mixed.php)

---

<a name="mgetproperties" href="#mgetproperties">#</a> `getProperties`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L963)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getProperties(): array;
```
Get all properties that are available according to the configuration as an array

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity::getPropertyEntitiesCollection()](ClassLikeEntity.md#mgetpropertyentitiescollection)
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getPropertyEntityFilter()](PhpHandlerSettings.md#mgetpropertyentityfilter)

---

<a name="mgetpropertiesdata" href="#mgetpropertiesdata">#</a> `getPropertiesData` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L872)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getPropertiesData(bool $onlyFromCurrentClassAndTraits = false, int $flags = \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity::VISIBILITY_MODIFIERS_FLAG_ANY): array;
```
Get a list of all properties and classes where they are implemented

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$onlyFromCurrentClassAndTraits | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Get data only for properties from the current class |
$flags | [int](https://www.php.net/manual/en/language.types.integer.php) | Get data only for properties corresponding to the visibility modifiers passed in this value |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetproperty" href="#mgetproperty">#</a> `getProperty`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1004)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getProperty(string $propertyName, bool $unsafe = false): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
```
Get the property entity by its name

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$propertyName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the property whose entity you want to get |
$unsafe | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Check all properties, not just the properties allowed in the configuration (@see PhpHandlerSettings::getPropertyEntityFilter()) |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php)

---

<a name="mgetpropertydefaultvalue" href="#mgetpropertydefaultvalue">#</a> `getPropertyDefaultValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1027)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getPropertyDefaultValue(string $propertyName): string|array|int|bool|null|float;
```
Get the compiled value of a property

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$propertyName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the property for which you need to get the value |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php) | [array](https://www.php.net/manual/en/language.types.array.php) | [int](https://www.php.net/manual/en/language.types.integer.php) | [bool](https://www.php.net/manual/en/language.types.boolean.php) | [null](https://www.php.net/manual/en/language.types.null.php) | [float](https://www.php.net/manual/en/language.types.float.php)

---

<a name="mgetpropertyentitiescollection" href="#mgetpropertyentitiescollection">#</a> `getPropertyEntitiesCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L934)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getPropertyEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection;
```
Get a collection of property entities

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getPropertyEntityFilter()](PhpHandlerSettings.md#mgetpropertyentityfilter)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L412)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](Configuration.md#mgetprojectroot)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L160)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get the collection of root entities to which this entity belongs

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L386)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getShortName(): string;
```
Short name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetstartline" href="#mgetstartline">#</a> `getStartLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L457)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getStartLine(): int;
```
Get the line number of the start of a class code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetthrows" href="#mgetthrows">#</a> `getThrows`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L438)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getThrows(): array;
```
Get parsed throws from `throws` doc block

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgettraits" href="#mgettraits">#</a> `getTraits`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L629)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getTraits(): array;
```
Get a list of trait entities of the current class

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgettraitsnames" href="#mgettraitsnames">#</a> `getTraitsNames`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L604)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function getTraitsNames(): array;
```
Get a list of class traits names

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mhasconstant" href="#mhasconstant">#</a> `hasConstant`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L785)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function hasConstant(string $constantName, bool $unsafe = false): bool;
```
Check if a constant exists in a class

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$constantName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the class whose entity you want to check |
$unsafe | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Check all constants, not just the constants allowed in the configuration (@see PhpHandlerSettings::getClassConstantEntityFilter()) |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasdescriptionlinks" href="#mhasdescriptionlinks">#</a> `hasDescriptionLinks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L274)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasDescriptionLinks(): bool;
```
Checking if an entity has links in its description

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasexamples" href="#mhasexamples">#</a> `hasExamples`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L478)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasExamples(): bool;
```
Checking if an entity has `example` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasmethod" href="#mhasmethod">#</a> `hasMethod`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1182)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function hasMethod(string $methodName, bool $unsafe = false): bool;
```
Check if a method exists in a class

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$methodName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the method whose entity you want to check |
$unsafe | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Check all methods, not just the methods allowed in the configuration (@see PhpHandlerSettings::getMethodEntityFilter()) |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasparentclass" href="#mhasparentclass">#</a> `hasParentClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1250)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function hasParentClass(string $parentClassName): bool;
```
Check if a certain parent class exists in a chain of parent classes

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$parentClassName | [string](https://www.php.net/manual/en/language.types.string.php) | Searched parent class |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasproperty" href="#mhasproperty">#</a> `hasProperty`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L983)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function hasProperty(string $propertyName, bool $unsafe = false): bool;
```
Check if a property exists in a class

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$propertyName | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the property whose entity you want to check |
$unsafe | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Check all properties, not just the properties allowed in the configuration (@see PhpHandlerSettings::getPropertyEntityFilter()) |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasthrows" href="#mhasthrows">#</a> `hasThrows`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L423)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasThrows(): bool;
```
Checking if an entity has `throws` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhastraits" href="#mhastraits">#</a> `hasTraits`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L644)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function hasTraits(): bool;
```
Check if the class contains traits

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mimplementsinterface" href="#mimplementsinterface">#</a> `implementsInterface`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1237)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function implementsInterface(string $interfaceName): bool;
```
Check if a class implements an interface

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$interfaceName | [string](https://www.php.net/manual/en/language.types.string.php) | Name of the required interface in the interface chain |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misabstract" href="#misabstract">#</a> `isAbstract`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L445)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isAbstract(): bool;
```
Check that an entity is abstract

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misapi" href="#misapi">#</a> `isApi`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L246)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isApi(): bool;
```
Checking if an entity has `api` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misclass" href="#misclass">#</a> `isClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L104)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isClass(): bool;
```
Check if an entity is a Class

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misclassload" href="#misclassload">#</a> `isClassLoad` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L343)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isClassLoad(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misdeprecated" href="#misdeprecated">#</a> `isDeprecated`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L260)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isDeprecated(): bool;
```
Checking if an entity has `deprecated` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misdocumentcreationallowed" href="#misdocumentcreationallowed">#</a> `isDocumentCreationAllowed` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L224)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isDocumentCreationAllowed(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a> `isEntityCacheOutdated` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L676)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityCacheOutdated(): bool;
```
Checking if the entity cache is out of date

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitydatacacheoutdated" href="#misentitydatacacheoutdated">#</a> `isEntityDataCacheOutdated` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L94)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function isEntityDataCacheOutdated(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitydatacanbeloaded" href="#misentitydatacanbeloaded">#</a> `isEntityDataCanBeLoaded`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L358)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isEntityDataCanBeLoaded(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentityfilecanbeload" href="#misentityfilecanbeload">#</a> `isEntityFileCanBeLoad`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L117)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityFileCanBeLoad(): bool;
```
Checking if entity data can be retrieved

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitynamevalid" href="#misentitynamevalid">#</a> `isEntityNameValid`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L84)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public static function isEntityNameValid(string $entityName): bool;
```
Check if the name is a valid name for ClassLikeEntity

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entityName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misenum" href="#misenum">#</a> `isEnum`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/EnumEntity.php#L24)
```php
public function isEnum(): bool;
```
Check if an entity is an Enum

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misexternallibraryentity" href="#misexternallibraryentity">#</a> `isExternalLibraryEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L152)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isExternalLibraryEntity(): bool;
```
Check if a given entity is an entity from a third party library (connected via composer)

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misingit" href="#misingit">#</a> `isInGit` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L205)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isInGit(): bool;
```
Checking if class file is in git repository

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misinstantiable" href="#misinstantiable">#</a> `isInstantiable`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L435)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isInstantiable(): bool;
```
Check that an entity is instantiable

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misinterface" href="#misinterface">#</a> `isInterface`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L114)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isInterface(): bool;
```
Check if an entity is an Interface

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misinternal" href="#misinternal">#</a> `isInternal`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L232)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isInternal(): bool;
```
Checking if an entity has `internal` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="missubclassof" href="#missubclassof">#</a> `isSubclassOf`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L1219)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isSubclassOf(string $className): bool;
```
Whether the given class is a subclass of the specified class

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$className | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mistrait" href="#mistrait">#</a> `isTrait`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L124)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function isTrait(): bool;
```
Check if an entity is a Trait

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mnormalizeclassname" href="#mnormalizeclassname">#</a> `normalizeClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L94)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public static function normalizeClassName(string $name): string;
```
Bring the class name to the standard format used in the system

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$name | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mreloadentitydependenciescache" href="#mreloadentitydependenciescache">#</a> `reloadEntityDependenciesCache` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L593)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function reloadEntityDependenciesCache(): array;
```
Update entity dependency cache

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mremoveentityvaluefromcache" href="#mremoveentityvaluefromcache">#</a> `removeEntityValueFromCache` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L80)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function removeEntityValueFromCache(string $key): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mremovenotusedentitydatacache" href="#mremovenotusedentitydatacache">#</a> `removeNotUsedEntityDataCache` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L116)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function removeNotUsedEntityDataCache(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="msetcustomast" href="#msetcustomast">#</a> `setCustomAst` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php#L284)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity

public function setCustomAst(\PhpParser\Node\Stmt\Trait_|\PhpParser\Node\Stmt\Enum_|\PhpParser\Node\Stmt\Interface_|\PhpParser\Node\Stmt\Class_|null $customAst): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$customAst | [\PhpParser\Node\Stmt\Trait_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Trait_.php) \| [\PhpParser\Node\Stmt\Enum_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Enum_.php) \| [\PhpParser\Node\Stmt\Interface_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Interface_.php) \| [\PhpParser\Node\Stmt\Class_](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Class_.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
