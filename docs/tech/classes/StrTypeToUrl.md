[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Configuration](../01_configuration.md) **/**
StrTypeToUrl

---


# [StrTypeToUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/StrTypeToUrl.php#L18) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class StrTypeToUrl implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```
The filter converts the string with the data type into a link to the documented entity, if possible.

***Links:***
- [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](/docs/tech/classes/GetDocumentedEntityUrl_2.md)


<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>strTypeToUrl</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/StrTypeToUrl.php#L20)
```php
public function __construct(\BumbleDocGen\Core\Renderer\RendererHelper $rendererHelper, \BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction, \Monolog\Logger $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rendererHelper | [\BumbleDocGen\Core\Renderer\RendererHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererHelper.php) | - |
$getDocumentedEntityUrlFunction | [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php) | - |
$logger | [\Monolog\Logger](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Logger.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/StrTypeToUrl.php#L51)
```php
public function __invoke(array $context, string $text, \BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, bool $useShortLinkVersion = false, bool $createDocument = false, string $separator = ' | '): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$context | [array](https://www.php.net/manual/en/language.types.array.php) | - |
$text | [string](https://www.php.net/manual/en/language.types.string.php) | Processed text |
$rootEntityCollection | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php) | - |
$useShortLinkVersion | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Shorten or not the link name. When shortening, only the shortName of the entity will be shown |
$createDocument | [bool](https://www.php.net/manual/en/language.types.boolean.php) | If true, creates an entity document. Otherwise, just gives a reference to the entity code |
$separator | [string](https://www.php.net/manual/en/language.types.string.php) | Separator between types |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/StrTypeToUrl.php#L27)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/StrTypeToUrl.php#L32)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
