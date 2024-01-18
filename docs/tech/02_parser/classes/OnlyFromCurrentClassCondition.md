[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Entity filter conditions](/docs/tech/02_parser/entityFilterCondition.md) **/**
OnlyFromCurrentClassCondition

---


# [OnlyFromCurrentClassCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/MethodFilterCondition/OnlyFromCurrentClassCondition.php#L14) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

final class OnlyFromCurrentClassCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Only methods that belong to the current class (not parent)

## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/MethodFilterCondition/OnlyFromCurrentClassCondition.php#L16)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
