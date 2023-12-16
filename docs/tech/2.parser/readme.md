<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Parser<hr> </embed>

<embed> <h1>Documentation parser</h1> </embed>

Most often, we need <a href="/docs/tech/2.parser/classes/ProjectParser.md">ProjectParser</a> in order to get a list of entities for documentation.
But this is not the only use of this tool. The result of the parser's work (a collection of entities) can be used to programmatically analyze the project and perform any operations based on this analysis.
For example, in our documentation generator, we also use the result of the parser in the tasks of generating documentation using AI tools.
You can also use the parser for your own purposes other than generating documentation.

In this section, we show how the parser works and what components it consists of.

<embed> <h2>Description of the main components of the parser</h2> </embed>

<embed> <ul><li><div><a href='/docs/tech/2.parser/entity.md'>Entities and entities collections</a></div></li><li><div><a href='/docs/tech/2.parser/entityFilterCondition.md'>Entity filter conditions</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/readme.md'>Reflection API</a></div><div><ul><li><div><a href='/docs/tech/2.parser/reflectionApi/php/readme.md'>Reflection API for PHP</a></div><div><ul><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpClassConstantReflectionApi.md'>PHP class constant reflection API</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpClassMethodReflectionApi.md'>PHP class method reflection API</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpClassPropertyReflectionApi.md'>PHP class property reflection API</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpClassReflectionApi.md'>PHP class reflection API</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpEntitiesCollection.md'>PHP entities collection</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpEnumReflectionApi.md'>PHP enum reflection API</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpInterfaceReflectionApi.md'>PHP interface reflection API</a></div></li><li><div><a href='/docs/tech/2.parser/reflectionApi/php/phpTraitReflectionApi.md'>PHP trait reflection API</a></div></li></ul></div></li></ul></div></li><li><div><a href='/docs/tech/2.parser/sourceLocator.md'>Source locators</a></div></li></ul> </embed>

<embed> <h2>Starting the parsing process</h2> </embed>

```php
 $parser = new ProjectParser($configuration, $rootEntityCollectionsGroup);
 
 // Parsing the project and filling RootEntityCollectionsGroup with data
 $this->parser->parse();
 $rootEntityCollectionsGroup = $this->parser->getRootEntityCollectionsGroup();
```


<embed> <h2>How it works</h2> </embed>

```mermaid
 flowchart TD
    Start((Start)) --> Init(<b>ProjectParser</b> initialization)
    Init --> StartParsing(Starting the parsing process)
    StartParsing --> HandlerLoop(Entering the LanguageHandlers processing loop)
    HandlerLoop --> NextHandler{Is there a \nnext <b>LanguageHandler</b> \nfor parsing entities?}
    NextHandler -- Yes --> LoadSourceLocators(<b>Loading SourceLocators for the current LanguageHandler</b>)
    LoadSourceLocators --> GetFileList(Getting a list of files to bypass them)
    GetFileList --> PopulateEntities(<b>Filling the collection with entities obtained from files</b>)
    PopulateEntities --> HandlerLoop
    NextHandler -- No --> ReturnResult(We return the result of the parser - <b>RootEntityCollectionsGroup</b>)
    ReturnResult --> Exit(((Exit)))
```

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Wed Nov 29 11:54:40 2023 +0300<br><b>Page content update date:</b> Sat Dec 16 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>