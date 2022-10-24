.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> Plugin system</embed>

---------


.. raw:: html

 <embed> <h1>Plugin system</h1></embed>


The documentation generator initially includes the possibility of expanding the functionality.
Plugins allow you to add the necessary functionality to the system without changing its core.

Plugin system based on event model.


.. raw:: html

 <embed> <h2>Using plugins</h2></embed>


Plugins can be added in documentation generator configuration, in method `ConfigurationInterface::getPlugins\(\) </docs/4.pluginSystem/_Classes/ConfigurationInterface.rst#mgetplugins>`_


.. raw:: html

 <embed> <h2>Adding a new plugin</h2></embed>


If you decide to add a new plugin, there are a few things you need to do:

*  Implement events handling in plugin class
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

 <embed> <h2>Available plugin events</h2></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/4.pluginSystem/_Classes/OnLoadEntityDocPluginContent.rst'>OnLoadEntityDocPluginContent</a> - Called when class documentation is generated (plugin content loading)</li><li><a href='/docs/4.pluginSystem/_Classes/BeforeCreatingDocFile.rst'>BeforeCreatingDocFile</a> - Called before the content of the documentation document is saved to a file</li><li><a href='/docs/4.pluginSystem/_Classes/OnLoadSourceLocatorsCollection.rst'>OnLoadSourceLocatorsCollection</a> - Called when source locators are loaded</li><li><a href='/docs/4.pluginSystem/_Classes/AfterCreationClassEntityCollection.rst'>AfterCreationClassEntityCollection</a> - The event is called after the initial creation of a collection of class entities</li><li><a href='/docs/4.pluginSystem/_Classes/OnAddClassEntityToCollection.rst'>OnAddClassEntityToCollection</a> - Called when each class entity is added to the entity collection</li></ul></embed>


*A plugin can handle multiple events*


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


