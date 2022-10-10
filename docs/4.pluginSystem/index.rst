.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> Plugin system</embed>

---------


.. raw:: html

 <embed> <h1>Plugin system</h1></embed>


The documentation generator initially includes the possibility of expanding the functionality.
Plugins allow you to add the necessary functionality to the system without changing its core.


.. raw:: html

 <embed> <h2>Using plugins</h2></embed>


Plugins can be added in documentation generator configuration, in method `ConfigurationInterface::getPlugins\(\) </docs/4.pluginSystem/_Classes/ConfigurationInterface.rst#mgetplugins>`_


.. raw:: html

 <embed> <h2>Adding a new plugin</h2></embed>


If you decide to add a new plugin, there are a few things you need to do:

*  Implement an interface that matches one of the available plugin interfaces
*  Add plugin to configuration `ConfigurationInterface::getPlugins\(\) </docs/4.pluginSystem/_Classes/ConfigurationInterface.rst#mgetplugins>`_:

.. code-block:: php

 public function getPlugins(): PluginsCollection
 {
     $plugins = parent::getPlugins();
     $plugins->add(new TwigFunctionClassParserPlugin());
     $plugins->add(new TwigFilterClassParserPlugin());
     return $plugins;
 }



.. raw:: html

 <embed> <h2>Available plugin interfaces</h2></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/4.pluginSystem/_Classes/CustomSourceLocatorInterface.rst'>CustomSourceLocatorInterface</a> - Plugin for working with custom source locators. Why? -sometimes it is better to move the complex logic of resource
 locators out of the configurator into a separate plugin.</li><li><a href='/docs/4.pluginSystem/_Classes/ClassEntityPluginInterface.rst'>ClassEntityPluginInterface</a> - Plugin for working with class entities</li><li><a href='/docs/4.pluginSystem/_Classes/ClassEntityCollectionPluginInterface.rst'>ClassEntityCollectionPluginInterface</a> - Plugin for working with ClassEntityCollection</li><li><a href='/docs/4.pluginSystem/_Classes/EntityDocRenderPluginInterface.rst'>EntityDocRenderPluginInterface</a> - Plugin for working with templates of documented entities</li><li><a href='/docs/4.pluginSystem/_Classes/TemplatePluginInterface.rst'>TemplatePluginInterface</a> - Plugin for working with page templates</li></ul></embed>


*A plugin can implement multiple interfaces at once*


.. raw:: html

 <embed> <h2>Example</h2></embed>


Several plugins have been written to create this document. They can be considered as an example:

.. raw:: html

 <embed> <pre>└──<b>SelfDoc</b>/
 │  └──<b>Configuration</b>/
 │  │  └──<b>Plugin</b>/
 │  │  │  ├──<b>TwigFilterClassParser</b>/
 │  │  │  │  └── <a href='/docs/4.pluginSystem/_Classes/TwigFilterClassParserPlugin.rst'>TwigFilterClassParserPlugin.php</a>
 │  │  │  └──<b>TwigFunctionClassParser</b>/
 │  │  │  │  └── <a href='/docs/4.pluginSystem/_Classes/TwigFunctionClassParserPlugin.rst'>TwigFunctionClassParserPlugin.php</a>
 </pre></embed>


