<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> PluginEventDispatcher<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php#L13">PluginEventDispatcher</a> class:
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
    <a href="#maddlistener">addListener</a>
    - <i>Adds an event listener that listens on the specified events.</i></li>
<li>
    <a href="#maddsubscriber">addSubscriber</a>
    - <i>Adds an event subscriber.</i></li>
<li>
    <a href="#mdispatch">dispatch</a>
    - <i>Dispatches an event to all registered listeners.</i></li>
<li>
    <a href="#mgetlistenerpriority">getListenerPriority</a>
    - <i>Gets the listener priority for a specific event.</i></li>
<li>
    <a href="#mgetlisteners">getListeners</a>
    - <i>Gets the listeners of a specific event or all listeners sorted by descending priority.</i></li>
<li>
    <a href="#mhaslisteners">hasListeners</a>
    - <i>Checks whether an event has any registered listeners.</i></li>
<li>
    <a href="#mremovelistener">removeListener</a>
    - <i>Removes an event listener from the specified events.</i></li>
<li>
    <a href="#mremovesubscriber">removeSubscriber</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php#L22">source code</a></li>
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddlistener" href="#maddlistener">#</a>
 <b>addListener</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L141">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function addListener(string $eventName, callable|array $listener, int $priority): mixed;
```

<blockquote>Adds an event listener that listens on the specified events.</blockquote>

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
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$listener</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$priority</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>The higher this value, the earlier an event
 listener will be triggered in the chain (defaults to 0)</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddsubscriber" href="#maddsubscriber">#</a>
 <b>addSubscriber</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L181">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function addSubscriber(\Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber): mixed;
```

<blockquote>Adds an event subscriber.</blockquote>

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
            <td>$subscriber</td>
            <td><a href='https://github.com/symfony/event-dispatcher/blob/master/EventSubscriberInterface.php'>Symfony\Component\EventDispatcher\EventSubscriberInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdispatch" href="#mdispatch">#</a>
 <b>dispatch</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php#L30">source code</a></li>
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
<div class='method_description-block'>

<ul>
<li><a name="mgetlistenerpriority" href="#mgetlistenerpriority">#</a>
 <b>getListenerPriority</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L94">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function getListenerPriority(string $eventName, callable|array $listener): int|null;
```

<blockquote>Gets the listener priority for a specific event.</blockquote>

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
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$listener</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlisteners" href="#mgetlisteners">#</a>
 <b>getListeners</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L68">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function getListeners(string|null $eventName = NULL): array;
```

<blockquote>Gets the listeners of a specific event or all listeners sorted by descending priority.</blockquote>

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
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhaslisteners" href="#mhaslisteners">#</a>
 <b>hasListeners</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L123">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function hasListeners(string|null $eventName = NULL): bool;
```

<blockquote>Checks whether an event has any registered listeners.</blockquote>

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
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovelistener" href="#mremovelistener">#</a>
 <b>removeListener</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L150">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function removeListener(string $eventName, callable|array $listener): mixed;
```

<blockquote>Removes an event listener from the specified events.</blockquote>

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
            <td>$eventName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$listener</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mremovesubscriber" href="#mremovesubscriber">#</a>
 <b>removeSubscriber</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventDispatcher.php#L199">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventDispatcher

public function removeSubscriber(\Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber): mixed;
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
            <td>$subscriber</td>
            <td><a href='https://github.com/symfony/event-dispatcher/blob/master/EventSubscriberInterface.php'>Symfony\Component\EventDispatcher\EventSubscriberInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>

<!-- {% endraw %} -->