[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
Output formats

---


# Output formats

At the moment, the documentation generator is focused on creating documentation in two formats: [GitHub Flavored Markdown](https://github.github.com/gfm/) and HTML.
However, it is possible to create other files with some restrictions.

1) Creating **GFM** documentation is possible both using a [console application](/docs/tech/05_console.md) and using the [built-in commands](/docs/tech/classes/DocGenerator.md#mgenerate) of the documentation generator.

    * Generate GFM doc by console command:
        ```bash
        # Generate GFM files ( see {output_dir})
        vendor/bin/bumbleDocGen generate

        # Serve GFM documentation ( see {output_dir})
        vendor/bin/bumbleDocGen serve
        ```
    * Generate GFM doc by docGen PHP API:
        ```php
        # Generate GFM files ( see {output_dir})
        (new DocGeneratorFactory())->create($configFile)->generate();

        # Serve GFM documentation ( see {output_dir})
        (new DocGeneratorFactory())->create($configFile)->serve();
        ```

2) Creating **HTML** documentation is only possible through a [console application](/docs/tech/05_console.md). The [Daux.io](https://daux.io/) library is used to generate HTML pages.
    * Generate HTML doc by console command:
        ```bash
        # Generate static HTML files ( see {output_dir}/html)
        vendor/bin/bumbleDocGen generate --as-html

        # Serve HTML documentation (see generated content in browser)
        vendor/bin/bumbleDocGen serve --as-html
        ```


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)