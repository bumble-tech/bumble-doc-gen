[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Source locators](/docs/tech/02_parser/sourceLocator.md) **/**
RecursiveDirectoriesSourceLocator

---


# [RecursiveDirectoriesSourceLocator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php#L10) class:

```php
namespace BumbleDocGen\Core\Parser\SourceLocator;

final class RecursiveDirectoriesSourceLocator extends \BumbleDocGen\Core\Parser\SourceLocator\BaseSourceLocator implements \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorInterface
```
Loads all files from the specified directories, which are traversed recursively

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [getFinder](#mgetfinder) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php#L12)
```php
public function __construct(array $directories, array $exclude = [], bool $abortExecutionIfPartOfDirsNotExists = true);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$directories | [array](https://www.php.net/manual/en/language.types.array.php) | - |
$exclude | [array](https://www.php.net/manual/en/language.types.array.php) | - |
$abortExecutionIfPartOfDirsNotExists | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |

---

<a name="mgetfinder" href="#mgetfinder">#</a> `getFinder`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/BaseSourceLocator.php#L19)
```php
// Implemented in BumbleDocGen\Core\Parser\SourceLocator\BaseSourceLocator

public function getFinder(): \Symfony\Component\Finder\Finder;
```

***Return value:*** [\Symfony\Component\Finder\Finder](https://github.com/symfony/finder/blob/master/Finder.php)

---
