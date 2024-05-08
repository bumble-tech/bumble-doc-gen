[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[About configuration](../01_configuration.md) **/**
FileGetContents

---


# [FileGetContents](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/FileGetContents.php#L17) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class FileGetContents implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Displaying the content of a file or web resource

***Links:***
- [https://www.php.net/manual/en/function.file-get-contents.php](https://www.php.net/manual/en/function.file-get-contents.php)

***Examples of using:***
```php
{{ fileGetContents('https://www.php.net/manual/en/function.file-get-contents.php') }}
```
```php
{{ fileGetContents('%templates_dir%/../config.yaml') }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>fileGetContents</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/FileGetContents.php#L19)
```php
public function __construct(\BumbleDocGen\Core\Configuration\ConfigurationParameterBag $parameterBag);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$parameterBag | [\BumbleDocGen\Core\Configuration\ConfigurationParameterBag](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/FileGetContents.php#L41)
```php
public function __invoke(string $resourceName): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$resourceName | [string](https://www.php.net/manual/en/language.types.string.php) | Resource name, url or path to the resource.
 The path can contain shortcodes with parameters from the configuration (%param_name%) |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/FileGetContents.php#L23)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/FileGetContents.php#L28)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
