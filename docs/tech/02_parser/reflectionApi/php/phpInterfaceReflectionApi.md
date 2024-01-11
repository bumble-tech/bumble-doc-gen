<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/02_parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/02_parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/02_parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP interface reflection API<hr> </embed>

<embed> <h1>PHP interface reflection API</h1> </embed>

PHP interface reflection <a href="/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md">InterfaceEntity</a> inherits from <a href="/docs/tech/02_parser/reflectionApi/php/classes/ClassLikeEntity_2.md">ClassLikeEntity</a>.

**Source interface formats:**

1) `interface <className>`

**Example of creating interface reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$interfaceReflection = $entitiesCollection->getLoadedOrCreateNew('SomeInterfaceName'); // or get()
```

**Interface reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetast): Get AST for this entity
- [getConstant()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getExamples()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misabstract): Check that an entity is abstract
- [isApi()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misapi): Checking if an entity has `api` docBlock
- [isClass()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](/docs/tech/02_parser/reflectionApi/php/classes/InterfaceEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Wed Jan 10 23:55:33 2024 +0300<br><b>Page content update date:</b> Thu Jan 11 2024<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>