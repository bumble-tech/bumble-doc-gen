[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
[Reflection API for PHP](readme.md) **/**
PHP interface reflection API

---


# PHP interface reflection API

PHP interface reflection [InterfaceEntity](classes/InterfaceEntity.md) inherits from [ClassLikeEntity](classes/ClassLikeEntity_2.md).

**Source interface formats:**

1) `interface <className>`

**Example of creating interface reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$interfaceReflection = $entitiesCollection->getLoadedOrCreateNew('SomeInterfaceName'); // or get()
```

**Interface reflection API methods:**

- [getAbsoluteFileName()](classes/InterfaceEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](classes/InterfaceEntity.md#mgetast): Get AST for this entity
- [getConstant()](classes/InterfaceEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](classes/InterfaceEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](classes/InterfaceEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](classes/InterfaceEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](classes/InterfaceEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](classes/InterfaceEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](classes/InterfaceEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](classes/InterfaceEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](classes/InterfaceEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](classes/InterfaceEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](classes/InterfaceEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getExamples()](classes/InterfaceEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](classes/InterfaceEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](classes/InterfaceEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](classes/InterfaceEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](classes/InterfaceEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](classes/InterfaceEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](classes/InterfaceEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](classes/InterfaceEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](classes/InterfaceEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](classes/InterfaceEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](classes/InterfaceEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](classes/InterfaceEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](classes/InterfaceEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](classes/InterfaceEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](classes/InterfaceEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](classes/InterfaceEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](classes/InterfaceEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](classes/InterfaceEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](classes/InterfaceEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](classes/InterfaceEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](classes/InterfaceEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](classes/InterfaceEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](classes/InterfaceEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](classes/InterfaceEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](classes/InterfaceEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](classes/InterfaceEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](classes/InterfaceEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](classes/InterfaceEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](classes/InterfaceEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](classes/InterfaceEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](classes/InterfaceEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](classes/InterfaceEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](classes/InterfaceEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](classes/InterfaceEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](classes/InterfaceEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](classes/InterfaceEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](classes/InterfaceEntity.md#misabstract): Check that an entity is abstract
- [isApi()](classes/InterfaceEntity.md#misapi): Checking if an entity has `api` docBlock
- [isClass()](classes/InterfaceEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](classes/InterfaceEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](classes/InterfaceEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](classes/InterfaceEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](classes/InterfaceEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](classes/InterfaceEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](classes/InterfaceEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](classes/InterfaceEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](classes/InterfaceEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](classes/InterfaceEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)