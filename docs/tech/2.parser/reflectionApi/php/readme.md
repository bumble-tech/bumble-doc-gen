<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> Reflection API for PHP<hr> </embed>

<embed> <h1>Reflection API for PHP</h1> </embed>

The tool we implemented partially replicates the [standard PHP reflection API](https://www.php.net/manual/en/book.reflection.php), but it has some additional capabilities.
In addition, our Reflection API is available for use in every documentation template, plugin, twig function, etc. at `BumbleDocGen`.

<embed> <h2>Class like reflections</h2> </embed>

Using our PHP reflection API you can get information about project entities.
Below is information about the available methods for working with each entity type:

1) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassReflectionApi.md">Class reflection</a>
2) <a href="/docs/tech/2.parser/reflectionApi/php/phpTraitReflectionApi.md">Trait reflection</a>
3) <a href="/docs/tech/2.parser/reflectionApi/php/phpInterfaceReflectionApi.md">Interface reflection</a>
4) <a href="/docs/tech/2.parser/reflectionApi/php/phpEnumReflectionApi.md">Enum reflection</a>

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

<embed> <h2>Entities collection</h2> </embed>

Class reflections are stored in collections. The collection is filled either before documents are generated,
if the Reflection API is used to generate documentation, or when special methods are called that, under certain conditions, fill them with the required reflections.

You can perform a number of filtering and searching operations on a collection of entities.
The collections API is presented on this page: <a href="/docs/tech/2.parser/reflectionApi/php/phpEntitiesCollection.md">PHP entities collection</a>

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

<embed> <h2>Class like sub entities reflections</h2> </embed>

PHP classes contain methods, properties and constants. Below is information about these child entities:

1) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassMethodReflectionApi.md">Class method reflection</a>
2) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassPropertyReflectionApi.md">Class property reflection</a>
3) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassConstantReflectionApi.md">Class constant reflection</a>

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

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Dec 16 13:54:48 2023 +0300<br><b>Page content update date:</b> Mon Dec 18 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>