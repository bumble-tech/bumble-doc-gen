[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Entity filter conditions](/docs/tech/02_parser/entityFilterCondition.md) **/**
IsPublicCondition

---


# [IsPublicCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/IsPublicCondition.php#L14) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

final class IsPublicCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Check is a public property or not

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/IsPublicCondition.php#L18)
```php
public function __construct();
```

---

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/FilterCondition/PropertyFilterCondition/IsPublicCondition.php#L23)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
