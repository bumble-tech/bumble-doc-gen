[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Renderer](../../readme.md) **/**
[How to create documentation templates?](../readme.md) **/**
[Templates variables](../templatesVariables.md) **/**
PhpEntitiesCollection

---


# [PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L43) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

final class PhpEntitiesCollection extends \BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection implements \IteratorAggregate
```
Collection of php root entities

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [add](#madd) - Add an entity to the collection
1. [clearOperationsLogCollection](#mclearoperationslogcollection) 
1. [filterByInterfaces](#mfilterbyinterfaces) - Get a copy of the current collection only with entities filtered by interfaces names (filtering is only available for ClassLikeEntity)
1. [filterByNameRegularExpression](#mfilterbynameregularexpression) - Get a copy of the current collection with only entities whose names match the regular expression
1. [filterByParentClassNames](#mfilterbyparentclassnames) - Get a copy of the current collection only with entities filtered by parent classes names (filtering is only available for ClassLikeEntity)
1. [filterByPaths](#mfilterbypaths) - Get a copy of the current collection only with entities filtered by file paths (from project_root)
1. [findEntity](#mfindentity) - Find an entity in a collection
1. [get](#mget) - Get an entity from a collection (only previously added)
1. [getEntityCollectionName](#mgetentitycollectionname) - Get collection name
1. [getEntityLinkData](#mgetentitylinkdata) 
1. [getIterator](#mgetiterator) 
1. [getLoadedOrCreateNew](#mgetloadedorcreatenew) - Get an entity from the collection or create a new one if it has not yet been added
1. [getOnlyAbstractClasses](#mgetonlyabstractclasses) - Get a copy of the current collection with only abstract classes
1. [getOnlyInstantiable](#mgetonlyinstantiable) - Get a copy of the current collection with only instantiable entities
1. [getOnlyInterfaces](#mgetonlyinterfaces) - Get a copy of the current collection with only interfaces
1. [getOnlyTraits](#mgetonlytraits) - Get a copy of the current collection with only traits
1. [getOperationsLogCollection](#mgetoperationslogcollection) 
1. [has](#mhas) - Check if an entity has been added to the collection
1. [internalFindEntity](#minternalfindentity) 
1. [internalGetLoadedOrCreateNew](#minternalgetloadedorcreatenew) 
1. [isEmpty](#misempty) - Check if the collection is empty or not
1. [loadEntities](#mloadentities) - Load entities into a collection
1. [loadEntitiesByConfiguration](#mloadentitiesbyconfiguration) - Load entities into a collection by configuration
1. [remove](#mremove) - Remove an entity from a collection
1. [removeAllNotLoadedEntities](#mremoveallnotloadedentities) 
1. [toArray](#mtoarray) - Convert collection to array
1. [updateEntitiesCache](#mupdateentitiescache) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L50)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory $cacheablePhpEntityFactory, \BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\EntityDocRendererHelper $docRendererHelper, \BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper $phpParserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$phpHandlerSettings | [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php) | - |
$pluginEventDispatcher | [\BumbleDocGen\Core\Plugin\PluginEventDispatcher](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php) | - |
$cacheablePhpEntityFactory | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Cache/CacheablePhpEntityFactory.php) | - |
$docRendererHelper | [\BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\EntityDocRendererHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/EntityDocRendererHelper.php) | - |
$phpParserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/PhpParser/PhpParserHelper.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |

---

<a name="madd" href="#madd">#</a> `add`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L190)
```php
public function add(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, bool $reload = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Add an entity to the collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$reload | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mclearoperationslogcollection" href="#mclearoperationslogcollection">#</a> `clearOperationsLogCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L28)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function clearOperationsLogCollection(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mfilterbyinterfaces" href="#mfilterbyinterfaces">#</a> `filterByInterfaces`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L244)
```php
public function filterByInterfaces(array $interfaces): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection only with entities filtered by interfaces names (filtering is only available for ClassLikeEntity)

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$interfaces | [string[]](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mfilterbynameregularexpression" href="#mfilterbynameregularexpression">#</a> `filterByNameRegularExpression`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L321)
```php
public function filterByNameRegularExpression(string $regexPattern): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection with only entities whose names match the regular expression

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$regexPattern | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mfilterbyparentclassnames" href="#mfilterbyparentclassnames">#</a> `filterByParentClassNames`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L270)
```php
public function filterByParentClassNames(array $parentClassNames): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection only with entities filtered by parent classes names (filtering is only available for ClassLikeEntity)

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$parentClassNames | [array](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mfilterbypaths" href="#mfilterbypaths">#</a> `filterByPaths`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L298)
```php
public function filterByPaths(array $paths): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection only with entities filtered by file paths (from project_root)

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$paths | [array](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mfindentity" href="#mfindentity">#</a> `findEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L118)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

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

<a name="mget" href="#mget">#</a> `get`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L86)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function get(string $objectName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```
Get an entity from a collection (only previously added)

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php)

---

<a name="mgetentitycollectionname" href="#mgetentitycollectionname">#</a> `getEntityCollectionName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L66)
```php
public function getEntityCollectionName(): string;
```
Get collection name

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetentitylinkdata" href="#mgetentitylinkdata">#</a> `getEntityLinkData` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L508)
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

<a name="mgetiterator" href="#mgetiterator">#</a> `getIterator`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L46)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function getIterator(): \Generator;
```

***Return value:*** [\Generator](https://www.php.net/manual/en/language.generators.overview.php)

---

<a name="mgetloadedorcreatenew" href="#mgetloadedorcreatenew">#</a> `getLoadedOrCreateNew`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L102)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

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
- [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface::isEntityDataCanBeLoaded()](/docs/tech/03_renderer/01_howToCreateTemplates/classes/RootEntityInterface.md#misentitydatacanbeloaded)

---

<a name="mgetonlyabstractclasses" href="#mgetonlyabstractclasses">#</a> `getOnlyAbstractClasses`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L388)
```php
public function getOnlyAbstractClasses(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection with only abstract classes

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetonlyinstantiable" href="#mgetonlyinstantiable">#</a> `getOnlyInstantiable`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L338)
```php
public function getOnlyInstantiable(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection with only instantiable entities

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetonlyinterfaces" href="#mgetonlyinterfaces">#</a> `getOnlyInterfaces`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L354)
```php
public function getOnlyInterfaces(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection with only interfaces

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetonlytraits" href="#mgetonlytraits">#</a> `getOnlyTraits`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L370)
```php
public function getOnlyTraits(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```
Get a copy of the current collection with only traits

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetoperationslogcollection" href="#mgetoperationslogcollection">#</a> `getOperationsLogCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L23)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function getOperationsLogCollection(): \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection;
```

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php)

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

<a name="minternalfindentity" href="#minternalfindentity">#</a> `internalFindEntity` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L421)
```php
public function internalFindEntity(string $search, bool $useUnsafeKeys = true): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$search | [string](https://www.php.net/manual/en/language.types.string.php) | Search query. For the search, only the main part is taken, up to the characters: `::`, `->`, `#`.
 If the request refers to multiple existing entities and if unsafe keys are allowed,
 a warning will be shown and the first entity found will be used. |
$useUnsafeKeys | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Whether to use search keys that can be used to find several entities |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

***Examples of using:***
```php
$entitiesCollection->findEntity('App'); // class name
$entitiesCollection->findEntity('BumbleDocGen\Console\App'); // class with namespace
$entitiesCollection->findEntity('\BumbleDocGen\Console\App'); // class with namespace
$entitiesCollection->findEntity('\BumbleDocGen\Console\App::test()'); // class with namespace and optional part
$entitiesCollection->findEntity('App.php'); // filename
$entitiesCollection->findEntity('/src/Console/App.php'); // relative path
$entitiesCollection->findEntity('/Users/someuser/Desktop/projects/bumble-doc-gen/src/Console/App.php'); // absolute path
$entitiesCollection->findEntity('https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/App.php'); // source link
```

---

<a name="minternalgetloadedorcreatenew" href="#minternalgetloadedorcreatenew">#</a> `internalGetLoadedOrCreateNew` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L214)
```php
public function internalGetLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$objectName | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$withAddClassEntityToCollectionEvent | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="misempty" href="#misempty">#</a> `isEmpty`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L52)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function isEmpty(): bool;
```
Check if the collection is empty or not

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mloadentities" href="#mloadentities">#</a> `loadEntities`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L100)
```php
public function loadEntities(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection $sourceLocatorsCollection, \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface|null $filters = null, \BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
```
Load entities into a collection

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$sourceLocatorsCollection | [\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php) | - |
$filters | [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |
$progressBar | [\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php)

---

<a name="mloadentitiesbyconfiguration" href="#mloadentitiesbyconfiguration">#</a> `loadEntitiesByConfiguration` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L81)
```php
public function loadEntitiesByConfiguration(\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
```
Load entities into a collection by configuration

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
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function removeAllNotLoadedEntities(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mtoarray" href="#mtoarray">#</a> `toArray`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L127)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function toArray(): array;
```
Convert collection to array

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mupdateentitiescache" href="#mupdateentitiescache">#</a> `updateEntitiesCache` ⚠️ Internal  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L97)
```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function updateEntitiesCache(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
