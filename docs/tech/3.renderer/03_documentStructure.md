<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> Document structure of generated entities<hr> </embed>

<embed> <h1>Document structure of generated entities</h1> </embed>

*By default, the documentation generator offers two options for organizing the structure of generated entity documents:*

1) The standard structure is an entity document next to a parent document. If the document template contained
a link to the entity documentation, during the documentation generation process we created a classes directory
in the same directory where the parent document was located, and inside this classes directory we created an entity document.

2) All entity documents are located in a separate directory with the structure of the entire documented project. **At the moment this is only available for PHP projects**

To enable the second option, you need to connect the built-in plugin:
```yaml
plugins:
  - class: \BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\EntityDocUnifiedPlace\EntityDocUnifiedPlacePlugin
```


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Oct 13 18:40:45 2023 +0300<br><b>Page content update date:</b> Mon Dec 18 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>