[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Parser](readme.md) **/**
Source locators

---


# Source locators

Source locators are needed so that the parser knows which files to parse, or to get data on a specific file after the primary parsing procedure

Source locators are set in the configuration:

```yaml
source_locators:
  - class: \\BumbleDocGen\\Core\\Parser\\SourceLocator\\RecursiveDirectoriesSourceLocator
    arguments:
      directories:
        - "%project_root%/src"
        - "%project_root%/selfdoc"
```

You can create your own source locators or use any existing ones. All source locators must implement the [SourceLocatorInterface](classes/SourceLocatorInterface.md) interface.

## Built-in source locators

-  [DirectoriesSourceLocator](classes/DirectoriesSourceLocator.md) - Loads all files from the specified directory
-  [FileIteratorSourceLocator](classes/FileIteratorSourceLocator.md) - Loads all files using an iterator
-  [RecursiveDirectoriesSourceLocator](classes/RecursiveDirectoriesSourceLocator.md) - Loads all files from the specified directories, which are traversed recursively
-  [SingleFileSourceLocator](classes/SingleFileSourceLocator.md) - Loads one specific file by its path



---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)