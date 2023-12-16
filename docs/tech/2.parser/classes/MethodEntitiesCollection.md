<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/2.parser/readme.md">Parser</a> <b>/</b> <a href="/docs/tech/2.parser/entity.md">Entities and entities collections</a> <b>/</b> MethodEntitiesCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L22">MethodEntitiesCollection</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method;

final class MethodEntitiesCollection extends \BumbleDocGen\Core\Parser\Entity\BaseEntityCollection implements \IteratorAggregate
```

<blockquote>Collection of PHP class method entities</blockquote>






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
    - <i>Add an entity to a collection</i></li>
<li>
    <a href="#mget">get</a>
    - <i>Get the loaded method entity if it exists</i></li>
<li>
    <a href="#mgetallexceptinitializations">getAllExceptInitializations</a>
    - <i>Get a copy of the collection containing only those methods that are not initialization methods</i></li>
<li>
    <a href="#mgetinitializations">getInitializations</a>
    - <i>Get a copy of the collection containing only those methods that are initialization methods</i></li>
<li>
    <a href="#mgetiterator">getIterator</a>
    </li>
<li>
    <a href="#mhas">has</a>
    - <i>Check if an entity has been added to the collection</i></li>
<li>
    <a href="#misempty">isEmpty</a>
    - <i>Check if the collection is empty or not</i></li>
<li>
    <a href="#mloadmethodentities">loadMethodEntities</a>
    - <i>Load method entities into the collection according to the project configuration</i></li>
<li>
    <a href="#mremove">remove</a>
    - <i>Remove an entity from a collection</i></li>
<li>
    <a href="#munsafeget">unsafeGet</a>
    - <i>Get the method entity if it exists. If the method exists but has not been loaded into the collection, a new entity object will be created</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L26">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity $classEntity, \BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings $phpHandlerSettings, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory $cacheablePhpEntityFactory, \Psr\Log\LoggerInterface $logger);
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
            <td>$classEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassLikeEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$phpHandlerSettings</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/PhpHandlerSettings.php'>\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cacheablePhpEntityFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/Cache/CacheablePhpEntityFactory.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory</a></td>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L82">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface $methodEntity, bool $reload = false): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```

<blockquote>Add an entity to a collection</blockquote>

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
            <td>$methodEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntityInterface.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface</a></td>
            <td>Entity to be added to the collection</td>
        </tr>
            <tr>
            <td>$reload</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Replace an entity with a new one if one has already been loaded previously</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L98">source code</a></li>
</ul>

```php
public function get(string $objectName): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```

<blockquote>Get the loaded method entity if it exists</blockquote>

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
            <td>Method entity name</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetallexceptinitializations" href="#mgetallexceptinitializations">#</a>
 <b>getAllExceptInitializations</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L162">source code</a></li>
</ul>

```php
public function getAllExceptInitializations(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```

<blockquote>Get a copy of the collection containing only those methods that are not initialization methods</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetinitializations" href="#mgetinitializations">#</a>
 <b>getInitializations</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L140">source code</a></li>
</ul>

```php
public function getInitializations(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
```

<blockquote>Get a copy of the collection containing only those methods that are initialization methods</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/BaseEntityCollection.php#L11">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Core\Parser\Entity\BaseEntityCollection

public function getIterator(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


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
<li><a name="mloadmethodentities" href="#mloadmethodentities">#</a>
 <b>loadMethodEntities</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L45">source code</a></li>
</ul>

```php
public function loadMethodEntities(): void;
```

<blockquote>Load method entities into the collection according to the project configuration</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="/docs/tech/2.parser/classes/PhpHandlerSettings.md#mgetmethodentityfilter">\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::getMethodEntityFilter()</a>    </li>
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
<li><a name="munsafeget" href="#munsafeget">#</a>
 <b>unsafeGet</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntitiesCollection.php#L114">source code</a></li>
</ul>

```php
public function unsafeGet(string $objectName): null|\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
```

<blockquote>Get the method entity if it exists. If the method exists but has not been loaded into the collection, a new entity object will be created</blockquote>

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
            <td>Method entity name</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method/MethodEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/2.parser/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->