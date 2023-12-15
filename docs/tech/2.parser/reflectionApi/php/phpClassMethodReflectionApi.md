<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP class method reflection API<hr> </embed>

<embed> <h1>PHP class method reflection API</h1> </embed>

Method reflection entity class: <a href="/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md">MethodEntity</a>.

**Example of creating class method reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->getRootEntityReflections($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$methodReflection = $classReflection->getMethod('methodName');
```

**Class method reflection API methods:**

- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetabsolutefilename) `getAbsoluteFileName()`: Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetast) `getAst()`: Get AST for this entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetbodycode) `getBodyCode()`: Get the code for this method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdescription) `getDescription()`: Get entity description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdescriptionlinks) `getDescriptionLinks()`: Get parsed links from description and doc blocks `see` and `link`
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdoccomment) `getDocComment()`: Get the doc comment of an entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetdocnote) `getDocNote()`: Get the note annotation value
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetendline) `getEndLine()`: Get the line number of the end of a method&#039;s code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetexamples) `getExamples()`: Get parsed examples from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetfirstexample) `getFirstExample()`: Get first example from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetfirstreturnvalue) `getFirstReturnValue()`: Get the compiled first return value of a method (if possible)
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetimplementingclass) `getImplementingClass()`: Get the class like entity in which the current entity was implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetimplementingclassname) `getImplementingClassName()`: Get the name of the class in which this method is implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetmodifiersstring) `getModifiersString()`: Get a text representation of method modifiers
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetname) `getName()`: Full name of the entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetnamespacename) `getNamespaceName()`: Namespace of the class that contains this method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetobjectid) `getObjectId()`: Get entity unique ID
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetparameters) `getParameters()`: Get a list of method parameters
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetparametersstring) `getParametersString()`: Get a list of method parameters as a string
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetparentmethod) `getParentMethod()`: Get the parent method for this method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetrelativefilename) `getRelativeFileName()`: File name relative to project_root configuration parameter
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetreturntype) `getReturnType()`: Get the return type of method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetrootentitycollection) `getRootEntityCollection()`: Get the collection of root entities to which this entity belongs
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetshortname) `getShortName()`: Short name of the entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetsignature) `getSignature()`: Get the method signature as a string
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetstartcolumn) `getStartColumn()`: Get the column number of the beginning of the method code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetstartline) `getStartLine()`: Get the line number of the beginning of the entity code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mgetthrows) `getThrows()`: Get parsed throws from `throws` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mhasdescriptionlinks) `hasDescriptionLinks()`: Checking if an entity has links in its description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mhasexamples) `hasExamples()`: Checking if an entity has `example` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mhasthrows) `hasThrows()`: Checking if an entity has `throws` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misapi) `isApi()`: Checking if an entity has `api` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misconstructor) `isConstructor()`: Checking that a method is a constructor
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misdeprecated) `isDeprecated()`: Checking if an entity has `deprecated` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misdynamic) `isDynamic()`: Check if a method is a dynamic method, that is, implementable using __call or __callStatic
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misentityfilecanbeload) `isEntityFileCanBeLoad()`: Checking if entity data can be retrieved
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misimplementedinparentclass) `isImplementedInParentClass()`: Check if this method is implemented in the parent class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misinitialization) `isInitialization()`: Check if a method is an initialization method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misinternal) `isInternal()`: Checking if an entity has `internal` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misprivate) `isPrivate()`: Check if a method is a private method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misprotected) `isProtected()`: Check if a method is a protected method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#mispublic) `isPublic()`: Check if a method is a public method
- [#](/docs/tech/2.parser/reflectionApi/php/classes/MethodEntity.md#misstatic) `isStatic()`: Check if this method is static

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Dec 15 21:27:10 2023 +0300<br><b>Page content update date:</b> Fri Dec 15 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>