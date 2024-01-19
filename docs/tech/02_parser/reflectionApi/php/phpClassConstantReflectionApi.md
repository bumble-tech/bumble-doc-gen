[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
[Reflection API for PHP](readme.md) **/**
PHP class constant reflection API

---


# PHP class constant reflection API

Class constant reflection entity class: [ClassConstantEntity](classes/ClassConstantEntity.md).

**Example of creating class constant reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$constantReflection = $classReflection->getConstant('constantName');
```

**Class constant reflection API methods:**

- [getAbsoluteFileName()](classes/ClassConstantEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](classes/ClassConstantEntity.md#mgetast): Get AST for this entity
- [getDescription()](classes/ClassConstantEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](classes/ClassConstantEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](classes/ClassConstantEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocCommentLine()](classes/ClassConstantEntity.md#mgetdoccommentline): Get the code line number where the docBlock of the current entity begins
- [getDocNote()](classes/ClassConstantEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](classes/ClassConstantEntity.md#mgetendline): Get the line number of the end of a constant&#039;s code in a file
- [getExamples()](classes/ClassConstantEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](classes/ClassConstantEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getImplementingClass()](classes/ClassConstantEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getModifiersString()](classes/ClassConstantEntity.md#mgetmodifiersstring): Get a text representation of class constant modifiers
- [getNamespaceName()](classes/ClassConstantEntity.md#mgetnamespacename): Get the name of the namespace where the current class is implemented
- [getObjectId()](classes/ClassConstantEntity.md#mgetobjectid): Get entity unique ID
- [getRelativeFileName()](classes/ClassConstantEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getRootEntityCollection()](classes/ClassConstantEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getStartLine()](classes/ClassConstantEntity.md#mgetstartline): Get the line number of the beginning of the constant code in a file
- [getThrows()](classes/ClassConstantEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [getType()](classes/ClassConstantEntity.md#mgettype): Get current class constant type
- [getValue()](classes/ClassConstantEntity.md#mgetvalue): Get the compiled value of a constant
- [hasDescriptionLinks()](classes/ClassConstantEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](classes/ClassConstantEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasThrows()](classes/ClassConstantEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [isApi()](classes/ClassConstantEntity.md#misapi): Checking if an entity has `api` docBlock
- [isDeprecated()](classes/ClassConstantEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isEntityFileCanBeLoad()](classes/ClassConstantEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isInternal()](classes/ClassConstantEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isPrivate()](classes/ClassConstantEntity.md#misprivate): Check if a constant is a private constant
- [isProtected()](classes/ClassConstantEntity.md#misprotected): Check if a constant is a protected constant
- [isPublic()](classes/ClassConstantEntity.md#mispublic): Check if a constant is a public constant

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)