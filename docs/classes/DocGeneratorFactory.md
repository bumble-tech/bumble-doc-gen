[BumbleDocGen](/docs/README.md) **/**
DocGeneratorFactory

---


# [DocGeneratorFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L18) class:

```php
namespace BumbleDocGen;

final class DocGeneratorFactory
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [create](#mcreate) - Creates a documentation generator instance using configuration files
1. [createByConfigArray](#mcreatebyconfigarray) - Creates a documentation generator instance using an array containing the configuration
1. [createConfiguration](#mcreateconfiguration) - Creating a project configuration instance
1. [createRootEntitiesCollection](#mcreaterootentitiescollection) - Creating a collection of entities (see `ReflectionAPI`)
1. [setCustomConfigurationParameters](#msetcustomconfigurationparameters) 
1. [setCustomDiDefinitions](#msetcustomdidefinitions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L24)
```php
public function __construct(string $diConfig = __DIR__ . '/di-config.php');
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$diConfig | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mcreate" href="#mcreate">#</a> `create`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L52)
```php
public function create(string|null ...$configurationFiles): \BumbleDocGen\DocGenerator;
```
Creates a documentation generator instance using configuration files

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configurationFiles <i>(variadic)</i> | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [\BumbleDocGen\DocGenerator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php)

---

<a name="mcreatebyconfigarray" href="#mcreatebyconfigarray">#</a> `createByConfigArray`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L77)
```php
public function createByConfigArray(array $config): \BumbleDocGen\DocGenerator;
```
Creates a documentation generator instance using an array containing the configuration

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$config | [array](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [\BumbleDocGen\DocGenerator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php)

---

<a name="mcreateconfiguration" href="#mcreateconfiguration">#</a> `createConfiguration`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L102)
```php
public function createConfiguration(string ...$configurationFiles): \BumbleDocGen\Core\Configuration\Configuration;
```
Creating a project configuration instance

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configurationFiles <i>(variadic)</i> | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php)

---

<a name="mcreaterootentitiescollection" href="#mcreaterootentitiescollection">#</a> `createRootEntitiesCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L127)
```php
public function createRootEntitiesCollection(\BumbleDocGen\Core\Configuration\ReflectionApiConfig $reflectionApiConfig): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```
Creating a collection of entities (see `ReflectionAPI`)

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$reflectionApiConfig | [\BumbleDocGen\Core\Configuration\ReflectionApiConfig](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ReflectionApiConfig.php) | - |

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)

---

<a name="msetcustomconfigurationparameters" href="#msetcustomconfigurationparameters">#</a> `setCustomConfigurationParameters`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L33)
```php
public function setCustomConfigurationParameters(array $customConfigurationParameters): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$customConfigurationParameters | [array](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="msetcustomdidefinitions" href="#msetcustomdidefinitions">#</a> `setCustomDiDefinitions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L38)
```php
public function setCustomDiDefinitions(array $definitions): void;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$definitions | [array](https://www.php.net/manual/en/language.types.array.php) | - |

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---
