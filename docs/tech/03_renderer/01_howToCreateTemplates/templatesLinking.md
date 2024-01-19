[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[How to create documentation templates?](readme.md) **/**
Linking templates

---


# Linking templates

One of the main requirements of the documentation is to be able to easily and quickly implement linking between pages.
We have several options for this, such as using special functions or using a special document linking mechanism (`completing blank links`)

## Completing blank links

Plugin [PageHtmlLinkerPlugin](classes/PageHtmlLinkerPlugin.md) have been added to the basic configuration,
which process the text of the filled template before its result is written to a file, and fill in all empty links.

For example, an empty link:

<pre>&lt;a&gt;Existent page name&lt;/a&gt;</pre>

will be replaced with this link:

<pre>&lt;a href=&quot;/docs/some/page/targetPage.md&quot;&gt;Existent page name&lt;/a&gt;</pre>

Sometimes the use of standard empty links is not entirely obvious or has insufficient capabilities. For example, in standard empty links it is not obvious which link text will be used in the end.

To fix this, we implemented a special mechanism with link tags: <pre>&#91;a&#93;&#91;/a&#93;</pre>

Examples:

<pre>&#91;a&#93;Existent page name&#91;/a&#93; <b>=></b> &lt;a href=&quot;/docs/some/page/targetPage.md&quot;&gt;Existent page name&lt;/a&gt;</pre>

<pre>&#91;a x-title="test"&#93;Existent page name&#91;/a&#93; <b>=></b> &lt;a href=&quot;/docs/some/page/targetPage.md&quot;&gt;test&lt;/a&gt;</pre>


## Generating links through functions

The second way to relink templates is to generate links through functions.

There are a number of functions that allow you to get a link to an entity, for example [GetDocumentedEntityUrl](classes/GetDocumentedEntityUrl.md), and there are also functions for getting a link to other documents, for example [GetDocumentationPageUrl](classes/GetDocumentationPageUrl.md).
You can also implement your own functions for relinking if necessary.

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)