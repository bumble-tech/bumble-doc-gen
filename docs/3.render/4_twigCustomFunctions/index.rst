.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> Template functions</embed>

---------


.. raw:: html

 <embed> <h1>Template filters:</h1></embed>


When generating pages, you can use functions that allow you to modify the content.
Functions available during page generation are defined in method `MainExtension::getFunctions\(\) </docs/3.render/4_twigCustomFunctions/_Classes/MainExtension.rst#mgetfunctions>`_

We use the twig template engine, you can get more information about working with functions here: https://twig.symfony.com/doc/1.x/advanced.html#functions

.. raw:: html

 <embed> <h2>How to use a function in a template:</h2></embed>


.. code-block:: twig

 {{ functionName(...parameters) }}


.. raw:: html

 <embed> <h2>Available template functions:</h2></embed>


.. raw:: html

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
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/GetDocumentedClassUrl.rst">getDocumentedClassUrl</a><br>
                                        Get the URL of a documented class by its name. If the class is found, next to the file where this method was called, the `_Classes` directory will be created, in which the documented class file will be created
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed classes</b></i><br>                </td>
                                <td>
                    <b>$className</b>
                </td>
                <td>
                    <i>string</i>
                </td>
                <td>The full name of the class for which the URL will be retrieved. If the class is not found, the DEFAULT_URL value will be returned.</td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$cursor</b>
                </td>
                <td>
                    <i>string</i>
                </td>
                <td>Cursor on the page of the documented class (for example, the name of a method or property)</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="5">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/DrawDocumentedClassLink.rst">drawDocumentedClassLink</a><br>
                                        Creates an entity link by object
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed classes</b></i><br>                </td>
                                <td>
                    <b>$classEntity</b>
                </td>
                <td>
                    <i><a href='/docs/3.render/4_twigCustomFunctions/_Classes/ClassEntity.rst'>ClassEntity</a></i>
                </td>
                <td></td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$cursor</b>
                </td>
                <td>
                    <i>string</i>
                </td>
                <td></td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$useShortName</b>
                </td>
                <td>
                    <i>bool</i>
                </td>
                <td></td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="5">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/LoadPluginsContent.rst">loadPluginsContent</a><br>
                    <i><b>:warning: For internal use</b></i><br>                    Process class template blocks with plugins. The method returns the content processed by plugins.
                                    </td>
                                <td>
                    <b>$content</b>
                </td>
                <td>
                    <i>string</i>
                </td>
                <td>Content to be processed by plugins</td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$classEntity</b>
                </td>
                <td>
                    <i><a href='/docs/3.render/4_twigCustomFunctions/_Classes/ClassEntity.rst'>ClassEntity</a></i>
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
                    <i>string</i>
                </td>
                <td>Content block type. @see BaseTemplatePluginInterface::BLOCK_*</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="3">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/IsSubclassOf.rst">isSubclassOf</a><br>
                                        Checks if the object has this class as one of its parents or implements it
                                    </td>
                                <td>
                    <b>$objectOrClass</b>
                </td>
                <td>
                    <i>mixed</i>
                </td>
                <td>A class name or an object instance. No error is generated if the class does not exist.</td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$class</b>
                </td>
                <td>
                    <i>string</i>
                </td>
                <td>The class name</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="5">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/PrintClassEntityCollectionAsList.rst">printClassEntityCollectionAsList</a><br>
                                        Outputting entity data as HTML or rst list
                                    </td>
                                <td>
                    <b>$classEntityCollection</b>
                </td>
                <td>
                    <i><a href='/docs/3.render/4_twigCustomFunctions/_Classes/ClassEntityCollection.rst'>ClassEntityCollection</a></i>
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
                    <i>string</i>
                </td>
                <td>List tag type</td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$skipDescription</b>
                </td>
                <td>
                    <i>bool</i>
                </td>
                <td>Don&#039;t print description</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="3">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/DrawDocumentationMenu.rst">drawDocumentationMenu</a><br>
                                        Generate documentation menu in HTML or rst format. To generate the menu, the start page is taken, and all links with this page are recursively collected for it, after which the html menu is created.
                    <br><i><b>:warning: This function initiates the creation of documents for the displayed classes</b></i><br>                </td>
                                <td>
                    <b>$startPageKey</b>
                </td>
                <td>
                    <i>string | null</i>
                </td>
                <td>Relative path to the page from which the menu will be generated (only child pages will be taken into account). By default, the main documentation page is used.</td>
            </tr>
                        <tr>
                <td colspan="3"></td>
            </tr>
                                    <tr>
                                <td>
                    <b>$maxDeep</b>
                </td>
                <td>
                    <i>int | null</i>
                </td>
                <td>Maximum parsing depth of documented links starting from the current page. By default, this restriction is disabled.</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="5">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/GeneratePageBreadcrumbs.rst">generatePageBreadcrumbs</a><br>
                                        Function to generate breadcrumbs on the page
                                    </td>
                                <td>
                    <b>$currentPageTitle</b>
                </td>
                <td>
                    <i>string</i>
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
                    <i>string</i>
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
                    <i>bool</i>
                </td>
                <td>If set to true, the page from which parsing starts will not participate in the formation of breadcrumbs This option is useful when working with the _self value in a template, as it returns the full path to the current template, and the reference to it in breadcrumbs should not be clickable.</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                            
                        <tr>
                                <td rowspan="1">
                    <a href="/docs/3.render/4_twigCustomFunctions/_Classes/DrawClassMap.rst">drawClassMap</a><br>
                                        Generate class map in HTML or rst format
                                    </td>
                                <td>
                    <b>$classEntityCollections</b>
                </td>
                <td>
                    <i><a href='/docs/3.render/4_twigCustomFunctions/_Classes/ClassEntityCollection.rst'>ClassEntityCollection</a></i>
                </td>
                <td>The collection of entities for which the class map will be generated</td>
            </tr>
                                                <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            </tbody>
    </table>
