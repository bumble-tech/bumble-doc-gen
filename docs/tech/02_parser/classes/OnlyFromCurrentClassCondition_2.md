[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entity filter conditions](../entityFilterCondition.md) **/**
OnlyFromCurrentClassCondition

---


# [OnlyFromCurrentClassCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php#L14) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

final class OnlyFromCurrentClassCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Only properties that belong to the current class (not parent)

## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php#L16)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
