[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Entity filter conditions](../entityFilterCondition.md) **/**
LocatedInCondition

---


# [LocatedInCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/LocatedInCondition.php#L16) class:

```php
namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

final class LocatedInCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Checking the existence of an entity in the specified directories

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/LocatedInCondition.php#L18)
```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Configuration\ConfigurationParameterBag $parameterBag, array $directories = []);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$parameterBag | [\BumbleDocGen\Core\Configuration\ConfigurationParameterBag](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php) | - |
$directories | [array](https://www.php.net/manual/en/language.types.array.php) | - |

---

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/LocatedInCondition.php#L28)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
