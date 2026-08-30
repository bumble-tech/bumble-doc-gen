<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Console app<hr> </embed>

<embed> <h1>Console app</h1> </embed>

The documentation generator provides the ability to work through a built-in <a href="/docs/tech/classes/App.md">console application</a>.
It is available via composer:
```console
vendor/bin/bumbleDocGen list
```

We use [Symfony Console](https://github.com/symfony/console) as the basis of the console application.

<embed> <h2>Built-in console commands</h2> </embed>

<table>
    <tr>
        <th>Command</th>
        <th>Parameters</th>
        <th>Description</th>
    </tr>
    <tr>
        <td><a href="https://github.com/symfony/console/blob/master/Command/HelpCommand.php">help</a></td>
        <td>[--format FORMAT]<br>[--raw]<br>[&lt;command_name&gt;]</td>
        <td>Display help for a command</td>
    </tr>
    <tr>
        <td><a href="https://github.com/symfony/console/blob/master/Command/ListCommand.php">list</a></td>
        <td>[--raw]<br>[--format FORMAT]<br>[--short]<br>[&lt;namespace&gt;]</td>
        <td>List commands</td>
    </tr>
    <tr>
        <td><a href="/docs/tech/classes/GenerateCommand.md">generate</a></td>
        <td>[--as-html]<br>[--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--output_dir [OUTPUT_DIR]]<br>[--cache_dir [CACHE_DIR]]<br>[--use_shared_cache [USE_SHARED_CACHE]]</td>
        <td>Generate documentation</td>
    </tr>
    <tr>
        <td><a href="/docs/tech/classes/ServeCommand.md">serve</a></td>
        <td>[--as-html]<br>[--dev-server-host [DEV-SERVER-HOST]]<br>[--dev-server-port [DEV-SERVER-PORT]]<br>[--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--use_shared_cache [USE_SHARED_CACHE]]</td>
        <td>Serve documentation</td>
    </tr>
    <tr>
        <td><a href="/docs/tech/classes/GenerateReadMeTemplateCommand.md">ai:generate-readme-template</a></td>
        <td>[--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--cache_dir [CACHE_DIR]]<br>[--ai_provider [AI_PROVIDER]]<br>[--ai_api_key [AI_API_KEY]]<br>[--ai_model [AI_MODEL]]</td>
        <td>Leverage AI to generate content for a project readme.md file.</td>
    </tr>
    <tr>
        <td><a href="/docs/tech/classes/AddDocBlocksCommand.md">ai:add-doc-blocks</a></td>
        <td>[--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--cache_dir [CACHE_DIR]]<br>[--ai_provider [AI_PROVIDER]]<br>[--ai_api_key [AI_API_KEY]]<br>[--ai_model [AI_MODEL]]</td>
        <td>Leverage AI to insert missing doc blocks in code.</td>
    </tr>
    <tr>
        <td><a href="/docs/tech/classes/ConfigurationCommand.md">configuration</a></td>
        <td>[&lt;key&gt;]</td>
        <td>Display list of configured plugins, programming language handlers, etc</td>
    </tr>
</table>

<embed> <h2>Adding a custom command</h2> </embed>

The system allows you to add custom commands to a standard console application.
This can be done using a special configuration option <a href="/docs/tech/classes/Configuration.md#mgetadditionalconsolecommands">additional_console_commands</a> (see <a href="/docs/tech/01_configuration.md">Configuration</a> page).

After adding a new command to the configuration, it will be available in the application. Each added command must inherit the `\Symfony\Component\Console\Command\Command` class

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Thu Jan 11 13:50:48 2024 +0300<br><b>Page content update date:</b> Mon Jan 15 2024<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>