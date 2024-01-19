[BumbleDocGen](../../../../../README.md) **/**
[Technical description of the project](../../../../readme.md) **/**
[Parser](../../../readme.md) **/**
[Reflection API](../../readme.md) **/**
[Reflection API for PHP](../readme.md) **/**
[PHP class method reflection API](../phpClassMethodReflectionApi.md) **/**
MethodEntity

---


# [MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L31) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

class MethodEntity extends \BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity implements \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface, \BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface
```
Class method entity

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getAst](#mgetast) - Get AST for this entity
1. [getBodyCode](#mgetbodycode) - Get the code for this method
1. [getCacheKey](#mgetcachekey) 
1. [getCachedEntityDependencies](#mgetcachedentitydependencies) 
1. [getCurrentRootEntity](#mgetcurrentrootentity) 
1. [getDescription](#mgetdescription) - Get entity description
1. [getDescriptionLinks](#mgetdescriptionlinks) - Get parsed links from description and doc blocks `see` and `link`
1. [getDocBlock](#mgetdocblock) - Get DocBlock for current entity
1. [getDocComment](#mgetdoccomment) - Get the doc comment of an entity
1. [getDocCommentEntity](#mgetdoccommententity) - Link to an entity where docBlock is implemented for this entity
1. [getDocCommentLine](#mgetdoccommentline) 
1. [getDocNote](#mgetdocnote) - Get the note annotation value
1. [getEndLine](#mgetendline) - Get the line number of the end of a method's code in a file
1. [getExamples](#mgetexamples) - Get parsed examples from `examples` doc block
1. [getFileSourceLink](#mgetfilesourcelink) 
1. [getFirstExample](#mgetfirstexample) - Get first example from `examples` doc block
1. [getFirstReturnValue](#mgetfirstreturnvalue) - Get the compiled first return value of a method (if possible)
1. [getImplementingClass](#mgetimplementingclass) - Get the class like entity in which the current entity was implemented
1. [getImplementingClassName](#mgetimplementingclassname) - Get the name of the class in which this method is implemented
1. [getModifiersString](#mgetmodifiersstring) - Get a text representation of method modifiers
1. [getName](#mgetname) - Full name of the entity
1. [getNamespaceName](#mgetnamespacename) - Namespace of the class that contains this method
1. [getObjectId](#mgetobjectid) - Get entity unique ID
1. [getParameters](#mgetparameters) - Get a list of method parameters
1. [getParametersString](#mgetparametersstring) - Get a list of method parameters as a string
1. [getParentMethod](#mgetparentmethod) - Get the parent method for this method
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getReturnType](#mgetreturntype) - Get the return type of method
1. [getRootEntity](#mgetrootentity) 
1. [getRootEntityCollection](#mgetrootentitycollection) - Get the collection of root entities to which this entity belongs
1. [getShortName](#mgetshortname) - Short name of the entity
1. [getSignature](#mgetsignature) - Get the method signature as a string
1. [getStartColumn](#mgetstartcolumn) - Get the column number of the beginning of the method code in a file
1. [getStartLine](#mgetstartline) - Get the line number of the beginning of the entity code in a file
1. [getThrows](#mgetthrows) - Get parsed throws from `throws` doc block
1. [hasDescriptionLinks](#mhasdescriptionlinks) - Checking if an entity has links in its description
1. [hasExamples](#mhasexamples) - Checking if an entity has `example` docBlock
1. [hasThrows](#mhasthrows) - Checking if an entity has `throws` docBlock
1. [isApi](#misapi) - Checking if an entity has `api` docBlock
1. [isConstructor](#misconstructor) - Checking that a method is a constructor
1. [isDeprecated](#misdeprecated) - Checking if an entity has `deprecated` docBlock
1. [isDynamic](#misdynamic) - Check if a method is a dynamic method, that is, implementable using __call or __callStatic
1. [isEntityCacheOutdated](#misentitycacheoutdated) - Checking if the entity cache is out of date
1. [isEntityDataCacheOutdated](#misentitydatacacheoutdated) 
1. [isEntityFileCanBeLoad](#misentityfilecanbeload) - Checking if entity data can be retrieved
1. [isImplementedInParentClass](#misimplementedinparentclass) - Check if this method is implemented in the parent class
1. [isInitialization](#misinitialization) - Check if a method is an initialization method
1. [isInternal](#misinternal) - Checking if an entity has `internal` docBlock
1. [isPrivate](#misprivate) - Check if a method is a private method
1. [isProtected](#misprotected) - Check if a method is a protected method
1. [isPublic](#mispublic) - Check if a method is a public method
1. [isStatic](#misstatic) - Check if this method is static
1. [reloadEntityDependenciesCache](#mreloadentitydependenciescache) - Update entity dependency cache
1. [removeEntityValueFromCache](#mremoveentityvaluefromcache) 
1. [removeNotUsedEntityDataCache](#mremovenotusedentitydatacache) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L55)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \PhpParser\PrettyPrinter\Standard $astPrinter, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger, string $methodName, string $implementingClassName);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$parserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php) | - |
$astPrinter | [\PhpParser\PrettyPrinter\Standard](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/PrettyPrinter/Standard.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |
$methodName | [string](https://www.php.net/manual/en/language.types.string.php) | - |
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

<a name="mgetast" href="#mgetast">#</a> `getAst`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L78)
```php
public function getAst(): \PhpParser\Node\Stmt\ClassMethod;
```
Get AST for this entity

***Return value:*** [\PhpParser\Node\Stmt\ClassMethod](https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/Node/Stmt/ClassMethod.php)

---

<a name="mgetbodycode" href="#mgetbodycode">#</a> `getBodyCode`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L545)
```php
public function getBodyCode(): string;
```
Get the code for this method

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

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

<a name="mgetdoccommententity" href="#mgetdoccommententity">#</a> `getDocCommentEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L142)
```php
public function getDocCommentEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```
Link to an entity where docBlock is implemented for this entity

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php)

---

<a name="mgetdoccommentline" href="#mgetdoccommentline">#</a> `getDocCommentLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L200)
```php
public function getDocCommentLine(): null|int;
```

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

<a name="mgetendline" href="#mgetendline">#</a> `getEndLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L518)
```php
public function getEndLine(): int;
```
Get the line number of the end of a method's code in a file

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

<a name="mgetfirstreturnvalue" href="#mgetfirstreturnvalue">#</a> `getFirstReturnValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L529)
```php
public function getFirstReturnValue(): mixed;
```
Get the compiled first return value of a method (if possible)

***Return value:*** [mixed](https://www.php.net/manual/en/language.types.mixed.php)

---

<a name="mgetimplementingclass" href="#mgetimplementingclass">#</a> `getImplementingClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L106)
```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the class like entity in which the current entity was implemented

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a> `getImplementingClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L414)
```php
public function getImplementingClassName(): string;
```
Get the name of the class in which this method is implemented

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a> `getModifiersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L242)
```php
public function getModifiersString(): string;
```
Get a text representation of method modifiers

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L114)
```php
public function getName(): string;
```
Full name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetnamespacename" href="#mgetnamespacename">#</a> `getNamespaceName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L130)
```php
public function getNamespaceName(): string;
```
Namespace of the class that contains this method

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

<a name="mgetparameters" href="#mgetparameters">#</a> `getParameters`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L300)
```php
public function getParameters(): array;
```
Get a list of method parameters

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetparametersstring" href="#mgetparametersstring">#</a> `getParametersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L392)
```php
public function getParametersString(): string;
```
Get a list of method parameters as a string

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetparentmethod" href="#mgetparentmethod">#</a> `getParentMethod`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L184)
```php
public function getParentMethod(): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```
Get the parent method for this method

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L232)
```php
public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](Configuration.md#mgetprojectroot)

---

<a name="mgetreturntype" href="#mgetreturntype">#</a> `getReturnType`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L269)
```php
public function getReturnType(): string;
```
Get the return type of method

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrootentity" href="#mgetrootentity">#</a> `getRootEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L90)
```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L98)
```php
public function getRootEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get the collection of root entities to which this entity belongs

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L122)
```php
public function getShortName(): string;
```
Short name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetsignature" href="#mgetsignature">#</a> `getSignature`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L212)
```php
public function getSignature(): string;
```
Get the method signature as a string

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetstartcolumn" href="#mgetstartcolumn">#</a> `getStartColumn`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L508)
```php
public function getStartColumn(): int;
```
Get the column number of the beginning of the method code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetstartline" href="#mgetstartline">#</a> `getStartLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L498)
```php
public function getStartLine(): int;
```
Get the line number of the beginning of the entity code in a file

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

<a name="misconstructor" href="#misconstructor">#</a> `isConstructor`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L222)
```php
public function isConstructor(): bool;
```
Checking that a method is a constructor

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

<a name="misdynamic" href="#misdynamic">#</a> `isDynamic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L448)
```php
public function isDynamic(): bool;
```
Check if a method is a dynamic method, that is, implementable using __call or __callStatic

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

<a name="misimplementedinparentclass" href="#misimplementedinparentclass">#</a> `isImplementedInParentClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L406)
```php
public function isImplementedInParentClass(): bool;
```
Check if this method is implemented in the parent class

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misinitialization" href="#misinitialization">#</a> `isInitialization`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L426)
```php
public function isInitialization(): bool;
```
Check if a method is an initialization method

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

<a name="misprivate" href="#misprivate">#</a> `isPrivate`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L488)
```php
public function isPrivate(): bool;
```
Check if a method is a private method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misprotected" href="#misprotected">#</a> `isProtected`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L478)
```php
public function isProtected(): bool;
```
Check if a method is a protected method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mispublic" href="#mispublic">#</a> `isPublic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L458)
```php
public function isPublic(): bool;
```
Check if a method is a public method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misstatic" href="#misstatic">#</a> `isStatic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php#L468)
```php
public function isStatic(): bool;
```
Check if this method is static

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
