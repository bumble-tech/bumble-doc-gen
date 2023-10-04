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

- 🔍 <b><a href="/docs/tech/2.parser/readme.md">Parsing</a>:</b>
  BumbleDocGen scans your project by parsing PHP files, extracting comments, and providing detailed models of your code.

- ✍️ <b><a href="/docs/tech/3.renderer/readme.md">Rendering</a>:</b>
  BumbleDocGen generates markdown content using templates and fills them with data obtained from parsing your code.

- 🧠 <b>AI tools for documentation generation:</b>
  BumbleDocGen allows you to use a group of AI tools to help generate project documentation.

<embed> <h2>How to Use</h2> </embed>

<embed> <h3>Entry points</h3> </embed>

BumbleDocGen's interface consists of mainly two classes: <a href="/docs/classes/DocGenerator.md">DocGenerator</a> and <a href="/docs/classes/DocGeneratorFactory.md">DocGeneratorFactory</a>.

- <a href="/docs/classes/DocGenerator.md">DocGenerator</a> provides main operations for generating the documents.

  - `addMissingDocBlocks()`: This method creates missing docBlocks in your code.
  - `fillInReadmeMdTemplate()`: This method prepares the `README.md` file using a predefined template.
  - `generate()`: This method produces all necessary documentation.
  - `generateProjectTemplatesStructure()`: This method creates a structure for project templates.
  - `parseAndGetRootEntityCollectionsGroup()`: This method parses your project's files and collects information for the documentation.

- <a href="/docs/classes/DocGeneratorFactory.md">DocGeneratorFactory</a> provides a method for creating `DocGenerator` instance.

  - `create(configurationFiles: string)`: This method creates a `DocGenerator` instance using provided configuration files.
  - `setCustomConfigurationParameters(customConfigurationParameters: array)`: This method sets custom configuration parameters for the `DocGenerator` creation.

<embed> <h3>Examples of usage</h3> </embed>

1) Working with a library in a PHP file

```php
require_once 'vendor/autoload.php';

use BumbleDocGen\DocGeneratorFactory;

// Initialize the factory
$factory = new DocGeneratorFactory();

// Create a DocGenerator instance
$docgen = $factory->create('/path/to/configuration/files');

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
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sun Sep 10 17:47:00 2023 +0300<br><b>Page content update date:</b> Wed Oct 04 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>