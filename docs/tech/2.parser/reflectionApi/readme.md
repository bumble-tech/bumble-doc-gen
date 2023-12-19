<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> Reflection API<hr> </embed>

<embed> <h1>Reflection API</h1> </embed>

The documentation generator has a convenient Reflection API for analyzing the source code of the project being documented.
You can use the Reflection API both in documentation templates and simply in your code where necessary.

**See:**
1) **<a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a>**
2) **[Demo](/demo/demo6-reflection-api/demoScript.php)**

<embed> <h3>Example</h3> </embed>

```php
 // Create a Reflection API config object. This example shows the config for parsing PHP code
 $reflectionApiConfig = PhpReflectionApiConfig::create();
 
 /** @var PhpEntitiesCollection $entitiesCollection*/
 $entitiesCollection = (new BumbleDocGenDocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);
 
 // Source locators are needed so that we can determine all the files that will be traversed to fill the collection with data
 $sourceLocators = SourceLocatorsCollection::create(new DirectoriesSourceLocator([__DIR__]));
 
 // We can define special filters according to which entities will be loaded
 $filter = new TrueCondition();
 
 // By default the collection is empty. You can populate the collection with data
 $entitiesCollection->loadEntities(
     $sourceLocators,
     $filter
 );
 
 // And now you can use Reflection API
 $filename = $entitiesCollection->get('SomeClassName')?->getAbsoluteFileName();
 
```


<embed> <h3>Example 2 - Working with the Reflection API through a default parsing mechanism</h3> </embed>

```php
 // Create a documentation generator object
 $docGen = (new BumbleDocGenDocGeneratorFactory())->create($configFile);
 
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

In addition, <a href="/docs/tech/2.parser/reflectionApi/classes/RootEntityCollectionsGroup.md">RootEntityCollectionsGroup</a> is always available through DI, for example when you implement some twig function or plugin.


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Tue Dec 19 16:15:12 2023 +0300<br><b>Page content update date:</b> Tue Dec 19 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>