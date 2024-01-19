[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[Template functions](../05_twigCustomFunctions.md) **/**
DrawPageBreadcrumbs

---


# [DrawPageBreadcrumbs](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawPageBreadcrumbs.php#L25) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class DrawPageBreadcrumbs implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Function to generate breadcrumbs on the page


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>drawPageBreadcrumbs</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawPageBreadcrumbs.php#L27)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsTwigEnvironment $breadcrumbsTwig, \BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory $dependencyFactory);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$breadcrumbsHelper | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php) | - |
$breadcrumbsTwig | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsTwigEnvironment](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsTwigEnvironment.php) | - |
$rendererContext | [\BumbleDocGen\Core\Renderer\Context\RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php) | - |
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$dependencyFactory | [\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawPageBreadcrumbs.php#L61)
```php
public function __invoke(array $context, string|null $customPageTitle = null): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$context | [array](https://www.php.net/manual/en/language.types.array.php) | - |
$customPageTitle | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | Custom title of the current page |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawPageBreadcrumbs.php#L36)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawPageBreadcrumbs.php#L41)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
