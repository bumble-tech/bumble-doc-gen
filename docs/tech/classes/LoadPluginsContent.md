[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[About configuration](../01_configuration.md) **/**
LoadPluginsContent

---


# [LoadPluginsContent](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/LoadPluginsContent.php#L18) class:
⚠️ Internal 
```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class LoadPluginsContent implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Process entity template blocks with plugins. The method returns the content processed by plugins.

***Examples of using:***
```php
{{ loadPluginsContent('some text', entity, constant('BumbleDocGen\\Plugin\\BaseTemplatePluginInterface::BLOCK_AFTER_HEADER')) }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>loadPluginsContent</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/LoadPluginsContent.php#L20)
```php
public function __construct(\BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$pluginEventDispatcher | [\BumbleDocGen\Core\Plugin\PluginEventDispatcher](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/LoadPluginsContent.php#L42)
```php
public function __invoke(string $content, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity, string $blockType): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$content | [string](https://www.php.net/manual/en/language.types.string.php) | Content to be processed by plugins |
$entity | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php) | The entity for which we process the content block |
$blockType | [string](https://www.php.net/manual/en/language.types.string.php) | Content block type. @see BaseTemplatePluginInterface::BLOCK_* |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/LoadPluginsContent.php#L24)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/LoadPluginsContent.php#L29)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
