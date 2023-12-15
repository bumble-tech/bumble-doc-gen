<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP class reflection API<hr> </embed>

<embed> <h1>PHP class reflection API</h1> </embed>

PHP class reflection <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md">ClassEntity</a> inherits from <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassLikeEntity_4.md">ClassLikeEntity</a>.

**Source class formats:**

1) `class <className>`
2) `abstract class <className>`
3) `final class <className>`

**Example of creating class reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->getRootEntityReflections($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName'); // or get()
```

**Class reflection API methods:**

- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetabsolutefilename) `getAbsoluteFileName()`: Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetast) `getAst()`: Get AST for this entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetconstant) `getConstant()`: Get the method entity by its name
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetconstantentitiescollection) `getConstantEntitiesCollection()`: Get a collection of constant entities
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetconstantvalue) `getConstantValue()`: Get the compiled value of a constant
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetconstants) `getConstants()`: Get all constants that are available according to the configuration as an array
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetconstantsvalues) `getConstantsValues()`: Get class constant compiled values according to filters
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetdescription) `getDescription()`: Get entity description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetdescriptionlinks) `getDescriptionLinks()`: Get parsed links from description and doc blocks `see` and `link`
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetdoccomment) `getDocComment()`: Get the doc comment of an entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetdoccommentline) `getDocCommentLine()`: Get the code line number where the docBlock of the current entity begins
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetdocnote) `getDocNote()`: Get the note annotation value
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetendline) `getEndLine()`: Get the line number of the end of a class code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetexamples) `getExamples()`: Get parsed examples from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetfirstexample) `getFirstExample()`: Get first example from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetimplementingclass) `getImplementingClass()`: Get the class like entity in which the current entity was implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetinterfacenames) `getInterfaceNames()`: Get a list of class interface names
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetinterfacesentities) `getInterfacesEntities()`: Get a list of interface entities that the current class implements
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetmethod) `getMethod()`: Get the method entity by its name
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetmethodentitiescollection) `getMethodEntitiesCollection()`: Get a collection of method entities
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetmethods) `getMethods()`: Get all methods that are available according to the configuration as an array
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetname) `getName()`: Full name of the entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetnamespacename) `getNamespaceName()`: Get the entity namespace name
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetobjectid) `getObjectId()`: Get entity unique ID
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetparentclass) `getParentClass()`: Get the entity of the parent class if it exists
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetparentclassentities) `getParentClassEntities()`: Get a list of parent class entities
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetparentclassname) `getParentClassName()`: Get the name of the parent class entity if it exists
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetparentclassnames) `getParentClassNames()`: Get a list of entity names of parent classes
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetplugindata) `getPluginData()`: Get additional information added using the plugin
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetproperties) `getProperties()`: Get all properties that are available according to the configuration as an array
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetproperty) `getProperty()`: Get the property entity by its name
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetpropertydefaultvalue) `getPropertyDefaultValue()`: Get the compiled value of a property
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetpropertyentitiescollection) `getPropertyEntitiesCollection()`: Get a collection of property entities
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetrelativefilename) `getRelativeFileName()`: File name relative to project_root configuration parameter
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetrootentitycollection) `getRootEntityCollection()`: Get the collection of root entities to which this entity belongs
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetshortname) `getShortName()`: Short name of the entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetstartline) `getStartLine()`: Get the line number of the start of a class code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgetthrows) `getThrows()`: Get parsed throws from `throws` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgettraits) `getTraits()`: Get a list of trait entities of the current class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mgettraitsnames) `getTraitsNames()`: Get a list of class traits names
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasconstant) `hasConstant()`: Check if a constant exists in a class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasdescriptionlinks) `hasDescriptionLinks()`: Checking if an entity has links in its description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasexamples) `hasExamples()`: Checking if an entity has `example` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasmethod) `hasMethod()`: Check if a method exists in a class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasparentclass) `hasParentClass()`: Check if a certain parent class exists in a chain of parent classes
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasproperty) `hasProperty()`: Check if a property exists in a class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhasthrows) `hasThrows()`: Checking if an entity has `throws` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mhastraits) `hasTraits()`: Check if the class contains traits
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mimplementsinterface) `implementsInterface()`: Check if a class implements an interface
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misabstract) `isAbstract()`: Check that an entity is abstract
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misapi) `isApi()`: Checking if an entity has `api` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misattribute) `isAttribute()`: Check if a class is an attribute
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misclass) `isClass()`: Check if an entity is a Class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misdeprecated) `isDeprecated()`: Checking if an entity has `deprecated` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misentityfilecanbeload) `isEntityFileCanBeLoad()`: Checking if entity data can be retrieved
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misenum) `isEnum()`: Check if an entity is an Enum
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misinstantiable) `isInstantiable()`: Check that an entity is instantiable
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misinterface) `isInterface()`: Check if an entity is an Interface
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#misinternal) `isInternal()`: Checking if an entity has `internal` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#missubclassof) `isSubclassOf()`: Whether the given class is a subclass of the specified class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mistrait) `isTrait()`: Check if an entity is a Trait
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassEntity.md#mnormalizeclassname) `normalizeClassName()`


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Dec 15 21:27:10 2023 +0300<br><b>Page content update date:</b> Fri Dec 15 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>