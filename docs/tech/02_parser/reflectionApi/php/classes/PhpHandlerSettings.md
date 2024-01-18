[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Reflection API](/docs/tech/02_parser/reflectionApi/readme.md) **/**
[Reflection API for PHP](/docs/tech/02_parser/reflectionApi/php/readme.md) **/**
PhpHandlerSettings

---


# [PhpHandlerSettings](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L21) class:

```php
namespace BumbleDocGen\LanguageHandler\Php;

final class PhpHandlerSettings
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getClassConstantEntityFilter](#mgetclassconstantentityfilter) 
1. [getClassEntityFilter](#mgetclassentityfilter) 
1. [getComposerConfigFile](#mgetcomposerconfigfile) 
1. [getComposerVendorDir](#mgetcomposervendordir) 
1. [getCustomTwigFilters](#mgetcustomtwigfilters) 
1. [getCustomTwigFunctions](#mgetcustomtwigfunctions) 
1. [getEntityDocRenderersCollection](#mgetentitydocrendererscollection) 
1. [getFileSourceBaseUrl](#mgetfilesourcebaseurl) 
1. [getMethodEntityFilter](#mgetmethodentityfilter) 
1. [getPropertyEntityFilter](#mgetpropertyentityfilter) 
1. [getPsr4Map](#mgetpsr4map) 
1. [getUseComposerAutoload](#mgetusecomposerautoload) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L26)
```php
public function __construct(\BumbleDocGen\Core\Configuration\ConfigurationParameterBag $parameterBag, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$parameterBag | [\BumbleDocGen\Core\Configuration\ConfigurationParameterBag](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |

---

<a name="mgetclassconstantentityfilter" href="#mgetclassconstantentityfilter">#</a> `getClassConstantEntityFilter`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L63)
```php
public function getClassConstantEntityFilter(): \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
```

***Return value:*** [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php)

---

<a name="mgetclassentityfilter" href="#mgetclassentityfilter">#</a> `getClassEntityFilter`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L43)
```php
public function getClassEntityFilter(): \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
```

***Return value:*** [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php)

---

<a name="mgetcomposerconfigfile" href="#mgetcomposerconfigfile">#</a> `getComposerConfigFile`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L176)
```php
public function getComposerConfigFile(): null|string;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetcomposervendordir" href="#mgetcomposervendordir">#</a> `getComposerVendorDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L193)
```php
public function getComposerVendorDir(): null|string;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetcustomtwigfilters" href="#mgetcustomtwigfilters">#</a> `getCustomTwigFilters`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L250)
```php
public function getCustomTwigFilters(): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php)

---

<a name="mgetcustomtwigfunctions" href="#mgetcustomtwigfunctions">#</a> `getCustomTwigFunctions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L227)
```php
public function getCustomTwigFunctions(): \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/CustomFunctionsCollection.php)

---

<a name="mgetentitydocrendererscollection" href="#mgetentitydocrendererscollection">#</a> `getEntityDocRenderersCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L123)
```php
public function getEntityDocRenderersCollection(): \BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRenderersCollection;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRenderersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/EntityDocRenderer/EntityDocRenderersCollection.php)

---

<a name="mgetfilesourcebaseurl" href="#mgetfilesourcebaseurl">#</a> `getFileSourceBaseUrl`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L144)
```php
public function getFileSourceBaseUrl(): null|string;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetmethodentityfilter" href="#mgetmethodentityfilter">#</a> `getMethodEntityFilter`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L83)
```php
public function getMethodEntityFilter(): \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
```

***Return value:*** [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php)

---

<a name="mgetpropertyentityfilter" href="#mgetpropertyentityfilter">#</a> `getPropertyEntityFilter`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L103)
```php
public function getPropertyEntityFilter(): \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
```

***Return value:*** [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php)

---

<a name="mgetpsr4map" href="#mgetpsr4map">#</a> `getPsr4Map`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L209)
```php
public function getPsr4Map(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetusecomposerautoload" href="#mgetusecomposerautoload">#</a> `getUseComposerAutoload`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php#L160)
```php
public function getUseComposerAutoload(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
