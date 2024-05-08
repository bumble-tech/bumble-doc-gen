[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entity filter conditions](../entityFilterCondition.md) **/**
VisibilityCondition

---


# [VisibilityCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/ClassConstantFilterCondition/VisibilityCondition.php#L15) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition;

final class VisibilityCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Constant access modifier check

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/ClassConstantFilterCondition/VisibilityCondition.php#L19)
```php
public function __construct(string ...$visibilityModifiers);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$visibilityModifiers <i>(variadic)</i> | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/ClassConstantFilterCondition/VisibilityCondition.php#L24)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
