[BumbleDocGen](../../../../../README.md) **/**
[Technical description of the project](../../../../readme.md) **/**
[Parser](../../../readme.md) **/**
[Reflection API](../../readme.md) **/**
[Reflection API for PHP](../readme.md) **/**
ClassConstantEntity

---


# [ClassConstantEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L24) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant;

class ClassConstantEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface
```
Class constant entity

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getAst](#mgetast) - Get AST for this entity
1. [getCacheKey](#mgetcachekey) 
1. [getCachedEntityDependencies](#mgetcachedentitydependencies) 
1. [getCurrentRootEntity](#mgetcurrentrootentity) 
1. [getDescription](#mgetdescription) - Get entity description
1. [getDescriptionLinks](#mgetdescriptionlinks) - Get parsed links from description and doc blocks `see` and `link`
1. [getDocBlock](#mgetdocblock) - Get DocBlock for current entity
1. [getDocComment](#mgetdoccomment) - Get the doc comment of an entity
1. [getDocCommentEntity](#mgetdoccommententity) - Link to an entity where docBlock is implemented for this entity
1. [getDocCommentLine](#mgetdoccommentline) - Get the code line number where the docBlock of the current entity begins
1. [getDocNote](#mgetdocnote) - Get the note annotation value
1. [getEndLine](#mgetendline) - Get the line number of the end of a constant's code in a file
1. [getExamples](#mgetexamples) - Get parsed examples from `examples` doc block
1. [getFileSourceLink](#mgetfilesourcelink) 
1. [getFirstExample](#mgetfirstexample) - Get first example from `examples` doc block
1. [getImplementingClass](#mgetimplementingclass) - Get the class like entity in which the current entity was implemented
1. [getImplementingClassName](#mgetimplementingclassname) 
1. [getModifiersString](#mgetmodifiersstring) - Get a text representation of class constant modifiers
1. [getName](#mgetname) - Constant name
1. [getNamespaceName](#mgetnamespacename) - Get the name of the namespace where the current class is implemented
1. [getObjectId](#mgetobjectid) - Get entity unique ID
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getRootEntity](#mgetrootentity) - Get the class like entity where this constant was obtained
1. [getRootEntityCollection](#mgetrootentitycollection) - Get the collection of root entities to which this entity belongs
1. [getShortName](#mgetshortname) - Constant short name
1. [getStartLine](#mgetstartline) - Get the line number of the beginning of the constant code in a file
1. [getThrows](#mgetthrows) - Get parsed throws from `throws` doc block
1. [getType](#mgettype) - Get current class constant type
1. [getValue](#mgetvalue) - Get the compiled value of a constant
1. [hasDescriptionLinks](#mhasdescriptionlinks) - Checking if an entity has links in its description
1. [hasExamples](#mhasexamples) - Checking if an entity has `example` docBlock
1. [hasThrows](#mhasthrows) - Checking if an entity has `throws` docBlock
1. [isApi](#misapi) - Checking if an entity has `api` docBlock
1. [isDeprecated](#misdeprecated) - Checking if an entity has `deprecated` docBlock
1. [isEntityCacheOutdated](#misentitycacheoutdated) - Checking if the entity cache is out of date
1. [isEntityDataCacheOutdated](#misentitydatacacheoutdated) 
1. [isEntityFileCanBeLoad](#misentityfilecanbeload) - Checking if entity data can be retrieved
1. [isInternal](#misinternal) - Checking if an entity has `internal` docBlock
1. [isPrivate](#misprivate) - Check if a constant is a private constant
1. [isProtected](#misprotected) - Check if a constant is a protected constant
1. [isPublic](#mispublic) - Check if a constant is a public constant
1. [reloadEntityDependenciesCache](#mreloadentitydependenciescache) - Update entity dependency cache
1. [removeEntityValueFromCache](#mremoveentityvaluefromcache) 
1. [removeNotUsedEntityDataCache](#mremovenotusedentitydatacache) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L55)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $constantName, string $implementingClassName);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$parserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |
$constantName | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$implementingClassName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a> `getAbsoluteFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L104)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getAbsoluteFileName(): null|string;
```
Returns the absolute path to a file if it can be retrieved and if the file is in the project directory

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetast" href="#mgetast">#</a> `getAst`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L93)
```php
public function getAst(): \PhpParser\Node\Stmt\ClassConst;
```
Get AST for this entity

***Return value:*** [\PhpParser\Node\Stmt\ClassConst](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/ClassConst.php)

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

<a name="mgetdoccommententity" href="#mgetdoccommententity">#</a> `getDocCommentEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L129)
```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
```
Link to an entity where docBlock is implemented for this entity

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php)

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

<a name="mgetendline" href="#mgetendline">#</a> `getEndLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L275)
```php
public function getEndLine(): int;
```
Get the line number of the end of a constant's code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetexamples" href="#mgetexamples">#</a> `getExamples`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L493)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getExamples(): array;
```
Get parsed examples from `examples` doc block

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

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

<a name="mgetimplementingclass" href="#mgetimplementingclass">#</a> `getImplementingClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L121)
```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the class like entity in which the current entity was implemented

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a> `getImplementingClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L113)
```php
public function getImplementingClassName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a> `getModifiersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L169)
```php
public function getModifiersString(): string;
```
Get a text representation of class constant modifiers

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L137)
```php
public function getName(): string;
```
Constant name

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetnamespacename" href="#mgetnamespacename">#</a> `getNamespaceName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L157)
```php
public function getNamespaceName(): string;
```
Get the name of the namespace where the current class is implemented

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetobjectid" href="#mgetobjectid">#</a> `getObjectId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L187)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getObjectId(): string;
```
Get entity unique ID

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L92)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](Configuration.md#mgetprojectroot)

---

<a name="mgetrootentity" href="#mgetrootentity">#</a> `getRootEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L83)
```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the class like entity where this constant was obtained

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L75)
```php
public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get the collection of root entities to which this entity belongs

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L147)
```php
public function getShortName(): string;
```
Constant short name

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity::getName()](ClassConstantEntity_2.md#mgetname)

---

<a name="mgetstartline" href="#mgetstartline">#</a> `getStartLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L263)
```php
public function getStartLine(): int;
```
Get the line number of the beginning of the constant code in a file

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

<a name="mgettype" href="#mgettype">#</a> `getType`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L191)
```php
public function getType(): string;
```
Get current class constant type

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetvalue" href="#mgetvalue">#</a> `getValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L290)
```php
public function getValue(): string|array|int|bool|null|float;
```
Get the compiled value of a constant

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php) | [array](https://www.php.net/manual/en/language.types.array.php) | [int](https://www.php.net/manual/en/language.types.integer.php) | [bool](https://www.php.net/manual/en/language.types.boolean.php) | [null](https://www.php.net/manual/en/language.types.null.php) | [float](https://www.php.net/manual/en/language.types.float.php)

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

<a name="mhasthrows" href="#mhasthrows">#</a> `hasThrows`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L423)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function hasThrows(): bool;
```
Checking if an entity has `throws` docBlock

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

<a name="misdeprecated" href="#misdeprecated">#</a> `isDeprecated`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L260)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isDeprecated(): bool;
```
Checking if an entity has `deprecated` docBlock

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

<a name="misentityfilecanbeload" href="#misentityfilecanbeload">#</a> `isEntityFileCanBeLoad`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/BaseEntity.php#L117)
```php
// Implemented in BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity

public function isEntityFileCanBeLoad(): bool;
```
Checking if entity data can be retrieved

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

<a name="misprivate" href="#misprivate">#</a> `isPrivate`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L251)
```php
public function isPrivate(): bool;
```
Check if a constant is a private constant

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misprotected" href="#misprotected">#</a> `isProtected`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L239)
```php
public function isProtected(): bool;
```
Check if a constant is a protected constant

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mispublic" href="#mispublic">#</a> `isPublic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/ClassConstant/ClassConstantEntity.php#L227)
```php
public function isPublic(): bool;
```
Check if a constant is a public constant

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

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
