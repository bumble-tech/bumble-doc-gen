.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.rst">Plugin system</a> <b>/</b> CustomSourceLocatorInterface</embed>


Description of the `CustomSourceLocatorInterface </BumbleDocGen/Plugin/CustomSourceLocatorInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    interface CustomSourceLocatorInterface extends BumbleDocGen\Plugin\PluginInterface


..

        Plugin for working with custom source locators\. Why\? -sometimes it is better to move the complex logic of resource     locators out of the configurator into a separate plugin\.







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetsourcelocator">getSourceLocator</a> - <i>Method for getting custom resource locator</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetsourcelocator:

* `# <mgetsourcelocator_>`_  ``getSourceLocator``   **|** `source code </BumbleDocGen/Plugin/CustomSourceLocatorInterface.php#L21>`_
.. code-block:: php

        public function getSourceLocator(): BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface;


..

    Method for getting custom resource locator


**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorInterface </docs/_Classes/SourceLocatorInterface\.rst>`_


**See:**

#. `BumbleDocGen\\Parser\\ProjectParser::create\(\) </BumbleDocGen/Parser/ProjectParser.php#L34>`_ 

________


