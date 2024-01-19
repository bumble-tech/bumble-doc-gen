[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
OnGetTemplatePathByRelativeDocPath

---


# [OnGetTemplatePathByRelativeDocPath](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php#L12) class:

```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnGetTemplatePathByRelativeDocPath extends \Symfony\Contracts\EventDispatcher\Event
```
The event occurs when the path to the template file is obtained relative to the path to the document

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getCustomTemplateFilePath](#mgetcustomtemplatefilepath) 
1. [getTemplateName](#mgettemplatename) 
1. [setCustomTemplateFilePath](#msetcustomtemplatefilepath) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php#L16)
```php
public function __construct(string $templateName);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$templateName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mgetcustomtemplatefilepath" href="#mgetcustomtemplatefilepath">#</a> `getCustomTemplateFilePath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php#L30)
```php
public function getCustomTemplateFilePath(): null|string;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgettemplatename" href="#mgettemplatename">#</a> `getTemplateName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php#L20)
```php
public function getTemplateName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="msetcustomtemplatefilepath" href="#msetcustomtemplatefilepath">#</a> `setCustomTemplateFilePath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php#L25)
```php
public function setCustomTemplateFilePath(string|null $customTemplateFilePath): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$customTemplateFilePath | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
