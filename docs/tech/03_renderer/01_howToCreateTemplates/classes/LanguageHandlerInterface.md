[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Renderer](../../readme.md) **/**
[How to create documentation templates?](../readme.md) **/**
[Templates variables](../templatesVariables.md) **/**
LanguageHandlerInterface

---


# [LanguageHandlerInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L12) class:

```php
namespace BumbleDocGen\LanguageHandler;

interface LanguageHandlerInterface
```

## Methods

1. [getCustomTwigFilters](#mgetcustomtwigfilters) - Additional twig filters that are added to the built-in ones when a language handler is included
1. [getCustomTwigFunctions](#mgetcustomtwigfunctions) - Additional twig functions that are added to the built-in ones when a language handler is included
1. [getEntityCollection](#mgetentitycollection) 
1. [getLanguageKey](#mgetlanguagekey) - Unique language handler key

## Methods details:

<a name="mgetcustomtwigfilters" href="#mgetcustomtwigfilters">#</a> `getCustomTwigFilters`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L27)
```php
public function getCustomTwigFilters(\BumbleDocGen\Core\Renderer\Context\RendererContext $context): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
```
Additional twig filters that are added to the built-in ones when a language handler is included

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$context | [\BumbleDocGen\Core\Renderer\Context\RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php) | - |

***Return value:*** [\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php)

---

<a name="mgetcustomtwigfunctions" href="#mgetcustomtwigfunctions">#</a> `getCustomTwigFunctions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L22)
```php
public function getCustomTwigFunctions(\BumbleDocGen\Core\Renderer\Context\RendererContext $context): \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
```
Additional twig functions that are added to the built-in ones when a language handler is included

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$context | [\BumbleDocGen\Core\Renderer\Context\RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php) | - |

***Return value:*** [\BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/CustomFunctionsCollection.php)

---

<a name="mgetentitycollection" href="#mgetentitycollection">#</a> `getEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L29)
```php
public function getEntityCollection(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="mgetlanguagekey" href="#mgetlanguagekey">#</a> `getLanguageKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlerInterface.php#L17)
```php
public static function getLanguageKey(): string;
```
Unique language handler key

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---
