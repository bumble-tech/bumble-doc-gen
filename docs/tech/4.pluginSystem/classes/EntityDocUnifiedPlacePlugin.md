<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/4.pluginSystem/readme.md">Plugin system</a> <b>/</b> EntityDocUnifiedPlacePlugin<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L17">EntityDocUnifiedPlacePlugin</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\EntityDocUnifiedPlace;

final class EntityDocUnifiedPlacePlugin implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
```

<blockquote>This plugin changes the algorithm for saving entity documents. The standard system stores each file
in a directory next to the file where it was requested. This behavior changes and all documents are saved
in a separate directory structure, so they are not duplicated.</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetsubscribedevents">getSubscribedEvents</a>
    - <i>Returns an array of event names this subscriber wants to listen to.</i></li>
<li>
    <a href="#moncreatedocumentedentitywrapper">onCreateDocumentedEntityWrapper</a>
    </li>
<li>
    <a href="#mongetprojecttemplatesdirs">onGetProjectTemplatesDirs</a>
    </li>
<li>
    <a href="#mongettemplatepathbyrelativedocpath">onGetTemplatePathByRelativeDocPath</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qentity-doc-structure-dir-name"
               href="#qentity-doc-structure-dir-name">#</a>
            <code>ENTITY_DOC_STRUCTURE_DIR_NAME</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L20">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L22">source code</a></li>
</ul>

```php
public static function getSubscribedEvents(): array;
```

<blockquote>Returns an array of event names this subscriber wants to listen to.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="moncreatedocumentedentitywrapper" href="#moncreatedocumentedentitywrapper">#</a>
 <b>onCreateDocumentedEntityWrapper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L31">source code</a></li>
</ul>

```php
public function onCreateDocumentedEntityWrapper(\BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper $event): void;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnCreateDocumentedEntityWrapper.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mongetprojecttemplatesdirs" href="#mongetprojecttemplatesdirs">#</a>
 <b>onGetProjectTemplatesDirs</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L47">source code</a></li>
</ul>

```php
public function onGetProjectTemplatesDirs(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs $event): void;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetProjectTemplatesDirs.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mongettemplatepathbyrelativedocpath" href="#mongettemplatepathbyrelativedocpath">#</a>
 <b>onGetTemplatePathByRelativeDocPath</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/EntityDocUnifiedPlace/EntityDocUnifiedPlacePlugin.php#L38">source code</a></li>
</ul>

```php
public function onGetTemplatePathByRelativeDocPath(\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath $event): void;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnGetTemplatePathByRelativeDocPath.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->