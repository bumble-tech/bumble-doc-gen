<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Debug documents<hr> </embed>

<embed> <h1>Debug documents</h1> </embed>

Our tool provides several options for debugging documentation.

1) Firstly, after each generation of documents, you can make sure that the linking of documents was normal and no problems arose: after completing the documentation generation process, we display a list of all errors that occurred in the console:

    **Here is an example of error output:**

    <img src="/docs/assets/error_example.png?raw=true">

2) To track exactly how documentation is generated, you can use the interactive mode:

   `vendor/bin/bumbleDocGen serve` - So that the generated documentation changes automatically with changes in templates

   **or**

   `vendor/bin/bumbleDocGen serve --as-html` - So that the generated documentation changes automatically with changes in templates and is displayed as HTML on the local development server
3) Logs are saved to a special file `last_run.log` which is located in the working directory


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Fri Jan 12 01:11:04 2024 +0300<br><b>Page content update date:</b> Mon Jan 15 2024<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>