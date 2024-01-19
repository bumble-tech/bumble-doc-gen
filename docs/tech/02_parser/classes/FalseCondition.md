[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entity filter conditions](../entityFilterCondition.md) **/**
FalseCondition

---


# [FalseCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/FalseCondition.php#L13) class:

```php
namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

final class FalseCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
False conditions, any object is not available

## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/FalseCondition.php#L15)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
