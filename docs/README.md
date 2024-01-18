# BumbleDocGen: A Documentation Generator for PHP projects 🐝

**BumbleDocGen** is a robust library for generating and maintaining documentation next to the code of large and small PHP projects.

This tool analyzes your codebase and produces a comprehensive set of Markdown documents, including descriptions of classes, methods, and properties alongside navigable internal links.

## Installation

Add the BumbleDocGen to the `composer.json` file of your project using the following command:

```console
composer require bumble-tech/bumble-doc-gen
```

## Detailed technical description

💡 Please refer to the [Description of the technical part of the project](/docs/tech/readme.md) for a detailed explanation of all the classes and methods used.

## Core Features

1. 🔍 **[Parsing](/docs/tech/02_parser/readme.md):**
  BumbleDocGen analyzes your code and provides a convenient [Reflection API](/docs/tech/02_parser/reflectionApi/readme.md).

2. ✍️ **[Rendering](/docs/tech/03_renderer/readme.md):**
  BumbleDocGen generates markdown content using templates and fills them with data obtained from parsing your code.

3. 🧠 **AI tools for documentation generation:**
  BumbleDocGen allows you to use a group of AI tools to help generate project documentation.

## How to Use

### Entry points

BumbleDocGen's interface consists of mainly two classes: [DocGenerator](/docs/classes/DocGenerator.md) and [DocGeneratorFactory](/docs/classes/DocGeneratorFactory.md).

- [DocGenerator](/docs/classes/DocGenerator.md) provides main operations for generating the documents.

    - [addDocBlocks()](/docs/classes/DocGenerator.md#madddocblocks): Generate missing docBlocks with LLM for project class methods that are available for documentation
    - [generate()](/docs/classes/DocGenerator.md#mgenerate): Generates documentation using configuration
    - [generateReadmeTemplate()](/docs/classes/DocGenerator.md#mgeneratereadmetemplate): Creates a `README.md` template filled with basic information using LLM
    - [serve()](/docs/classes/DocGenerator.md#mserve): Serve documentation

- [DocGeneratorFactory](/docs/classes/DocGeneratorFactory.md) provides a method for creating `DocGenerator` instance.

    - [create()](/docs/classes/DocGeneratorFactory.md#mcreate): Creates a documentation generator instance using configuration files
    - [createByConfigArray()](/docs/classes/DocGeneratorFactory.md#mcreatebyconfigarray): Creates a documentation generator instance using an array containing the configuration
    - [createConfiguration()](/docs/classes/DocGeneratorFactory.md#mcreateconfiguration): Creating a project configuration instance
    - [createRootEntitiesCollection()](/docs/classes/DocGeneratorFactory.md#mcreaterootentitiescollection): Creating a collection of entities (see `ReflectionAPI`)

### Examples of usage

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


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)