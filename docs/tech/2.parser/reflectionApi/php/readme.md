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
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->getRootEntityReflections($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName'); // or get()

$entityName = $classReflection->getName();
$entityDescription = $classReflection->getDescription();
$entityClassCodeStartLine = $classReflection->getStartLine();
// ... etc.
```

<embed> <h2>Class like sub entities reflections</h2> </embed>

PHP classes contain methods, properties and constants. Below is information about these child entities:

1) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassMethodReflectionApi.md">Class method reflection</a>
2) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassPropertyReflectionApi.md">Class property reflection</a>
3) <a href="/docs/tech/2.parser/reflectionApi/php/phpClassConstantReflectionApi.md">Class constant reflection</a>

**Usage example:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->getRootEntityReflections($reflectionApiConfig);

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
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Dec 15 21:27:10 2023 +0300<br><b>Page content update date:</b> Fri Dec 15 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>