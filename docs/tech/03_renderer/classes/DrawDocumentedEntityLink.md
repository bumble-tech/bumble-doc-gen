[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[Template functions](/docs/tech/03_renderer/05_twigCustomFunctions.md) **/**
DrawDocumentedEntityLink

---


# [DrawDocumentedEntityLink](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentedEntityLink.php#L21) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class DrawDocumentedEntityLink implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Creates an entity link by object

***Examples of using:***
```php
{{ drawDocumentedEntityLink($entity, 'getFunctions()') }}
```
```php
{{ drawDocumentedEntityLink($entity) }}
```
```php
{{ drawDocumentedEntityLink($entity, '', false) }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>drawDocumentedEntityLink</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentedEntityLink.php#L23)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$getDocumentedEntityUrlFunction | [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentedEntityLink.php#L50)
```php
public function __invoke(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity, string $cursor = '', bool $useShortName = true): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php) | The entity for which we want to get the link |
$cursor | [string](https://www.php.net/manual/en/language.types.string.php) | Reference to an element inside an entity, for example, the name of a function/constant/property |
$useShortName | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Use the full or short entity name in the link |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentedEntityLink.php#L27)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/DrawDocumentedEntityLink.php#L32)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
