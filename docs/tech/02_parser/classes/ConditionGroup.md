[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Entity filter conditions](/docs/tech/02_parser/entityFilterCondition.md) **/**
ConditionGroup

---


# [ConditionGroup](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionGroup.php#L13) class:

```php
namespace BumbleDocGen\Core\Parser\FilterCondition;

final class ConditionGroup implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Filter condition to group other filter conditions. A group can have an OR/AND condition test;
In the case of OR, it is enough to successfully check at least one condition, in the case of AND, all checks must be successfully completed.

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionGroup.php#L20)
```php
public function __construct(string $groupType, \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface ...$conditions);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$groupType | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$conditions <i>(variadic)</i> | [\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php) | - |

---

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionGroup.php#L25)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
