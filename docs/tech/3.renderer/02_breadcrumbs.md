<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> Documentation structure and breadcrumbs<hr> </embed>

<embed> <h1>Documentation structure and breadcrumbs</h1> </embed>

To work with breadcrumbs and get the structure of the documentation, we use the inner class <a href="/docs/tech/3.renderer/classes/BreadcrumbsHelper.md">BreadcrumbsHelper</a>.
To build the documentation structure, twig templates from the `templates_dir` configuration are used.

<embed> <h2>Project structure definitions</h2> </embed>

To determine the structure of the project, the actual location of the files in the templates directory is used first of all.
For each directory there is an index file ( <b>readme.md</b> or <b>index.md</b> ), and they are used to determine the exact input of each level of nesting.

<img src="/docs/assets/doc_structure.png?raw=true">

But in addition to building the documentation structure using the actual location of template files in directories,
you can explicitly specify the parent page in each template using the special variable `prevPage`:

```twig
 {% set prevPage = 'Prev page name' %}
```


In this way, complex documentation structures can be created with less file nesting:

<img src="/docs/assets/doc_structure2.png?raw=true">

<embed> <h2>Displaying breadcrumbs in documents</h2> </embed>

There is a built-in function to generate breadcrumbs in templates <a href="/docs/tech/3.renderer/classes/GeneratePageBreadcrumbs_2.md">GeneratePageBreadcrumbs</a>.
Here is how it is used in twig templates:

```twig
 {{ generatePageBreadcrumbs(title, _self) }}
```


To build breadcrumbs, the previously compiled project structure and the names of each template are used.
The template name can be specified using the `title` variable:

```twig
 {% set title = 'Some page title' %}
```


Here is an example of the result of the `generatePageBreadcrumbs` function:

```twig
 <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/index.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/index.md">Renderer</a> <b>/</b> Documentation structure and breadcrumbs<hr> </embed>
```


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Oct 13 18:40:45 2023 +0300<br><b>Page content update date:</b> Fri Oct 13 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>