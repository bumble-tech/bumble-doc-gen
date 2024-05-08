<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/03_renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/03_renderer/01_howToCreateTemplates/readme.md">How to create documentation templates?</a> <b>/</b> <a href="/docs/tech/03_renderer/01_howToCreateTemplates/templatesVariables.md">Templates variables</a> <b>/</b> PhpEntitiesCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L43">PhpEntitiesCollection</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

final class PhpEntitiesCollection extends \BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection implements \IteratorAggregate
```

<blockquote>Collection of php root entities</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#madd">add</a>
    - <i>Add an entity to the collection</i></li>
<li>
    <a href="#mclearoperationslogcollection">clearOperationsLogCollection</a>
    </li>
<li>
    <a href="#mfilterbyinterfaces">filterByInterfaces</a>
    - <i>Get a copy of the current collection only with entities filtered by interfaces names (filtering is only available for ClassLikeEntity)</i></li>
<li>
    <a href="#mfilterbynameregularexpression">filterByNameRegularExpression</a>
    - <i>Get a copy of the current collection with only entities whose names match the regular expression</i></li>
<li>
    <a href="#mfilterbyparentclassnames">filterByParentClassNames</a>
    - <i>Get a copy of the current collection only with entities filtered by parent classes names (filtering is only available for ClassLikeEntity)</i></li>
<li>
    <a href="#mfilterbypaths">filterByPaths</a>
    - <i>Get a copy of the current collection only with entities filtered by file paths (from project_root)</i></li>
<li>
    <a href="#mfindentity">findEntity</a>
    - <i>Find an entity in a collection</i></li>
<li>
    <a href="#mget">get</a>
    - <i>Get an entity from a collection (only previously added)</i></li>
<li>
    <a href="#mgetentitycollectionname">getEntityCollectionName</a>
    - <i>Get collection name</i></li>
<li>
    <a href="#mgetentitylinkdata">getEntityLinkData</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    </li>
<li>
    <a href="#mgetloadedorcreatenew">getLoadedOrCreateNew</a>
    - <i>Get an entity from the collection or create a new one if it has not yet been added</i></li>
<li>
    <a href="#mgetonlyabstractclasses">getOnlyAbstractClasses</a>
    - <i>Get a copy of the current collection with only abstract classes</i></li>
<li>
    <a href="#mgetonlyinstantiable">getOnlyInstantiable</a>
    - <i>Get a copy of the current collection with only instantiable entities</i></li>
<li>
    <a href="#mgetonlyinterfaces">getOnlyInterfaces</a>
    - <i>Get a copy of the current collection with only interfaces</i></li>
<li>
    <a href="#mgetonlytraits">getOnlyTraits</a>
    - <i>Get a copy of the current collection with only traits</i></li>
<li>
    <a href="#mgetoperationslogcollection">getOperationsLogCollection</a>
    </li>
<li>
    <a href="#mhas">has</a>
    - <i>Check if an entity has been added to the collection</i></li>
<li>
    <a href="#minternalfindentity">internalFindEntity</a>
    </li>
<li>
    <a href="#minternalgetloadedorcreatenew">internalGetLoadedOrCreateNew</a>
    </li>
<li>
    <a href="#misempty">isEmpty</a>
    - <i>Check if the collection is empty or not</i></li>
<li>
    <a href="#mloadentities">loadEntities</a>
    - <i>Load entities into a collection</i></li>
<li>
    <a href="#mloadentitiesbyconfiguration">loadEntitiesByConfiguration</a>
    - <i>Load entities into a collection by configuration</i></li>
<li>
    <a href="#mremove">remove</a>
    - <i>Remove an entity from a collection</i></li>
<li>
    <a href="#mremoveallnotloadedentities">removeAllNotLoadedEntities</a>
    </li>
<li>
    <a href="#mtoarray">toArray</a>
    - <i>Convert collection to array</i></li>
<li>
    <a href="#mupdateentitiescache">updateEntitiesCache</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qname"
               href="#qname">#</a>
            <code>NAME</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L46">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L50">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory $cacheablePhpEntityFactory, \BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\EntityDocRendererHelper $docRendererHelper, \BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper $phpParserHelper, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger);
```



<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$phpHandlerSettings</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php'>\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php'>\BumbleDocGen\Core\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cacheablePhpEntityFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Cache/CacheablePhpEntityFactory.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$docRendererHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Renderer/EntityDocRenderer/EntityDocRendererHelper.php'>\BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\EntityDocRendererHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$phpParserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/PhpParser/PhpParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='https://github.com/php-fig/log/blob/master/src/LoggerInterface.php'>\Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L190">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, bool $reload = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Add an entity to the collection</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reload</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mclearoperationslogcollection" href="#mclearoperationslogcollection">#</a>
 <b>clearOperationsLogCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L28">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function clearOperationsLogCollection(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfilterbyinterfaces" href="#mfilterbyinterfaces">#</a>
 <b>filterByInterfaces</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L244">source code</a></li>
</ul>

```php
public function filterByInterfaces(array $interfaces): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection only with entities filtered by interfaces names (filtering is only available for ClassLikeEntity)</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$interfaces</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>string[]</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfilterbynameregularexpression" href="#mfilterbynameregularexpression">#</a>
 <b>filterByNameRegularExpression</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L321">source code</a></li>
</ul>

```php
public function filterByNameRegularExpression(string $regexPattern): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection with only entities whose names match the regular expression</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$regexPattern</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfilterbyparentclassnames" href="#mfilterbyparentclassnames">#</a>
 <b>filterByParentClassNames</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L270">source code</a></li>
</ul>

```php
public function filterByParentClassNames(array $parentClassNames): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection only with entities filtered by parent classes names (filtering is only available for ClassLikeEntity)</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$parentClassNames</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfilterbypaths" href="#mfilterbypaths">#</a>
 <b>filterByPaths</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L298">source code</a></li>
</ul>

```php
public function filterByPaths(array $paths): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection only with entities filtered by file paths (from project_root)</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$paths</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfindentity" href="#mfindentity">#</a>
 <b>findEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L118">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function findEntity(string $search, bool $useUnsafeKeys = true): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```

<blockquote>Find an entity in a collection</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$search</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$useUnsafeKeys</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L86">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function get(string $objectName): null|\BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```

<blockquote>Get an entity from a collection (only previously added)</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitycollectionname" href="#mgetentitycollectionname">#</a>
 <b>getEntityCollectionName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L66">source code</a></li>
</ul>

```php
public function getEntityCollectionName(): string;
```

<blockquote>Get collection name</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentitylinkdata" href="#mgetentitylinkdata">#</a>
 <b>getEntityLinkData</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L508">source code</a></li>
</ul>

```php
public function getEntityLinkData(string $rawLink, string|null $defaultEntityName = null, bool $useUnsafeKeys = true): array;
```



<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$rawLink</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Raw link to an entity or entity element</td>
        </tr>
            <tr>
            <td>$defaultEntityName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>Entity name to use if the link does not contain a valid or existing entity name,
 but only a cursor on an entity element</td>
        </tr>
            <tr>
            <td>$useUnsafeKeys</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L46">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function getIterator(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetloadedorcreatenew" href="#mgetloadedorcreatenew">#</a>
 <b>getLoadedOrCreateNew</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L102">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```

<blockquote>Get an entity from the collection or create a new one if it has not yet been added</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$withAddClassEntityToCollectionEvent</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>



<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/RootEntityInterface.md#misentitydatacanbeloaded">\BumbleDocGen\Core\Parser\Entity\RootEntityInterface::isEntityDataCanBeLoaded()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetonlyabstractclasses" href="#mgetonlyabstractclasses">#</a>
 <b>getOnlyAbstractClasses</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L388">source code</a></li>
</ul>

```php
public function getOnlyAbstractClasses(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection with only abstract classes</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetonlyinstantiable" href="#mgetonlyinstantiable">#</a>
 <b>getOnlyInstantiable</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L338">source code</a></li>
</ul>

```php
public function getOnlyInstantiable(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection with only instantiable entities</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetonlyinterfaces" href="#mgetonlyinterfaces">#</a>
 <b>getOnlyInterfaces</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L354">source code</a></li>
</ul>

```php
public function getOnlyInterfaces(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection with only interfaces</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetonlytraits" href="#mgetonlytraits">#</a>
 <b>getOnlyTraits</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L370">source code</a></li>
</ul>

```php
public function getOnlyTraits(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
```

<blockquote>Get a copy of the current collection with only traits</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoperationslogcollection" href="#mgetoperationslogcollection">#</a>
 <b>getOperationsLogCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/LoggableRootEntityCollection.php#L23">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection

public function getOperationsLogCollection(): \BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLogOperation/OperationsCollection.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhas" href="#mhas">#</a>
 <b>has</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L42">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function has(string $objectName): bool;
```

<blockquote>Check if an entity has been added to the collection</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="minternalfindentity" href="#minternalfindentity">#</a>
 <b>internalFindEntity</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L421">source code</a></li>
</ul>

```php
public function internalFindEntity(string $search, bool $useUnsafeKeys = true): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```



<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$search</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>Search query. For the search, only the main part is taken, up to the characters: `::`, `->`, `#`.
 If the request refers to multiple existing entities and if unsafe keys are allowed,
 a warning will be shown and the first entity found will be used.</td>
        </tr>
            <tr>
            <td>$useUnsafeKeys</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Whether to use search keys that can be used to find several entities</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>




<b>Examples of using:</b>

```php
$entitiesCollection->findEntity('App'); // class name
$entitiesCollection->findEntity('BumbleDocGen\Console\App'); // class with namespace
$entitiesCollection->findEntity('\BumbleDocGen\Console\App'); // class with namespace
$entitiesCollection->findEntity('\BumbleDocGen\Console\App::test()'); // class with namespace and optional part
$entitiesCollection->findEntity('App.php'); // filename
$entitiesCollection->findEntity('/src/Console/App.php'); // relative path
$entitiesCollection->findEntity('/Users/someuser/Desktop/projects/bumble-doc-gen/src/Console/App.php'); // absolute path
$entitiesCollection->findEntity('https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/App.php'); // source link
```

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="minternalgetloadedorcreatenew" href="#minternalgetloadedorcreatenew">#</a>
 <b>internalGetLoadedOrCreateNew</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L214">source code</a></li>
</ul>

```php
public function internalGetLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
```



<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$withAddClassEntityToCollectionEvent</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misempty" href="#misempty">#</a>
 <b>isEmpty</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L52">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function isEmpty(): bool;
```

<blockquote>Check if the collection is empty or not</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mloadentities" href="#mloadentities">#</a>
 <b>loadEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L100">source code</a></li>
</ul>

```php
public function loadEntities(\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection $sourceLocatorsCollection, \BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface|null $filters = null, \BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
```

<blockquote>Load entities into a collection</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$sourceLocatorsCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/SourceLocator/SourceLocatorsCollection.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$filters</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/FilterCondition/ConditionInterface.php'>\BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$progressBar</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php'>\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mloadentitiesbyconfiguration" href="#mloadentitiesbyconfiguration">#</a>
 <b>loadEntitiesByConfiguration</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/PhpEntitiesCollection.php#L81">source code</a></li>
</ul>

```php
public function loadEntitiesByConfiguration(\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface|null $progressBar = null): \BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult;
```

<blockquote>Load entities into a collection by configuration</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$progressBar</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/EntitiesLoaderProgressBarInterface.php'>\BumbleDocGen\Core\Parser\Entity\EntitiesLoaderProgressBarInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/CollectionLoadEntitiesResult.php'>\BumbleDocGen\Core\Parser\Entity\CollectionLoadEntitiesResult</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/03_renderer/01_howToCreateTemplates/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremove" href="#mremove">#</a>
 <b>remove</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L32">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function remove(string $objectName): void;
```

<blockquote>Remove an entity from a collection</blockquote>

<b>Parameters:</b>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$objectName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremoveallnotloadedentities" href="#mremoveallnotloadedentities">#</a>
 <b>removeAllNotLoadedEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L132">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function removeAllNotLoadedEntities(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mtoarray" href="#mtoarray">#</a>
 <b>toArray</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L127">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function toArray(): array;
```

<blockquote>Convert collection to array</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mupdateentitiescache" href="#mupdateentitiescache">#</a>
 <b>updateEntitiesCache</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php#L97">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\RootEntityCollection

public function updateEntitiesCache(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
