<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/04_pluginSystem.md">Plugin system</a> <b>/</b> StubberPlugin<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L15">StubberPlugin</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\ComposerPackagesStubber;

final class StubberPlugin implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

<blockquote>The plugin allows you to automatically provide links to github repositories for documented classes from libraries included in composer</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

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
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L19">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper $composerHelper);
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
            <td>$composerHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ComposerHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L23">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L60">source code</a></li>
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


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mongettingresourcelink" href="#mongettingresourcelink">#</a>
 <b>onGettingResourceLink</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/ComposerPackagesStubber/StubberPlugin.php#L34">source code</a></li>
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


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
