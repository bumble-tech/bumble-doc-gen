[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[Template functions](../05_twigCustomFunctions.md) **/**
GetDocumentedEntityUrl

---


# [GetDocumentedEntityUrl](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L40) class:

```php
namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class GetDocumentedEntityUrl implements \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface
```
Get the URL of a documented entity by its name. If the entity is found, next to the file where this method was called,
the `EntityDocRendererInterface::getDocFileExtension()` directory will be created, in which the documented entity file will be created

***Links:***
- [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper](DocumentedEntityWrapper.md)
- [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection](DocumentedEntityWrappersCollection.md)
- [\BumbleDocGen\Core\Renderer\Context\RendererContext::$entityWrappersCollection](RendererContext.md#pentitywrapperscollection)

***Examples of using:***
```php
{{ getDocumentedEntityUrl(phpEntities, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension', 'getFunctions') }}
The function returns a reference to the documented entity, anchored to the getFunctions method
```
```php
{{ getDocumentedEntityUrl(phpEntities, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension') }}
The function returns a reference to the documented entity MainExtension
```
```php
{{ getDocumentedEntityUrl(phpEntities, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension', '', false) }}
The function returns a link to the file MainExtension
```


<h2>Settings:</h2>

<table>
    <tr>
        <td>Function name:</td>
        <td><b>getDocumentedEntityUrl</b></td>
    </tr>
</table>

## Initialization methods

1. [__construct](#m-construct) 
## Methods

1. [__invoke](#m-invoke) 
1. [getName](#mgetname) 
1. [getOptions](#mgetoptions) 
1. [process](#mprocess) 

## Methods details:

<a name="m-construct" href="#m-construct">#</a> `__construct`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L44)
```php
public function __construct(\BumbleDocGen\Core\Renderer\RendererHelper $rendererHelper, \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection $documentedEntityWrappersCollection, \BumbleDocGen\Core\Configuration\Configuration $configuration, \Monolog\Logger $logger);
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rendererHelper | [\BumbleDocGen\Core\Renderer\RendererHelper](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererHelper.php) | - |
$documentedEntityWrappersCollection | [\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php) | - |
$configuration | [\BumbleDocGen\Core\Configuration\Configuration](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php) | - |
$logger | [\Monolog\Logger](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Logger.php) | - |

---

<a name="m-invoke" href="#m-invoke">#</a> `__invoke`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L81)
```php
public function __invoke(array $context, \BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, string $entityName, string $cursor = '', bool $createDocument = true): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$context | [array](https://www.php.net/manual/en/language.types.array.php) | - |
$rootEntityCollection | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php) | Processed entity collection |
$entityName | [string](https://www.php.net/manual/en/language.types.string.php) | The full name of the entity for which the URL will be retrieved.
 If the entity is not found, the DEFAULT_URL value will be returned. |
$cursor | [string](https://www.php.net/manual/en/language.types.string.php) | Cursor on the page of the documented entity (for example, the name of a method or property) |
$createDocument | [bool](https://www.php.net/manual/en/language.types.boolean.php) | If true, creates an entity document. Otherwise, just gives a reference to the entity code |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetname" href="#mgetname">#</a> `getName`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L52)
```php
public static function getName(): string;
```

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---

<a name="mgetoptions" href="#mgetoptions">#</a> `getOptions`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L57)
```php
public static function getOptions(): array;
```

***Return value:*** [array](https://www.php.net/manual/en/language.types.array.php)

---

<a name="mprocess" href="#mprocess">#</a> `process`  **|** [source code](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Twig/Function/GetDocumentedEntityUrl.php#L102)
```php
public function process(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, string $entityName, string $cursor = '', bool $createDocument = true, string|null $callingTemplate = null): string;
```

***Parameters:***

| Name | Type | Description |
|:-|:-|:-|
$rootEntityCollection | [\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php) | - |
$entityName | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$cursor | [string](https://www.php.net/manual/en/language.types.string.php) | - |
$createDocument | [bool](https://www.php.net/manual/en/language.types.boolean.php) | - |
$callingTemplate | [string](https://www.php.net/manual/en/language.types.string.php) \| [null](https://www.php.net/manual/en/language.types.null.php) | - |

***Return value:*** [string](https://www.php.net/manual/en/language.types.string.php)

---
