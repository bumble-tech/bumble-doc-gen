[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entities and entities collections](../entity.md) **/**
PropertyEntitiesCollection

---


# [PropertyEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php#L15) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property;

final class PropertyEntitiesCollection extends \BumbleDocGen\Core\Parser\Entity\BaseEntityCollection implements \IteratorAggregate
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [add](#madd) - Add an entity to a collection
1. [get](#mget) - Get the loaded property entity if it exists
1. [getIterator](#mgetiterator) 
1. [has](#mhas) - Check if an entity has been added to the collection
1. [isEmpty](#misempty) - Check if the collection is empty or not
1. [loadPropertyEntities](#mloadpropertyentities) - Load property entities into the collection according to the project configuration
1. [remove](#mremove) - Remove an entity from a collection
1. [unsafeGet](#munsafeget) - Get the property entity if it exists. If the property exists but has not been loaded into the collection, a new entity object will be created

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php#L17)
```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory $cacheablePhpEntityFactory);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$phpHandlerSettings | [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php) | - |
$cacheablePhpEntityFactory | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Cache/CacheablePhpEntityFactory.php) | - |

---

<a name="madd" href="#madd">#</a> `add`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php#L58)
```php
public function add(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity $propertyEntity, bool $reload = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection;
```
Add an entity to a collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$propertyEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php) | Entity to be added to the collection |
$reload | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Replace an entity with a new one if one has already been loaded previously |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php)

---

<a name="mget" href="#mget">#</a> `get`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php#L74)
```php
public function get(string $objectName): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
```
Get the loaded property entity if it exists

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | Property entity name |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php)

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

<a name="mloadpropertyentities" href="#mloadpropertyentities">#</a> `loadPropertyEntities` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php#L35)
```php
public function loadPropertyEntities(): void;
```
Load property entities into the collection according to the project configuration

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

***Links:***
- [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getPropertyEntityFilter()](/docs/tech/02_parser/classes/PhpHandlerSettings.md#mgetpropertyentityfilter)

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

<a name="munsafeget" href="#munsafeget">#</a> `unsafeGet`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntitiesCollection.php#L90)
```php
public function unsafeGet(string $objectName): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
```
Get the property entity if it exists. If the property exists but has not been loaded into the collection, a new entity object will be created

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | Property entity name |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property/PropertyEntity.php)

---
