[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
[Reflection API](/docs/tech/02_parser/reflectionApi/readme.md) **/**
[Reflection API for PHP](/docs/tech/02_parser/reflectionApi/php/readme.md) **/**
PHP entities collection

---


# PHP entities collection

**PHP entities collection API methods:**

- [add()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#madd): Add an entity to the collection
- [filterByInterfaces()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mfilterbyinterfaces): Get a copy of the current collection only with entities filtered by interfaces names (filtering is only available for ClassLikeEntity)
- [filterByNameRegularExpression()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mfilterbynameregularexpression): Get a copy of the current collection with only entities whose names match the regular expression
- [filterByParentClassNames()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mfilterbyparentclassnames): Get a copy of the current collection only with entities filtered by parent classes names (filtering is only available for ClassLikeEntity)
- [filterByPaths()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mfilterbypaths): Get a copy of the current collection only with entities filtered by file paths (from project_root)
- [findEntity()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mfindentity): Find an entity in a collection
- [get()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mget): Get an entity from a collection (only previously added)
- [getEntityCollectionName()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mgetentitycollectionname): Get collection name
- [getLoadedOrCreateNew()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mgetloadedorcreatenew): Get an entity from the collection or create a new one if it has not yet been added
- [getOnlyAbstractClasses()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mgetonlyabstractclasses): Get a copy of the current collection with only abstract classes
- [getOnlyInstantiable()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mgetonlyinstantiable): Get a copy of the current collection with only instantiable entities
- [getOnlyInterfaces()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mgetonlyinterfaces): Get a copy of the current collection with only interfaces
- [getOnlyTraits()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mgetonlytraits): Get a copy of the current collection with only traits
- [has()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mhas): Check if an entity has been added to the collection
- [isEmpty()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#misempty): Check if the collection is empty or not
- [loadEntities()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mloadentities): Load entities into a collection
- [remove()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mremove): Remove an entity from a collection
- [toArray()](/docs/tech/02_parser/reflectionApi/php/classes/PhpEntitiesCollection.md#mtoarray): Convert collection to array

---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)