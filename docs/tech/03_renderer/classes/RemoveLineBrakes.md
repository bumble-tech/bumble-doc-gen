[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[Template filters](/docs/tech/03_renderer/04_twigCustomFilters.md) **/**
RemoveLineBrakes

---


# [RemoveLineBrakes](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/RemoveLineBrakes.php#L10) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Filter;

final class RemoveLineBrakes implements \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface
```
The filter replaces all line breaks with a space


<h2>Settings:</h2>

<table>
    <tr>
        <th>name</th>
        <th>value</th>
    </tr>
    <tr>
        <td>Filter name:</td>
        <td><b>removeLineBrakes</b></td>
    </tr>
</table>

## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/RemoveLineBrakes.php#L15)
```php
public function __invoke(string $text): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$text | [string](https://www.php.net/manual/en/language.types.string.php) | Processed text |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/RemoveLineBrakes.php#L20)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/RemoveLineBrakes.php#L25)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
