<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/readme.md">Reflection API</a> <b>/</b> <a href="/docs/tech/2.parser/reflectionApi/php/readme.md">Reflection API for PHP</a> <b>/</b> PHP class constant reflection API<hr> </embed>

<embed> <h1>PHP class constant reflection API</h1> </embed>

Class constant reflection entity class: <a href="/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md">ClassConstantEntity</a>.

**Example of creating class constant reflection:**

```php
$entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->getRootEntityReflections($reflectionApiConfig);

$classReflection = $entitiesCollection->getLoadedOrCreateNew('SomeClassName');

$constantReflection = $classReflection->getConstant('constantName');
```

**Class constant reflection API methods:**

- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetabsolutefilename) `getAbsoluteFileName()`: Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetast) `getAst()`: Get AST for this entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdescription) `getDescription()`: Get entity description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdescriptionlinks) `getDescriptionLinks()`: Get parsed links from description and doc blocks `see` and `link`
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdoccomment) `getDocComment()`: Get the doc comment of an entity
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdoccommentline) `getDocCommentLine()`: Get the code line number where the docBlock of the current entity begins
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetdocnote) `getDocNote()`: Get the note annotation value
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetendline) `getEndLine()`: Get the line number of the end of a constant&#039;s code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetexamples) `getExamples()`: Get parsed examples from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetfirstexample) `getFirstExample()`: Get first example from `examples` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetimplementingclass) `getImplementingClass()`: Get the class like entity in which the current entity was implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetnamespacename) `getNamespaceName()`: Get the name of the namespace where the current class is implemented
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetobjectid) `getObjectId()`: Get entity unique ID
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetrelativefilename) `getRelativeFileName()`: File name relative to project_root configuration parameter
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetrootentitycollection) `getRootEntityCollection()`: Get the collection of root entities to which this entity belongs
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetstartline) `getStartLine()`: Get the line number of the beginning of the constant code in a file
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetthrows) `getThrows()`: Get parsed throws from `throws` doc block
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mgetvalue) `getValue()`: Get the compiled value of a constant
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mhasdescriptionlinks) `hasDescriptionLinks()`: Checking if an entity has links in its description
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mhasexamples) `hasExamples()`: Checking if an entity has `example` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mhasthrows) `hasThrows()`: Checking if an entity has `throws` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#misapi) `isApi()`: Checking if an entity has `api` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#misdeprecated) `isDeprecated()`: Checking if an entity has `deprecated` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#misentityfilecanbeload) `isEntityFileCanBeLoad()`: Checking if entity data can be retrieved
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#misinternal) `isInternal()`: Checking if an entity has `internal` docBlock
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#misprivate) `isPrivate()`: Check if a constant is a private constant
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#misprotected) `isProtected()`: Check if a constant is a protected constant
- [#](/docs/tech/2.parser/reflectionApi/php/classes/ClassConstantEntity.md#mispublic) `isPublic()`: Check if a constant is a public constant

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Dec 15 21:27:10 2023 +0300<br><b>Page content update date:</b> Fri Dec 15 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>