[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[Template functions](/docs/tech/03_renderer/05_twigCustomFunctions.md) **/**
DrawClassMap

---


# [DrawClassMap](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L24) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

final class DrawClassMap implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Generate class map in HTML format

***Examples of using:***
```php
{{ drawClassMap(phpEntities.filterByPaths(['/src/Renderer'])) }}
```
```php
{{ drawClassMap(phpEntities) }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>drawClassMap</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [convertDirectoryStructureToFormattedString](#mconvertdirectorystructuretoformattedstring) 
1. [getDirectoryStructure](#mgetdirectorystructure) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L29)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$getDocumentedEntityUrlFunction | [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php) | - |
$rootEntityCollectionsGroup | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L57)
```php
public function __invoke(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection ...$entitiesCollections): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entitiesCollections <i>(variadic)</i> | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php) | The collection of entities for which the class map will be generated |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mconvertdirectorystructuretoformattedstring" href="#mconvertdirectorystructuretoformattedstring">#</a> `convertDirectoryStructureToFormattedString`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L132)
```php
public function convertDirectoryStructureToFormattedString(array $structure, string $prefix = '│', string $path = '/'): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$structure | [array](https://www.php.net/manual/en/language.types.array.php) | - |
$prefix | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$path | [string](https://www.php.net/manual/en/language.types.string.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetdirectorystructure" href="#mgetdirectorystructure">#</a> `getDirectoryStructure`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L97)
```php
public function getDirectoryStructure(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection ...$entitiesCollections): array;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entitiesCollections <i>(variadic)</i> | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php) | - |

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L35)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DrawClassMap.php#L40)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
