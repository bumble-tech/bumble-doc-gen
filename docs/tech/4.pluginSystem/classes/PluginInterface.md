<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/4.pluginSystem/readme.md">Plugin system</a> <b>/</b> PluginInterface<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginInterface.php#L9">PluginInterface</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin;

interface PluginInterface extends \\Symfony\Component\EventDispatcher\EventSubscriberInterface implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetsubscribedevents">getSubscribedEvents</a>
    - <i>Returns an array of event names this subscriber wants to listen to.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/event-dispatcher/EventSubscriberInterface.php#L48">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\EventDispatcher\EventSubscriberInterface

public static function getSubscribedEvents(): array<string,string|array{0:string,1:int}|list<array{0:string,1?:int}>>;
```

<blockquote>Returns an array of event names this subscriber wants to listen to.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array<string,string</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array{0:string,1:int}</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>list<array{0:string,1?:int}>></a>


</div>
<hr>

<!-- {% endraw %} -->