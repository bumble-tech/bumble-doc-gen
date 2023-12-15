<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP class property reflection API<hr> </embed>

<embed> <h1>PHP class property reflection API</h1> </embed>

Property reflection entity class: <a href="/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md">PropertyEntity</a>.

**Example of creating class property reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->getRootEntityReflections($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$propertyReflection = $classReflection->getProperty('propertyName');
```

**Class property reflection API methods:**

- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetabsolutefilename) `getAbsoluteFileName()`: Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetast) `getAst()`: Get AST for this entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetdefaultvalue) `getDefaultValue()`: Get the compiled default value of a property
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetdescription) `getDescription()`: Get entity description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetdescriptionlinks) `getDescriptionLinks()`: Get parsed links from description and doc blocks `see` and `link`
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetdoccomment) `getDocComment()`: Get the doc comment of an entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetdoccommentline) `getDocCommentLine()`: Get the code line number where the docBlock of the current entity begins
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetdocnote) `getDocNote()`: Get the note annotation value
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetendline) `getEndLine()`: Get the line number of the end of a property&#039;s code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetexamples) `getExamples()`: Get parsed examples from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetfirstexample) `getFirstExample()`: Get first example from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetimplementingclass) `getImplementingClass()`: Get the class like entity in which the current entity was implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetimplementingclassname) `getImplementingClassName()`: Get the name of the class in which this property is implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetmodifiersstring) `getModifiersString()`: Get a text representation of property modifiers
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetname) `getName()`: Full name of the entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetnamespacename) `getNamespaceName()`: Namespace of the class that contains this property
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetobjectid) `getObjectId()`: Get entity unique ID
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetrelativefilename) `getRelativeFileName()`: File name relative to project_root configuration parameter
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetrootentitycollection) `getRootEntityCollection()`: Get the collection of root entities to which this entity belongs
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetshortname) `getShortName()`: Short name of the entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetstartline) `getStartLine()`: Get the line number of the beginning of the entity code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgetthrows) `getThrows()`: Get parsed throws from `throws` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mgettype) `getType()`: Get current property type
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mhasdescriptionlinks) `hasDescriptionLinks()`: Checking if an entity has links in its description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mhasexamples) `hasExamples()`: Checking if an entity has `example` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mhasthrows) `hasThrows()`: Checking if an entity has `throws` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misapi) `isApi()`: Checking if an entity has `api` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misdeprecated) `isDeprecated()`: Checking if an entity has `deprecated` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misentityfilecanbeload) `isEntityFileCanBeLoad()`: Checking if entity data can be retrieved
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misimplementedinparentclass) `isImplementedInParentClass()`: Check if this property is implemented in the parent class
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misinternal) `isInternal()`: Checking if an entity has `internal` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misprivate) `isPrivate()`: Check if a private is a public private
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#misprotected) `isProtected()`: Check if a protected is a public protected
- [#](/docs/tech/2.parser/reflectionApi/php/classes/PropertyEntity.md#mispublic) `isPublic()`: Check if a property is a public property

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Dec 15 21:27:10 2023 +0300<br><b>Page content update date:</b> Fri Dec 15 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>