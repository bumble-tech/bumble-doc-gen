[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entities and entities collections](../entity.md) **/**
EntityInterface

---


# [EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L9) class:

```php
namespace BumbleDocGen\Core\Parser\Entity;

interface EntityInterface
```

## Methods

1. [getAbsoluteFileName](#mgetabsolutefilename) - Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
1. [getName](#mgetname) - Full name of the entity
1. [getObjectId](#mgetobjectid) - Entity object ID
1. [getRelativeFileName](#mgetrelativefilename) - File name relative to project_root configuration parameter
1. [getRootEntityCollection](#mgetrootentitycollection) - Get parent collection of entities
1. [getShortName](#mgetshortname) - Short name of the entity
1. [isEntityCacheOutdated](#misentitycacheoutdated) 

## Methods details:

<a name="mgetabsolutefilename" href="#mgetabsolutefilename">#</a> `getAbsoluteFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L53)
```php
public function getAbsoluteFileName(): null|string;
```
Returns the absolute path to a file if it can be retrieved and if the file is in the project directory

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L30)
```php
public function getName(): string;
```
Full name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetobjectid" href="#mgetobjectid">#</a> `getObjectId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L16)
```php
public function getObjectId(): string;
```
Entity object ID

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetrelativefilename" href="#mgetrelativefilename">#</a> `getRelativeFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L46)
```php
public function getRelativeFileName(): null|string;
```
File name relative to project_root configuration parameter

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

***Links:***
- [\BumbleDocGen\Core\Configuration\Configuration::getProjectRoot()](/docs/tech/02_parser/classes/Configuration.md#mgetprojectroot)

---

<a name="mgetrootentitycollection" href="#mgetrootentitycollection">#</a> `getRootEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L23)
```php
public function getRootEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```
Get parent collection of entities

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="mgetshortname" href="#mgetshortname">#</a> `getShortName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L37)
```php
public function getShortName(): string;
```
Short name of the entity

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="misentitycacheoutdated" href="#misentitycacheoutdated">#</a> `isEntityCacheOutdated` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php#L58)
```php
public function isEntityCacheOutdated(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
