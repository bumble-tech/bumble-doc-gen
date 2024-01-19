[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Configuration](../01_configuration.md) **/**
GetDocumentationPageUrl

---


# [GetDocumentationPageUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentationPageUrl.php#L21) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class GetDocumentationPageUrl implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Creates an entity link by object

***Examples of using:***
```php
{{ getDocumentationPageUrl('Page name') }}
```
```php
{{ getDocumentationPageUrl('/someDir/someTemplate.md.twig') }}
```
```php
{{ getDocumentationPageUrl('/docs/someDir/someDocFile.md') }}
```
```php
{{ getDocumentationPageUrl('readme.md') }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>getDocumentationPageUrl</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentationPageUrl.php#L25)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \Psr\Log\LoggerInterface $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$breadcrumbsHelper | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php) | - |
$logger | [\Psr\Log\LoggerInterface](https://github.com/php-fig/log/blob/master/src/LoggerInterface.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentationPageUrl.php#L53)
```php
public function __invoke(string $key): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$key | [string](https://www.php.net/manual/en/language.types.string.php) | The key by which to look up the URL of the page.
 Can be the title of a page, a path to a template, or a generated document |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentationPageUrl.php#L31)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentationPageUrl.php#L36)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
