[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
OnCreateDocumentedEntityWrapper

---


# [OnCreateDocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php#L13) class:

```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnCreateDocumentedEntityWrapper extends \Symfony\Contracts\EventDispatcher\Event
```
The event occurs when an entity is added to the list for documentation

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getDocumentedEntityWrapper](#mgetdocumentedentitywrapper) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php#L15)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper $documentedEntityWrapper);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$documentedEntityWrapper | [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php) | - |

---

<a name="mgetdocumentedentitywrapper" href="#mgetdocumentedentitywrapper">#</a> `getDocumentedEntityWrapper`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php#L20)
```php
public function getDocumentedEntityWrapper(): \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php)

---
