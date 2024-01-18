[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Reflection API](/docs/tech/02_parser/reflectionApi/readme.md) **/**
[Reflection API for PHP](/docs/tech/02_parser/reflectionApi/php/readme.md) **/**
PHP class property reflection API

---


# PHP class property reflection API

Property reflection entity class: [PropertyEntity](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md).

**Example of creating class property reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$propertyReflection = $classReflection->getProperty('propertyName');
```

**Class property reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetast): Get AST for this entity
- [getDefaultValue()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetdefaultvalue): Get the compiled default value of a property
- [getDescription()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetendline): Get the line number of the end of a property&#039;s code in a file
- [getExamples()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getImplementingClassName()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetimplementingclassname): Get the name of the class in which this property is implemented
- [getModifiersString()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetmodifiersstring): Get a text representation of property modifiers
- [getName()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetnamespacename): Namespace of the class that contains this property
- [getObjectId()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetobjectid): Get entity unique ID
- [getRelativeFileName()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetshortname): Short name of the entity
- [getStartLine()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetstartline): Get the line number of the beginning of the entity code in a file
- [getThrows()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getType()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mgettype): Get current property type
- [hasDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasThrows()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [isApi()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misapi): Checking if an entity has `api` docBlock
- [isDeprecated()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isImplementedInParentClass()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misimplementedinparentclass): Check if this property is implemented in the parent class
- [isInternal()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isPrivate()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misprivate): Check if a private is a public private
- [isProtected()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#misprotected): Check if a protected is a public protected
- [isPublic()](/docs/tech/02_parser/reflectionApi/php/classes/PropertyEntity.md#mispublic): Check if a property is a public property

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)