[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Configuration](../01_configuration.md) **/**
BasePageLinkProcessor

---


# [BasePageLinkProcessor](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/PageLinkProcessor/BasePageLinkProcessor.php#L9) class:

```php
namespace BumbleDocGen\Core\Renderer\PageLinkProcessor;

class BasePageLinkProcessor implements \BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAbsoluteUrl](#mgetabsoluteurl) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/PageLinkProcessor/BasePageLinkProcessor.php#L11)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |

---

<a name="mgetabsoluteurl" href="#mgetabsoluteurl">#</a> `getAbsoluteUrl`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/PageLinkProcessor/BasePageLinkProcessor.php#L15)
```php
public function getAbsoluteUrl(string $relativeUrl): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$relativeUrl | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---
