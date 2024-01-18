[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Reflection API](/docs/tech/02_parser/reflectionApi/readme.md) **/**
[Reflection API for PHP](/docs/tech/02_parser/reflectionApi/php/readme.md) **/**
PHP class method reflection API

---


# PHP class method reflection API

Method reflection entity class: [MethodEntity](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md).

**Example of creating class method reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$methodReflection = $classReflection->getMethod('methodName');
```

**Class method reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetast): Get AST for this entity
- [getBodyCode()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetbodycode): Get the code for this method
- [getDescription()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocNote()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetendline): Get the line number of the end of a method&#039;s code in a file
- [getExamples()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getFirstReturnValue()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetfirstreturnvalue): Get the compiled first return value of a method (if possible)
- [getImplementingClass()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getImplementingClassName()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetimplementingclassname): Get the name of the class in which this method is implemented
- [getModifiersString()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetmodifiersstring): Get a text representation of method modifiers
- [getName()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetnamespacename): Namespace of the class that contains this method
- [getObjectId()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetobjectid): Get entity unique ID
- [getParameters()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetparameters): Get a list of method parameters
- [getParametersString()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetparametersstring): Get a list of method parameters as a string
- [getParentMethod()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetparentmethod): Get the parent method for this method
- [getRelativeFileName()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getReturnType()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetreturntype): Get the return type of method
- [getRootEntityCollection()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetshortname): Short name of the entity
- [getSignature()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetsignature): Get the method signature as a string
- [getStartColumn()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetstartcolumn): Get the column number of the beginning of the method code in a file
- [getStartLine()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetstartline): Get the line number of the beginning of the entity code in a file
- [getThrows()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [hasDescriptionLinks()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasThrows()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [isApi()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misapi): Checking if an entity has `api` docBlock
- [isConstructor()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misconstructor): Checking that a method is a constructor
- [isDeprecated()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isDynamic()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misdynamic): Check if a method is a dynamic method, that is, implementable using __call or __callStatic
- [isEntityFileCanBeLoad()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isImplementedInParentClass()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misimplementedinparentclass): Check if this method is implemented in the parent class
- [isInitialization()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misinitialization): Check if a method is an initialization method
- [isInternal()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isPrivate()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misprivate): Check if a method is a private method
- [isProtected()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misprotected): Check if a method is a protected method
- [isPublic()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#mispublic): Check if a method is a public method
- [isStatic()](/docs/tech/02_parser/reflectionApi/php/classes/MethodEntity.md#misstatic): Check if this method is static

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)