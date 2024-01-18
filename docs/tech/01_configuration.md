[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
Configuration

---


# Configuration

Documentation generator configuration can be stored in special files.
They can be in different formats: <a href='https://yaml.org/'>yaml</a>, <a href='https://www.json.org/json-en.html'>json</a>, <a href='https://www.php.net/manual/en/language.types.array.php'>php arrays</a>, <a href='https://learn.microsoft.com/en-us/previous-versions/windows/desktop/ms717987(v=vs.85)'>ini</a>, <a href='https://www.w3.org/XML/'>xml</a>

But it is not necessary to use files to store the configuration; you can also initialize the documentation generator instance by passing there an array of configuration parameters (see <a href='https://github.com/bumble-tech/bumble-doc-gen/tree/master/demo'>demo-5</a>)

During the instance creation process, configuration data is loaded into [Configuration](/docs/tech/01_configuration.md) class, and the code works directly with it.

# Configuration file example

Let's look at an example of a real configuration in more detail:

```yaml
project_root: '%WORKING_DIR%'
templates_dir: '%project_root%/selfdoc/templates'
output_dir: "%project_root%/docs"
cache_dir: '%project_root%/.bumbleDocGenCache'
output_dir_base_url: "/docs"
language_handlers:
  php:
    class: \BumbleDocGen\LanguageHandler\Php\PhpHandler
    settings:
      file_source_base_url: 'https://github.com/bumble-tech/bumble-doc-gen/blob/master'
source_locators:
  - class: \BumbleDocGen\Core\Parser\SourceLocator\RecursiveDirectoriesSourceLocator
    arguments:
      directories:
        - "%project_root%/src"
        - "%project_root%/selfdoc"
twig_filters:
  - class: \SelfDocConfig\Twig\CustomFilter\EvalString
twig_functions:
  - class: \SelfDocConfig\Twig\CustomFunction\FindEntitiesClassesByCollectionClassName
  - class: \SelfDocConfig\Twig\CustomFunction\PrintClassCollectionAsGroupedTable
  - class: \SelfDocConfig\Twig\CustomFunction\GetConfigParametersDescription
  - class: \SelfDocConfig\Twig\CustomFunction\GetConsoleCommands
plugins:
  - class: \SelfDocConfig\Plugin\TwigFilterClassParser\TwigFilterClassParserPlugin
  - class: \SelfDocConfig\Plugin\TwigFunctionClassParser\TwigFunctionClassParserPlugin
  - class: \BumbleDocGen\Core\Plugin\CorePlugin\LastPageCommitter\LastPageCommitter

```

In this example, we see the real configuration of the self-documentation of this project.

**Here is an example of loading this configuration in PHP code:**

```php
// Single file
$docGenerator = (new DocGeneratorFactory())->create('config.yaml');

// Multiple files
$docGenerator = (new DocGeneratorFactory())->create('config.yaml', 'config2.yaml', 'config3.xml');

// Passing configuration as an array
$docGenerator = (new DocGeneratorFactory())->createByConfigArray($configArray);
```

## Handling and inheritance of configuration files

The documentation generator can work with several configuration files at once.
When processing configuration files, each subsequent file has a higher priority and overwrites the previously defined parameters, but if the parameter has not yet been defined before, it will be added.

Each default configuration file inherits the base configuration: `BumbleDocGen/Core/Configuration/defaultConfiguration.yaml`, but the parent configuration file can be changed using the `parent_configuration` parameter.
The inheritance algorithm is as follows: scalar types can be overwritten by each subsequent configuration, while arrays are supplemented with new data instead of overwriting.

## Configuration parameters

| Key | Type | Default value | Description |
|-|-|-|-|
| **`parent_configuration`** | string \| null | NULL | Path to parent configuration file |
| **`project_root`** | string | NULL | Path to the directory of the documented project (or part of the project) |
| **`templates_dir`** | string | NULL | Path to directory with documentation templates |
| **`output_dir`** | string | '%project_root%/docs' | Path to the directory where the finished documentation will be generated |
| **`cache_dir`** | string \| null | '%WORKING_DIR%/.bumbleDocGenCache' | Path to the directory where the documentation generator cache will be saved |
| **`output_dir_base_url`** | string | '/docs' | Basic part of url documentation. Used to form links in generated documents. |
| **`git_client_path`** | string | 'git' | Path to git client |
| **`render_with_front_matter`** | bool | false | Do not remove the front matter block from templates when creating documents |
| **`check_file_in_git_before_creating_doc`** | bool | true | Checking if a document exists in GIT before creating a document |
| **`page_link_processor`** | PageLinkProcessorInterface | [BasePageLinkProcessor](/docs/tech/classes/BasePageLinkProcessor.md) | Link handler class on documentation pages |
| **`language_handlers`** | array&lt;LanguageHandlerInterface&gt; | NULL | List of programming language handlers |
| **`source_locators`** | array&lt;SourceLocatorInterface&gt; | NULL | List of source locators |
| **`use_shared_cache`** | bool | true | Enable cache usage of generated documents |
| **`twig_functions`** | array&lt;CustomFunctionInterface&gt; | <ul><li>[DrawDocumentationMenu](/docs/tech/classes/DrawDocumentationMenu.md)</li><li>[DrawDocumentedEntityLink](/docs/tech/classes/DrawDocumentedEntityLink.md)</li><li>[GeneratePageBreadcrumbs](/docs/tech/classes/GeneratePageBreadcrumbs.md)</li><li>[GetDocumentedEntityUrl](/docs/tech/classes/GetDocumentedEntityUrl.md)</li><li>[LoadPluginsContent](/docs/tech/classes/LoadPluginsContent.md)</li><li>[PrintEntityCollectionAsList](/docs/tech/classes/PrintEntityCollectionAsList.md)</li><li>[GetDocumentationPageUrl](/docs/tech/classes/GetDocumentationPageUrl.md)</li><li>[FileGetContents](/docs/tech/classes/FileGetContents.md)</li></ul> | Functions that can be used in document templates |
| **`twig_filters`** | array&lt;CustomFilterInterface&gt; | <ul><li>[AddIndentFromLeft](/docs/tech/classes/AddIndentFromLeft.md)</li><li>[FixStrSize](/docs/tech/classes/FixStrSize.md)</li><li>[PrepareSourceLink](/docs/tech/classes/PrepareSourceLink.md)</li><li>[Quotemeta](/docs/tech/classes/Quotemeta.md)</li><li>[RemoveLineBrakes](/docs/tech/classes/RemoveLineBrakes.md)</li><li>[StrTypeToUrl](/docs/tech/classes/StrTypeToUrl.md)</li><li>[PregMatch](/docs/tech/classes/PregMatch.md)</li><li>[Implode](/docs/tech/classes/Implode.md)</li></ul> | Filters that can be used in document templates |
| **`plugins`** | array&lt;PluginInterface&gt; \| null | <ul><li>[PageHtmlLinkerPlugin](/docs/tech/classes/PageHtmlLinkerPlugin_2.md)</li><li>[PageLinkerPlugin](/docs/tech/classes/PageLinkerPlugin_2.md)</li></ul> | List of plugins |
| **`additional_console_commands`** | array&lt;Command&gt; | NULL | Additional console commands |



---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 17:19:08 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)