[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Reflection API](/docs/tech/02_parser/reflectionApi/readme.md) **/**
[Reflection API for PHP](/docs/tech/02_parser/reflectionApi/php/readme.md) **/**
PHP class constant reflection API

---


# PHP class constant reflection API

Class constant reflection entity class: [ClassConstantEntity](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md).

**Example of creating class constant reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$constantReflection = $classReflection->getConstant('constantName');
```

**Class constant reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetast): Get AST for this entity
- [getDescription()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetendline): Get the line number of the end of a constant&#039;s code in a file
- [getExamples()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getModifiersString()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetmodifiersstring): Get a text representation of class constant modifiers
- [getNamespaceName()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetnamespacename): Get the name of the namespace where the current class is implemented
- [getObjectId()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetobjectid): Get entity unique ID
- [getRelativeFileName()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getStartLine()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetstartline): Get the line number of the beginning of the constant code in a file
- [getThrows()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getType()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgettype): Get current class constant type
- [getValue()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetvalue): Get the compiled value of a constant
- [hasDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasThrows()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [isApi()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#misapi): Checking if an entity has `api` docBlock
- [isDeprecated()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isInternal()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isPrivate()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#misprivate): Check if a constant is a private constant
- [isProtected()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#misprotected): Check if a constant is a protected constant
- [isPublic()](/docs/tech/02_parser/reflectionApi/php/classes/ClassConstantEntity.md#mispublic): Check if a constant is a public constant

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)