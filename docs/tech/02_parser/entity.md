[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
Entities and entities collections

---


# Entities and entities collections

Entities are organized outcomes from parsing source code.
They help easily extract details about specific items from templates, allowing users to quickly access and display the information they need.

Entities are always handled through collections. Collections are the result of the project parsing process and are available in both documentation templates and code.

## Examples of using collections in twig templates

* Passing a collection to a function:

```twig
{{ printEntityCollectionAsList(phpEntities) }}
```

* Filtering a collection and passing it to a function:

```twig
{{ printEntityCollectionAsList(phpEntities.filterByInterfaces(['BumbleDocGen\Core\Parser\Entity\EntityInterface'])) }}
```

* Saving a filtered collection to a variable:

```twig
{% set filteredCollection = phpEntities.getOnlyInstantiable() %}
```

* Using a collection in a for loop:

```twig
{% for someClassEntity in phpEntities %}
    * {{ someClassEntity.getName() }}
{% endfor %}
```

* Output of all methods of all found entities in `className::methodName()` format:

```twig
{% for someClassEntity in phpEntities %}
    {% for methodEntity in someClassEntity.getMethodEntitiesCollection() %}
        * {{ someClassEntity.getName() }}::{{ methodEntity.getName() }}()
    {% endfor %}
{% endfor %}
```

## Root entities collections

To further facilitate the handling of these entities, we utilize entity collections.
These collections not only group relevant entities together but also provide convenient methods for filtering and manipulating these entities.
The root collections ([a]RootEntityCollection[/a]), which are directly accessible in your templates, are as follows:

| Collection class | Name in twig template | PL | Description |
|-|-|-|-|
| <a href='/docs/tech/02_parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a> | **phpEntities** | PHP | Collection of php root entities |

## Available entities

Following is the list of available entities that are consistent with [a]EntityInterface[/a] and can be created.
These classes are a convenient wrapper for accessing data in templates:

| Entity name | Collection name | Is root | PL | Description |
|-|-|-|-|-|
| <a href='/docs/tech/02_parser/classes/ClassEntity.md'>ClassEntity</a> | <a href='/docs/tech/02_parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a> | yes | PHP | PHP Class |
| <a href='/docs/tech/02_parser/classes/EnumEntity.md'>EnumEntity</a> | <a href='/docs/tech/02_parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a> | yes | PHP | Enumeration |
| <a href='/docs/tech/02_parser/classes/InterfaceEntity.md'>InterfaceEntity</a> | <a href='/docs/tech/02_parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a> | yes | PHP | Object interface |
| <a href='/docs/tech/02_parser/classes/TraitEntity.md'>TraitEntity</a> | <a href='/docs/tech/02_parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a> | yes | PHP | Trait |
| <a href='/docs/tech/02_parser/classes/ClassConstantEntity.md'>ClassConstantEntity</a> | <a href='/docs/tech/02_parser/classes/ClassConstantEntitiesCollection.md'>ClassConstantEntitiesCollection</a> | no | PHP | Class constant entity |
| <a href='/docs/tech/02_parser/classes/DynamicMethodEntity.md'>DynamicMethodEntity</a> | <a href='/docs/tech/02_parser/classes/MethodEntitiesCollection.md'>MethodEntitiesCollection</a> | no | PHP | Method obtained by parsing the &quot;method&quot; annotation |
| <a href='/docs/tech/02_parser/classes/MethodEntity.md'>MethodEntity</a> | <a href='/docs/tech/02_parser/classes/MethodEntitiesCollection.md'>MethodEntitiesCollection</a> | no | PHP | Class method entity |
| <a href='/docs/tech/02_parser/classes/PropertyEntity.md'>PropertyEntity</a> | <a href='/docs/tech/02_parser/classes/PropertyEntitiesCollection.md'>PropertyEntitiesCollection</a> | no | PHP | Class property entity |


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 17:19:08 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)