[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[Template functions](../05_twigCustomFunctions.md) **/**
GeneratePageBreadcrumbs

---


# [GeneratePageBreadcrumbs](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L24) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class GeneratePageBreadcrumbs implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Function to generate breadcrumbs on the page


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>generatePageBreadcrumbs</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L26)
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

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L63)
```php
public function __invoke(string $currentPageTitle, string $templatePath, bool $skipFirstTemplatePage = true): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$currentPageTitle | [string](https://www.php.net/manual/en/language.types.string.php) | Title of the current page |
$templatePath | [string](https://www.php.net/manual/en/language.types.string.php) | Path to the template from which the breadcrumbs will be generated |
$skipFirstTemplatePage | [bool](https://www.php.net/manual/en/language.types.boolean.php) | If set to true, the page from which parsing starts will not participate in the formation of breadcrumbs
 This option is useful when working with the _self value in a template, as it returns the full path to the
 current template, and the reference to it in breadcrumbs should not be clickable. |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L35)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GeneratePageBreadcrumbs.php#L40)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
