<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/templates.md">How to create documentation templates?</a> <b>/</b> Linking templates<hr> </embed>

<embed> <h1>Linking templates</h1> </embed>

One of the main requirements of the documentation is to be able to easily and quickly implement linking between pages.
We have several options for this, such as using special functions or using a special document linking mechanism (`completing blank links`)

<embed> <h2>Completing blank links</h2> </embed>

Plugin <a href="/docs/tech/3.renderer/classes/PageHtmlLinkerPlugin.md">PageHtmlLinkerPlugin</a> have been added to the basic configuration,
which process the text of the filled template before its result is written to a file, and fill in all empty links.

For example, an empty link:

<pre>&lt;a&gt;Existent page name&lt;/a&gt;</pre>

will be replaced with this link:

<pre>&lt;a href=&quot;/docs/some/page/targetPage.md&quot;&gt;Existent page name&lt;/a&gt;</pre>

<embed> <h2>Generating links through functions</h2> </embed>

The second way to relink templates is to generate links through functions.

There are a number of functions that allow you to get a link to an entity, for example <a href="/docs/tech/3.renderer/classes/GetDocumentedEntityUrl_2.md">GetDocumentedEntityUrl</a>, and there are also functions for getting a link to other documents, for example <a href="/docs/tech/3.renderer/classes/GetDocumentationPageUrl_2.md">GetDocumentationPageUrl</a>.
You can also implement your own functions for relinking if necessary.

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Sep 2 21:01:47 2023 +0300<br><b>Page content update date:</b> Thu Oct 05 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>