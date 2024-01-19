[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[About configuration](../01_configuration.md) **/**
Configuration

---


# [Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L30) class:

```php
namespace BumbleDocGen\Core\Configuration;

final class Configuration
```
Configuration project documentation

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getAdditionalConsoleCommands](#mgetadditionalconsolecommands) 
1. [getCacheDir](#mgetcachedir) 
1. [getConfigurationVersion](#mgetconfigurationversion) 
1. [getDocGenLibDir](#mgetdocgenlibdir) 
1. [getGitClientPath](#mgetgitclientpath) 
1. [getIfExists](#mgetifexists) 
1. [getLanguageHandlersCollection](#mgetlanguagehandlerscollection) 
1. [getOutputDir](#mgetoutputdir) 
1. [getOutputDirBaseUrl](#mgetoutputdirbaseurl) 
1. [getPageLinkProcessor](#mgetpagelinkprocessor) 
1. [getPlugins](#mgetplugins) 
1. [getProjectRoot](#mgetprojectroot) 
1. [getSourceLocators](#mgetsourcelocators) 
1. [getTemplatesDir](#mgettemplatesdir) 
1. [getTwigFilters](#mgettwigfilters) 
1. [getTwigFunctions](#mgettwigfunctions) 
1. [getWorkingDir](#mgetworkingdir) 
1. [isCheckFileInGitBeforeCreatingDocEnabled](#mischeckfileingitbeforecreatingdocenabled) 
1. [renderWithFrontMatter](#mrenderwithfrontmatter) 
1. [useSharedCache](#musesharedcache) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L34)
```php
public function __construct(\BumbleDocGen\Core\Configuration\ConfigurationParameterBag $parameterBag, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$parameterBag | [\BumbleDocGen\Core\Configuration\ConfigurationParameterBag](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |

---

<a name="mgetadditionalconsolecommands" href="#mgetadditionalconsolecommands">#</a> `getAdditionalConsoleCommands`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L377)
```php
public function getAdditionalConsoleCommands(): \BumbleDocGen\Console\Command\AdditionalCommandCollection;
```

***Return value:*** [\BumbleDocGen\Console\Command\AdditionalCommandCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/Command/AdditionalCommandCollection.php)

---

<a name="mgetcachedir" href="#mgetcachedir">#</a> `getCacheDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L205)
```php
public function getCacheDir(): null|string;
```

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetconfigurationversion" href="#mgetconfigurationversion">#</a> `getConfigurationVersion`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L42)
```php
public function getConfigurationVersion(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdocgenlibdir" href="#mgetdocgenlibdir">#</a> `getDocGenLibDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L367)
```php
public function getDocGenLibDir(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetgitclientpath" href="#mgetgitclientpath">#</a> `getGitClientPath`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L256)
```php
public function getGitClientPath(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetifexists" href="#mgetifexists">#</a> `getIfExists`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L395)
```php
public function getIfExists(mixed $key): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [mixed](https://www.php.net/manual/en/language.types.mixed.php) | - |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetlanguagehandlerscollection" href="#mgetlanguagehandlerscollection">#</a> `getLanguageHandlersCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L166)
```php
public function getLanguageHandlersCollection(): \BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
```

***Return value:*** [\BumbleDocGen\LanguageHandler\LanguageHandlersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/LanguageHandlersCollection.php)

---

<a name="mgetoutputdir" href="#mgetoutputdir">#</a> `getOutputDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L112)
```php
public function getOutputDir(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoutputdirbaseurl" href="#mgetoutputdirbaseurl">#</a> `getOutputDirBaseUrl`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L150)
```php
public function getOutputDirBaseUrl(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetpagelinkprocessor" href="#mgetpagelinkprocessor">#</a> `getPageLinkProcessor`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L238)
```php
public function getPageLinkProcessor(): \BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/PageLinkProcessor/PageLinkProcessorInterface.php)

---

<a name="mgetplugins" href="#mgetplugins">#</a> `getPlugins`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L187)
```php
public function getPlugins(): \BumbleDocGen\Core\Plugin\PluginsCollection;
```

***Return value:*** [\BumbleDocGen\Core\Plugin\PluginsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginsCollection.php)

---

<a name="mgetprojectroot" href="#mgetprojectroot">#</a> `getProjectRoot`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L50)
```php
public function getProjectRoot(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetsourcelocators" href="#mgetsourcelocators">#</a> `getSourceLocators`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L66)
```php
public function getSourceLocators(): \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
```

***Return value:*** [\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php)

---

<a name="mgettemplatesdir" href="#mgettemplatesdir">#</a> `getTemplatesDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L84)
```php
public function getTemplatesDir(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgettwigfilters" href="#mgettwigfilters">#</a> `getTwigFilters`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L295)
```php
public function getTwigFilters(): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/CustomFiltersCollection.php)

---

<a name="mgettwigfunctions" href="#mgettwigfunctions">#</a> `getTwigFunctions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L272)
```php
public function getTwigFunctions(): \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
```

***Return value:*** [\BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/CustomFunctionsCollection.php)

---

<a name="mgetworkingdir" href="#mgetworkingdir">#</a> `getWorkingDir`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L358)
```php
public function getWorkingDir(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mischeckfileingitbeforecreatingdocenabled" href="#mischeckfileingitbeforecreatingdocenabled">#</a> `isCheckFileInGitBeforeCreatingDocEnabled`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L344)
```php
public function isCheckFileInGitBeforeCreatingDocEnabled(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="mrenderwithfrontmatter" href="#mrenderwithfrontmatter">#</a> `renderWithFrontMatter`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L330)
```php
public function renderWithFrontMatter(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---

<a name="musesharedcache" href="#musesharedcache">#</a> `useSharedCache`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php#L316)
```php
public function useSharedCache(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
