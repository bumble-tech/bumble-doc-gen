<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PluginsCollection<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php#L7">PluginsCollection</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin;

final class PluginsCollection implements \IteratorAggregate, \Traversable
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#madd">add</a>
    </li>
<li>
    <a href="#mcreate">create</a>
    </li>
<li>
    <a href="#mget">get</a>
    </li>
<li>
    <a href="#mgetiterator">getIterator</a>
    - <i>Retrieve an external iterator</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php#L22">source code</a></li>
</ul>

```php
public function add(\BumbleDocGen\Core\Plugin\PluginInterface $plugins): \BumbleDocGen\Core\Plugin\PluginsCollection;
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
            <td>$plugins</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginInterface.php'>\BumbleDocGen\Core\Plugin\PluginInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php'>\BumbleDocGen\Core\Plugin\PluginsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreate" href="#mcreate">#</a>
 <b>create</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php#L17">source code</a></li>
</ul>

```php
public static function create(\BumbleDocGen\Core\Plugin\PluginInterface $plugins): \BumbleDocGen\Core\Plugin\PluginsCollection;
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
            <td>$plugins</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginInterface.php'>\BumbleDocGen\Core\Plugin\PluginInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php'>\BumbleDocGen\Core\Plugin\PluginsCollection</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php#L30">source code</a></li>
</ul>

```php
public function get(string $key): \BumbleDocGen\Core\Plugin\PluginInterface|null;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginInterface.php'>\BumbleDocGen\Core\Plugin\PluginInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetiterator" href="#mgetiterator">#</a>
 <b>getIterator</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php#L12">source code</a></li>
</ul>

```php
public function getIterator(): \Generator;
```

<blockquote>Retrieve an external iterator</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a> - on failure. </li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/iteratoraggregate.getiterator.php">https://php.net/manual/en/iteratoraggregate.getiterator.php</a>    </li>
</ul>
</div>
<hr>

<!-- {% endraw %} -->