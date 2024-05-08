[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[About configuration](../01_configuration.md) **/**
AddIndentFromLeft

---


# [AddIndentFromLeft](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/AddIndentFromLeft.php#L10) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class AddIndentFromLeft implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```
Filter adds indent from left


<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>addIndentFromLeft</b></td>
    </tr>
</table>

## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/AddIndentFromLeft.php#L18)
```php
public function __invoke(string $text, int $identLength = 4, bool $skipFirstIdent = false): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$text | [string](https://www.php.net/manual/en/language.types.string.php) | Processed text |
$identLength | [int](https://www.php.net/manual/en/language.types.integer.php) | Indent size |
$skipFirstIdent | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Skip indent for first line in text or not |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/AddIndentFromLeft.php#L24)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/AddIndentFromLeft.php#L29)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
