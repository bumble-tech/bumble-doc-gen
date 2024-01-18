[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Configuration](/docs/tech/01_configuration.md) **/**
PrintEntityCollectionAsList

---


# [PrintEntityCollectionAsList](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L22) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class PrintEntityCollectionAsList implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Outputting entity data as MD list

***Examples of using:***
```php
{{ printEntityCollectionAsList(phpEntities.filterByInterfaces(['ScriptFramework\\ScriptInterface', 'ScriptFramework\\TestScriptInterface'])) }}
The function will output a list of PHP classes that match the ScriptFramework\ScriptInterface and ScriptFramework\TestScriptInterface interfaces
```
```php
{{ printEntityCollectionAsList(phpEntities) }}
The function will list all documented PHP classes
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>printEntityCollectionAsList</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L24)
```php
public function __construct(\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction, \BumbleDocGen\Core\Renderer\Twig\Filter\RemoveLineBrakes $removeLineBrakes);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$getDocumentedEntityUrlFunction | [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php) | - |
$removeLineBrakes | [\BumbleDocGen\Core\Renderer\Twig\Filter\RemoveLineBrakes](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Filter/RemoveLineBrakes.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L50)
```php
public function __invoke(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, string $type = 'ul', bool $skipDescription = false, bool $useFullName = false): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rootEntityCollection | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php) | Processed entity collection |
$type | [string](https://www.php.net/manual/en/language.types.string.php) | List tag type (<ul>/<ol>) |
$skipDescription | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Don't print description of this entities |
$useFullName | [bool](https://www.php.net/manual/en/language.types.boolean.php) | Use the full name of the entity in the list |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L30)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/PrintEntityCollectionAsList.php#L35)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
