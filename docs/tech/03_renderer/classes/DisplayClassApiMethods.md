[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[Template functions](/docs/tech/03_renderer/05_twigCustomFunctions.md) **/**
DisplayClassApiMethods

---


# [DisplayClassApiMethods](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DisplayClassApiMethods.php#L20) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

final class DisplayClassApiMethods implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Display all API methods of a class

***Examples of using:***
```php
{{ displayClassApiMethods('\\BumbleDocGen\\LanguageHandler\\Php\\Parser\\Entity\\ClassEntity') }}
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>displayClassApiMethods</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DisplayClassApiMethods.php#L22)
```php
public function __construct(\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl $getDocumentedEntityUrlFunction);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rootEntityCollectionsGroup | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php) | - |
$getDocumentedEntityUrlFunction | [\BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DisplayClassApiMethods.php#L45)
```php
public function __invoke(string $className): null|string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$className | [string](https://www.php.net/manual/en/language.types.string.php) | Name of the class for which API methods need to be displayed |

***Return value:*** [null](https://www.php.net/manual/en/language.types.null.php) | [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DisplayClassApiMethods.php#L28)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/Twig/Function/DisplayClassApiMethods.php#L33)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---
