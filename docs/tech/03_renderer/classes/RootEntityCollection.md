[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[Template functions](../05_twigCustomFunctions.md) **/**
RootEntityCollection

---


# [RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L18) class:

```php
namespace BumbleDocGen\Core\Parser\Entity;

abstract class RootEntityCollection extends \BumbleDocGen\Core\Parser\Entity\BaseEntityCollection implements \IteratorAggregate
```

## Methods

1. [findEntity](#mfindentity) - Find an entity in a collection
1. [get](#mget) - Get an entity from a collection (only previously added)
1. [getEntityCollectionName](#mgetentitycollectionname) - Get collection name
1. [getEntityLinkData](#mgetentitylinkdata) 
1. [getIterator](#mgetiterator) 
1. [getLoadedOrCreateNew](#mgetloadedorcreatenew) - Get an entity from the collection or create a new one if it has not yet been added
1. [has](#mhas) - Check if an entity has been added to the collection
1. [isEmpty](#misempty) - Check if the collection is empty or not
1. [loadEntities](#mloadentities) 
1. [loadEntitiesByConfiguration](#mloadentitiesbyconfiguration) 
1. [remove](#mremove) - Remove an entity from a collection
1. [removeAllNotLoadedEntities](#mremoveallnotloadedentities) 
1. [toArray](#mtoarray) - Convert collection to array
1. [updateEntitiesCache](#mupdateentitiescache) 

## Methods details:

<a name="mfindentity" href="#mfindentity">#</a> `findEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L76)
```php
public function findEntity(string $search, bool $useUnsafeKeys = true): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```
Find an entity in a collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$search | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$useUnsafeKeys | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php)

---

<a name="mget" href="#mget">#</a> `get`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L49)
```php
public function get(string $objectName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```
Get an entity from a collection (only previously added)

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php)

---

<a name="mgetentitycollectionname" href="#mgetentitycollectionname">#</a> `getEntityCollectionName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L39)
```php
public function getEntityCollectionName(): string;
```
Get collection name

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetentitylinkdata" href="#mgetentitylinkdata">#</a> `getEntityLinkData` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L90)
```php
public function getEntityLinkData(string $rawLink, string|null $defaultEntityName = null, bool $useUnsafeKeys = true): array;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rawLink | [string](https://www.php.net/manual/en/language.types.string.php) | Raw link to an entity or entity element |
$defaultEntityName | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | Entity name to use if the link does not contain a valid or existing entity name,
 but only a cursor on an entity element |
$useUnsafeKeys | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetiterator" href="#mgetiterator">#</a> `getIterator`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L11)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function getIterator(): \Generator;
```

***Return value:*** [\Generator](https://www.php.net/manual/en/language.generators.overview.php)

---

<a name="mgetloadedorcreatenew" href="#mgetloadedorcreatenew">#</a> `getLoadedOrCreateNew`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L67)
```php
public function getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```
Get an entity from the collection or create a new one if it has not yet been added

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$withAddClassEntityToCollectionEvent | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php)

***Links:***
- [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface::isEntityDataCanBeLoaded()](RootEntityInterface_2.md#misentitydatacanbeloaded)

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

<a name="mloadentities" href="#mloadentities">#</a> `loadEntities`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L28)
```php
public function loadEntities(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection $sourceLocatorsCollection, \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface|null $filters = null, \BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$sourceLocatorsCollection | [\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php) | - |
$filters | [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |
$progressBar | [\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php)

---

<a name="mloadentitiesbyconfiguration" href="#mloadentitiesbyconfiguration">#</a> `loadEntitiesByConfiguration`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L26)
```php
public function loadEntitiesByConfiguration(\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$progressBar | [\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php)

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

<a name="mremoveallnotloadedentities" href="#mremoveallnotloadedentities">#</a> `removeAllNotLoadedEntities`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L132)
```php
public function removeAllNotLoadedEntities(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mtoarray" href="#mtoarray">#</a> `toArray`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L127)
```php
public function toArray(): array;
```
Convert collection to array

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mupdateentitiescache" href="#mupdateentitiescache">#</a> `updateEntitiesCache` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L97)
```php
public function updateEntitiesCache(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
