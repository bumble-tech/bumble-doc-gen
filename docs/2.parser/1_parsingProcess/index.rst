.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> Parsing process</embed>

---------


.. raw:: html

 <embed> <h1>Parsing process</h1></embed>


*  The parser goes through all files according to the rules set in the source locators. Source locator settings are taken from method `ConfigurationInterface::getSourceLocators\(\) </docs/2.parser/1_parsingProcess/_Classes/ConfigurationInterface.rst#mgetsourcelocators>`_
*  Each class found using the resource locator is checked for documentability. The conditions for adding are obtained from the method `ConfigurationInterface::classEntityFilterCondition\(\) </docs/2.parser/1_parsingProcess/_Classes/ConfigurationInterface.rst#mclassentityfiltercondition>`_
*  If the class can be documented, its methods, constants and properties are parsed for it. The ability to parse each attribute is checked using the appropriate methods:

   *  For constants - `ConfigurationInterface::classConstantEntityFilterCondition\(\) </docs/2.parser/1_parsingProcess/_Classes/ConfigurationInterface.rst#mclassconstantentityfiltercondition>`_
   *  For properties - `ConfigurationInterface::propertyEntityFilterCondition\(\) </docs/2.parser/1_parsingProcess/_Classes/ConfigurationInterface.rst#mpropertyentityfiltercondition>`_
   *  For methods - `ConfigurationInterface::methodEntityFilterCondition\(\) </docs/2.parser/1_parsingProcess/_Classes/ConfigurationInterface.rst#mmethodentityfiltercondition>`_

*  The entity is processed using the `ClassEntityPluginInterface::beforeAddingClassEntity\(\) </docs/2.parser/1_parsingProcess/_Classes/ClassEntityPluginInterface.rst#mbeforeaddingclassentity>`_ method
*  The entity is added to the `ClassEntityCollection </docs/2.parser/1_parsingProcess/_Classes/ClassEntityCollection.rst>`_
*  `ClassEntityCollection </docs/2.parser/1_parsingProcess/_Classes/ClassEntityCollection.rst>`_ is handled by plugins by method `ClassEntityCollectionPluginInterface::afterCreationClassEntityCollection\(\) </docs/2.parser/1_parsingProcess/_Classes/ClassEntityCollectionPluginInterface.rst#maftercreationclassentitycollection>`_


The result of the parser is a filled collection `ClassEntityCollection </docs/2.parser/1_parsingProcess/_Classes/ClassEntityCollection.rst>`_

.. code-block:: php

 $projectParser = ProjectParser::create($configuration);
 $classEntityCollection = $projectParser->parse();
