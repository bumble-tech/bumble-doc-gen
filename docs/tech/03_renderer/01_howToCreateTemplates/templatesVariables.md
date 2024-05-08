[BumbleDocGen](../../../README.md) **/**
[Technical description of the project](../../readme.md) **/**
[Renderer](../readme.md) **/**
[How to create documentation templates?](readme.md) **/**
Templates variables

---


# Templates variables

There are several variables available in each processed template.

1) Firstly, these are built-in twig variables, for example `_self`, which returns the path to the processed template.

2) Secondly, variables with collections of processed programming languages are available in the template (see [LanguageHandlerInterface](classes/LanguageHandlerInterface.md)). For example, when processing a PHP project collection, a collection [PhpEntitiesCollection](classes/PhpEntitiesCollection.md) will be available in the template under the name <b>phpEntities</b>

3) Thirdly, all variables specified in **Front Matter** are automatically converted into template variables and are available in it


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)