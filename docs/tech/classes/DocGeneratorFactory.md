<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> DocGeneratorFactory<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L18">DocGeneratorFactory</a> class:
</h1>





```php
namespace BumbleDocGen;

final class DocGeneratorFactory
```








<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcreate">create</a>
    - <i>Creates a documentation generator instance using configuration files</i></li>
<li>
    <a href="#mcreatebyconfigarray">createByConfigArray</a>
    - <i>Creates a documentation generator instance using an array containing the configuration</i></li>
<li>
    <a href="#mcreateconfiguration">createConfiguration</a>
    - <i>Creating a project configuration instance</i></li>
<li>
    <a href="#mcreaterootentitiescollection">createRootEntitiesCollection</a>
    - <i>Creating a collection of entities (see `ReflectionAPI`)</i></li>
<li>
    <a href="#msetcustomconfigurationparameters">setCustomConfigurationParameters</a>
    </li>
<li>
    <a href="#msetcustomdidefinitions">setCustomDiDefinitions</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L24">source code</a></li>
</ul>

```php
public function __construct(string $diConfig = __DIR__ . '/di-config.php');
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
            <td>$diConfig</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreate" href="#mcreate">#</a>
 <b>create</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L52">source code</a></li>
</ul>

```php
public function create(string|null ...$configurationFiles): \BumbleDocGen\DocGenerator;
```

<blockquote>Creates a documentation generator instance using configuration files</blockquote>

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
            <td>$configurationFiles <i>(variadic)</i></td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php'>\BumbleDocGen\DocGenerator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreatebyconfigarray" href="#mcreatebyconfigarray">#</a>
 <b>createByConfigArray</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L77">source code</a></li>
</ul>

```php
public function createByConfigArray(array $config): \BumbleDocGen\DocGenerator;
```

<blockquote>Creates a documentation generator instance using an array containing the configuration</blockquote>

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
            <td>$config</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php'>\BumbleDocGen\DocGenerator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreateconfiguration" href="#mcreateconfiguration">#</a>
 <b>createConfiguration</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L102">source code</a></li>
</ul>

```php
public function createConfiguration(string ...$configurationFiles): \BumbleDocGen\Core\Configuration\Configuration;
```

<blockquote>Creating a project configuration instance</blockquote>

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
            <td>$configurationFiles <i>(variadic)</i></td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreaterootentitiescollection" href="#mcreaterootentitiescollection">#</a>
 <b>createRootEntitiesCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L127">source code</a></li>
</ul>

```php
public function createRootEntitiesCollection(\BumbleDocGen\Core\Configuration\ReflectionApiConfig $reflectionApiConfig): \BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
```

<blockquote>Creating a collection of entities (see `ReflectionAPI`)</blockquote>

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
            <td>$reflectionApiConfig</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ReflectionApiConfig.php'>\BumbleDocGen\Core\Configuration\ReflectionApiConfig</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcustomconfigurationparameters" href="#msetcustomconfigurationparameters">#</a>
 <b>setCustomConfigurationParameters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L33">source code</a></li>
</ul>

```php
public function setCustomConfigurationParameters(array $customConfigurationParameters): void;
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
            <td>$customConfigurationParameters</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcustomdidefinitions" href="#msetcustomdidefinitions">#</a>
 <b>setCustomDiDefinitions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGeneratorFactory.php#L38">source code</a></li>
</ul>

```php
public function setCustomDiDefinitions(array $definitions): void;
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
            <td>$definitions</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->