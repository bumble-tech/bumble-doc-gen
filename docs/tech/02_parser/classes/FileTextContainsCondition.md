[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Entity filter conditions](/docs/tech/02_parser/entityFilterCondition.md) **/**
FileTextContainsCondition

---


# [FileTextContainsCondition](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/FileTextContainsCondition.php#L14) class:

```php
namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

final class FileTextContainsCondition implements \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface
```
Checking if a file contains a substring

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [canAddToCollection](#mcanaddtocollection) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/FileTextContainsCondition.php#L16)
```php
public function __construct(string $substring);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$substring | [string](https://www.php.net/manual/en/language.types.string.php) | - |

---

<a name="mcanaddtocollection" href="#mcanaddtocollection">#</a> `canAddToCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/CommonFilterCondition/FileTextContainsCondition.php#L20)
```php
public function canAddToCollection(\BumbleDocGen\Core\Parser\Entity\EntityInterface $entity): bool;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\EntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntityInterface.php) | - |

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
