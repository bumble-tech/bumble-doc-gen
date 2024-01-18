[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[Template functions](/docs/tech/03_renderer/05_twigCustomFunctions.md) **/**
DrawDocumentationMenu

---


# [DrawDocumentationMenu](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentationMenu.php#L29) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class DrawDocumentationMenu implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Generate documentation menu in MD format. To generate the menu, the start page is taken,
and all links with this page are recursively collected for it, after which the html menu is created.

***Links:***
- [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](/docs/tech/03_renderer/classes/GetDocumentedEntityUrl_2.md)

***Examples of using:***
```php
{{ drawDocumentationMenu() }} - The menu contains links to all documents
```
```php
{{ drawDocumentationMenu('/render/index.md') }} - The menu contains links to all child documents from the /render/index.md file (for example /render/test/index.md)
```
```php
{{ drawDocumentationMenu(_self) }} - The menu contains links to all child documents from the file where this function was called
```
```php
{{ drawDocumentationMenu(_self, 2) }} - The menu contains links to all child documents from the file where this function was called, but no more than 2 in depth
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>drawDocumentationMenu</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentationMenu.php#L31)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, \BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory $dependencyFactory);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$breadcrumbsHelper | [\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php) | - |
$rendererContext | [\BumbleDocGen\Core\Renderer\Context\RendererContext](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php) | - |
$dependencyFactory | [\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentationMenu.php#L64)
```php
public function __invoke(string|null $startPageKey = null, int|null $maxDeep = null): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$startPageKey | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | Relative path to the page from which the menu will be generated (only child pages will be taken into account).
 By default, the main documentation page (readme.md) is used. |
$maxDeep | [int](https://www.php.net/manual/en/language.types.integer.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | Maximum parsing depth of documented links starting from the current page.
 By default, this restriction is disabled. |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentationMenu.php#L39)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentationMenu.php#L44)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
