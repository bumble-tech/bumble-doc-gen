<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PluginEventDispatcher<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php#L10">PluginEventDispatcher</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin;

class PluginEventDispatcher extends \Symfony\Component\EventDispatcher\EventDispatcher
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
    <a href="#mdispatch">dispatch</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php#L14">source code</a></li>
</ul>

```php
public function __construct(\Monolog\Logger $logger);
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
            <td>$logger</td>
            <td><a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Logger.php'>\Monolog\Logger</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdispatch" href="#mdispatch">#</a>
 <b>dispatch</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php#L19">source code</a></li>
</ul>

```php
public function dispatch(object $event, string $eventName = null): object;
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
            <td>$event</td>
            <td><a href='https://www.php.net/manual/en/language.types.object.php'>object</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>object</a>


</div>
<hr>

<!-- {% endraw %} -->