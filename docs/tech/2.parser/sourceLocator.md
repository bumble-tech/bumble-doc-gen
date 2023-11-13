<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> Source locators<hr> </embed>

<embed> <h1>Source locators</h1> </embed>

Source locators are needed so that the parser knows which files to parse, or to get data on a specific file after the primary parsing procedure

Source locators are set in the configuration:

```yaml
 source_locators:
   - class: \BumbleDocGen\Core\Parser\SourceLocator\RecursiveDirectoriesSourceLocator
     arguments:
       directories:
         - "%project_root%/src"
         - "%project_root%/selfdoc"
```


You can create your own source locators or use any existing ones. All source locators must implement the <a href="/docs/tech/2.parser/classes/SourceLocatorInterface.md">SourceLocatorInterface</a> interface.

<embed> <h2>Built-in source locators</h2> </embed>

<embed> <ul><li><a href='/docs/tech/2.parser/classes/DirectoriesSourceLocator.md'>DirectoriesSourceLocator</a> - Loads all files from the specified directory</li><li><a href='/docs/tech/2.parser/classes/FileIteratorSourceLocator.md'>FileIteratorSourceLocator</a> - Loads all files using an iterator</li><li><a href='/docs/tech/2.parser/classes/RecursiveDirectoriesSourceLocator.md'>RecursiveDirectoriesSourceLocator</a> - Loads all files from the specified directories, which are traversed recursively</li><li><a href='/docs/tech/2.parser/classes/SingleFileSourceLocator.md'>SingleFileSourceLocator</a> - Loads one specific file by its path</li></ul> </embed>


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Tue Nov 14 00:49:39 2023 +0300<br><b>Page content update date:</b> Mon Nov 13 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>