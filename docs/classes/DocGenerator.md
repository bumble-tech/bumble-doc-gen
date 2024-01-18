[BumbleDocGen](/docs/README.md) **/**
DocGenerator

---


# [DocGenerator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L46) class:

```php
namespace BumbleDocGen;

final class DocGenerator
```
Class for generating documentation.

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [addDocBlocks](#madddocblocks) - Generate missing docBlocks with LLM for project class methods that are available for documentation
1. [addPlugin](#maddplugin) 
1. [generate](#mgenerate) - Generates documentation using configuration
1. [generateReadmeTemplate](#mgeneratereadmetemplate) - Creates a `README.md` template filled with basic information using LLM
1. [getConfiguration](#mgetconfiguration) 
1. [getConfigurationKey](#mgetconfigurationkey) 
1. [getConfigurationKeys](#mgetconfigurationkeys) 
1. [parseAndGetRootEntityCollectionsGroup](#mparseandgetrootentitycollectionsgroup) 
1. [serve](#mserve) - Serve documentation

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L56)
```php
public function __construct(\Symfony\Component\Console\Style\OutputStyle $io, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\Core\Parser\ProjectParser $parser, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Renderer\Renderer $renderer, \BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler $generationErrorsHandler, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Console\ProgressBar\ProgressBarFactory $progressBarFactory, \DI\Container $diContainer, \BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Monolog\Logger $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$io | [\Symfony\Component\Console\Style\OutputStyle](https://github.com/symfony/console/blob/master/Style/OutputStyle.php) | - |
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$pluginEventDispatcher | [\BumbleDocGen\Core\Plugin\PluginEventDispatcher](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php) | - |
$parser | [\BumbleDocGen\Core\Parser\ProjectParser](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php) | - |
$parserHelper | [\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php) | - |
$renderer | [\BumbleDocGen\Core\Renderer\Renderer](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Renderer.php) | - |
$generationErrorsHandler | [\BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php) | - |
$rootEntityCollectionsGroup | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php) | - |
$progressBarFactory | [\BumbleDocGen\Console\ProgressBar\ProgressBarFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/ProgressBar/ProgressBarFactory.php) | - |
$diContainer | [\DI\Container](https://github.com/PHP-DI/PHP-DI/blob/master/src/Container.php) | - |
$sharedCompressedDocumentFileCache | [\BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/SharedCompressedDocumentFileCache.php) | - |
$localObjectCache | [\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php) | - |
$logger | [\Monolog\Logger](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Logger.php) | - |

---

<a name="madddocblocks" href="#madddocblocks">#</a> `addDocBlocks`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L116)
```php
public function addDocBlocks(\BumbleDocGen\AI\ProviderInterface $aiProvider): void;
```
Generate missing docBlocks with LLM for project class methods that are available for documentation

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$aiProvider | [\BumbleDocGen\AI\ProviderInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderInterface.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="maddplugin" href="#maddplugin">#</a> `addPlugin`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L85)
```php
public function addPlugin(\BumbleDocGen\Core\Plugin\PluginInterface|string $plugin): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$plugin | [\BumbleDocGen\Core\Plugin\PluginInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginInterface.php) \| [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgenerate" href="#mgenerate">#</a> `generate`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L287)
```php
public function generate(): void;
```
Generates documentation using configuration

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgeneratereadmetemplate" href="#mgeneratereadmetemplate">#</a> `generateReadmeTemplate`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L200)
```php
public function generateReadmeTemplate(\BumbleDocGen\AI\ProviderInterface $aiProvider): void;
```
Creates a `README.md` template filled with basic information using LLM

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$aiProvider | [\BumbleDocGen\AI\ProviderInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderInterface.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetconfiguration" href="#mgetconfiguration">#</a> `getConfiguration`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L534)
```php
public function getConfiguration(): \BumbleDocGen\Core\Configuration\Configuration;
```

***Return value:*** [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php)

---

<a name="mgetconfigurationkey" href="#mgetconfigurationkey">#</a> `getConfigurationKey`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L431)
```php
public function getConfigurationKey(string $key): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetconfigurationkeys" href="#mgetconfigurationkeys">#</a> `getConfigurationKeys`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L419)
```php
public function getConfigurationKeys(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mparseandgetrootentitycollectionsgroup" href="#mparseandgetrootentitycollectionsgroup">#</a> `parseAndGetRootEntityCollectionsGroup`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L100)
```php
public function parseAndGetRootEntityCollectionsGroup(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
```

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php)

---

<a name="mserve" href="#mserve">#</a> `serve`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L340)
```php
public function serve(callable|null $afterPreparation = null, callable|null $afterDocChanged = null, int $timeout = 1000000): void;
```
Serve documentation

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$afterPreparation | [callable](https://www.php.net/manual/en/language.types.callable.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |
$afterDocChanged | [callable](https://www.php.net/manual/en/language.types.callable.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |
$timeout | [int](https://www.php.net/manual/en/language.types.integer.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
