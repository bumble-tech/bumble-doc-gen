[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
Console app

---


# Console app

The documentation generator provides the ability to work through a built-in [console application](/docs/tech/classes/App.md).
It is available via composer:
```console
vendor/bin/bumbleDocGen list
```

We use [Symfony Console](https://github.com/symfony/console) as the basis of the console application.

## Built-in console commands

| Command | Parameters | Description |
|-|-|-|
| [help](https://github.com/symfony/console/blob/master/Command/HelpCommand.php) | [--format FORMAT]<br>[--raw]<br>[&lt;command_name&gt;] | Display help for a command |
| [list](https://github.com/symfony/console/blob/master/Command/ListCommand.php) | [--raw]<br>[--format FORMAT]<br>[--short]<br>[&lt;namespace&gt;] | List commands |
| [generate](/docs/tech/classes/GenerateCommand.md) | [--as-html]<br>[--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--output_dir [OUTPUT_DIR]]<br>[--cache_dir [CACHE_DIR]]<br>[--use_shared_cache [USE_SHARED_CACHE]] | Generate documentation |
| [serve](/docs/tech/classes/ServeCommand.md) | [--as-html]<br>[--dev-server-host [DEV-SERVER-HOST]]<br>[--dev-server-port [DEV-SERVER-PORT]]<br>[--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--use_shared_cache [USE_SHARED_CACHE]] | Serve documentation |
| [ai:generate-readme-template](/docs/tech/classes/GenerateReadMeTemplateCommand.md) | [--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--cache_dir [CACHE_DIR]]<br>[--ai_provider [AI_PROVIDER]]<br>[--ai_api_key [AI_API_KEY]]<br>[--ai_model [AI_MODEL]] | Leverage AI to generate content for a project readme.md file. |
| [ai:add-doc-blocks](/docs/tech/classes/AddDocBlocksCommand.md) | [--project_root [PROJECT_ROOT]]<br>[--templates_dir [TEMPLATES_DIR]]<br>[--cache_dir [CACHE_DIR]]<br>[--ai_provider [AI_PROVIDER]]<br>[--ai_api_key [AI_API_KEY]]<br>[--ai_model [AI_MODEL]] | Leverage AI to insert missing doc blocks in code. |
| [configuration](/docs/tech/classes/ConfigurationCommand.md) | [&lt;key&gt;] | Display list of configured plugins, programming language handlers, etc |

## Adding a custom command

The system allows you to add custom commands to a standard console application.
This can be done using a special configuration option [additional_console_commands](/docs/tech/classes/Configuration.md#mgetadditionalconsolecommands) (see [Configuration](/docs/tech/01_configuration.md) page).

After adding a new command to the configuration, it will be available in the application. Each added command must inherit the `\Symfony\Component\Console\Command\Command` class

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 17:19:08 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)