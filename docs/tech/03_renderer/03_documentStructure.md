[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
Document structure of generated entities

---


# Document structure of generated entities

*By default, the documentation generator offers two options for organizing the structure of generated entity documents:*

1) The standard structure is an entity document next to a parent document. If the document template contained
a link to the entity documentation, during the documentation generation process we created a classes directory
in the same directory where the parent document was located, and inside this classes directory we created an entity document.

2) All entity documents are located in a separate directory with the structure of the entire documented project. **At the moment this is only available for PHP projects**

To enable the second option, you need to connect the built-in plugin:
```yaml
plugins:
  - class: \BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\EntityDocUnifiedPlace\EntityDocUnifiedPlacePlugin
```


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)