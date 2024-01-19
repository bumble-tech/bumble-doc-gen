[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Plugin system](../04_pluginSystem.md) **/**
OnAddClassEntityToCollection

---


# [OnAddClassEntityToCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L15) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser;

final class OnAddClassEntityToCollection extends \Symfony\Contracts\EventDispatcher\Event implements \BumbleDocGen\Core\Plugin\OnlySingleExecutionEvent
```
Called when each class entity is added to the entity collection

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getClassEntityCollection](#mgetclassentitycollection) 
1. [getRootEntity](#mgetrootentity) 
1. [getUniqueExecutionId](#mgetuniqueexecutionid) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L17)
```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection $entitiesCollection);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$classEntity | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php) | - |
$entitiesCollection | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php) | - |

---

<a name="mgetclassentitycollection" href="#mgetclassentitycollection">#</a> `getClassEntityCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L28)
```php
public function getClassEntityCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---

<a name="mgetrootentity" href="#mgetrootentity">#</a> `getRootEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L33)
```php
public function getRootEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php)

---

<a name="mgetuniqueexecutionid" href="#mgetuniqueexecutionid">#</a> `getUniqueExecutionId`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L23)
```php
public function getUniqueExecutionId(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---
