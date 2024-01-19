[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
[Reflection API for PHP](readme.md) **/**
PHP class reflection API

---


# PHP class reflection API

PHP class reflection [ClassEntity](classes/ClassEntity.md) inherits from [ClassLikeEntity](classes/ClassLikeEntity_4.md).

**Source class formats:**

1) `class <className>`
2) `abstract class <className>`
3) `final class <className>`

**Example of creating class reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName'); // or get()
```

**Class reflection API methods:**

- [getAbsoluteFileName()](classes/ClassEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](classes/ClassEntity.md#mgetast): Get AST for this entity
- [getConstant()](classes/ClassEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](classes/ClassEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](classes/ClassEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](classes/ClassEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](classes/ClassEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](classes/ClassEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](classes/ClassEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](classes/ClassEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](classes/ClassEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](classes/ClassEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](classes/ClassEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getExamples()](classes/ClassEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](classes/ClassEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](classes/ClassEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](classes/ClassEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](classes/ClassEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](classes/ClassEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](classes/ClassEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](classes/ClassEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](classes/ClassEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](classes/ClassEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](classes/ClassEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](classes/ClassEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](classes/ClassEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](classes/ClassEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](classes/ClassEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](classes/ClassEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](classes/ClassEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](classes/ClassEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](classes/ClassEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](classes/ClassEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](classes/ClassEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](classes/ClassEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](classes/ClassEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](classes/ClassEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](classes/ClassEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](classes/ClassEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](classes/ClassEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](classes/ClassEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](classes/ClassEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](classes/ClassEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](classes/ClassEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](classes/ClassEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](classes/ClassEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](classes/ClassEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](classes/ClassEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](classes/ClassEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](classes/ClassEntity.md#misabstract): Check that an entity is abstract
- [isApi()](classes/ClassEntity.md#misapi): Checking if an entity has `api` docBlock
- [isAttribute()](classes/ClassEntity.md#misattribute): Check if a class is an attribute
- [isClass()](classes/ClassEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](classes/ClassEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](classes/ClassEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](classes/ClassEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](classes/ClassEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](classes/ClassEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](classes/ClassEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](classes/ClassEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](classes/ClassEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](classes/ClassEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)