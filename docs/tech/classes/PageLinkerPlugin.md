[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
PageLinkerPlugin

---


# [PageLinkerPlugin](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/PageLinkerPlugin.php#L29) class:

```php
namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

final class PageLinkerPlugin extends \BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```
Adds URLs to empty links in MD format;
 Links may contain:
 1) Short entity name
 2) Full entity name
 3) Relative link to the entity file from the root directory of the project
 4) Page title ( title )
 5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 6) Relative reference to the entity document from the root directory of the documentation

***Examples of using:***
```php
[a]Existent page name[/a] => [Existent page name](/docs/some/page/targetPage.md)
```
```php
[a x-title="Custom title"]\Namespace\ClassName[/a] => [Custom title](/docs/some/page/ClassName.md)
```
```php
[a]\Namespace\ClassName[/a] => [\Namespace\ClassName](/docs/some/page/ClassName.md)
```
```php
[a]Non-existent page name[/a] => Non-existent page name
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [beforeCreatingDocFile](#mbeforecreatingdocfile) 
1. [getSubscribedEvents](#mgetsubscribedevents) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L19)
```php
// Implemented in BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker

public function __construct(\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction, \Psr\Log\LoggerInterface $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$breadcrumbsHelper | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php) | - |
$rootEntityCollectionsGroup | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php) | - |
$getDocumentedEntityUrlFunction | [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |

---

<a name="mbeforecreatingdocfile" href="#mbeforecreatingdocfile">#</a> `beforeCreatingDocFile`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L71)
```php
// Implemented in BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker

public function beforeCreatingDocFile(\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile $event): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$event | [\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a> `getSubscribedEvents`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L59)
```php
// Implemented in BumbleDocGen\Core\Plugin\CorePlugin\PageLinker\BasePageLinker

public static function getSubscribedEvents(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
