[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[How to create documentation templates?](/docs/tech/03_renderer/01_howToCreateTemplates/readme.md) **/**
Front Matter

---


# Front Matter

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
By default, this block is hidden from generated MD files, but it can be displayed by enabling the special option [render_with_front_matter](/docs/tech/03_renderer/01_howToCreateTemplates/classes/Configuration.md#mrenderwithfrontmatter) in the configuration

Some Front Matter block variables are used internally in our system, for example `title` and `prevPage` are used to generate [breadcrumbs](/docs/tech/03_renderer/02_breadcrumbs.md) and [documentation menus](/docs/tech/03_renderer/01_howToCreateTemplates/classes/DrawDocumentationMenu.md).

This block is also used when generating HTML documentation. You can learn about the variables used in this block when generating HTML content [in the documentation of the library](https://daux.io/Features/Front_Matter.html) that we use to create HTML pages.


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)