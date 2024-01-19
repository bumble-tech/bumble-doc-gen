[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[Template functions](../05_twigCustomFunctions.md) **/**
GetClassMethodsBodyCode

---


# [GetClassMethodsBodyCode](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L20) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

final class GetClassMethodsBodyCode implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Get the code of the specified class methods as a formatted string

***Examples of using:***
```php
{{ getClassMethodsBodyCode('\\BumbleDocGen\\Renderer\\Twig\\MainExtension', ['getFunctions']) }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>getClassMethodsBodyCode</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L22)
```php
public function __construct(\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rootEntityCollectionsGroup | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L49)
```php
public function __invoke(string $className, array $methodsNames): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$className | [string](https://www.php.net/manual/en/language.types.string.php) | The name of the class whose methods are to be retrieved |
$methodsNames | [array](https://www.php.net/manual/en/language.types.array.php) | List of class methods whose code needs to be retrieved |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L26)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/GetClassMethodsBodyCode.php#L31)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
