[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Parser](readme.md) **/**
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
The root collections ([RootEntityCollection](classes/RootEntityCollection.md)), which are directly accessible in your templates, are as follows:

| Collection class | Name in twig template | PL | Description |
|-|-|-|-|
| [PhpEntitiesCollection](classes/PhpEntitiesCollection.md) | **phpEntities** | PHP | Collection of php root entities |

## Available entities

Following is the list of available entities that are consistent with [EntityInterface](classes/EntityInterface.md) and can be created.
These classes are a convenient wrapper for accessing data in templates:

| Entity name | Collection name | Is root | PL | Description |
|-|-|-|-|-|
| [ClassEntity](classes/ClassEntity.md) | [PhpEntitiesCollection](classes/PhpEntitiesCollection.md) | yes | PHP | PHP Class |
| [EnumEntity](classes/EnumEntity.md) | [PhpEntitiesCollection](classes/PhpEntitiesCollection.md) | yes | PHP | Enumeration |
| [InterfaceEntity](classes/InterfaceEntity.md) | [PhpEntitiesCollection](classes/PhpEntitiesCollection.md) | yes | PHP | Object interface |
| [TraitEntity](classes/TraitEntity.md) | [PhpEntitiesCollection](classes/PhpEntitiesCollection.md) | yes | PHP | Trait |
| [ClassConstantEntity](classes/ClassConstantEntity.md) | [ClassConstantEntitiesCollection](classes/ClassConstantEntitiesCollection.md) | no | PHP | Class constant entity |
| [DynamicMethodEntity](classes/DynamicMethodEntity.md) | [MethodEntitiesCollection](classes/MethodEntitiesCollection.md) | no | PHP | Method obtained by parsing the &quot;method&quot; annotation |
| [MethodEntity](classes/MethodEntity.md) | [MethodEntitiesCollection](classes/MethodEntitiesCollection.md) | no | PHP | Class method entity |
| [PropertyEntity](classes/PropertyEntity.md) | [PropertyEntitiesCollection](classes/PropertyEntitiesCollection.md) | no | PHP | Class property entity |


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)