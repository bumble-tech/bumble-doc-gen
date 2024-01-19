[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Renderer](../../readme.md) **/**
[How to create documentation templates?](../readme.md) **/**
RootEntityInterface

---


# [RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L11) class:

```php
namespace BumbleDocGen\Core\Parser\Entity;

interface RootEntityInterface extends \BumbleDocGen\Core\Parser\Entity\EntityInterface
```
Since the documentation generator supports several programming languages,
their entities need to correspond to the same interfaces

## Methods

1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getEntityDependencies](#mgetentitydependencies) 
1. [getFileContent](#mgetfilecontent) 
1. [getFileSourceLink](#mgetfilesourcelink) 
1. [getName](#mgetname) - Full name of the entity
1. [getObjectId](#mgetobjectid) - Entity object ID
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getRootEntityCollection](#mgetrootentitycollection) - Get parent collection of entities
1. [getShortName](#mgetshortname) - Short name of the entity
1. [isEntityCacheOutdated](#misentitycacheoutdated) 
1. [isEntityDataCanBeLoaded](#misentitydatacanbeloaded) - Checking if it is possible to get the entity data
1. [isEntityNameValid](#misentitynamevalid) - Check if entity name is valid
1. [isExternalLibraryEntity](#misexternallibraryentity) - The entity is loaded from a third party library and should not be treated the same as a standard one
1. [isInGit](#misingit) - The entity file is in the git repository
1. [normalizeClassName](#mnormalizeclassname) 

## Methods details:

<a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a> `getAbsoluteFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L53)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getAbsoluteFileName(): null|string;
```
Returns the absolute path to a file if it can be retrieved and if the file is in the project directory

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetentitydependencies" href="#mgetentitydependencies">#</a> `getEntityDependencies`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L33)
```php
public function getEntityDependencies(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetfilecontent" href="#mgetfilecontent">#</a> `getFileContent`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L40)
```php
public function getFileContent(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetfilesourcelink" href="#mgetfilesourcelink">#</a> `getFileSourceLink`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L42)
```php
public function getFileSourceLink(bool $withLine = true): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$withLine | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L30)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getName(): string;
```
Full name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetobjectid" href="#mgetobjectid">#</a> `getObjectId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L16)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getObjectId(): string;
```
Entity object ID

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L46)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](Configuration_2.md#mgetprojectroot)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L23)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getRootEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```
Get parent collection of entities

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L37)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function getShortName(): string;
```
Short name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a> `isEntityCacheOutdated` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L58)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\EntityInterface

public function isEntityCacheOutdated(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitydatacanbeloaded" href="#misentitydatacanbeloaded">#</a> `isEntityDataCanBeLoaded`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L23)
```php
public function isEntityDataCanBeLoaded(): bool;
```
Checking if it is possible to get the entity data

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misentitynamevalid" href="#misentitynamevalid">#</a> `isEntityNameValid`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L18)
```php
public static function isEntityNameValid(string $entityName): bool;
```
Check if entity name is valid

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entityName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misexternallibraryentity" href="#misexternallibraryentity">#</a> `isExternalLibraryEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L28)
```php
public function isExternalLibraryEntity(): bool;
```
The entity is loaded from a third party library and should not be treated the same as a standard one

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misingit" href="#misingit">#</a> `isInGit`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L38)
```php
public function isInGit(): bool;
```
The entity file is in the git repository

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mnormalizeclassname" href="#mnormalizeclassname">#</a> `normalizeClassName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php#L13)
```php
public static function normalizeClassName(string $name): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$name | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---
