<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/4.pluginSystem/readme.md">Plugin system</a> <b>/</b> PhpUnitStubberPlugin<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpUnitStubberPlugin.php#L14">PhpUnitStubberPlugin</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

final class PhpUnitStubberPlugin implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

<blockquote>Adding links to the documentation of PHP classes in the \PHPUnit namespace</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetsubscribedevents">getSubscribedEvents</a>
    </li>
<li>
    <a href="#moncheckisentitycanbeloaded">onCheckIsEntityCanBeLoaded</a>
    </li>
<li>
    <a href="#mongettingresourcelink">onGettingResourceLink</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpUnitStubberPlugin.php#L16">source code</a></li>
</ul>

```php
public static function getSubscribedEvents(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="moncheckisentitycanbeloaded" href="#moncheckisentitycanbeloaded">#</a>
 <b>onCheckIsEntityCanBeLoaded</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpUnitStubberPlugin.php#L39">source code</a></li>
</ul>

```php
public function onCheckIsEntityCanBeLoaded(\BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded $event): void;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php'>\BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoaded</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mongettingresourcelink" href="#mongettingresourcelink">#</a>
 <b>onGettingResourceLink</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/BasePhpStubber/PhpUnitStubberPlugin.php#L24">source code</a></li>
</ul>

```php
public function onGettingResourceLink(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink $event): void;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGettingResourceLink.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->