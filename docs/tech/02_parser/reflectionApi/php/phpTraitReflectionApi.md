<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/02_parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/02_parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/02_parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP trait reflection API<hr> </embed>

<embed> <h1>PHP trait reflection API</h1> </embed>

PHP trait reflection <a href="/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md">TraitEntity</a> inherits from <a href="/docs/tech/02_parser/reflectionApi/php/classes/ClassLikeEntity.md">ClassLikeEntity</a>.

**Source trait formats:**

1) `trait <className>`

**Example of creating trait reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$traitReflection = $entitiesCollection->getLoadedOrCreateNew('SomeTraitName'); // or get()
```

**Trait reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetast): Get AST for this entity
- [getConstant()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getExamples()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misabstract): Check that an entity is abstract
- [isApi()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misapi): Checking if an entity has `api` docBlock
- [isClass()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](/docs/tech/02_parser/reflectionApi/php/classes/TraitEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Wed Jan 10 23:55:33 2024 +0300<br><b>Page content update date:</b> Mon Jan 15 2024<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>