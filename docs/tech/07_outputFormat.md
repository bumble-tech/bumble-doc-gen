<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Output formats<hr> </embed>

<embed> <h1>Output formats</h1> </embed>

At the moment, the documentation generator is focused on creating documentation in two formats: [GitHub Flavored Markdown](https://github.github.com/gfm/) and HTML.
However, it is possible to create other files with some restrictions.

1) Creating **GFM** documentation is possible both using a <a href="/docs/tech/05_console.md">console application</a> and using the <a href="/docs/tech/classes/DocGenerator.md#mgenerate">built-in commands</a> of the documentation generator.

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
        (new DocGeneratorFactory())->create($configFile)->generate()

        # Serve GFM documentation ( see {output_dir})
        (new DocGeneratorFactory())->create($configFile)->serve()
        ```

2) Creating **HTML** documentation is only possible through a <a href="/docs/tech/05_console.md">console application</a>. The [Daux.io](https://daux.io/) library is used to generate HTML pages.
    * Generate HTML doc by console command:
        ```bash
        # Generate static HTML files ( see {output_dir}/html)
        vendor/bin/bumbleDocGen generate --as-html

        # Serve HTML documentation (see generated content in browser)
        vendor/bin/bumbleDocGen serve --as-html
        ```
