[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[About configuration](../01_configuration.md) **/**
Implode

---


# [Implode](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L10) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class Implode implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```
Join array elements with a string

***Links:***
- [https://www.php.net/manual/en/function.implode.php](https://www.php.net/manual/en/function.implode.php)


<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>implode</b></td>
    </tr>
</table>

## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L17)
```php
public function __invoke(array $elements, string $separator = ', '): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$elements | [array](https://www.php.net/manual/en/language.types.array.php) | The array to implode |
$separator | [string](https://www.php.net/manual/en/language.types.string.php) | Element separator in result string |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L22)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/Implode.php#L27)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
