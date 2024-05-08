[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
EntityDocUnifiedPlacePlugin

---


# [EntityDocUnifiedPlacePlugin](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L18) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\EntityDocUnifiedPlace;

final class EntityDocUnifiedPlacePlugin implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```
This plugin changes the algorithm for saving entity documents. The standard system stores each file
in a directory next to the file where it was requested. This behavior changes and all documents are saved
in a separate directory structure, so they are not duplicated.

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getSubscribedEvents](#mgetsubscribedevents) 
1. [onCreateDocumentedEntityWrapper](#moncreatedocumentedentitywrapper) 
1. [onGetProjectTemplatesDirs](#mongetprojecttemplatesdirs) 
1. [onGetTemplatePathByRelativeDocPath](#mongettemplatepathbyrelativedocpath) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L23)
```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$phpHandlerSettings | [\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php) | - |

---

<a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a> `getSubscribedEvents`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L29)
```php
public static function getSubscribedEvents(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="moncreatedocumentedentitywrapper" href="#moncreatedocumentedentitywrapper">#</a> `onCreateDocumentedEntityWrapper`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L38)
```php
public function onCreateDocumentedEntityWrapper(\BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mongetprojecttemplatesdirs" href="#mongetprojecttemplatesdirs">#</a> `onGetProjectTemplatesDirs`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L54)
```php
public function onGetProjectTemplatesDirs(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mongettemplatepathbyrelativedocpath" href="#mongettemplatepathbyrelativedocpath">#</a> `onGetTemplatePathByRelativeDocPath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L45)
```php
public function onGetTemplatePathByRelativeDocPath(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
