[BumbleDocGen](../../../../README.md) **/**
[Technical description of the project](../../../readme.md) **/**
[Parser](../../readme.md) **/**
[Reflection API](../readme.md) **/**
[Reflection API for PHP](readme.md) **/**
PHP class method reflection API

---


# PHP class method reflection API

Method reflection entity class: [MethodEntity](classes/MethodEntity.md).

**Example of creating class method reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$methodReflection = $classReflection->getMethod('methodName');
```

**Class method reflection API methods:**

- [getAbsoluteFileName()](classes/MethodEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](classes/MethodEntity.md#mgetast): Get AST for this entity
- [getBodyCode()](classes/MethodEntity.md#mgetbodycode): Get the code for this method
- [getDescription()](classes/MethodEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](classes/MethodEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](classes/MethodEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocNote()](classes/MethodEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](classes/MethodEntity.md#mgetendline): Get the line number of the end of a method&#039;s code in a file
- [getExamples()](classes/MethodEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](classes/MethodEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getFirstReturnValue()](classes/MethodEntity.md#mgetfirstreturnvalue): Get the compiled first return value of a method (if possible)
- [getImplementingClass()](classes/MethodEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getImplementingClassName()](classes/MethodEntity.md#mgetimplementingclassname): Get the name of the class in which this method is implemented
- [getModifiersString()](classes/MethodEntity.md#mgetmodifiersstring): Get a text representation of method modifiers
- [getName()](classes/MethodEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](classes/MethodEntity.md#mgetnamespacename): Namespace of the class that contains this method
- [getObjectId()](classes/MethodEntity.md#mgetobjectid): Get entity unique ID
- [getParameters()](classes/MethodEntity.md#mgetparameters): Get a list of method parameters
- [getParametersString()](classes/MethodEntity.md#mgetparametersstring): Get a list of method parameters as a string
- [getParentMethod()](classes/MethodEntity.md#mgetparentmethod): Get the parent method for this method
- [getRelativeFileName()](classes/MethodEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getReturnType()](classes/MethodEntity.md#mgetreturntype): Get the return type of method
- [getRootEntityCollection()](classes/MethodEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](classes/MethodEntity.md#mgetshortname): Short name of the entity
- [getSignature()](classes/MethodEntity.md#mgetsignature): Get the method signature as a string
- [getStartColumn()](classes/MethodEntity.md#mgetstartcolumn): Get the column number of the beginning of the method code in a file
- [getStartLine()](classes/MethodEntity.md#mgetstartline): Get the line number of the beginning of the entity code in a file
- [getThrows()](classes/MethodEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [hasDescriptionLinks()](classes/MethodEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](classes/MethodEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasThrows()](classes/MethodEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [isApi()](classes/MethodEntity.md#misapi): Checking if an entity has `api` docBlock
- [isConstructor()](classes/MethodEntity.md#misconstructor): Checking that a method is a constructor
- [isDeprecated()](classes/MethodEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isDynamic()](classes/MethodEntity.md#misdynamic): Check if a method is a dynamic method, that is, implementable using __call or __callStatic
- [isEntityFileCanBeLoad()](classes/MethodEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isImplementedInParentClass()](classes/MethodEntity.md#misimplementedinparentclass): Check if this method is implemented in the parent class
- [isInitialization()](classes/MethodEntity.md#misinitialization): Check if a method is an initialization method
- [isInternal()](classes/MethodEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isPrivate()](classes/MethodEntity.md#misprivate): Check if a method is a private method
- [isProtected()](classes/MethodEntity.md#misprotected): Check if a method is a protected method
- [isPublic()](classes/MethodEntity.md#mispublic): Check if a method is a public method
- [isStatic()](classes/MethodEntity.md#misstatic): Check if this method is static

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)