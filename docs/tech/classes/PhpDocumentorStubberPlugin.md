[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
PhpDocumentorStubberPlugin

---


# [PhpDocumentorStubberPlugin](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpDocumentorStubberPlugin.php#L23) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

final class PhpDocumentorStubberPlugin implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```
Adding links to the documentation of PHP classes in the \phpDocumentor namespace

## Methods

1. [getSubscribedEvents](#mgetsubscribedevents) 
1. [onCheckIsEntityCanBeLoaded](#moncheckisentitycanbeloaded) 
1. [onGettingResourceLink](#mongettingresourcelink) 

## Methods details:

<a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a> `getSubscribedEvents`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpDocumentorStubberPlugin.php#L25)
```php
public static function getSubscribedEvents(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="moncheckisentitycanbeloaded" href="#moncheckisentitycanbeloaded">#</a> `onCheckIsEntityCanBeLoaded`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpDocumentorStubberPlugin.php#L73)
```php
public function onCheckIsEntityCanBeLoaded(\BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mongettingresourcelink" href="#mongettingresourcelink">#</a> `onGettingResourceLink`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpDocumentorStubberPlugin.php#L33)
```php
public function onGettingResourceLink(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
