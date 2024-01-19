[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Renderer](../../readme.md) **/**
[How to create documentation templates?](../readme.md) **/**
DocumentedEntityWrappersCollection

---


# [DocumentedEntityWrappersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L14) class:

```php
namespace BumbleDocGen\Core\Renderer\Context;

final class DocumentedEntityWrappersCollection implements \IteratorAggregate, \Countable
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [count](#mcount) 
1. [createAndAddDocumentedEntityWrapper](#mcreateandadddocumentedentitywrapper) 
1. [getDocumentedEntitiesRelations](#mgetdocumentedentitiesrelations) 
1. [getIterator](#mgetiterator) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L21)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rendererContext | [\BumbleDocGen\Core\Renderer\Context\RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$breadcrumbsHelper | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php) | - |
$pluginEventDispatcher | [\BumbleDocGen\Core\Plugin\PluginEventDispatcher](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php) | - |

---

<a name="mcount" href="#mcount">#</a> `count`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L76)
```php
public function count(): int;
```

***Return value:*** [int](https://www.php.net/manual/en/language.types.integer.php)

---

<a name="mcreateandadddocumentedentitywrapper" href="#mcreateandadddocumentedentitywrapper">#</a> `createAndAddDocumentedEntityWrapper`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L42)
```php
public function createAndAddDocumentedEntityWrapper(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $rootEntity): \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rootEntity | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php) | - |

***Return value:*** [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php)

---

<a name="mgetdocumentedentitiesrelations" href="#mgetdocumentedentitiesrelations">#</a> `getDocumentedEntitiesRelations`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L71)
```php
public function getDocumentedEntitiesRelations(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetiterator" href="#mgetiterator">#</a> `getIterator`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php#L29)
```php
public function getIterator(): \Generator;
```

***Return value:*** [\Generator](https://www.php.net/manual/en/language.generators.overview.php)

---
