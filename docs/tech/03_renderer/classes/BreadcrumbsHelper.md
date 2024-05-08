[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[Documentation structure and breadcrumbs](../02_breadcrumbs.md) **/**
BreadcrumbsHelper

---


# [BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L23) class:

```php
namespace BumbleDocGen\Core\Renderer\Breadcrumbs;

final class BreadcrumbsHelper
```
Helper entity for working with breadcrumbs

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAllPageLinks](#mgetallpagelinks) 
1. [getBreadcrumbs](#mgetbreadcrumbs) - Get breadcrumbs as an array
1. [getBreadcrumbsForTemplates](#mgetbreadcrumbsfortemplates) 
1. [getNearestIndexFile](#mgetnearestindexfile) 
1. [getPageDataByKey](#mgetpagedatabykey) 
1. [getPageDocFileByKey](#mgetpagedocfilebykey) 
1. [getPageLinkByKey](#mgetpagelinkbykey) 
1. [getTemplateFrontMatter](#mgettemplatefrontmatter) 
1. [getTemplateLinkKey](#mgettemplatelinkkey) 
1. [getTemplateTitle](#mgettemplatetitle) - Get the name of a template by its URL.

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L35)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, string $prevPageNameTemplate = self::DEFAULT_PREV_PAGE_NAME_TEMPLATE);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$pluginEventDispatcher | [\BumbleDocGen\Core\Plugin\PluginEventDispatcher](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php) | - |
$prevPageNameTemplate | [string](https://www.php.net/manual/en/language.types.string.php) | Index page for each child section |

---

<a name="mgetallpagelinks" href="#mgetallpagelinks">#</a> `getAllPageLinks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L236)
```php
public function getAllPageLinks(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetbreadcrumbs" href="#mgetbreadcrumbs">#</a> `getBreadcrumbs`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L187)
```php
public function getBreadcrumbs(string $filePatch, bool $fromCurrent = true): array;
```
Get breadcrumbs as an array

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$filePatch | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$fromCurrent | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetbreadcrumbsfortemplates" href="#mgetbreadcrumbsfortemplates">#</a> `getBreadcrumbsForTemplates`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L209)
```php
public function getBreadcrumbsForTemplates(string $filePatch, bool $fromCurrent = true): array;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$filePatch | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$fromCurrent | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetnearestindexfile" href="#mgetnearestindexfile">#</a> `getNearestIndexFile`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L82)
```php
public function getNearestIndexFile(string $templateName): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$templateName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetpagedatabykey" href="#mgetpagedatabykey">#</a> `getPageDataByKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L303)
```php
public function getPageDataByKey(string $key): null|array;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetpagedocfilebykey" href="#mgetpagedocfilebykey">#</a> `getPageDocFileByKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L329)
```php
public function getPageDocFileByKey(string $key): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetpagelinkbykey" href="#mgetpagelinkbykey">#</a> `getPageLinkByKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L318)
```php
public function getPageLinkByKey(string $key): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgettemplatefrontmatter" href="#mgettemplatefrontmatter">#</a> `getTemplateFrontMatter`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L152)
```php
public function getTemplateFrontMatter(string $templateName): array;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$templateName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgettemplatelinkkey" href="#mgettemplatelinkkey">#</a> `getTemplateLinkKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L143)
```php
public function getTemplateLinkKey(string $templateName): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$templateName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgettemplatetitle" href="#mgettemplatetitle">#</a> `getTemplateTitle`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php#L134)
```php
public function getTemplateTitle(string $templateName): string;
```
Get the name of a template by its URL.

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$templateName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

***Examples of using:***
```php
# Front matter in template:
# ---
# title: Some template title
# ---

$breadcrumbsHelper->getTemplateTitle() == 'Some template title'; // is true
```

---
