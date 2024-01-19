[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entities and entities collections](../entity.md) **/**
MethodEntitiesCollection

---


# [MethodEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L22) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

final class MethodEntitiesCollection extends \BumbleDocGen\Core\Parser\Entity\BaseEntityCollection implements \IteratorAggregate
```
Collection of PHP class method entities

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [add](#madd) - Add an entity to a collection
1. [get](#mget) - Get the loaded method entity if it exists
1. [getAllExceptInitializations](#mgetallexceptinitializations) - Get a copy of the collection containing only those methods that are not initialization methods
1. [getInitializations](#mgetinitializations) - Get a copy of the collection containing only those methods that are initialization methods
1. [getIterator](#mgetiterator) 
1. [has](#mhas) - Check if an entity has been added to the collection
1. [isEmpty](#misempty) - Check if the collection is empty or not
1. [loadMethodEntities](#mloadmethodentities) - Load method entities into the collection according to the project configuration
1. [remove](#mremove) - Remove an entity from a collection
1. [unsafeGet](#munsafeget) - Get the method entity if it exists. If the method exists but has not been loaded into the collection, a new entity object will be created

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L26)
```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory $cacheablePhpEntityFactory, \Psr\Log\LoggerInterface $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$phpHandlerSettings | [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php) | - |
$cacheablePhpEntityFactory | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Cache/CacheablePhpEntityFactory.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |

---

<a name="madd" href="#madd">#</a> `add`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L82)
```php
public function add(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface $methodEntity, bool $reload = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```
Add an entity to a collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$methodEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php) | Entity to be added to the collection |
$reload | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Replace an entity with a new one if one has already been loaded previously |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php)

---

<a name="mget" href="#mget">#</a> `get`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L98)
```php
public function get(string $objectName): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```
Get the loaded method entity if it exists

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | Method entity name |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php)

---

<a name="mgetallexceptinitializations" href="#mgetallexceptinitializations">#</a> `getAllExceptInitializations`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L162)
```php
public function getAllExceptInitializations(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```
Get a copy of the collection containing only those methods that are not initialization methods

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php)

---

<a name="mgetinitializations" href="#mgetinitializations">#</a> `getInitializations`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L140)
```php
public function getInitializations(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```
Get a copy of the collection containing only those methods that are initialization methods

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php)

---

<a name="mgetiterator" href="#mgetiterator">#</a> `getIterator`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L11)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function getIterator(): \Generator;
```

***Return value:*** [\Generator](https://www.php.net/manual/en/language.generators.overview.php)

---

<a name="mhas" href="#mhas">#</a> `has`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L42)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function has(string $objectName): bool;
```
Check if an entity has been added to the collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="misempty" href="#misempty">#</a> `isEmpty`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L52)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function isEmpty(): bool;
```
Check if the collection is empty or not

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mloadmethodentities" href="#mloadmethodentities">#</a> `loadMethodEntities` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L45)
```php
public function loadMethodEntities(): void;
```
Load method entities into the collection according to the project configuration

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getMethodEntityFilter()](/docs/tech/02_parser/classes/PhpHandlerSettings.md#mgetmethodentityfilter)

---

<a name="mremove" href="#mremove">#</a> `remove`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L32)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function remove(string $objectName): void;
```
Remove an entity from a collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="munsafeget" href="#munsafeget">#</a> `unsafeGet`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L114)
```php
public function unsafeGet(string $objectName): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```
Get the method entity if it exists. If the method exists but has not been loaded into the collection, a new entity object will be created

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | Method entity name |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php)

---
