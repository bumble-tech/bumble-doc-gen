[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
DocumentedEntityWrapper

---


# [DocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L14) class:

```php
namespace BumbleDocGen\Core\Renderer\Context;

final class DocumentedEntityWrapper
```
Wrapper for the entity that was requested for documentation

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getDocRender](#mgetdocrender) 
1. [getDocUrl](#mgetdocurl) - Get the relative path to the document to be generated
1. [getDocumentTransformableEntity](#mgetdocumenttransformableentity) - Get entity that is allowed to be documented
1. [getEntityName](#mgetentityname) 
1. [getFileName](#mgetfilename) - The name of the file to be generated
1. [getKey](#mgetkey) - Get document key
1. [getParentDocFilePath](#mgetparentdocfilepath) 
1. [setParentDocFilePath](#msetparentdocfilepath) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L20)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface $documentTransformableEntity, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, string $parentDocFilePath);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$documentTransformableEntity | [\BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php) | An entity that is allowed to be documented |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$parentDocFilePath | [string](https://www.php.net/manual/en/language.types.string.php) | The file in which the documentation of the entity was requested |

---

<a name="mgetdocrender" href="#mgetdocrender">#</a> `getDocRender`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L27)
```php
public function getDocRender(): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/EntityDocRenderer/EntityDocRendererInterface.php)

---

<a name="mgetdocurl" href="#mgetdocurl">#</a> `getDocUrl`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L88)
```php
public function getDocUrl(): string;
```
Get the relative path to the document to be generated

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdocumenttransformableentity" href="#mgetdocumenttransformableentity">#</a> `getDocumentTransformableEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L80)
```php
public function getDocumentTransformableEntity(): \BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface;
```
Get entity that is allowed to be documented

***Return value:*** [\BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentTransformableEntityInterface.php)

---

<a name="mgetentityname" href="#mgetentityname">#</a> `getEntityName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L40)
```php
public function getEntityName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetfilename" href="#mgetfilename">#</a> `getFileName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L72)
```php
public function getFileName(): string;
```
The name of the file to be generated

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetkey" href="#mgetkey">#</a> `getKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L35)
```php
public function getKey(): string;
```
Get document key

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetparentdocfilepath" href="#mgetparentdocfilepath">#</a> `getParentDocFilePath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L96)
```php
public function getParentDocFilePath(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="msetparentdocfilepath" href="#msetparentdocfilepath">#</a> `setParentDocFilePath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php#L101)
```php
public function setParentDocFilePath(string $parentDocFilePath): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$parentDocFilePath | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
