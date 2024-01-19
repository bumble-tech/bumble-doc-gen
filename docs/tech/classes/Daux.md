[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
Daux

---


# [Daux](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L21) class:
⚠️ Internal 
```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\Daux;

final class Daux implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [afterRenderingEntities](#mafterrenderingentities) 
1. [beforeCreatingDocFile](#mbeforecreatingdocfile) 
1. [getSubscribedEvents](#mgetsubscribedevents) 
1. [onCreateDocumentedEntityWrapper](#moncreatedocumentedentitywrapper) 
1. [onGetProjectTemplatesDirs](#mongetprojecttemplatesdirs) 
1. [onGetTemplatePathByRelativeDocPath](#mongettemplatepathbyrelativedocpath) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L26)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$breadcrumbsHelper | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php) | - |

---

<a name="mafterrenderingentities" href="#mafterrenderingentities">#</a> `afterRenderingEntities`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L97)
```php
public function afterRenderingEntities(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mbeforecreatingdocfile" href="#mbeforecreatingdocfile">#</a> `beforeCreatingDocFile`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L47)
```php
public function beforeCreatingDocFile(\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile|\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingEntityDocFile $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php) \| [\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingEntityDocFile](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingEntityDocFile.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a> `getSubscribedEvents`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L32)
```php
public static function getSubscribedEvents(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="moncreatedocumentedentitywrapper" href="#moncreatedocumentedentitywrapper">#</a> `onCreateDocumentedEntityWrapper`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L73)
```php
public function onCreateDocumentedEntityWrapper(\BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mongetprojecttemplatesdirs" href="#mongetprojecttemplatesdirs">#</a> `onGetProjectTemplatesDirs`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L89)
```php
public function onGetProjectTemplatesDirs(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mongettemplatepathbyrelativedocpath" href="#mongettemplatepathbyrelativedocpath">#</a> `onGetTemplatePathByRelativeDocPath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L80)
```php
public function onGetTemplatePathByRelativeDocPath(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
