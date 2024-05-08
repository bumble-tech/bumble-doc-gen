<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/03_renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/03_renderer/01_howToCreateTemplates/readme.md">How to create documentation templates?</a> <b>/</b> Front Matter<hr> </embed>

<embed> <h1>Front Matter</h1> </embed>

Front Matter is a special block at the top of a document template or generated document that contains certain important meta information.

This block must be located strictly at the top of the template, its beginning and end are indicated by a combination of symbols `---`:

```twig
---
title: Front Matter
prevPage: How to create documentation templates?
someVariable: 123
---

some template content ...
```

The content of this block must be in YAML format.
During the template generation process, this block is parsed, and all values become available in the form of twig variables.
By default, this block is hidden from generated MD files, but it can be displayed by enabling the special option <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/Configuration.md#mrenderwithfrontmatter">render_with_front_matter</a> in the configuration

Some Front Matter block variables are used internally in our system, for example `title` and `prevPage` are used to generate <a href="/docs/tech/03_renderer/02_breadcrumbs.md">breadcrumbs</a> and <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/DrawDocumentationMenu.md">documentation menus</a>.

This block is also used when generating HTML documentation. You can learn about the variables used in this block when generating HTML content [in the documentation of the library](https://daux.io/Features/Front_Matter.html) that we use to create HTML pages.


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Jan 12 18:53:16 2024 +0300<br><b>Page content update date:</b> Mon Jan 15 2024<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>