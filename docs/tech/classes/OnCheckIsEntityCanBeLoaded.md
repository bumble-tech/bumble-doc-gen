[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Plugin system](/docs/tech/04_pluginSystem.md) **/**
OnCheckIsEntityCanBeLoaded

---


# [OnCheckIsEntityCanBeLoaded](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L10) class:

```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity;

final class OnCheckIsEntityCanBeLoaded extends \Symfony\Contracts\EventDispatcher\Event
```

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [disableEntityLoading](#mdisableentityloading) 
1. [getEntity](#mgetentity) 
1. [isEntityCanBeLoaded](#misentitycanbeloaded) 
## Properties:

1. [isEntityCanBeLoaded](#pisentitycanbeloaded) 
## Constants:


## Properties details:

<a name="pisentitycanbeloaded" href="#pisentitycanbeloaded">#</a> `isEntityCanBeLoaded`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L12)
```php
public bool $isEntityCanBeLoaded;

```

---
## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L14)
```php
public function __construct(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$entity | [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php) | - |

---

<a name="mdisableentityloading" href="#mdisableentityloading">#</a> `disableEntityLoading`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L23)
```php
public function disableEntityLoading(): void;
```

***Return value:*** [void](https://www.php.net/manual/en/language.types.void.php)

---

<a name="mgetentity" href="#mgetentity">#</a> `getEntity`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L18)
```php
public function getEntity(): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```

***Return value:*** [\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php)

---

<a name="misentitycanbeloaded" href="#misentitycanbeloaded">#</a> `isEntityCanBeLoaded`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L28)
```php
public function isEntityCanBeLoaded(): bool;
```

***Return value:*** [bool](https://www.php.net/manual/en/language.types.boolean.php)

---
