<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PluginEventDispatcher<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginEventDispatcher.php#L13">PluginEventDispatcher</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin;

class PluginEventDispatcher extends \Symfony\Component\EventDispatcher\EventDispatcher implements \Symfony\Component\EventDispatcher\EventDispatcherInterface, \Symfony\Contracts\EventDispatcher\EventDispatcherInterface, \Psr\EventDispatcher\EventDispatcherInterface
```

<blockquote>The EventDispatcherInterface is the central point of Symfony's event listener system.</blockquote>






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
    - <i>Dispatches an event to all registered listeners.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginEventDispatcher.php#L22">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration);
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdispatch" href="#mdispatch">#</a>
 <b>dispatch</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginEventDispatcher.php#L30">source code</a></li>
</ul>

```php
public function dispatch(object $event, string|null $eventName = NULL): object;
```

<blockquote>Dispatches an event to all registered listeners.</blockquote>

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
            <td>The event to pass to the event handlers/listeners</td>
        </tr>
            <tr>
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>The name of the event to dispatch. If not supplied,
 the class of $event should be used instead.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>object</a>


</div>
<hr>

<!-- {% endraw %} -->