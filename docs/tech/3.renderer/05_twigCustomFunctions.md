<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> Template functions<hr> </embed>

<embed> <h1>Template functions</h1> </embed>

When generating pages, you can use functions that allow you to modify the content.
Functions available during page generation are defined in <a href='/docs/tech/1.configuration/readme.md'>the configuration</a> ( `twig_functions` parameter )

We use the twig template engine, you can get more information about working with functions here: https://twig.symfony.com/doc/1.x/advanced.html#functions

You can also create your own functions and use them for any purpose, such as loading some additional information into a template, filtering data, or formatting the output of any information.
Each function must implement the <a href="/docs/tech/3.renderer/classes/CustomFunctionInterface.md">CustomFunctionInterface</a> interface, implement the `__invoke` magic method, and be added to the configuration.

<embed> <h2>How to use a function in a template</h2> </embed>

<pre>&#123;&#123; functionName(...parameters) &#125;&#125;</pre>

<embed> <h2>Configuration example</h2> </embed>

You can add your custom functions to the configuration like this:

```yaml
twig_functions:
  - class: \SelfDocConfig\Twig\CustomFunction\FindEntitiesClassesByCollectionClassName
  - class: \SelfDocConfig\Twig\CustomFunction\PrintClassCollectionAsGroupedTable
  - class: \SelfDocConfig\Twig\CustomFunction\GetConfigParametersDescription
```

It is important to remember that when a template is inherited, custom functions are not overridden and augmented.
This information is detailed on page <a href="/docs/tech/1.configuration/readme.md">Configuration files</a>.

<embed> <h2>Defautl template functions</h2> </embed>

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
                                  <td rowspan="3">
                    <a href="/docs/tech/3.renderer/classes/DrawDocumentationMenu.md">drawDocumentationMenu</a><br>
                                        Generate documentation menu in HTML format. To generate the menu, the start page is taken, and all links with this page are recursively collected for it, after which the html menu is created.
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$startPageKey</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></i>
                 </td>
                 <td>Maximum parsing depth of documented links starting from the current page. By default, this restriction is disabled.</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="5">
                    <a href="/docs/tech/3.renderer/classes/DrawDocumentedEntityLink.md">drawDocumentedEntityLink</a><br>
                                        Creates an entity link by object
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$entity</b>
                 </td>
                 <td>
                    <i><a href='/docs/tech/3.renderer/classes/RootEntityInterface.md'>RootEntityInterface</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
                 </td>
                 <td>Use the full or short entity name in the link</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="1">
                    <a href="/docs/tech/3.renderer/classes/FileGetContents.md">fileGetContents</a><br>
                                        Displaying the content of a file or web resource
                                     </td>
                                  <td>
                    <b>$resourceName</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                 </td>
                 <td>Resource name, url or path to the resource. The path can contain shortcodes with parameters from the configuration (%param_name%)</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="5">
                    <a href="/docs/tech/3.renderer/classes/GeneratePageBreadcrumbs.md">generatePageBreadcrumbs</a><br>
                                        Function to generate breadcrumbs on the page
                                     </td>
                                  <td>
                    <b>$currentPageTitle</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                 </td>
                 <td>Title of the current page</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$templatePath</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                 </td>
                 <td>Path to the template from which the breadcrumbs will be generated</td>
              </tr>
                            <tr>
                 <td colspan="3"></td>
              </tr>
                                        <tr>
                                  <td>
                    <b>$skipFirstTemplatePage</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
                 </td>
                 <td>If set to true, the page from which parsing starts will not participate in the formation of breadcrumbs This option is useful when working with the _self value in a template, as it returns the full path to the current template, and the reference to it in breadcrumbs should not be clickable.</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="1">
                    <a href="/docs/tech/3.renderer/classes/GetDocumentationPageUrl_2.md">getDocumentationPageUrl</a><br>
                                        Creates an entity link by object
                                     </td>
                                  <td>
                    <b>$key</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                 </td>
                 <td>The key by which to look up the URL of the page. Can be the title of a page, a path to a template, or a generated document</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="7">
                    <a href="/docs/tech/3.renderer/classes/GetDocumentedEntityUrl_2.md">getDocumentedEntityUrl</a><br>
                                        Get the URL of a documented entity by its name. If the entity is found, next to the file where this method was called, the `EntityDocRendererInterface::getDocFileExtension()` directory will be created, in which the documented entity file will be created
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$rootEntityCollection</b>
                 </td>
                 <td>
                    <i><a href='/docs/tech/3.renderer/classes/RootEntityCollection.md'>RootEntityCollection</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
                 </td>
                 <td>If true, creates an entity document. Otherwise, just gives a reference to the entity code</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="5">
                    <a href="/docs/tech/3.renderer/classes/LoadPluginsContent.md">loadPluginsContent</a><br>
                    <i><b>:warning: For internal use</b></i><br>                    Process entity template blocks with plugins. The method returns the content processed by plugins.
                                     </td>
                                  <td>
                    <b>$content</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
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
                    <i><a href='/docs/tech/3.renderer/classes/RootEntityInterface.md'>RootEntityInterface</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                 </td>
                 <td>Content block type. @see BaseTemplatePluginInterface::BLOCK_*</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="7">
                    <a href="/docs/tech/3.renderer/classes/PrintEntityCollectionAsList.md">printEntityCollectionAsList</a><br>
                                        Outputting entity data as HTML list
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$rootEntityCollection</b>
                 </td>
                 <td>
                    <i><a href='/docs/tech/3.renderer/classes/RootEntityCollection.md'>RootEntityCollection</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
                 </td>
                 <td>Use the full name of the entity in the list</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="1">
                    <a href="/docs/tech/3.renderer/classes/DrawClassMap.md">drawClassMap</a><br>
                                        Generate class map in HTML format
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed entities</b></i><br>                 </td>
                                  <td>
                    <b>$classEntityCollections</b>
                 </td>
                 <td>
                    <i><a href='/docs/tech/3.renderer/classes/ClassEntityCollection_2.md'>ClassEntityCollection</a></i>
                 </td>
                 <td>The collection of entities for which the class map will be generated</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                                                          <tr>
                                  <td rowspan="3">
                    <a href="/docs/tech/3.renderer/classes/GetClassMethodsBodyCode.md">getClassMethodsBodyCode</a><br>
                                        Get the code of the specified class methods as a formatted string
                                     </td>
                                  <td>
                    <b>$className</b>
                 </td>
                 <td>
                    <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
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
                    <i><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></i>
                 </td>
                 <td>List of class methods whose code needs to be retrieved</td>
              </tr>
                                            <tr>
             <td colspan="4">&nbsp;</td>
          </tr>
                   </tbody>
</table>


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Oct 28 11:03:31 2023 +0300<br><b>Page content update date:</b> Tue Oct 31 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>