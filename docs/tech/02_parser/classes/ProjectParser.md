[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
ProjectParser

---


# [ProjectParser](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php#L21) class:

```php
namespace BumbleDocGen\Core\Parser;

final class ProjectParser
```
Entity for project parsing using source locators

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getEntityCollectionForPL](#mgetentitycollectionforpl) 
1. [getRootEntityCollectionsGroup](#mgetrootentitycollectionsgroup) 
1. [parse](#mparse) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php#L23)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$pluginEventDispatcher | [\BumbleDocGen\Core\Plugin\PluginEventDispatcher](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php) | - |
$rootEntityCollectionsGroup | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php) | - |

---

<a name="mgetentitycollectionforpl" href="#mgetentitycollectionforpl">#</a> `getEntityCollectionForPL`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php#L58)
```php
public function getEntityCollectionForPL(string $plHandlerClassName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$plHandlerClassName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="mgetrootentitycollectionsgroup" href="#mgetrootentitycollectionsgroup">#</a> `getRootEntityCollectionsGroup`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php#L46)
```php
public function getRootEntityCollectionsGroup(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
```

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php)

---

<a name="mparse" href="#mparse">#</a> `parse`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php#L37)
```php
public function parse(\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionGroupLoadEntitiesResult;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$progressBar | [\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\CollectionGroupLoadEntitiesResult](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionGroupLoadEntitiesResult.php)

---
