[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
[Reflection API for PHP](readme.md) **/**
PHP enum reflection API

---


# PHP enum reflection API

PHP enum reflection [EnumEntity](classes/EnumEntity.md) inherits from [ClassLikeEntity](classes/ClassLikeEntity_3.md).

**Source enum formats:**

1) `enum <className>`

**Example of creating enum reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$enumReflection = $entitiesCollection->getLoadedOrCreateNew('SomeEnumName'); // or get()
```

**Enum reflection API methods:**

- [getAbsoluteFileName()](classes/EnumEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](classes/EnumEntity.md#mgetast): Get AST for this entity
- [getCasesNames()](classes/EnumEntity.md#mgetcasesnames): Get enum cases names
- [getConstant()](classes/EnumEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](classes/EnumEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](classes/EnumEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](classes/EnumEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](classes/EnumEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](classes/EnumEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](classes/EnumEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](classes/EnumEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](classes/EnumEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](classes/EnumEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](classes/EnumEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getEnumCaseValue()](classes/EnumEntity.md#mgetenumcasevalue): Get enum case value
- [getEnumCases()](classes/EnumEntity.md#mgetenumcases): Get enum cases values
- [getExamples()](classes/EnumEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](classes/EnumEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](classes/EnumEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](classes/EnumEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](classes/EnumEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](classes/EnumEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](classes/EnumEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](classes/EnumEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](classes/EnumEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](classes/EnumEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](classes/EnumEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](classes/EnumEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](classes/EnumEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](classes/EnumEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](classes/EnumEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](classes/EnumEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](classes/EnumEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](classes/EnumEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](classes/EnumEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](classes/EnumEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](classes/EnumEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](classes/EnumEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](classes/EnumEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](classes/EnumEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](classes/EnumEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](classes/EnumEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](classes/EnumEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](classes/EnumEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](classes/EnumEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](classes/EnumEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](classes/EnumEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](classes/EnumEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](classes/EnumEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](classes/EnumEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](classes/EnumEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](classes/EnumEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](classes/EnumEntity.md#misabstract): Check that an entity is abstract
- [isApi()](classes/EnumEntity.md#misapi): Checking if an entity has `api` docBlock
- [isClass()](classes/EnumEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](classes/EnumEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](classes/EnumEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](classes/EnumEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](classes/EnumEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](classes/EnumEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](classes/EnumEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](classes/EnumEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](classes/EnumEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](classes/EnumEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)