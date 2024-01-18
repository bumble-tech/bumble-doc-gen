[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
BeforeCreatingDocFile

---


# [BeforeCreatingDocFile](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L12) class:

```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class BeforeCreatingDocFile extends \Symfony\Contracts\EventDispatcher\Event
```
Called before the content of the documentation document is saved to a file

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getContent](#mgetcontent) 
1. [getOutputFilePatch](#mgetoutputfilepatch) 
1. [setContent](#msetcontent) 
1. [setOutputFilePatch](#msetoutputfilepatch) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L14)
```php
public function __construct(string $content, string $outputFilePatch);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$content | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$outputFilePatch | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mgetcontent" href="#mgetcontent">#</a> `getContent`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L20)
```php
public function getContent(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoutputfilepatch" href="#mgetoutputfilepatch">#</a> `getOutputFilePatch`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L30)
```php
public function getOutputFilePatch(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="msetcontent" href="#msetcontent">#</a> `setContent`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L25)
```php
public function setContent(string $content): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$content | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="msetoutputfilepatch" href="#msetoutputfilepatch">#</a> `setOutputFilePatch`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L35)
```php
public function setOutputFilePatch(string $outputFilePatch): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$outputFilePatch | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
