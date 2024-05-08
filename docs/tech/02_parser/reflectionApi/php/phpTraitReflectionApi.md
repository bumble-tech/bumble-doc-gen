[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
[Reflection API for PHP](readme.md) **/**
PHP trait reflection API

---


# PHP trait reflection API

PHP trait reflection [TraitEntity](classes/TraitEntity.md) inherits from [ClassLikeEntity](classes/ClassLikeEntity.md).

**Source trait formats:**

1) `trait <className>`

**Example of creating trait reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$traitReflection = $entitiesCollection->getLoadedOrCreateNew('SomeTraitName'); // or get()
```

**Trait reflection API methods:**

- [getAbsoluteFileName()](classes/TraitEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](classes/TraitEntity.md#mgetast): Get AST for this entity
- [getConstant()](classes/TraitEntity.md#mgetconstant): Get the method entity by its name
- [getConstantEntitiesCollection()](classes/TraitEntity.md#mgetconstantentitiescollection): Get a collection of constant entities
- [getConstantValue()](classes/TraitEntity.md#mgetconstantvalue): Get the compiled value of a constant
- [getConstants()](classes/TraitEntity.md#mgetconstants): Get all constants that are available according to the configuration as an array
- [getConstantsValues()](classes/TraitEntity.md#mgetconstantsvalues): Get class constant compiled values according to filters
- [getDescription()](classes/TraitEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](classes/TraitEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](classes/TraitEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](classes/TraitEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](classes/TraitEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](classes/TraitEntity.md#mgetendline): Get the line number of the end of a class code in a file
- [getExamples()](classes/TraitEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](classes/TraitEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](classes/TraitEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getInterfaceNames()](classes/TraitEntity.md#mgetinterfacenames): Get a list of class interface names
- [getInterfacesEntities()](classes/TraitEntity.md#mgetinterfacesentities): Get a list of interface entities that the current class implements
- [getMethod()](classes/TraitEntity.md#mgetmethod): Get the method entity by its name
- [getMethodEntitiesCollection()](classes/TraitEntity.md#mgetmethodentitiescollection): Get a collection of method entities
- [getMethods()](classes/TraitEntity.md#mgetmethods): Get all methods that are available according to the configuration as an array
- [getName()](classes/TraitEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](classes/TraitEntity.md#mgetnamespacename): Get the entity namespace name
- [getObjectId()](classes/TraitEntity.md#mgetobjectid): Get entity unique ID
- [getParentClass()](classes/TraitEntity.md#mgetparentclass): Get the entity of the parent class if it exists
- [getParentClassEntities()](classes/TraitEntity.md#mgetparentclassentities): Get a list of parent class entities
- [getParentClassName()](classes/TraitEntity.md#mgetparentclassname): Get the name of the parent class entity if it exists
- [getParentClassNames()](classes/TraitEntity.md#mgetparentclassnames): Get a list of entity names of parent classes
- [getPluginData()](classes/TraitEntity.md#mgetplugindata): Get additional information added using the plugin
- [getProperties()](classes/TraitEntity.md#mgetproperties): Get all properties that are available according to the configuration as an array
- [getProperty()](classes/TraitEntity.md#mgetproperty): Get the property entity by its name
- [getPropertyDefaultValue()](classes/TraitEntity.md#mgetpropertydefaultvalue): Get the compiled value of a property
- [getPropertyEntitiesCollection()](classes/TraitEntity.md#mgetpropertyentitiescollection): Get a collection of property entities
- [getRelativeFileName()](classes/TraitEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](classes/TraitEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](classes/TraitEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](classes/TraitEntity.md#mgetstartline): Get the line number of the start of a class code in a file
- [getThrows()](classes/TraitEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getTraits()](classes/TraitEntity.md#mgettraits): Get a list of trait entities of the current class
- [getTraitsNames()](classes/TraitEntity.md#mgettraitsnames): Get a list of class traits names
- [hasConstant()](classes/TraitEntity.md#mhasconstant): Check if a constant exists in a class
- [hasDescriptionLinks()](classes/TraitEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](classes/TraitEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasMethod()](classes/TraitEntity.md#mhasmethod): Check if a method exists in a class
- [hasParentClass()](classes/TraitEntity.md#mhasparentclass): Check if a certain parent class exists in a chain of parent classes
- [hasProperty()](classes/TraitEntity.md#mhasproperty): Check if a property exists in a class
- [hasThrows()](classes/TraitEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [hasTraits()](classes/TraitEntity.md#mhastraits): Check if the class contains traits
- [implementsInterface()](classes/TraitEntity.md#mimplementsinterface): Check if a class implements an interface
- [isAbstract()](classes/TraitEntity.md#misabstract): Check that an entity is abstract
- [isApi()](classes/TraitEntity.md#misapi): Checking if an entity has `api` docBlock
- [isClass()](classes/TraitEntity.md#misclass): Check if an entity is a Class
- [isDeprecated()](classes/TraitEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](classes/TraitEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isEnum()](classes/TraitEntity.md#misenum): Check if an entity is an Enum
- [isInstantiable()](classes/TraitEntity.md#misinstantiable): Check that an entity is instantiable
- [isInterface()](classes/TraitEntity.md#misinterface): Check if an entity is an Interface
- [isInternal()](classes/TraitEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isSubclassOf()](classes/TraitEntity.md#missubclassof): Whether the given class is a subclass of the specified class
- [isTrait()](classes/TraitEntity.md#mistrait): Check if an entity is a Trait
- [normalizeClassName()](classes/TraitEntity.md#mnormalizeclassname): Bring the class name to the standard format used in the system

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)