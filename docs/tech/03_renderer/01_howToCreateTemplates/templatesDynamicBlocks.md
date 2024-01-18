[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Renderer](/docs/tech/03_renderer/readme.md) **/**
[How to create documentation templates?](/docs/tech/03_renderer/01_howToCreateTemplates/readme.md) **/**
Templates dynamic blocks

---


# Templates dynamic blocks

There are several ways to create dynamic blocks in templates.

* First of all, these are custom twig <a href='/docs/tech/03_renderer/05_twigCustomFunctions.md'>functions</a> and <a href='/docs/tech/03_renderer/04_twigCustomFilters.md'>filters</a>.
You can use the built-in functions and filters or add your own, so you can implement any logic for generating dynamically changing content.

```twig
{{ printEntityCollectionAsList(phpEntities.filterByInterfaces(['\\BumbleDocGen\\Core\\Parser\\SourceLocator\\SourceLocatorInterface']).getOnlyInstantiable()) }}
```

* The second way is to output data from <a href='/docs/tech/03_renderer/01_howToCreateTemplates/templatesVariables.md'>variables</a> directly to the template. For example, you can display a list of classes or methods of documented code according to certain rules.

```twig
{% for entity in phpEntities.filterByInterfaces(['\\BumbleDocGen\\Core\\Parser\\SourceLocator\\SourceLocatorInterface']).getOnlyInstantiable() %}
    * {{ entity.getName() }}
{% endfor %}
```



---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)