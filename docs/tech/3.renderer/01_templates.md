<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> How to create documentation templates?<hr> </embed>

<embed> <h1>How to create documentation templates?</h1> </embed>

Templates are `twig` files in which you can write both static text and dynamic blocks that will change from code changes or other required parameters.

**You can read more about template parts here:**

<embed> <ul><li><div><a href='/docs/tech/3.renderer/templatesDynamicBlocks.md'>Templates dynamic blocks</a></div></li><li><div><a href='/docs/tech/3.renderer/templatesLinking.md'>Linking templates</a></div></li><li><div><a href='/docs/tech/3.renderer/templatesVariables.md'>Templates variables</a></div></li></ul> </embed>

<embed> <h2>Examples</h2> </embed>

<embed> <h3>1) An example of a template with fully static text:</h3> </embed>

```twig
 Some static text
 This text does not change when the code is changed
```


After generating the documentation, this page will look exactly like a template.

<embed> <h3>2) An example of a template with static text and dynamic blocks:</h3> </embed>

```twig
 {% set title = 'Some page' %}
 {% set prevPage = 'Technical description of the project' %}
 {{ generatePageBreadcrumbs(title, _self) }}
 
 Some static text...
 
 Dynamic block:
 
 {{ printEntityCollectionAsList(phpEntities.filterByInterfaces(['\\BumbleDocGen\\Core\\Parser\\SourceLocator\\SourceLocatorInterface']).getOnlyInstantiable()) }}
 
 More static text...
 
```


Result after starting the documentation generation process:

```html
 <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/index.md">Technical description of the project</a> <b>/</b> Some page<hr> </embed>
 
 Some static text...
 
 Dynamic block:
 
 <embed> <ul><li><a href='/docs/tech/3.renderer/classes/DirectoriesSourceLocator.md'>DirectoriesSourceLocator</a> - Loads all files from the specified directory</li><li><a href='/docs/tech/3.renderer/classes/FileIteratorSourceLocator.md'>FileIteratorSourceLocator</a> - Loads all files using an iterator</li><li><a href='/docs/tech/3.renderer/classes/RecursiveDirectoriesSourceLocator.md'>RecursiveDirectoriesSourceLocator</a> - Loads all files from the specified directories, which are traversed recursively</li><li><a href='/docs/tech/3.renderer/classes/SingleFileSourceLocator.md'>SingleFileSourceLocator</a> - Loads one specific file by its path</li><li><a href='/docs/tech/3.renderer/classes/AsyncSourceLocator.md'>AsyncSourceLocator</a> - Lazy loading classes. Cannot be used for initial parsing of files, only for getting specific documents</li></ul> </embed>
 
 More static text...
 
 <div id='page_committer_info'>
 <hr>
 <b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Jul 29 17:43:49 2023 +0300<br><b>Page content update date:</b> Sun Jul 30 2023<br>Made with <a href='/docs/readme.md'>Bumble Documentation Generator</div>
 
```


This is how it looks on the GitHub:

<img src="/docs/assets/doc_example.png?raw=true">


<embed> <h3>3) Another example of a dynamic block:</h3> </embed>

Output method description as a dynamic block:

```twig
 Some static text...
 
 Dynamic block:
 
 {{ phpEntities
     .get('\\BumbleDocGen\\LanguageHandler\\LanguageHandlerInterface')
     .getMethod('getLanguageKey')
     .getDescription()
 }}
 
 More static text...
 
```


Result after starting the documentation generation process:



```twig
 Some static text...
 
 Dynamic block:
 
 Unique language handler key
 
 More static text...
 
```


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Mon Nov 20 23:05:39 2023 +0300<br><b>Page content update date:</b> Mon Dec 18 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>