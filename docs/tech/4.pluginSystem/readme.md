<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Plugin system<hr> </embed>

<embed> <h1>Plugin system</h1> </embed>

The documentation generator includes the ability to expand the functionality using plugins that allow you to add the necessary functionality to the system without changing its core.

The system is built on the basis of an event model, each plugin class must implement <a href="/docs/tech/4.pluginSystem/classes/PluginInterface.md">PluginInterface</a>.

<embed> <h2>Configuration example</h2> </embed>

You can add your plugins to the configuration like this:

```yaml
plugins:
  - class: \SelfDocConfig\Plugin\RoaveStubber\BetterReflectionStubberPlugin
  - class: \SelfDocConfig\Plugin\TwigFilterClassParser\TwigFilterClassParserPlugin
  - class: \SelfDocConfig\Plugin\TwigFunctionClassParser\TwigFunctionClassParserPlugin
```

<embed> <h2>Default plugins</h2> </embed>

Below are the plugins that are available by default when working with the library.
Plugins for any programming languages work regardless of which language handler is configured in the configuration.

<table>
    <tr>
        <th>Plugin</th>
        <th>PL</th>
        <th>Handles events</th>
        <th>Description</th>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/LastPageCommitter.md'>LastPageCommitter</a></td>
        <td>any</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/BeforeCreatingDocFile.md">BeforeCreatingDocFile</a></li>
                        </ul>
        </td>
        <td>Plugin for adding a block with information about the last commit and date of page update to the generated document</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/PageHtmlLinkerPlugin.md'>PageHtmlLinkerPlugin</a></td>
        <td>any</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/BeforeCreatingDocFile.md">BeforeCreatingDocFile</a></li>
                        </ul>
        </td>
        <td>Adds URLs to empty links in HTML format;
 Links may contain:
 1) Short entity name
 2) Full entity name
 3) Relative link to the entity file from the root directory of the project
 4) Page title ( title )
 5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 6) Relative reference to the entity document from the root directory of the documentation</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/PageLinkerPlugin.md'>PageLinkerPlugin</a></td>
        <td>any</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/BeforeCreatingDocFile.md">BeforeCreatingDocFile</a></li>
                        </ul>
        </td>
        <td>Adds URLs to empty links in HTML format;
 Links may contain:
 1) Short entity name
 2) Full entity name
 3) Relative link to the entity file from the root directory of the project
 4) Page title ( title )
 5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 6) Relative reference to the entity document from the root directory of the documentation</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/PageRstLinkerPlugin.md'>PageRstLinkerPlugin</a></td>
        <td>any</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/BeforeCreatingDocFile.md">BeforeCreatingDocFile</a></li>
                        </ul>
        </td>
        <td>Adds URLs to empty links in rst format;
 Links may contain:
 1) Short entity name
 2) Full entity name
 3) Relative link to the entity file from the root directory of the project
 4) Page title ( title )
 5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )
 6) Relative reference to the entity document from the root directory of the documentation</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/BasePhpStubberPlugin.md'>BasePhpStubberPlugin</a></td>
        <td>PHP</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnGettingResourceLink.md">OnGettingResourceLink</a></li>
                        </ul>
        </td>
        <td>Adding links to type documentation and documentation of built-in PHP classes</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/PhpDocumentorStubberPlugin.md'>PhpDocumentorStubberPlugin</a></td>
        <td>PHP</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnGettingResourceLink.md">OnGettingResourceLink</a></li>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnCheckIsClassEntityCanBeLoad.md">OnCheckIsClassEntityCanBeLoad</a></li>
                        </ul>
        </td>
        <td>Adding links to the documentation of PHP classes in the \phpDocumentor namespace</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/PhpUnitStubberPlugin.md'>PhpUnitStubberPlugin</a></td>
        <td>PHP</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnGettingResourceLink.md">OnGettingResourceLink</a></li>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnCheckIsClassEntityCanBeLoad.md">OnCheckIsClassEntityCanBeLoad</a></li>
                        </ul>
        </td>
        <td>Adding links to the documentation of PHP classes in the \PHPUnit namespace</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/StubberPlugin.md'>StubberPlugin</a></td>
        <td>PHP</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnGettingResourceLink.md">OnGettingResourceLink</a></li>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnCheckIsClassEntityCanBeLoad.md">OnCheckIsClassEntityCanBeLoad</a></li>
                        </ul>
        </td>
        <td>The plugin allows you to automatically provide links to github repositories for documented classes from libraries included in composer</td>
    </tr>
    <tr>
        <td><a href='/docs/tech/4.pluginSystem/classes/EntityDocUnifiedPlacePlugin.md'>EntityDocUnifiedPlacePlugin</a></td>
        <td>PHP</td>
        <td>
            <ul>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnCreateDocumentedEntityWrapper.md">OnCreateDocumentedEntityWrapper</a></li>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnGetTemplatePathByRelativeDocPath.md">OnGetTemplatePathByRelativeDocPath</a></li>
                            <li><a href="/docs/tech/4.pluginSystem/classes/OnGetProjectTemplatesDirs.md">OnGetProjectTemplatesDirs</a></li>
                        </ul>
        </td>
        <td>This plugin changes the algorithm for saving entity documents. The standard system stores each file
in a directory next to the file where it was requested. This behavior changes and all documents are saved
in a separate directory structure, so they are not duplicated.</td>
    </tr>
</table>

<embed> <h2>Default events</h2> </embed>

<embed> <ul><li><a href='/docs/tech/4.pluginSystem/classes/OnLoadSourceLocatorsCollection.md'>OnLoadSourceLocatorsCollection</a> - Called when source locators are loaded</li><li><a href='/docs/tech/4.pluginSystem/classes/AfterRenderingEntities.md'>AfterRenderingEntities</a> - Event is the base class for classes containing event data.</li><li><a href='/docs/tech/4.pluginSystem/classes/BeforeCreatingDocFile.md'>BeforeCreatingDocFile</a> - Called before the content of the documentation document is saved to a file</li><li><a href='/docs/tech/4.pluginSystem/classes/BeforeRenderingDocFiles.md'>BeforeRenderingDocFiles</a> - The event occurs before the main documents begin rendering</li><li><a href='/docs/tech/4.pluginSystem/classes/BeforeRenderingEntities.md'>BeforeRenderingEntities</a> - The event occurs before the rendering of entity documents begins, after the main documents have been created</li><li><a href='/docs/tech/4.pluginSystem/classes/OnCreateDocumentedEntityWrapper.md'>OnCreateDocumentedEntityWrapper</a> - The event occurs when an entity is added to the list for documentation</li><li><a href='/docs/tech/4.pluginSystem/classes/OnGetProjectTemplatesDirs.md'>OnGetProjectTemplatesDirs</a> - This event occurs when all directories containing document templates are retrieved</li><li><a href='/docs/tech/4.pluginSystem/classes/OnGetTemplatePathByRelativeDocPath.md'>OnGetTemplatePathByRelativeDocPath</a> - The event occurs when the path to the template file is obtained relative to the path to the document</li><li><a href='/docs/tech/4.pluginSystem/classes/OnGettingResourceLink.md'>OnGettingResourceLink</a> - Event occurs when a reference to an entity (resource) is received</li><li><a href='/docs/tech/4.pluginSystem/classes/OnLoadEntityDocPluginContent.md'>OnLoadEntityDocPluginContent</a> - Called when entity documentation is generated (plugin content loading)</li><li><a href='/docs/tech/4.pluginSystem/classes/OnCheckIsClassEntityCanBeLoad.md'>OnCheckIsClassEntityCanBeLoad</a> - Event is the base class for classes containing event data.</li><li><a href='/docs/tech/4.pluginSystem/classes/AfterLoadingClassEntityCollection.md'>AfterLoadingClassEntityCollection</a> - The event is called after the initial creation of a collection of class entities</li><li><a href='/docs/tech/4.pluginSystem/classes/OnAddClassEntityToCollection.md'>OnAddClassEntityToCollection</a> - Called when each class entity is added to the entity collection</li></ul> </embed>

<embed> <h2>Adding a new plugin</h2> </embed>

If you decide to add a new plugin, there are a few things you need to do:

<embed> <h3>1) Add plugin class and implement events handling</h3> </embed>

```php
namespace Demo\Plugin\DemoFakeResourceLinkPlugin;

final class DemoFakeResourceLinkPlugin implements \BumbleDocGen\Core\Plugin\PluginInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            \BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink::class => 'onGettingResourceLink',
        ];
    }

    public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $event->setResourceUrl("https://google.com");
        }
    }
}
```

<embed> <h3>2) Add the new plugin to the configuration</h3> </embed>

```yaml
plugins:
  - class: \Demo\Plugin\DemoFakeResourceLinkPlugin\DemoFakeResourceLinkPlugin
```


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Oct 28 11:03:31 2023 +0300<br><b>Page content update date:</b> Tue Oct 31 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>