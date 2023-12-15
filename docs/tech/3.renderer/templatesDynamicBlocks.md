<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/01_templates.md">How to create documentation templates?</a> <b>/</b> Templates dynamic blocks<hr> </embed>

<embed> <h1>Templates dynamic blocks</h1> </embed>

There are several ways to create dynamic blocks in templates.

* First of all, these are custom twig <a href='/docs/tech/3.renderer/05_twigCustomFunctions.md'>functions</a> and <a href='/docs/tech/3.renderer/04_twigCustomFilters.md'>filters</a>.
You can use the built-in functions and filters or add your own, so you can implement any logic for generating dynamically changing content.

```twig
 {{ printEntityCollectionAsList(phpEntities.filterByInterfaces(['\\BumbleDocGen\\Core\\Parser\\SourceLocator\\SourceLocatorInterface']).getOnlyInstantiable()) }}
```


* The second way is to output data from <a href='/docs/tech/3.renderer/templatesVariables.md'>variables</a> directly to the template. For example, you can display a list of classes or methods of documented code according to certain rules.

```twig
 {% for entity in phpEntities.filterByInterfaces(['\\BumbleDocGen\\Core\\Parser\\SourceLocator\\SourceLocatorInterface']).getOnlyInstantiable() %}
     * {{ entity.getName() }}
 {% endfor %}
 
```




<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Mon Nov 20 19:18:48 2023 +0300<br><b>Page content update date:</b> Fri Dec 15 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>