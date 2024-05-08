[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Renderer](readme.md) **/**
Template functions

---


# Template functions

When generating pages, you can use functions that allow you to modify the content.
Functions available during page generation are defined in <a href='/docs/tech/01_configuration.md'>the configuration</a> ( `twig_functions` parameter )

We use the twig template engine, you can get more information about working with functions here: https://twig.symfony.com/doc/1.x/advanced.html#functions

You can also create your own functions and use them for any purpose, such as loading some additional information into a template, filtering data, or formatting the output of any information.
Each function must implement the [CustomFunctionInterface](classes/CustomFunctionInterface.md) interface, implement the `__invoke` magic method, and be added to the configuration.

## How to use a function in a template

<pre>&#123;&#123; functionName(...parameters) &#125;&#125;</pre>

## Configuration example

You can add your custom functions to the configuration like this:

```yaml
twig_functions:
  - class: \SelfDocConfig\Twig\CustomFunction\FindEntitiesClassesByCollectionClassName
  - class: \SelfDocConfig\Twig\CustomFunction\PrintClassCollectionAsGroupedTable
  - class: \SelfDocConfig\Twig\CustomFunction\GetConfigParametersDescription
```

It is important to remember that when a template is inherited, custom functions are not overridden and augmented.
This information is detailed on page [Configuration](/docs/tech/01_configuration.md).

## Default template functions

Several functions are already defined in the base configuration.
There are both general functions for all types of entities, and functions that only serve to process entities that belong to a particular PL.

Here is a list of functions available by default:

<table>
   <thead>
      <tr>
         <th rowspan="3">Function</th>
         <th colspan="3">Parameters</th>
      </tr>
      <tr>
         <th>name</th>
         <th>type</th>
         <th>description</th>
      </tr>
      <tr>
         <th colspan="4"></th>
      </tr>
   </thead>
   <tbody>
                                              <tr>
                                  <td rowspan="5">
                    <a href="classes/DrawDocumentationMenu.md">drawDocumentationMenu</a><br>
                                        Generate documentation menu in MD format. To generate the menu, the start page is taken, and all links with this page are recursively collected for it, after which the html menu is created.
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$startPageKey</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php) | [null](https://www.php.net/manual/en/language.types.null.php)</i>
                 </td>
                 <td>Relative path to the page from which the menu will be generated (only child pages will be taken into account). By default, the main documentation page (readme.md) is used.</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$maxDeep</b>
                 </td>
                 <td>
                    <i>[int](https://www.php.net/manual/en/language.types.integer.php) | [null](https://www.php.net/manual/en/language.types.null.php)</i>
                 </td>
                 <td>Maximum parsing depth of documented links starting from the current page. By default, this restriction is disabled.</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="7">
                    <a href="classes/DrawDocumentedEntityLink.md">drawDocumentedEntityLink</a><br>
                                        Creates an entity link by object
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$entity</b>
                 </td>
                 <td>
                    <i>[\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](classes/RootEntityInterface.md)</i>
                 </td>
                 <td>The entity for which we want to get the link</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$cursor</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>Reference to an element inside an entity, for example, the name of a function/constant/property</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$useShortName</b>
                 </td>
                 <td>
                    <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                 </td>
                 <td>Use the full or short entity name in the link</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                                      <tr>
                                  <td rowspan="3">
                    <a href="classes/DrawPageBreadcrumbs.md">drawPageBreadcrumbs</a><br>
                                        Function to generate breadcrumbs on the page
                                     </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$customPageTitle</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php) | [null](https://www.php.net/manual/en/language.types.null.php)</i>
                 </td>
                 <td>Custom title of the current page</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="1">
                    <a href="classes/FileGetContents.md">fileGetContents</a><br>
                                        Displaying the content of a file or web resource
                                     </td>
                                  <td>
                    <b>$resourceName</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>Resource name, url or path to the resource. The path can contain shortcodes with parameters from the configuration (%param_name%)</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="1">
                    <a href="classes/GetDocumentationPageUrl.md">getDocumentationPageUrl</a><br>
                                        Creates an entity link by object
                                     </td>
                                  <td>
                    <b>$key</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>The key by which to look up the URL of the page. Can be the title of a page, a path to a template, or a generated document</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="9">
                    <a href="classes/GetDocumentedEntityUrl.md">getDocumentedEntityUrl</a><br>
                                        Get the URL of a documented entity by its name. If the entity is found, next to the file where this method was called, the `EntityDocRendererInterface::getDocFileExtension()` directory will be created, in which the documented entity file will be created
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$rootEntityCollection</b>
                 </td>
                 <td>
                    <i>[\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](classes/RootEntityCollection.md)</i>
                 </td>
                 <td>Processed entity collection</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$entityName</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>The full name of the entity for which the URL will be retrieved. If the entity is not found, the DEFAULT_URL value will be returned.</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$cursor</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>Cursor on the page of the documented entity (for example, the name of a method or property)</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$createDocument</b>
                 </td>
                 <td>
                    <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                 </td>
                 <td>If true, creates an entity document. Otherwise, just gives a reference to the entity code</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="5">
                    <a href="classes/LoadPluginsContent.md">loadPluginsContent</a><br>
                    <i><b>:warning: For internal use</b></i><br>                    Process entity template blocks with plugins. The method returns the content processed by plugins.
                                     </td>
                                  <td>
                    <b>$content</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>Content to be processed by plugins</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$entity</b>
                 </td>
                 <td>
                    <i>[\BumbleDocGen\Core\Parser\Entity\RootEntityInterface](classes/RootEntityInterface.md)</i>
                 </td>
                 <td>The entity for which we process the content block</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$blockType</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>Content block type. @see BaseTemplatePluginInterface::BLOCK_*</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="9">
                    <a href="classes/PrintEntityCollectionAsList.md">printEntityCollectionAsList</a><br>
                                        Outputting entity data as MD list
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$rootEntityCollection</b>
                 </td>
                 <td>
                    <i>[\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](classes/RootEntityCollection.md)</i>
                 </td>
                 <td>Processed entity collection</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$type</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>List tag type (&lt;ul&gt;/&lt;ol&gt;)</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$skipDescription</b>
                 </td>
                 <td>
                    <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                 </td>
                 <td>Don&#039;t print description of this entities</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$useFullName</b>
                 </td>
                 <td>
                    <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                 </td>
                 <td>Use the full name of the entity in the list</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="3">
                    <a href="classes/DisplayClassApiMethods.md">displayClassApiMethods</a><br>
                                        Display all API methods of a class
                                     </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$className</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>Name of the class for which API methods need to be displayed</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="3">
                    <a href="classes/DrawClassMap.md">drawClassMap</a><br>
                                        Generate class map in HTML format
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$context</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td></td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$entitiesCollections</b>
                 </td>
                 <td>
                    <i>[\BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection](classes/PhpEntitiesCollection.md)</i>
                 </td>
                 <td>The collection of entities for which the class map will be generated</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="3">
                    <a href="classes/GetClassMethodsBodyCode.md">getClassMethodsBodyCode</a><br>
                                        Get the code of the specified class methods as a formatted string
                                     </td>
                                  <td>
                    <b>$className</b>
                 </td>
                 <td>
                    <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                 </td>
                 <td>The name of the class whose methods are to be retrieved</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$methodsNames</b>
                 </td>
                 <td>
                    <i>[array](https://www.php.net/manual/en/language.types.array.php)</i>
                 </td>
                 <td>List of class methods whose code needs to be retrieved</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                   </tbody>
</table>


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)