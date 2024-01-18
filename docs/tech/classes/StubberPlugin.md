[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
StubberPlugin

---


# [StubberPlugin](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L15) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\ComposerPackagesStubber;

final class StubberPlugin implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```
The plugin allows you to automatically provide links to github repositories for documented classes from libraries included in composer

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getSubscribedEvents](#mgetsubscribedevents) 
1. [onCheckIsEntityCanBeLoaded](#moncheckisentitycanbeloaded) 
1. [onGettingResourceLink](#mongettingresourcelink) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L19)
```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper $composerHelper);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$composerHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ComposerHelper.php) | - |

---

<a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a> `getSubscribedEvents`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L23)
```php
public static function getSubscribedEvents(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="moncheckisentitycanbeloaded" href="#moncheckisentitycanbeloaded">#</a> `onCheckIsEntityCanBeLoaded`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L60)
```php
public function onCheckIsEntityCanBeLoaded(\BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mongettingresourcelink" href="#mongettingresourcelink">#</a> `onGettingResourceLink`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L34)
```php
public function onGettingResourceLink(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
