[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
[Parser](/docs/tech/02_parser/readme.md) **/**
Entity filter conditions

---


# Entity filter conditions

Filters serve as a foundational mechanism within our documentation generator, dictating which segments of the source code are selected during the initial parsing phase.
These rules facilitate a strategic extraction of elements, such as classes, methods, or constants, from the underlying codebase.
By implementing these filters, users are endowed with the capability to customize the documentation output, ensuring that it precisely aligns with their requirements and expectations.
This level of granularity not only streamlines the documentation process but also guarantees that the resultant documents are devoid of superfluous details, focusing solely on pertinent information.

All filter conditions implement the [ConditionInterface](/docs/tech/02_parser/classes/ConditionInterface.md) interface.

## Mechanism for adding entities to the collection

For each language handler, according to the configuration, the following scheme is applicable:

```mermaid
flowchart LR
 Start((Start)) --> Parse(Starting the file parsing process)
 Parse --> NextFileExists{Have \nthe next \nfile to \nprocess?}
 NextFileExists -- Yes --> EntityCheck{Does the file \ncontain an \nentity?}
 NextFileExists -- No --> Exit(((Exit)))
 EntityCheck -- Yes --> FilterCheck{Can the found entity \nbe added \naccording to the \nfilters condition?}
 EntityCheck -- No --> NextFileExists
 FilterCheck -- Yes --> AddEntity(Adding an entity to a collection)
 FilterCheck -- No --> NextFileExists
 AddEntity --> NextFileExists

 style FilterCheck color:red
```

The diagram shows the mechanism for adding root entities, but this also applies to the attributes of each entity,
for example, for PHP there are rules for checking the possibility of adding methods, properties and constants.

## Filter conditions configuration

Filter conditions are configured separately for language handlers.

This is an example configuration for PHP, and here you can see the use of configuration conditions in a real configuration `BumbleDocGen/LanguageHandler/Php/phpHandlerDefaultSettings.yaml`:

```yaml
language_handlers:
  php:
    class: \BumbleDocGen\LanguageHandler\Php\PhpHandler
    settings:
        class_filter:
            class: \BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition
        class_constant_filter:
            class: \BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition\VisibilityCondition
            arguments:
              - public
              - protected
        method_filter:
            class: \BumbleDocGen\Core\Parser\FilterCondition\ConditionGroup
            arguments:
               - and
               - class: \BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\IsPublicCondition
               - class: \BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\OnlyFromCurrentClassCondition
        property_filter:
            class: \BumbleDocGen\Core\Parser\FilterCondition\ConditionGroup
            arguments:
               - and
               - class: \BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition\IsPublicCondition
               - class: \BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition\OnlyFromCurrentClassCondition
```

## Available filters


Common filtering conditions that are available for any entity:

-  [FalseCondition](/docs/tech/02_parser/classes/FalseCondition.md) - False conditions, any object is not available
-  [FileTextContainsCondition](/docs/tech/02_parser/classes/FileTextContainsCondition.md) - Checking if a file contains a substring
-  [LocatedInCondition](/docs/tech/02_parser/classes/LocatedInCondition.md) - Checking the existence of an entity in the specified directories
-  [LocatedNotInCondition](/docs/tech/02_parser/classes/LocatedNotInCondition.md) - Checking the existence of an entity not in the specified directories
-  [TrueCondition](/docs/tech/02_parser/classes/TrueCondition.md) - True conditions, any object is available
-  [ConditionGroup](/docs/tech/02_parser/classes/ConditionGroup.md) - Filter condition to group other filter conditions. A group can have an OR/AND condition test; In the case of OR, it is enough to successfully check at least one condition, in the case of AND, all checks must be successfully completed.


Filter condition for working with entities PHP language handler:

| Group name | Class short name | Description |
|-|-|-|
| **ClassConstantFilterCondition** | [IsPrivateCondition](/docs/tech/02_parser/classes/IsPrivateCondition.md) | Check is a private constant or not |
| | [IsProtectedCondition](/docs/tech/02_parser/classes/IsProtectedCondition.md) | Check is a protected constant or not |
| | [IsPublicCondition](/docs/tech/02_parser/classes/IsPublicCondition.md) | Check is a public constant or not |
| | [VisibilityCondition](/docs/tech/02_parser/classes/VisibilityCondition.md) | Constant access modifier check |
| | | |
| **MethodFilterCondition** | [IsPrivateCondition](/docs/tech/02_parser/classes/IsPrivateCondition_2.md) | Check is a private method or not |
| | [IsProtectedCondition](/docs/tech/02_parser/classes/IsProtectedCondition_2.md) | Check is a protected method or not |
| | [IsPublicCondition](/docs/tech/02_parser/classes/IsPublicCondition_2.md) | Check is a public method or not |
| | [OnlyFromCurrentClassCondition](/docs/tech/02_parser/classes/OnlyFromCurrentClassCondition.md) | Only methods that belong to the current class (not parent) |
| | [VisibilityCondition](/docs/tech/02_parser/classes/VisibilityCondition_2.md) | Method access modifier check |
| | | |
| **PropertyFilterCondition** | [IsPrivateCondition](/docs/tech/02_parser/classes/IsPrivateCondition_3.md) | Check is a private property or not |
| | [IsProtectedCondition](/docs/tech/02_parser/classes/IsProtectedCondition_3.md) | Check is a protected property or not |
| | [IsPublicCondition](/docs/tech/02_parser/classes/IsPublicCondition_3.md) | Check is a public property or not |
| | [OnlyFromCurrentClassCondition](/docs/tech/02_parser/classes/OnlyFromCurrentClassCondition_2.md) | Only properties that belong to the current class (not parent) |
| | [VisibilityCondition](/docs/tech/02_parser/classes/VisibilityCondition_3.md) | Property access modifier check |
| | | |



---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 14:38:29 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)