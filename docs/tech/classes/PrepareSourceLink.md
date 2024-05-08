[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[About configuration](../01_configuration.md) **/**
PrepareSourceLink

---


# [PrepareSourceLink](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/PrepareSourceLink.php#L12) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class PrepareSourceLink implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```
The filter converts the string into an anchor that can be used in a GitHub document link


<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>prepareSourceLink</b></td>
    </tr>
</table>

## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/PrepareSourceLink.php#L17)
```php
public function __invoke(string $text): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$text | [string](https://www.php.net/manual/en/language.types.string.php) | Processed text |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/PrepareSourceLink.php#L22)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/PrepareSourceLink.php#L27)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
