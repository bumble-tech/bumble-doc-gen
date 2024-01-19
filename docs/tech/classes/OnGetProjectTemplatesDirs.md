[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
OnGetProjectTemplatesDirs

---


# [OnGetProjectTemplatesDirs](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php#L12) class:

```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnGetProjectTemplatesDirs extends \Symfony\Contracts\EventDispatcher\Event
```
This event occurs when all directories containing document templates are retrieved

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [addTemplatesDir](#maddtemplatesdir) 
1. [getTemplatesDirs](#mgettemplatesdirs) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php#L14)
```php
public function __construct(array $templatesDirs);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$templatesDirs | [array](https://www.php.net/manual/en/language.types.array.php) | - |

---

<a name="maddtemplatesdir" href="#maddtemplatesdir">#</a> `addTemplatesDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php#L23)
```php
public function addTemplatesDir(string $dirName): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$dirName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgettemplatesdirs" href="#mgettemplatesdirs">#</a> `getTemplatesDirs`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php#L18)
```php
public function getTemplatesDirs(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
