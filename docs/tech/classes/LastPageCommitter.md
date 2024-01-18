[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
LastPageCommitter

---


# [LastPageCommitter](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L15) class:

```php
namespace BumbleDocGen\Core\Plugin\CorePlugin\LastPageCommitter;

final class LastPageCommitter implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```
Plugin for adding a block with information about the last commit and date of page update to the generated document

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [beforeCreatingDocFile](#mbeforecreatingdocfile) 
1. [getSubscribedEvents](#mgetsubscribedevents) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L17)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $context, \BumbleDocGen\Core\Configuration\Configuration $configuration);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$context | [\BumbleDocGen\Core\Renderer\Context\RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php) | - |
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |

---

<a name="mbeforecreatingdocfile" href="#mbeforecreatingdocfile">#</a> `beforeCreatingDocFile`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L30)
```php
public function beforeCreatingDocFile(\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a> `getSubscribedEvents`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/LastPageCommitter/LastPageCommitter.php#L23)
```php
public static function getSubscribedEvents(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
