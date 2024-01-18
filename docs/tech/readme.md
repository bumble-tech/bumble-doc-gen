[BumbleDocGen](/docs/README.md) **/**
Technical description of the project

---


# Technical description of the project

This documentation generator is a library that allows you to create handwritten documentation with dynamic blocks that are loaded from the project code or other places.

## Documentation sections


- [Configuration](/docs/tech/01_configuration.md)
- [Parser](/docs/tech/02_parser/readme.md)
- [Renderer](/docs/tech/03_renderer/readme.md)
- [Plugin system](/docs/tech/04_pluginSystem.md)
- [Console app](/docs/tech/05_console.md)
- [Debug documents](/docs/tech/06_debugging.md)
- [Output formats](/docs/tech/07_outputFormat.md)

## How it works

```mermaid
 graph TD;
    A(1. User wants to document the project)
    B(2. Creates and fills documentation configuration file)
    C(3. Creates templates for future documentation)
    D(4. Generates documentation based on templates)

    A --> B
    B --> C
    C --> D

    note1[Note: Documentation is placed next to the code according to settings]
    D --> note1
```

To start the documentation generation process, you need to call the following command:

```php
(new DocGeneratorFactory())->create($configFile)->generate();
```

or

```php
(new DocGeneratorFactory())->createByConfigArray($configArray)->generate();
```

After that, the process of parsing the project code according to the configuration will start, and then filling the templates with data and saving the finished result as final documents.


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)