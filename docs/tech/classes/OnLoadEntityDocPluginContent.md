[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
OnLoadEntityDocPluginContent

---


# [OnLoadEntityDocPluginContent](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L16) class:

```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnLoadEntityDocPluginContent extends \Symfony\Contracts\EventDispatcher\Event
```
Called when entity documentation is generated (plugin content loading)

***Links:***
- [\BumbleDocGen\Core\Renderer\Twig\Function\LoadPluginsContent](LoadPluginsContent_2.md)

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [addBlockContentPluginResult](#maddblockcontentpluginresult) 
1. [getBlockContent](#mgetblockcontent) 
1. [getBlockContentPluginResults](#mgetblockcontentpluginresults) 
1. [getBlockType](#mgetblocktype) 
1. [getEntity](#mgetentity) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L20)
```php
public function __construct(string $blockContent, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity, string $blockType);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$blockContent | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$entity | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php) | - |
$blockType | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="maddblockcontentpluginresult" href="#maddblockcontentpluginresult">#</a> `addBlockContentPluginResult`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L42)
```php
public function addBlockContentPluginResult(string $pluginResult): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$pluginResult | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetblockcontent" href="#mgetblockcontent">#</a> `getBlockContent`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L32)
```php
public function getBlockContent(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetblockcontentpluginresults" href="#mgetblockcontentpluginresults">#</a> `getBlockContentPluginResults`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L47)
```php
public function getBlockContentPluginResults(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetblocktype" href="#mgetblocktype">#</a> `getBlockType`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L37)
```php
public function getBlockType(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetentity" href="#mgetentity">#</a> `getEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L27)
```php
public function getEntity(): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php)

---
