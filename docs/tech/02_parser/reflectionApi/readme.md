[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Parser](../readme.md) **/**
Reflection API

---


# Reflection API

The documentation generator has a convenient Reflection API for analyzing the source code of the project being documented.
You can use the Reflection API both in documentation templates and simply in your code where necessary.

**See:**
1) **[Reflection API for PHP](/docs/tech/02_parser/reflectionApi/php/readme.md)**
2) **[Demo](/demo/demo6-reflection-api/demoScript.php)**

## Example

```php
// Create a Reflection API config object. This example shows the config for parsing PHP code
$reflectionApiConfig = PhpReflectionApiConfig::create();

/** @var PhpEntitiesCollection $entitiesCollection*/
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

// Source locators are needed so that we can determine all the files that will be traversed to fill the collection with data
$sourceLocators = SourceLocatorsCollection::create(new DirectoriesSourceLocator([__DIR__]));

// We can define special filters according to which entities will be loaded
$filter = new TrueCondition();

// By default, the collection is empty. You can populate the collection with data
$entitiesCollection->loadEntities(
    $sourceLocators,
    $filter
);

// And now you can use Reflection API
$filename = $entitiesCollection->get('SomeClassName')?->getAbsoluteFileName();
```

## Example 2 - Working with the Reflection API through a default parsing mechanism

```php
// Create a documentation generator object
$docGen = (new \BumbleDocGen\DocGeneratorFactory())->create($configFile);

// Next we get a group of entity collections (according to the configuration)
$entityCollectionsGroup = $docGen->parseAndGetRootEntityCollectionsGroup();

// Next, we can get a specific collection, for example for PHP entities
$entitiesCollection = $entityCollectionsGroup->get(PhpEntitiesCollection::class);

// And now you can use Reflection API
$filename = $entitiesCollection->get('SomeClassName')?->getAbsoluteFileName();
```

This method is used in the documentation generation process.
The only difference with the first example is that the first option is more convenient to use as a separate tool.

The settings for which entities will be available to the reflector in this case are taken from the configuration file or configuration array, depending on the method of creating the documentation generator instance.

In addition, [RootEntityCollectionsGroup](classes/RootEntityCollectionsGroup.md) is always available through DI, for example when you implement some twig function or plugin.


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)