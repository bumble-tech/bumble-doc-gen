<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/templates.md">How to create documentation templates?</a> <b>/</b> Templates variables<hr> </embed>

<embed> <h1>Templates variables</h1> </embed>

There are several variables available in each processed template.

1) Firstly, these are built-in twig variables, for example `_self`, which returns the path to the processed template.

2) Secondly, variables with collections of processed programming languages are available in the template (see <a href="/docs/tech/3.renderer/classes/LanguageHandlerInterface.md">LanguageHandlerInterface</a>). For example, when processing a PHP project collection, a collection <a href="/docs/tech/3.renderer/classes/ClassEntityCollection_2.md">ClassEntityCollection</a> will be available in the template under the name <b>phpClassEntityCollection</b>


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Sep 2 21:01:47 2023 +0300<br><b>Page content update date:</b> Sat Sep 02 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/readme.md'>Bumble Documentation Generator</div>