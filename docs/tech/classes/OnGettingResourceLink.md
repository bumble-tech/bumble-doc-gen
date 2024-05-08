[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
OnGettingResourceLink

---


# [OnGettingResourceLink](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php#L12) class:

```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnGettingResourceLink extends \Symfony\Contracts\EventDispatcher\Event
```
Event occurs when a reference to an entity (resource) is received

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getResourceName](#mgetresourcename) 
1. [getResourceUrl](#mgetresourceurl) 
1. [setResourceUrl](#msetresourceurl) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php#L16)
```php
public function __construct(string $resourceName);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$resourceName | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mgetresourcename" href="#mgetresourcename">#</a> `getResourceName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php#L20)
```php
public function getResourceName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetresourceurl" href="#mgetresourceurl">#</a> `getResourceUrl`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php#L25)
```php
public function getResourceUrl(): null|string;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="msetresourceurl" href="#msetresourceurl">#</a> `setResourceUrl`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php#L30)
```php
public function setResourceUrl(string|null $resourceUrl): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$resourceUrl | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
