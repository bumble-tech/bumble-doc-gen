[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
Reflection API for PHP

---


# Reflection API for PHP

The tool we implemented partially replicates the [standard PHP reflection API](https://www.php.net/manual/en/book.reflection.php), but it has some additional capabilities.
In addition, our Reflection API is available for use in every documentation template, plugin, twig function, etc. at `BumbleDocGen`.

## Class like reflections

Using our PHP reflection API you can get information about project entities.
Below is information about the available methods for working with each entity type:

1) [Class reflection](/docs/tech/02_parser/reflectionApi/php/phpClassReflectionApi.md)
2) [Trait reflection](/docs/tech/02_parser/reflectionApi/php/phpTraitReflectionApi.md)
3) [Interface reflection](/docs/tech/02_parser/reflectionApi/php/phpInterfaceReflectionApi.md)
4) [Enum reflection](/docs/tech/02_parser/reflectionApi/php/phpEnumReflectionApi.md)

**Usage example:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

// In this example, the collection is empty, so we use a method that will create an entity by its name
$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$entityName = $classReflection->getName();
$entityDescription = $classReflection->getDescription();
$entityClassCodeStartLine = $classReflection->getStartLine();

// ... etc.
```

## Entities collection

Class reflections are stored in collections. The collection is filled either before documents are generated,
if the Reflection API is used to generate documentation, or when special methods are called that, under certain conditions, fill them with the required reflections.

You can perform a number of filtering and searching operations on a collection of entities.
The collections API is presented on this page: [PHP entities collection](/docs/tech/02_parser/reflectionApi/php/phpEntitiesCollection.md)

**Usage example:**

```php
// Create an empty collection
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

// Fill the collection with entities
$entitiesCollection->loadEntities(
    $sourceLocators, // Source locators are needed so that we can determine all the files that will be traversed to fill the collection with data
    $filters // We can define special filters according to which entities will be loaded
);

$classReflection = $entitiesCollection->get('SomeClassName');

$entitiesCollection = $entitiesCollection
    ->filterByInterfaces(['SomeNamespace\Interface1', 'SomeNamespace\Interface2'])
    ->filterByParentClassNames(['SomeNamespace\ParentClass']);

foreach($entitiesCollection as $classReflection) {
    $name = $classReflection->getName();
}
```

## Class like sub entities reflections

PHP classes contain methods, properties and constants. Below is information about these child entities:

1) [Class method reflection](/docs/tech/02_parser/reflectionApi/php/phpClassMethodReflectionApi.md)
2) [Class property reflection](/docs/tech/02_parser/reflectionApi/php/phpClassPropertyReflectionApi.md)
3) [Class constant reflection](/docs/tech/02_parser/reflectionApi/php/phpClassConstantReflectionApi.md)

**Usage example:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$propertyReflection = $classReflection->getProperty('propertyName');
$propertyName = $methodReflection->getName();

$methodReflection = $classReflection->getMethod('methodName');
$methodName = $methodReflection->getName();
$firstMethodReturnValue = $methodReflection->getFirstReturnValue();

// ... etc.
```

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)