.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> About documentation generator</embed>

---------


.. raw:: html

 <embed> <h1>About documentation generator</h1></embed>


This library was created in order to simplify the process of generating technical documentation for complex projects and simple projects.

The main idea of the project is to allow library users to create handwritten documentation with dynamic blocks, the information
for which is parsed from the code according to the rules specified in the configuration.

The system is flexible and easily expandable, as you can see when you start working with it. Write your first documentation today! :)


.. raw:: html

 <embed> <h2>How to use the library</h2></embed>


To use the library, you need to follow only 3 steps:

*  Create a configuration file that implements the interface `ConfigurationInterface </docs/1.about/_Classes/ConfigurationInterface.rst>`_.
 To simplify this step, a basic configuration ( `BaseConfiguration </docs/1.about/_Classes/BaseConfiguration.rst>`_ ) with the main settings has already been created, you can use it as a parent class.

*  Add documentation templates. These templates are the basis for future documentation. An example of the implementation of templates can be found here: *SelfDoc/Configuration/templates*

*  Run the documentation creation script:

.. code-block:: php

 $configuration = new Configuration();
 DocGenerator::generateDocumentation($configuration);



.. raw:: html

 <embed> <h2>Project сlass map</h2></embed>


You can see the full class map of this project on the page `BumbleDocGen class map </docs/1.about/map/index.rst>`_