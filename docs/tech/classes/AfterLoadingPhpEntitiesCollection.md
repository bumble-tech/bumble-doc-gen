[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
AfterLoadingPhpEntitiesCollection

---


# [AfterLoadingPhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/AfterLoadingPhpEntitiesCollection.php#L13) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser;

final class AfterLoadingPhpEntitiesCollection extends \Symfony\Contracts\EventDispatcher\Event
```
The event is called after the initial creation of a collection of PHP entities

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getPhpEntitiesCollection](#mgetphpentitiescollection) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/AfterLoadingPhpEntitiesCollection.php#L15)
```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection $entitiesCollection);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entitiesCollection | [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php) | - |

---

<a name="mgetphpentitiescollection" href="#mgetphpentitiescollection">#</a> `getPhpEntitiesCollection`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Parser/AfterLoadingPhpEntitiesCollection.php#L19)
```php
public function getPhpEntitiesCollection(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

***Return value:*** [\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php)

---
