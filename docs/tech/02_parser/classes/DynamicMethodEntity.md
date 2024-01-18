[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Entities and entities collections](/docs/tech/02_parser/entity.md) **/**
DynamicMethodEntity

---


# [DynamicMethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L18) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

class DynamicMethodEntity implements \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface, \BumbleDocGen\Core\Parser\Entity\EntityInterface
```
Method obtained by parsing the "method" annotation

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getBodyCode](#mgetbodycode) - Get the code for this method
1. [getCallMethod](#mgetcallmethod) - Get the entity of the magic method that will be called instead of the current virtual one
1. [getDescription](#mgetdescription) - Get a description of this method
1. [getEndLine](#mgetendline) - Get the line number of the end of a method's code in a file
1. [getFirstReturnValue](#mgetfirstreturnvalue) - Get the compiled first return value of a method (if possible)
1. [getImplementingClass](#mgetimplementingclass) - Get the ClassLike entity in which this method was implemented
1. [getImplementingClassName](#mgetimplementingclassname) - Get the name of the class in which this method is implemented
1. [getModifiersString](#mgetmodifiersstring) - Get a text representation of method modifiers
1. [getName](#mgetname) - Full name of the entity
1. [getNamespaceName](#mgetnamespacename) - Namespace of the class that contains this method
1. [getObjectId](#mgetobjectid) - Entity object ID
1. [getParameters](#mgetparameters) - Get a list of method parameters
1. [getParametersString](#mgetparametersstring) - Get a list of method parameters as a string
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getReturnType](#mgetreturntype) - Get the return type of method
1. [getRootEntity](#mgetrootentity) - Get the class like entity where this method was obtained
1. [getRootEntityCollection](#mgetrootentitycollection) - Get parent collection of entities
1. [getShortName](#mgetshortname) - Short name of the entity
1. [getSignature](#mgetsignature) - Get the method signature as a string
1. [getStartColumn](#mgetstartcolumn) - Get the column number of the beginning of the method code in a file
1. [getStartLine](#mgetstartline) - Get the line number of the beginning of the method code in a file
1. [isDynamic](#misdynamic) - Check if a method is a dynamic method, that is, implementable using __call or __callStatic
1. [isEntityCacheOutdated](#misentitycacheoutdated) 
1. [isImplementedInParentClass](#misimplementedinparentclass) - Check if this method is implemented in the parent class
1. [isInitialization](#misinitialization) - Check if a method is an initialization method
1. [isPrivate](#misprivate) - Check if a method is a private method
1. [isProtected](#misprotected) - Check if a method is a protected method
1. [isPublic](#mispublic) - Check if a method is a public method
1. [isStatic](#misstatic) - Check if this method is static

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L20)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \phpDocumentor\Reflection\DocBlock\Tags\Method $annotationMethod);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$parserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php) | - |
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$annotationMethod | [\phpDocumentor\Reflection\DocBlock\Tags\Method](https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/DocBlock/Tags/Method.php) | - |

---

<a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a> `getAbsoluteFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L327)
```php
public function getAbsoluteFileName(): null|string;
```
Returns the absolute path to a file if it can be retrieved and if the file is in the project directory

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetbodycode" href="#mgetbodycode">#</a> `getBodyCode`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L304)
```php
public function getBodyCode(): string;
```
Get the code for this method

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetcallmethod" href="#mgetcallmethod">#</a> `getCallMethod`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L67)
```php
public function getCallMethod(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```
Get the entity of the magic method that will be called instead of the current virtual one

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php)

---

<a name="mgetdescription" href="#mgetdescription">#</a> `getDescription`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L214)
```php
public function getDescription(): string;
```
Get a description of this method

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetendline" href="#mgetendline">#</a> `getEndLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L115)
```php
public function getEndLine(): int;
```
Get the line number of the end of a method's code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetfirstreturnvalue" href="#mgetfirstreturnvalue">#</a> `getFirstReturnValue`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L296)
```php
public function getFirstReturnValue(): mixed;
```
Get the compiled first return value of a method (if possible)

***Return value:*** [mixed](https://www.php.net/manual/en/language.types.mixed.php)

---

<a name="mgetimplementingclass" href="#mgetimplementingclass">#</a> `getImplementingClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L240)
```php
public function getImplementingClass(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the ClassLike entity in which this method was implemented

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetimplementingclassname" href="#mgetimplementingclassname">#</a> `getImplementingClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L196)
```php
public function getImplementingClassName(): string;
```
Get the name of the class in which this method is implemented

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetmodifiersstring" href="#mgetmodifiersstring">#</a> `getModifiersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L124)
```php
public function getModifiersString(): string;
```
Get a text representation of method modifiers

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L39)
```php
public function getName(): string;
```
Full name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetnamespacename" href="#mgetnamespacename">#</a> `getNamespaceName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L256)
```php
public function getNamespaceName(): string;
```
Namespace of the class that contains this method

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetobjectid" href="#mgetobjectid">#</a> `getObjectId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L309)
```php
public function getObjectId(): string;
```
Entity object ID

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetparameters" href="#mgetparameters">#</a> `getParameters`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L161)
```php
public function getParameters(): array;
```
Get a list of method parameters

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetparametersstring" href="#mgetparametersstring">#</a> `getParametersString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L181)
```php
public function getParametersString(): string;
```
Get a list of method parameters as a string

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L83)
```php
public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](/docs/tech/02_parser/classes/Configuration.md#mgetprojectroot)

---

<a name="mgetreturntype" href="#mgetreturntype">#</a> `getReturnType`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L140)
```php
public function getReturnType(): string;
```
Get the return type of method

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrootentity" href="#mgetrootentity">#</a> `getRootEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L31)
```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```
Get the class like entity where this method was obtained

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L317)
```php
public function getRootEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```
Get parent collection of entities

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L248)
```php
public function getShortName(): string;
```
Short name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetsignature" href="#mgetsignature">#</a> `getSignature`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L49)
```php
public function getSignature(): string;
```
Get the method signature as a string

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetstartcolumn" href="#mgetstartcolumn">#</a> `getStartColumn`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L104)
```php
public function getStartColumn(): int;
```
Get the column number of the beginning of the method code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mgetstartline" href="#mgetstartline">#</a> `getStartLine`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L93)
```php
public function getStartLine(): int;
```
Get the line number of the beginning of the method code in a file

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="misdynamic" href="#misdynamic">#</a> `isDynamic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L288)
```php
public function isDynamic(): bool;
```
Check if a method is a dynamic method, that is, implementable using __call or __callStatic

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a> `isEntityCacheOutdated` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L339)
```php
public function isEntityCacheOutdated(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misimplementedinparentclass" href="#misimplementedinparentclass">#</a> `isImplementedInParentClass`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L206)
```php
public function isImplementedInParentClass(): bool;
```
Check if this method is implemented in the parent class

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misinitialization" href="#misinitialization">#</a> `isInitialization`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L225)
```php
public function isInitialization(): bool;
```
Check if a method is an initialization method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misprivate" href="#misprivate">#</a> `isPrivate`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L280)
```php
public function isPrivate(): bool;
```
Check if a method is a private method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misprotected" href="#misprotected">#</a> `isProtected`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L272)
```php
public function isProtected(): bool;
```
Check if a method is a protected method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mispublic" href="#mispublic">#</a> `isPublic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L264)
```php
public function isPublic(): bool;
```
Check if a method is a public method

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misstatic" href="#misstatic">#</a> `isStatic`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/DynamicMethodEntity.php#L57)
```php
public function isStatic(): bool;
```
Check if this method is static

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
