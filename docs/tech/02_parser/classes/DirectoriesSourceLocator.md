[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
[Source locators](../sourceLocator.md) **/**
DirectoriesSourceLocator

---


# [DirectoriesSourceLocator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/DirectoriesSourceLocator.php#L10) class:

```php
namespace BumbleDocGen\Core\Parser\SourceLocator;

final class DirectoriesSourceLocator extends \BumbleDocGen\Core\Parser\SourceLocator\BaseSourceLocator implements \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface
```
Loads all files from the specified directory

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getFinder](#mgetfinder) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/DirectoriesSourceLocator.php#L12)
```php
public function __construct(array $directories);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$directories | [array](https://www.php.net/manual/en/language.types.array.php) | - |

---

<a name="mgetfinder" href="#mgetfinder">#</a> `getFinder`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/BaseSourceLocator.php#L19)
```php
// Implemented in BumbleDocGen\Core\Parser\SourceLocator\BaseSourceLocator

public function getFinder(): \Symfony\Component\Finder\Finder;
```

***Return value:*** [\Symfony\Component\Finder\Finder](https://github.com/symfony/finder/blob/master/Finder.php)

---
