<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP enum reflection API<hr> </embed>

<embed> <h1>PHP enum reflection API</h1> </embed>

PHP enum reflection <a href="/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md">EnumEntity</a> inherits from <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassLikeEntity_3.md">ClassLikeEntity</a>.

**Source enum formats:**

1) `enum <className>`

**Example of creating enum reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$enumReflection = $entitiesCollection->getLoadedOrCreateNew('SomeEnumName'); // or get()
```

**Enum reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetast): Get AST for this entity
- [getCasesNames()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetcasesnames): Get enum cases names
- [getConstant()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getEnumCaseValue()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetenumcasevalue): Get enum case value
- [getEnumCases()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetenumcases): Get enum cases values
- [getExamples()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misabstract): Check that an entity is abstract
- [isApi()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misapi): Checking if an entity has `api` docBlock
- [isClass()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](/docs/tech/2.parser/reflectionApi/php/classes/EnumEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Dec 23 23:00:37 2023 +0300<br><b>Page content update date:</b> Sat Dec 23 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>