<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/04_pluginSystem.md">Plugin system</a> <b>/</b> Daux<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L21">Daux</a> class:
</h1>




<b>:warning: Is internal</b>
```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\Daux;

final class Daux implements \BumbleDocGen\Core\Plugin\PluginInterface, \Symfony\Component\EventDispatcher\EventSubscriberInterface
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
    <a href="#mafterrenderingentities">afterRenderingEntities</a>
    </li>
<li>
    <a href="#mbeforecreatingdocfile">beforeCreatingDocFile</a>
    </li>
<li>
    <a href="#mgetsubscribedevents">getSubscribedEvents</a>
    </li>
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
            <code>ENTITY_DOC_STRUCTURE_DIR_NAME</code>                   <b>|</b> <a href="/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L24">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L26">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper);
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
            <tr>
            <td>$breadcrumbsHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Breadcrumbs/BreadcrumbsHelper.php'>\BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mafterrenderingentities" href="#mafterrenderingentities">#</a>
 <b>afterRenderingEntities</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L95">source code</a></li>
</ul>

```php
public function afterRenderingEntities(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mbeforecreatingdocfile" href="#mbeforecreatingdocfile">#</a>
 <b>beforeCreatingDocFile</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L47">source code</a></li>
</ul>

```php
public function beforeCreatingDocFile(\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile|\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingEntityDocFile $event): void;
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/BeforeCreatingEntityDocFile.php'>\BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingEntityDocFile</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsubscribedevents" href="#mgetsubscribedevents">#</a>
 <b>getSubscribedEvents</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L32">source code</a></li>
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
<li><a name="moncreatedocumentedentitywrapper" href="#moncreatedocumentedentitywrapper">#</a>
 <b>onCreateDocumentedEntityWrapper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L71">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L87">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/CorePlugin/Daux/Daux.php#L78">source code</a></li>
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
