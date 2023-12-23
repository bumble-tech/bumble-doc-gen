<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP class method reflection API<hr> </embed>

<embed> <h1>PHP class method reflection API</h1> </embed>

Method reflection entity class: <a href="/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md">MethodEntity</a>.

**Example of creating class method reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$methodReflection = $classReflection->getMethod('methodName');
```

**Class method reflection API methods:**

- [getAbsoluteFileName()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetabsolutefilename): Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [getAst()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetast): Get AST for this entity
- [getBodyCode()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetbodycode): Get the code for this method
- [getDescription()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdescription): Get entity description
- [getDescriptionLinks()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdescriptionlinks): Get parsed links from description and doc blocks `see` and `link`
- [getDocComment()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdoccomment): Get the doc comment of an entity
- [getDocNote()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdocnote): Get the note annotation value
- [getEndLine()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetendline): Get the line number of the end of a method&#039;s code in a file
- [getExamples()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetexamples): Get parsed examples from `examples` doc block
- [getFirstExample()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetfirstexample): Get first example from `examples` doc block
- [getFirstReturnValue()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetfirstreturnvalue): Get the compiled first return value of a method (if possible)
- [getImplementingClass()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetimplementingclass): Get the class like entity in which the current entity was implemented
- [getImplementingClassName()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetimplementingclassname): Get the name of the class in which this method is implemented
- [getModifiersString()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetmodifiersstring): Get a text representation of method modifiers
- [getName()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetname): Full name of the entity
- [getNamespaceName()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetnamespacename): Namespace of the class that contains this method
- [getObjectId()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetobjectid): Get entity unique ID
- [getParameters()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetparameters): Get a list of method parameters
- [getParametersString()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetparametersstring): Get a list of method parameters as a string
- [getParentMethod()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetparentmethod): Get the parent method for this method
- [getRelativeFileName()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetrelativefilename): File name relative to project_root configuration parameter
- [getReturnType()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetreturntype): Get the return type of method
- [getRootEntityCollection()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetrootentitycollection): Get the collection of root entities to which this entity belongs
- [getShortName()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetshortname): Short name of the entity
- [getSignature()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetsignature): Get the method signature as a string
- [getStartColumn()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetstartcolumn): Get the column number of the beginning of the method code in a file
- [getStartLine()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetstartline): Get the line number of the beginning of the entity code in a file
- [getThrows()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetthrows): Get parsed throws from `throws` doc block
- [hasDescriptionLinks()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mhasdescriptionlinks): Checking if an entity has links in its description
- [hasExamples()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mhasexamples): Checking if an entity has `example` docBlock
- [hasThrows()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mhasthrows): Checking if an entity has `throws` docBlock
- [isApi()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misapi): Checking if an entity has `api` docBlock
- [isConstructor()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misconstructor): Checking that a method is a constructor
- [isDeprecated()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misdeprecated): Checking if an entity has `deprecated` docBlock
- [isDynamic()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misdynamic): Check if a method is a dynamic method, that is, implementable using __call or __callStatic
- [isEntityFileCanBeLoad()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misentityfilecanbeload): Checking if entity data can be retrieved
- [isImplementedInParentClass()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misimplementedinparentclass): Check if this method is implemented in the parent class
- [isInitialization()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misinitialization): Check if a method is an initialization method
- [isInternal()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misinternal): Checking if an entity has `internal` docBlock
- [isPrivate()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misprivate): Check if a method is a private method
- [isProtected()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misprotected): Check if a method is a protected method
- [isPublic()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mispublic): Check if a method is a public method
- [isStatic()](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misstatic): Check if this method is static

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Dec 23 23:00:37 2023 +0300<br><b>Page content update date:</b> Sat Dec 23 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>