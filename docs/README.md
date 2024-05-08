<embed> <h1>BumbleDocGen: A Documentation Generator for PHP projects 🐝</h1> </embed>

<b>BumbleDocGen</b> is a robust library for generating and maintaining documentation next to the code of large and small PHP projects.

This tool analyzes your codebase and produces a comprehensive set of Markdown documents, including descriptions of classes, methods, and properties alongside navigable internal links.

<embed> <h2>Installation</h2> </embed>

Add the BumbleDocGen to the `composer.json` file of your project using the following command:

```console
 composer require bumble-tech/bumble-doc-gen
```


<embed> <h2>Detailed technical description</h2> </embed>

💡 Please refer to the <a href="/docs/tech/readme.md">Description of the technical part of the project</a> for a detailed explanation of all the classes and methods used.

<embed> <h2>Core Features</h2> </embed>

- 🔍 <b><a href="/docs/tech/02_parser/readme.md">Parsing</a>:</b>
  BumbleDocGen analyzes your code and provides a convenient <a href="/docs/tech/02_parser/reflectionApi/readme.md">Reflection API</a>.

- ✍️ <b><a href="/docs/tech/03_renderer/readme.md">Rendering</a>:</b>
  BumbleDocGen generates markdown content using templates and fills them with data obtained from parsing your code.

- 🧠 <b>AI tools for documentation generation:</b>
  BumbleDocGen allows you to use a group of AI tools to help generate project documentation.

<embed> <h2>How to Use</h2> </embed>

<embed> <h3>Entry points</h3> </embed>

BumbleDocGen's interface consists of mainly two classes: <a href="/docs/classes/DocGenerator.md">DocGenerator</a> and <a href="/docs/classes/DocGeneratorFactory.md">DocGeneratorFactory</a>.

- <a href="/docs/classes/DocGenerator.md">DocGenerator</a> provides main operations for generating the documents.

    - [addDocBlocks()](/docs/classes/DocGenerator.md#madddocblocks): Generate missing docBlocks with LLM for project class methods that are available for documentation
    - [generate()](/docs/classes/DocGenerator.md#mgenerate): Generates documentation using configuration
    - [generateReadmeTemplate()](/docs/classes/DocGenerator.md#mgeneratereadmetemplate): Creates a `README.md` template filled with basic information using LLM
    - [serve()](/docs/classes/DocGenerator.md#mserve): Serve documentation

- <a href="/docs/classes/DocGeneratorFactory.md">DocGeneratorFactory</a> provides a method for creating `DocGenerator` instance.

    - [create()](/docs/classes/DocGeneratorFactory.md#mcreate): Creates a documentation generator instance using configuration files
    - [createByConfigArray()](/docs/classes/DocGeneratorFactory.md#mcreatebyconfigarray): Creates a documentation generator instance using an array containing the configuration
    - [createConfiguration()](/docs/classes/DocGeneratorFactory.md#mcreateconfiguration): Creating a project configuration instance
    - [createRootEntitiesCollection()](/docs/classes/DocGeneratorFactory.md#mcreaterootentitiescollection): Creating a collection of entities (see `ReflectionAPI`)

<embed> <h3>Examples of usage</h3> </embed>

1) Working with a library in a PHP file

```php
require_once 'vendor/autoload.php';

use BumbleDocGen\DocGeneratorFactory;

// Initialize the factory
$factory = new DocGeneratorFactory();

// Create a DocGenerator instance
$docgen = $factory->create('/path/to/configuration/files');

// or $docgen = $factory->createByConfigArray([...]);

// Now call the desired operation
$docgen->generate();
```

2) Working with the library through a console application

```bash
# List of available commands
./vendor/bin/bumbleDocGen list

# Documentation generation example
./vendor/bin/bumbleDocGen generate -c <path to config file>

# Getting detailed information about a command
./vendor/bin/bumbleDocGen generate -h
```

------------------

**This documentation was generated using the Bumble Documentation Generator, and is an example of how it works.**

To update this documentation, run the following command:

```console
 ./bin/bumbleDocGen generate
```



<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Dec 23 23:00:37 2023 +0300<br><b>Page content update date:</b> Mon Jan 15 2024<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>