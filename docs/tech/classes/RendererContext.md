[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
RendererContext

---


# [RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L12) class:

```php
namespace BumbleDocGen\Core\Renderer\Context;

final class RendererContext
```
Document rendering context

## Methods

1. [addDependency](#madddependency) 
1. [clearDependencies](#mcleardependencies) 
1. [getCurrentDocumentedEntityWrapper](#mgetcurrentdocumentedentitywrapper) 
1. [getCurrentTemplateFilePatch](#mgetcurrenttemplatefilepatch) - Getting the path to the template file that is currently being worked on
1. [getDependencies](#mgetdependencies) 
1. [setCurrentDocumentedEntityWrapper](#msetcurrentdocumentedentitywrapper) 
1. [setCurrentTemplateFilePatch](#msetcurrenttemplatefilepatch) - Saving the path to the template file that is currently being worked on in the context

## Methods details:

<a name="madddependency" href="#madddependency">#</a> `addDependency`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L53)
```php
public function addDependency(\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyInterface $dependency): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$dependency | [\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyInterface.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mcleardependencies" href="#mcleardependencies">#</a> `clearDependencies`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L48)
```php
public function clearDependencies(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetcurrentdocumentedentitywrapper" href="#mgetcurrentdocumentedentitywrapper">#</a> `getCurrentDocumentedEntityWrapper`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L43)
```php
public function getCurrentDocumentedEntityWrapper(): null|\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php)

---

<a name="mgetcurrenttemplatefilepatch" href="#mgetcurrenttemplatefilepatch">#</a> `getCurrentTemplateFilePatch`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L32)
```php
public function getCurrentTemplateFilePatch(): string;
```
Getting the path to the template file that is currently being worked on

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdependencies" href="#mgetdependencies">#</a> `getDependencies`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L58)
```php
public function getDependencies(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="msetcurrentdocumentedentitywrapper" href="#msetcurrentdocumentedentitywrapper">#</a> `setCurrentDocumentedEntityWrapper`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L37)
```php
public function setCurrentDocumentedEntityWrapper(\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper $currentDocumentedEntityWrapper): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$currentDocumentedEntityWrapper | [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="msetcurrenttemplatefilepatch" href="#msetcurrenttemplatefilepatch">#</a> `setCurrentTemplateFilePatch`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L24)
```php
public function setCurrentTemplateFilePatch(string $currentTemplateFilePath): void;
```
Saving the path to the template file that is currently being worked on in the context

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$currentTemplateFilePath | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
