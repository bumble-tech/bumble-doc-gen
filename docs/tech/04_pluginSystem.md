[BumbleDocGen](/docs/README.md) **/**
[Technical description of the project](/docs/tech/readme.md) **/**
Plugin system

---


# Plugin system

The documentation generator includes the ability to expand the functionality using plugins that allow you to add the necessary functionality to the system without changing its core.

The system is built on the basis of an event model, each plugin class must implement [a]PluginInterface[/a].

## Configuration example

You can add your plugins to the configuration like this:

```yaml
plugins:
  - class: \SelfDocConfig\Plugin\TwigFilterClassParser\TwigFilterClassParserPlugin
  - class: \SelfDocConfig\Plugin\TwigFunctionClassParser\TwigFunctionClassParserPlugin
```

## Default plugins

Below are the plugins that are available by default when working with the library.
Plugins for any programming languages work regardless of which language handler is configured in the configuration.

| Plugin | PL | Handles events | Description |
|-|-|-|-|
| <a href='/docs/tech/classes/LastPageCommitter.md'>LastPageCommitter</a> | any | <ul><li> [BeforeCreatingDocFile](/docs/tech/classes/BeforeCreatingDocFile.md) </li></ul> | Plugin for adding a block with information about the last commit and date of page update to the generated document |
| <a href='/docs/tech/classes/PageHtmlLinkerPlugin.md'>PageHtmlLinkerPlugin</a> | any | <ul><li> [BeforeCreatingDocFile](/docs/tech/classes/BeforeCreatingDocFile.md) </li></ul> | Adds URLs to empty links in HTML format;  Links may contain:  1) Short entity name  2) Full entity name  3) Relative link to the entity file from the root directory of the project  4) Page title ( title )  5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )  6) Relative reference to the entity document from the root directory of the documentation |
| <a href='/docs/tech/classes/PageLinkerPlugin.md'>PageLinkerPlugin</a> | any | <ul><li> [BeforeCreatingDocFile](/docs/tech/classes/BeforeCreatingDocFile.md) </li></ul> | Adds URLs to empty links in MD format;  Links may contain:  1) Short entity name  2) Full entity name  3) Relative link to the entity file from the root directory of the project  4) Page title ( title )  5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )  6) Relative reference to the entity document from the root directory of the documentation |
| <a href='/docs/tech/classes/PageRstLinkerPlugin.md'>PageRstLinkerPlugin</a> | any | <ul><li> [BeforeCreatingDocFile](/docs/tech/classes/BeforeCreatingDocFile.md) </li></ul> | Adds URLs to empty links in rst format;  Links may contain:  1) Short entity name  2) Full entity name  3) Relative link to the entity file from the root directory of the project  4) Page title ( title )  5) Template key ( BreadcrumbsHelper::getTemplateLinkKey() )  6) Relative reference to the entity document from the root directory of the documentation |
| <a href='/docs/tech/classes/BasePhpStubberPlugin.md'>BasePhpStubberPlugin</a> | PHP | <ul><li> [OnGettingResourceLink](/docs/tech/classes/OnGettingResourceLink.md) </li><li> [OnCheckIsEntityCanBeLoaded](/docs/tech/classes/OnCheckIsEntityCanBeLoaded.md) </li></ul> | Adding links to type documentation and documentation of built-in PHP classes |
| <a href='/docs/tech/classes/PhpDocumentorStubberPlugin.md'>PhpDocumentorStubberPlugin</a> | PHP | <ul><li> [OnGettingResourceLink](/docs/tech/classes/OnGettingResourceLink.md) </li><li> [OnCheckIsEntityCanBeLoaded](/docs/tech/classes/OnCheckIsEntityCanBeLoaded.md) </li></ul> | Adding links to the documentation of PHP classes in the \phpDocumentor namespace |
| <a href='/docs/tech/classes/PhpUnitStubberPlugin.md'>PhpUnitStubberPlugin</a> | PHP | <ul><li> [OnGettingResourceLink](/docs/tech/classes/OnGettingResourceLink.md) </li><li> [OnCheckIsEntityCanBeLoaded](/docs/tech/classes/OnCheckIsEntityCanBeLoaded.md) </li></ul> | Adding links to the documentation of PHP classes in the \PHPUnit namespace |
| <a href='/docs/tech/classes/StubberPlugin.md'>StubberPlugin</a> | PHP | <ul><li> [OnGettingResourceLink](/docs/tech/classes/OnGettingResourceLink.md) </li><li> [OnCheckIsEntityCanBeLoaded](/docs/tech/classes/OnCheckIsEntityCanBeLoaded.md) </li></ul> | The plugin allows you to automatically provide links to github repositories for documented classes from libraries included in composer |
| <a href='/docs/tech/classes/Daux.md'>Daux</a> | PHP | <ul><li> [OnCreateDocumentedEntityWrapper](/docs/tech/classes/OnCreateDocumentedEntityWrapper.md) </li><li> [OnGetTemplatePathByRelativeDocPath](/docs/tech/classes/OnGetTemplatePathByRelativeDocPath.md) </li><li> [OnGetProjectTemplatesDirs](/docs/tech/classes/OnGetProjectTemplatesDirs.md) </li><li> [BeforeCreatingDocFile](/docs/tech/classes/BeforeCreatingDocFile.md) </li><li> [BeforeCreatingEntityDocFile](/docs/tech/classes/BeforeCreatingEntityDocFile.md) </li><li> [AfterRenderingEntities](/docs/tech/classes/AfterRenderingEntities.md) </li></ul> |  |
| <a href='/docs/tech/classes/EntityDocUnifiedPlacePlugin.md'>EntityDocUnifiedPlacePlugin</a> | PHP | <ul><li> [OnCreateDocumentedEntityWrapper](/docs/tech/classes/OnCreateDocumentedEntityWrapper.md) </li><li> [OnGetTemplatePathByRelativeDocPath](/docs/tech/classes/OnGetTemplatePathByRelativeDocPath.md) </li><li> [OnGetProjectTemplatesDirs](/docs/tech/classes/OnGetProjectTemplatesDirs.md) </li></ul> | This plugin changes the algorithm for saving entity documents. The standard system stores each file in a directory next to the file where it was requested. This behavior changes and all documents are saved in a separate directory structure, so they are not duplicated. |

## Default events

-  [BeforeParsingProcess](/docs/tech/classes/BeforeParsingProcess.md)
-  [AfterRenderingEntities](/docs/tech/classes/AfterRenderingEntities.md)
-  [BeforeCreatingDocFile](/docs/tech/classes/BeforeCreatingDocFile.md) - Called before the content of the documentation document is saved to a file
-  [BeforeCreatingEntityDocFile](/docs/tech/classes/BeforeCreatingEntityDocFile.md)
-  [BeforeRenderingDocFiles](/docs/tech/classes/BeforeRenderingDocFiles.md) - The event occurs before the main documents begin rendering
-  [BeforeRenderingEntities](/docs/tech/classes/BeforeRenderingEntities.md) - The event occurs before the rendering of entity documents begins, after the main documents have been created
-  [OnCreateDocumentedEntityWrapper](/docs/tech/classes/OnCreateDocumentedEntityWrapper.md) - The event occurs when an entity is added to the list for documentation
-  [OnGetProjectTemplatesDirs](/docs/tech/classes/OnGetProjectTemplatesDirs.md) - This event occurs when all directories containing document templates are retrieved
-  [OnGetTemplatePathByRelativeDocPath](/docs/tech/classes/OnGetTemplatePathByRelativeDocPath.md) - The event occurs when the path to the template file is obtained relative to the path to the document
-  [OnGettingResourceLink](/docs/tech/classes/OnGettingResourceLink.md) - Event occurs when a reference to an entity (resource) is received
-  [OnLoadEntityDocPluginContent](/docs/tech/classes/OnLoadEntityDocPluginContent.md) - Called when entity documentation is generated (plugin content loading)
-  [OnCheckIsEntityCanBeLoaded](/docs/tech/classes/OnCheckIsEntityCanBeLoaded.md)
-  [AfterLoadingPhpEntitiesCollection](/docs/tech/classes/AfterLoadingPhpEntitiesCollection.md) - The event is called after the initial creation of a collection of PHP entities
-  [OnAddClassEntityToCollection](/docs/tech/classes/OnAddClassEntityToCollection.md) - Called when each class entity is added to the entity collection


## Adding a new plugin

If you decide to add a new plugin, there are a few things you need to do:

### 1) Add plugin class and implement events handling

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

### 2) Add the new plugin to the configuration

```yaml
plugins:
  - class: \Demo\Plugin\DemoFakeResourceLinkPlugin\DemoFakeResourceLinkPlugin
```


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Thu Jan 18 17:19:08 2024 +0300<br>**Page content update date:** Thu Jan 18 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)