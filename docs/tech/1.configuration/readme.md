<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Configuration files<hr> </embed>

<embed> <h1>Configuration</h1> </embed>

Documentation generator configuration can be stored in special files.
They can be in different formats: <a href='https://yaml.org/'>yaml</a>, <a href='https://www.json.org/json-en.html'>json</a>, <a href='https://www.php.net/manual/en/language.types.array.php'>php arrays</a>, <a href='https://learn.microsoft.com/en-us/previous-versions/windows/desktop/ms717987(v=vs.85)'>ini</a>, <a href='https://www.w3.org/XML/'>xml</a>

But it is not necessary to use files to store the configuration; you can also initialize the documentation generator instance by passing there an array of configuration parameters (see <a href='https://github.com/bumble-tech/bumble-doc-gen/tree/master/demo'>demo-5</a>)

During the instance creation process, configuration data is loaded into <a href="/docs/tech/1.configuration/classes/Configuration.md">Configuration</a> class, and the code works directly with it.

<embed> <h2>Configuration file example</h2> </embed>

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
       async_source_loading_enabled: true
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
 plugins:
   - class: \SelfDocConfig\Plugin\RoaveStubber\BetterReflectionStubberPlugin
   - class: \SelfDocConfig\Plugin\TwigFilterClassParser\TwigFilterClassParserPlugin
   - class: \SelfDocConfig\Plugin\TwigFunctionClassParser\TwigFunctionClassParserPlugin
 
```


In this example, we see the real configuration of the self-documentation of this project.

**Here is an example of loading this configuration in PHP code:**

```php
 // Single file
 $docGenerator = (new DocGeneratorFactory())->create('config.yaml');
 
 // Multiple files
 $docGenerator = (new DocGeneratorFactory())->create('config.yaml', 'config2.yaml', 'config3.xml');
 
```


<embed> <h2>Handling and inheritance of configuration files</h2> </embed>

The documentation generator can work with several configuration files at once.
When processing configuration files, each subsequent file has a higher priority and overwrites the previously defined parameters, but if the parameter has not yet been defined before, it will be added.

Each default configuration file inherits the base configuration: `BumbleDocGen/Core/Configuration/defaultConfiguration.yaml`, but the parent configuration file can be changed using the `parent_configuration` parameter.
The inheritance algorithm is as follows: scalar types can be overwritten by each subsequent configuration, while arrays are supplemented with new data instead of overwriting.

<embed> <h2>Configuration parameters</h2> </embed>


<table>
    <tr>
        <th>Key</th>
        <th>Type</th>
        <th>Default value</th>
        <th>Description</th>
    </tr>
    <tr>
        <td><b>parent_configuration</b></td>
        <td><i>string|null</i></td>
        <td>NULL</td>
        <td>Path to parent configuration file</td>
    </tr>
    <tr>
        <td><b>project_root</b></td>
        <td><i>string</i></td>
        <td>NULL</td>
        <td>Path to the directory of the documented project (or part of the project)</td>
    </tr>
    <tr>
        <td><b>templates_dir</b></td>
        <td><i>string</i></td>
        <td>NULL</td>
        <td>Path to directory with documentation templates</td>
    </tr>
    <tr>
        <td><b>output_dir</b></td>
        <td><i>string</i></td>
        <td>'%project_root%/docs'</td>
        <td>Path to the directory where the finished documentation will be generated</td>
    </tr>
    <tr>
        <td><b>cache_dir</b></td>
        <td><i>string|null</i></td>
        <td>'%WORKING_DIR%/.bumbleDocGenCache'</td>
        <td>Path to the directory where the documentation generator cache will be saved</td>
    </tr>
    <tr>
        <td><b>output_dir_base_url</b></td>
        <td><i>string</i></td>
        <td>'/docs'</td>
        <td>Basic part of url documentation. Used to form links in generated documents.</td>
    </tr>
    <tr>
        <td><b>git_client_path</b></td>
        <td><i>string</i></td>
        <td>'git'</td>
        <td>Path to git client</td>
    </tr>
    <tr>
        <td><b>check_file_in_git_before_creating_doc</b></td>
        <td><i>bool</i></td>
        <td>true</td>
        <td>Checking if a document exists in GIT before creating a document</td>
    </tr>
    <tr>
        <td><b>page_link_processor</b></td>
        <td><i>PageLinkProcessorInterface</i></td>
        <td><a href="/docs/tech/1.configuration/classes/BasePageLinkProcessor.md">BasePageLinkProcessor</a></td>
        <td>Link handler class on documentation pages</td>
    </tr>
    <tr>
        <td><b>language_handlers</b></td>
        <td><i>array&lt;LanguageHandlerInterface&gt;</i></td>
        <td>NULL</td>
        <td>List of programming language handlers</td>
    </tr>
    <tr>
        <td><b>source_locators</b></td>
        <td><i>array&lt;SourceLocatorInterface&gt;</i></td>
        <td>NULL</td>
        <td>List of source locators</td>
    </tr>
    <tr>
        <td><b>use_shared_cache</b></td>
        <td><i>bool</i></td>
        <td>true</td>
        <td>Enable cache usage of generated documents</td>
    </tr>
    <tr>
        <td><b>twig_functions</b></td>
        <td><i>array&lt;CustomFunctionInterface&gt;</i></td>
        <td>

- <a href="/docs/tech/1.configuration/classes/DrawDocumentationMenu.md">DrawDocumentationMenu</a>

- <a href="/docs/tech/1.configuration/classes/DrawDocumentedEntityLink.md">DrawDocumentedEntityLink</a>

- <a href="/docs/tech/1.configuration/classes/GeneratePageBreadcrumbs.md">GeneratePageBreadcrumbs</a>

- <a href="/docs/tech/1.configuration/classes/GetDocumentedEntityUrl.md">GetDocumentedEntityUrl</a>

- <a href="/docs/tech/1.configuration/classes/LoadPluginsContent.md">LoadPluginsContent</a>

- <a href="/docs/tech/1.configuration/classes/PrintEntityCollectionAsList.md">PrintEntityCollectionAsList</a>

- <a href="/docs/tech/1.configuration/classes/GetDocumentationPageUrl.md">GetDocumentationPageUrl</a>

- <a href="/docs/tech/1.configuration/classes/FileGetContents.md">FileGetContents</a>

</td>
        <td>Functions that can be used in document templates</td>
    </tr>
    <tr>
        <td><b>twig_filters</b></td>
        <td><i>array&lt;CustomFilterInterface&gt;</i></td>
        <td>

- <a href="/docs/tech/1.configuration/classes/AddIndentFromLeft.md">AddIndentFromLeft</a>

- <a href="/docs/tech/1.configuration/classes/FixStrSize.md">FixStrSize</a>

- <a href="/docs/tech/1.configuration/classes/PrepareSourceLink.md">PrepareSourceLink</a>

- <a href="/docs/tech/1.configuration/classes/Quotemeta.md">Quotemeta</a>

- <a href="/docs/tech/1.configuration/classes/RemoveLineBrakes.md">RemoveLineBrakes</a>

- <a href="/docs/tech/1.configuration/classes/StrTypeToUrl.md">StrTypeToUrl</a>

- <a href="/docs/tech/1.configuration/classes/TextToCodeBlock.md">TextToCodeBlock</a>

- <a href="/docs/tech/1.configuration/classes/TextToHeading.md">TextToHeading</a>

- <a href="/docs/tech/1.configuration/classes/PregMatch.md">PregMatch</a>

</td>
        <td>Filters that can be used in document templates</td>
    </tr>
    <tr>
        <td><b>plugins</b></td>
        <td><i>array&lt;PluginInterface&gt;|null</i></td>
        <td>

- <a href="/docs/tech/1.configuration/classes/PageHtmlLinkerPlugin.md">PageHtmlLinkerPlugin</a>

- <a href="/docs/tech/1.configuration/classes/LastPageCommitter.md">LastPageCommitter</a>

</td>
        <td>List of plugins</td>
    </tr>
    <tr>
        <td><b>additional_console_commands</b></td>
        <td><i>array&lt;Command&gt;</i></td>
        <td>NULL</td>
        <td>Additional console commands</td>
    </tr>
</table>


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Thu Oct 5 17:42:06 2023 +0300<br><b>Page content update date:</b> Thu Oct 05 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>