[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
Parser

---


# Documentation parser

Most often, we need [ProjectParser](classes/ProjectParser.md) in order to get a list of entities for documentation.
But this is not the only use of this tool. The result of the parser's work (a collection of entities) can be used to programmatically analyze the project and perform any operations based on this analysis.
For example, in our documentation generator, we also use the result of the parser in the tasks of generating documentation using AI tools.
You can also use the parser for your own purposes other than generating documentation.

In this section, we show how the parser works and what components it consists of.

## Description of the main components of the parser


- [Entities and entities collections](entity.md)
- [Entity filter conditions](entityFilterCondition.md)
- [Reflection API](reflectionApi/readme.md)    
    - [Reflection API for PHP](reflectionApi/php/readme.md)    
        - [PHP class constant reflection API](reflectionApi/php/phpClassConstantReflectionApi.md)
        - [PHP class method reflection API](reflectionApi/php/phpClassMethodReflectionApi.md)
        - [PHP class property reflection API](reflectionApi/php/phpClassPropertyReflectionApi.md)
        - [PHP class reflection API](reflectionApi/php/phpClassReflectionApi.md)
        - [PHP entities collection](reflectionApi/php/phpEntitiesCollection.md)
        - [PHP enum reflection API](reflectionApi/php/phpEnumReflectionApi.md)
        - [PHP interface reflection API](reflectionApi/php/phpInterfaceReflectionApi.md)
        - [PHP trait reflection API](reflectionApi/php/phpTraitReflectionApi.md)
- [Source locators](sourceLocator.md)

## Starting the parsing process

```php
$parser = new ProjectParser($configuration, $rootEntityCollectionsGroup);

// Parsing the project and filling RootEntityCollectionsGroup with data
$this->parser->parse();
$rootEntityCollectionsGroup = $this->parser->getRootEntityCollectionsGroup();
```

## How it works

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

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)