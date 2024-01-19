[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Configuration](../01_configuration.md) **/**
FixStrSize

---


# [FixStrSize](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/FixStrSize.php#L12) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class FixStrSize implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```
The filter pads the string with the specified characters on the right to the specified size


<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>fixStrSize</b></td>
    </tr>
</table>

## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/FixStrSize.php#L20)
```php
public function __invoke(string $text, int $size, string $symbol = ' '): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$text | [string](https://www.php.net/manual/en/language.types.string.php) | Processed text |
$size | [int](https://www.php.net/manual/en/language.types.integer.php) | Required string size |
$symbol | [string](https://www.php.net/manual/en/language.types.string.php) | The character to be used to complete the string |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/FixStrSize.php#L31)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/FixStrSize.php#L36)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
