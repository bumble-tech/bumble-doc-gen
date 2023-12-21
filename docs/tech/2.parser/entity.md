<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> Entities and entities collections<hr> </embed>

<embed> <h1>Entities and entities collections</h1> </embed>

Entities are organized outcomes from parsing source code.
They help easily extract details about specific items from templates, allowing users to quickly access and display the information they need.

Entities are always handled through collections. Collections are the result of the project parsing process and are available in both documentation templates and code.

<embed> <h2>Examples of using collections in twig templates</h2> </embed>

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
 {{ {% set filteredCollection = phpEntities.getOnlyInstantiable() %} }}
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


<embed> <h2>Root entities collections</h2> </embed>

To further facilitate the handling of these entities, we utilize entity collections.
These collections not only group relevant entities together but also provide convenient methods for filtering and manipulating these entities.
The root collections (<a href="/docs/tech/2.parser/classes/RootEntityCollection.md">RootEntityCollection</a>), which are directly accessible in your templates, are as follows:

<table>
    <tr>
        <th>Collection class</th>
        <th>Name in twig template</th>
        <th>PL</th>
        <th>Description</th>
    </tr>
            <tr>
        <td><a href='/docs/tech/2.parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a></td>
        <td><b>phpEntities</b></td>
        <td>PHP</td>
        <td>Collection of php root entities</td>
    </tr>
    </table>

<embed> <h2>Available entities</h2> </embed>

Following is the list of available entities that are consistent with <a href="/docs/tech/2.parser/classes/EntityInterface.md">EntityInterface</a> and can be created.
These classes are a convenient wrapper for accessing data in templates:

<table>
    <tr>
        <th>Entity name</th>
        <th>Collection name</th>
        <th>Is root</th>
        <th>PL</th>
        <th>Description</th>
    </tr>
                <tr>
        <td><a href='/docs/tech/2.parser/classes/ClassEntity.md'>ClassEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a></td>
        <td>yes</td>
        <td>PHP</td>
        <td>PHP Class</td>
    </tr>
        <tr>
        <td><a href='/docs/tech/2.parser/classes/EnumEntity.md'>EnumEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a></td>
        <td>yes</td>
        <td>PHP</td>
        <td>Enumeration</td>
    </tr>
        <tr>
        <td><a href='/docs/tech/2.parser/classes/InterfaceEntity.md'>InterfaceEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a></td>
        <td>yes</td>
        <td>PHP</td>
        <td>Object interface</td>
    </tr>
        <tr>
        <td><a href='/docs/tech/2.parser/classes/TraitEntity.md'>TraitEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/PhpEntitiesCollection.md'>PhpEntitiesCollection</a></td>
        <td>yes</td>
        <td>PHP</td>
        <td>Trait</td>
    </tr>
                    <tr>
        <td><a href='/docs/tech/2.parser/classes/ClassConstantEntity.md'>ClassConstantEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/ClassConstantEntitiesCollection.md'>ClassConstantEntitiesCollection</a></td>
        <td>no</td>
        <td>PHP</td>
        <td>Class constant entity</td>
    </tr>
                    <tr>
        <td><a href='/docs/tech/2.parser/classes/DynamicMethodEntity.md'>DynamicMethodEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/MethodEntitiesCollection.md'>MethodEntitiesCollection</a></td>
        <td>no</td>
        <td>PHP</td>
        <td>Method obtained by parsing the &quot;method&quot; annotation</td>
    </tr>
        <tr>
        <td><a href='/docs/tech/2.parser/classes/MethodEntity.md'>MethodEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/MethodEntitiesCollection.md'>MethodEntitiesCollection</a></td>
        <td>no</td>
        <td>PHP</td>
        <td>Class method entity</td>
    </tr>
                    <tr>
        <td><a href='/docs/tech/2.parser/classes/PropertyEntity.md'>PropertyEntity</a></td>
        <td><a href='/docs/tech/2.parser/classes/PropertyEntitiesCollection.md'>PropertyEntitiesCollection</a></td>
        <td>no</td>
        <td>PHP</td>
        <td>Class property entity</td>
    </tr>
    </table>

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Tue Nov 21 16:24:59 2023 +0300<br><b>Page content update date:</b> Thu Dec 21 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>