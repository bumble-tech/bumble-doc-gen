[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Entities and entities collections](/docs/tech/02_parser/entity.md) **/**
PropertyEntity

---


# [PropertyEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L28) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property;

class PropertyEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface
```
Class property entity

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getAst](#mgetast) - Get AST for this entity
1. [getCacheKey](#mgetcachekey) 
1. [getCachedEntityDependencies](#mgetcachedentitydependencies) 
1. [getCurrentRootEntity](#mgetcurrentrootentity) 
1. [getDefaultValue](#mgetdefaultvalue) - Get the compiled default value of a property
1. [getDescription](#mgetdescription) - Get entity description
1. [getDescriptionLinks](#mgetdescriptionlinks) - Get parsed links from description and doc blocks `see` and `link`
1. [getDocBlock](#mgetdocblock) - Get DocBlock for current entity
1. [getDocComment](#mgetdoccomment) - Get the doc comment of an entity
1. [getDocCommentEntity](#mgetdoccommententity) - Link to an entity where docBlock is implemented for this entity
1. [getDocCommentLine](#mgetdoccommentline) - Get the code line number where the docBlock of the current entity begins
1. [getDocNote](#mgetdocnote) - Get the note annotation value
1. [getEndLine](#mgetendline) - Get the line number of the end of a property's code in a file
1. [getExamples](#mgetexamples) - Get parsed examples from `examples` doc block
1. [getFileSourceLink](#mgetfilesourcelink) 
1. [getFirstExample](#mgetfirstexample) - Get first example from `examples` doc block
1. [getImplementingClass](#mgetimplementingclass) - Get the class like entity in which the current entity was implemented
1. [getImplementingClassName](#mgetimplementingclassname) - Get the name of the class in which this property is implemented
1. [getModifiersString](#mgetmodifiersstring) - Get a text representation of property modifiers
1. [getName](#mgetname) - Full name of the entity
1. [getNamespaceName](#mgetnamespacename) - Namespace of the class that contains this property
1. [getObjectId](#mgetobjectid) - Get entity unique ID
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getRootEntity](#mgetrootentity) 
1. [getRootEntityCollection](#mgetrootentitycollection) - Get the collection of root entities to which this entity belongs
1. [getShortName](#mgetshortname) - Short name of the entity
1. [getStartLine](#mgetstartline) - Get the line number of the beginning of the entity code in a file
1. [getThrows](#mgetthrows) - Get parsed throws from `throws` doc block
1. [getThrowsDocBlockLinks](#mgetthrowsdocblocklinks) 
1. [getType](#mgettype) - Get current property type
1. [hasDescriptionLinks](#mhasdescriptionlinks) - Checking if an entity has links in its description
1. [hasExamples](#mhasexamples) - Checking if an entity has `example` docBlock
1. [hasThrows](#mhasthrows) - Checking if an entity has `throws` docBlock
1. [isApi](#misapi) - Checking if an entity has `api` docBlock
1. [isDeprecated](#misdeprecated) - Checking if an entity has `deprecated` docBlock
1. [isEntityCacheOutdated](#misentitycacheoutdated) - Checking if the entity cache is out of date
1. [isEntityDataCacheOutdated](#misentitydatacacheoutdated) 
1. [isEntityFileCanBeLoad](#misentityfilecanbeload) - Checking if entity data can be retrieved
1. [isImplementedInParentClass](#misimplementedinparentclass) - Check if this property is implemented in the parent class
1. [isInternal](#misinternal) - Checking if an entity has `internal` docBlock
1. [isPrivate](#misprivate) - Check if a private is a public private
1. [isProtected](#misprotected) - Check if a protected is a public protected
1. [isPublic](#mispublic) - Check if a property is a public property
1. [reloadEntityDependenciesCache](#mreloadentitydependenciescache) - Update entity dependency cache
1. [removeEntityValueFromCache](#mremoveentityvaluefromcache) 
1. [removeNotUsedEntityDataCache](#mremovenotusedentitydatacache) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L59)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $propertyName, string $implementingClassName);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$parserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |
$propertyName | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$implementingClassName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a> `getAbsoluteFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L102)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getAbsoluteFileName(): null|string;
```
Returns the absolute path to a file if it can be retrieved and if the file is in the project directory

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetast" href="#mgetast">#</a> `getAst`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L86)
```php
public function getAst(): \PhpParser\Node\Stmt\Property;
```
Get AST for this entity

***Return value:*** [\PhpParser\Node\Stmt\Property](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/Property.php)

---

<a name="mgetcachekey" href="#mgetcachekey">#</a> `getCacheKey` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/Cache/CacheableEntityTrait.php#L23)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityTrait

public function getCacheKey(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetcachedentitydependencies" href="#mgetcachedentitydependencies">#</a> `getCachedEntityDependencies` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L658)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCachedEntityDependencies(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetcurrentrootentity" href="#mgetcurrentrootentity">#</a> `getCurrentRootEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L634)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getCurrentRootEntity(): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetdefaultvalue" href="#mgetdefaultvalue">#</a> `getDefaultValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L370)
```php
public function getDefaultValue(): string|array|int|bool|null|float;
```
Get the compiled default value of a property

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php) | [array](https://www.php.net/manual/en/language.types.array.php) | [int](https://www.php.net/manual/en/language.types.integer.php) | [bool](https://www.php.net/manual/en/language.types.boolean.php) | [null](https://www.php.net/manual/en/language.types.null.php) | [float](https://www.php.net/manual/en/language.types.float.php)

---

<a name="mgetdescription" href="#mgetdescription">#</a> `getDescription`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L127)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDescription(): string;
```
Get entity description

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdescriptionlinks" href="#mgetdescriptionlinks">#</a> `getDescriptionLinks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L419)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDescriptionLinks(): array;
```
Get parsed links from description and doc blocks `see` and `link`

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetdocblock" href="#mgetdocblock">#</a> `getDocBlock` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L213)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocBlock(): \phpDocumentor\Reflection\DocBlock;
```
Get DocBlock for current entity

***Return value:*** [\phpDocumentor\Reflection\DocBlock](https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock.php)

---

<a name="mgetdoccomment" href="#mgetdoccomment">#</a> `getDocComment`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L625)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocComment(): string;
```
Get the doc comment of an entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdoccommententity" href="#mgetdoccommententity">#</a> `getDocCommentEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L135)
```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
```
Link to an entity where docBlock is implemented for this entity

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php)

---

<a name="mgetdoccommentline" href="#mgetdoccommentline">#</a> `getDocCommentLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L200)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocCommentLine(): null|int;
```
Get the code line number where the docBlock of the current entity begins

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetdocnote" href="#mgetdocnote">#</a> `getDocNote`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L612)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getDocNote(): string;
```
Get the note annotation value

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetendline" href="#mgetendline">#</a> `getEndLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L352)
```php
public function getEndLine(): int;
```
Get the line number of the end of a property's code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetexamples" href="#mgetexamples">#</a> `getExamples`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L578)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getExamples(): array;
```
Get parsed examples from `examples` doc block

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a> `getFileSourceLink` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L171)
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

<a name="mgetfirstexample" href="#mgetfirstexample">#</a> `getFirstExample`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L599)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getFirstExample(): string;
```
Get first example from `examples` doc block

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetimplementingclass" href="#mgetimplementingclass">#</a> `getImplementingClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L207)
```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the class like entity in which the current entity was implemented

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a> `getImplementingClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L199)
```php
public function getImplementingClassName(): string;
```
Get the name of the class in which this property is implemented

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a> `getModifiersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L265)
```php
public function getModifiersString(): string;
```
Get a text representation of property modifiers

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L171)
```php
public function getName(): string;
```
Full name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetnamespacename" href="#mgetnamespacename">#</a> `getNamespaceName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L189)
```php
public function getNamespaceName(): string;
```
Namespace of the class that contains this property

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetobjectid" href="#mgetobjectid">#</a> `getObjectId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L185)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getObjectId(): string;
```
Get entity unique ID

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L217)
```php
public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](/docs/tech/02_parser/classes/Configuration.md#mgetprojectroot)

---

<a name="mgetrootentity" href="#mgetrootentity">#</a> `getRootEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L76)
```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L123)
```php
public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get the collection of root entities to which this entity belongs

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L179)
```php
public function getShortName(): string;
```
Short name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetstartline" href="#mgetstartline">#</a> `getStartLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L337)
```php
public function getStartLine(): int;
```
Get the line number of the beginning of the entity code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetthrows" href="#mgetthrows">#</a> `getThrows`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L485)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getThrows(): array;
```
Get parsed throws from `throws` doc block

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetthrowsdocblocklinks" href="#mgetthrowsdocblocklinks">#</a> `getThrowsDocBlockLinks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L443)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getThrowsDocBlockLinks(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgettype" href="#mgettype">#</a> `getType`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L231)
```php
public function getType(): string;
```
Get current property type

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mhasdescriptionlinks" href="#mhasdescriptionlinks">#</a> `hasDescriptionLinks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L272)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasDescriptionLinks(): bool;
```
Checking if an entity has links in its description

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasexamples" href="#mhasexamples">#</a> `hasExamples`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L563)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasExamples(): bool;
```
Checking if an entity has `example` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mhasthrows" href="#mhasthrows">#</a> `hasThrows`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L432)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasThrows(): bool;
```
Checking if an entity has `throws` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misapi" href="#misapi">#</a> `isApi`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L244)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isApi(): bool;
```
Checking if an entity has `api` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misdeprecated" href="#misdeprecated">#</a> `isDeprecated`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L258)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isDeprecated(): bool;
```
Checking if an entity has `deprecated` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a> `isEntityCacheOutdated` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L761)
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

<a name="misentityfilecanbeload" href="#misentityfilecanbeload">#</a> `isEntityFileCanBeLoad`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L115)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityFileCanBeLoad(): bool;
```
Checking if entity data can be retrieved

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misimplementedinparentclass" href="#misimplementedinparentclass">#</a> `isImplementedInParentClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L291)
```php
public function isImplementedInParentClass(): bool;
```
Check if this property is implemented in the parent class

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misinternal" href="#misinternal">#</a> `isInternal`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L230)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isInternal(): bool;
```
Checking if an entity has `internal` docBlock

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misprivate" href="#misprivate">#</a> `isPrivate`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L327)
```php
public function isPrivate(): bool;
```
Check if a private is a public private

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misprotected" href="#misprotected">#</a> `isProtected`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L315)
```php
public function isProtected(): bool;
```
Check if a protected is a public protected

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mispublic" href="#mispublic">#</a> `isPublic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php#L303)
```php
public function isPublic(): bool;
```
Check if a property is a public property

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mreloadentitydependenciescache" href="#mreloadentitydependenciescache">#</a> `reloadEntityDependenciesCache` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L678)
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
