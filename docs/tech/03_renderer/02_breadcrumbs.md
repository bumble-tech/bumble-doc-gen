[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
Documentation structure and breadcrumbs

---


# Documentation structure and breadcrumbs

To work with breadcrumbs and get the structure of the documentation, we use the inner class [BreadcrumbsHelper](/docs/tech/03_renderer/classes/BreadcrumbsHelper.md).
To build the documentation structure, twig templates from the `templates_dir` configuration are used.

## Project structure definitions

To determine the structure of the project, the actual location of the files in the templates directory is used first of all.
For each directory there is an index file ( <b>readme.md</b> or <b>index.md</b> ), and they are used to determine the exact input of each level of nesting.

<img src="/docs/assets/doc_structure.png?raw=true">

But in addition to building the documentation structure using the actual location of template files in directories,
you can explicitly specify the parent page in each template using the special front matter variable `prevPage`:

```markdown
---
prevPage: Prev page name
---
```

In this way, complex documentation structures can be created with less file nesting:

<img src="/docs/assets/doc_structure2.png?raw=true">

## Displaying breadcrumbs in documents

There is a built-in function to generate breadcrumbs in templates [GeneratePageBreadcrumbs](/docs/tech/03_renderer/classes/GeneratePageBreadcrumbs_2.md).
Here is how it is used in twig templates:

```twig
{{ generatePageBreadcrumbs(title, _self) }}
```

To build breadcrumbs, the previously compiled project structure and the names of each template are used.
The template name can be specified using the `title` front matter variable:

```markdown
---
title: Some page title
---
```

Here is an example of the result of the `generatePageBreadcrumbs` function:

```twig
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/index.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/index.md">Renderer</a> <b>/</b> Some page title <hr> </embed>
```


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)