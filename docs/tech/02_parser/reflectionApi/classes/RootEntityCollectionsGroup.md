[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
RootEntityCollectionsGroup

---


# [RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L10) class:

```php
namespace BumbleDocGen\Core\Parser\Entity;

final class RootEntityCollectionsGroup implements \IteratorAggregate
```

## Methods

1. [add](#madd) 
1. [clearOperationsLog](#mclearoperationslog) 
1. [get](#mget) 
1. [getIterator](#mgetiterator) 
1. [getOperationsLog](#mgetoperationslog) 
1. [getOperationsLogWithoutDuplicates](#mgetoperationslogwithoutduplicates) 
1. [isFoundEntitiesOperationsLogCacheOutdated](#misfoundentitiesoperationslogcacheoutdated) 
1. [loadByLanguageHandlers](#mloadbylanguagehandlers) 
1. [updateAllEntitiesCache](#mupdateallentitiescache) 

## Methods details:

<a name="madd" href="#madd">#</a> `add`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L36)
```php
public function add(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rootEntityCollection | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mclearoperationslog" href="#mclearoperationslog">#</a> `clearOperationsLog`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L46)
```php
public function clearOperationsLog(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mget" href="#mget">#</a> `get`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L41)
```php
public function get(string $collectionName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$collectionName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="mgetiterator" href="#mgetiterator">#</a> `getIterator`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L17)
```php
public function getIterator(): \Generator;
```

***Return value:*** [\Generator](https://www.php.net/manual/en/language.generators.overview.php)

---

<a name="mgetoperationslog" href="#mgetoperationslog">#</a> `getOperationsLog`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L55)
```php
public function getOperationsLog(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetoperationslogwithoutduplicates" href="#mgetoperationslogwithoutduplicates">#</a> `getOperationsLogWithoutDuplicates`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L68)
```php
public function getOperationsLogWithoutDuplicates(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="misfoundentitiesoperationslogcacheoutdated" href="#misfoundentitiesoperationslogcacheoutdated">#</a> `isFoundEntitiesOperationsLogCacheOutdated`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L82)
```php
public function isFoundEntitiesOperationsLogCacheOutdated(array $entitiesCollectionOperationsLog): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entitiesCollectionOperationsLog | [array](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mloadbylanguagehandlers" href="#mloadbylanguagehandlers">#</a> `loadByLanguageHandlers`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L22)
```php
public function loadByLanguageHandlers(\BumbleDocGen\LanguageHandler\LanguageHandlersCollection $languageHandlersCollection, \BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionGroupLoadEntitiesResult;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$languageHandlersCollection | [\BumbleDocGen\LanguageHandler\LanguageHandlersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlersCollection.php) | - |
$progressBar | [\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\CollectionGroupLoadEntitiesResult](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionGroupLoadEntitiesResult.php)

---

<a name="mupdateallentitiescache" href="#mupdateallentitiescache">#</a> `updateAllEntitiesCache`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php#L96)
```php
public function updateAllEntitiesCache(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
