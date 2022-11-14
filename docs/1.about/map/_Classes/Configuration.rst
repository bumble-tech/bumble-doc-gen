.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> Configuration</embed>


Description of the `Configuration </SelfDoc/Configuration/Configuration.php>`_ class:
-----------------------






.. code-block:: php

    namespace SelfDoc\Configuration;

    final class Configuration extends BumbleDocGen\BaseConfiguration implements BumbleDocGen\ConfigurationInterface


..

        Basic configuration for project documentation







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetprojectroot">getProjectRoot</a> - <i>Get project root (absolute path)</i></li>
                <li><a href="#mgettemplatesdir">getTemplatesDir</a> - <i>Directory with documentation templates (absolute path)</i></li>
                <li><a href="#mgetoutputdirbaseurl">getOutputDirBaseUrl</a> - <i>Base URL of the generated document</i></li>
                <li><a href="#mgetsourcelocators">getSourceLocators</a> - <i>Get a collection of source locators</i></li>
                <li><a href="#mclassentityfiltercondition">classEntityFilterCondition</a> </li>
                <li><a href="#mgetplugins">getPlugins</a> </li>
                <li><a href="#mgetcachedir">getCacheDir</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetprojectroot:

* `# <mgetprojectroot_>`_  ``getProjectRoot``   **|** `source code </SelfDoc/Configuration/Configuration.php#L19>`_
.. code-block:: php

        public function getProjectRoot(): string;


..

    Get project root \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mgettemplatesdir:

* `# <mgettemplatesdir_>`_  ``getTemplatesDir``   **|** `source code </SelfDoc/Configuration/Configuration.php#L24>`_
.. code-block:: php

        public function getTemplatesDir(): string;


..

    Directory with documentation templates \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mgetoutputdirbaseurl:

* `# <mgetoutputdirbaseurl_>`_  ``getOutputDirBaseUrl``   **|** `source code </SelfDoc/Configuration/Configuration.php#L29>`_
.. code-block:: php

        public function getOutputDirBaseUrl(): string;


..

    Base URL of the generated document


**Parameters:** not specified


**Return value:** string

________

.. _mgetsourcelocators:

* `# <mgetsourcelocators_>`_  ``getSourceLocators``   **|** `source code </SelfDoc/Configuration/Configuration.php#L34>`_
.. code-block:: php

        public function getSourceLocators(): BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;


..

    Get a collection of source locators


**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection\.php>`_

________

.. _mclassentityfiltercondition:

* `# <mclassentityfiltercondition_>`_  ``classEntityFilterCondition``   **|** `source code </SelfDoc/Configuration/Configuration.php#L44>`_
.. code-block:: php

        public function classEntityFilterCondition(BumbleDocGen\Parser\Entity\ClassEntity $classEntity): BumbleDocGen\Parser\FilterCondition\ConditionInterface;




**Parameters:**

.. raw:: html

    <table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
            <tr>
            <td>$classEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </BumbleDocGen/Parser/FilterCondition/ConditionInterface\.php>`_

________

.. _mgetplugins:

* `# <mgetplugins_>`_  ``getPlugins``   **|** `source code </SelfDoc/Configuration/Configuration.php#L49>`_
.. code-block:: php

        public function getPlugins(): BumbleDocGen\Plugin\PluginsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </BumbleDocGen/Plugin/PluginsCollection\.php>`_

________

.. _mgetcachedir:

* `# <mgetcachedir_>`_  ``getCacheDir``   **|** `source code </SelfDoc/Configuration/Configuration.php#L57>`_
.. code-block:: php

        public function getCacheDir(): string|null;




**Parameters:** not specified


**Return value:** string | null

________


