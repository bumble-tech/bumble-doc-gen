.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> Source locators</embed>

---------


.. raw:: html

 <embed> <h1>Source locators</h1></embed>


Source locators are needed so that the parser knows which files to parse, or to get data on a specific file after the primary parsing procedure

Source locators are set in the configuration, in method `ConfigurationInterface::classEntityFilterCondition\(\) </docs/2.parser/4_sourceLocator/_Classes/ConfigurationInterface.rst>`_.
They can also be connected using plugins handle `OnLoadSourceLocatorsCollection </docs/2.parser/4_sourceLocator/_Classes/OnLoadSourceLocatorsCollection.rst>`_ event

**Usage example:**

.. code-block:: php

 public function getSourceLocators(): SourceLocatorsCollection
 {
     return SourceLocatorsCollection::create(
         new RecursiveDirectoriesSourceLocator([
             "{$this->getProjectRoot()}/BumbleDocGen",
             "{$this->getProjectRoot()}/SelfDoc",
         ]),
     );
 }



All source locators must implement the `SourceLocatorInterface </docs/2.parser/4_sourceLocator/_Classes/SourceLocatorInterface.rst>`_ interface.


.. raw:: html

 <embed> <h2>Built-in source locators</h2></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/2.parser/4_sourceLocator/_Classes/DirectorySourceLocator.rst'>DirectorySourceLocator</a> - Loads all files from the specified directory</li><li><a href='/docs/2.parser/4_sourceLocator/_Classes/AsyncSourceLocator.rst'>AsyncSourceLocator</a> - Lazy loading classes. Cannot be used for initial parsing of files, only for getting specific documents</li><li><a href='/docs/2.parser/4_sourceLocator/_Classes/RecursiveDirectoriesSourceLocator.rst'>RecursiveDirectoriesSourceLocator</a> - Loads all files from the specified directories, which are traversed recursively</li><li><a href='/docs/2.parser/4_sourceLocator/_Classes/FileIteratorSourceLocator.rst'>FileIteratorSourceLocator</a> - Loads all files using an iterator</li><li><a href='/docs/2.parser/4_sourceLocator/_Classes/SingleFileSourceLocator.rst'>SingleFileSourceLocator</a> - Loads one specific file by its path</li></ul></embed>
