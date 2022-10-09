.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.rst">Plugin system</a> <b>/</b> ConfigurationInterface</embed>


Description of the `ConfigurationInterface </BumbleDocGen/ConfigurationInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen;

    interface ConfigurationInterface









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetprojectroot">getProjectRoot</a> </li>
                <li><a href="#mgetsourcelocators">getSourceLocators</a> </li>
                <li><a href="#mgettemplatesdir">getTemplatesDir</a> </li>
                <li><a href="#mgetoutputdir">getOutputDir</a> </li>
                <li><a href="#mgetoutputdirbaseurl">getOutputDirBaseUrl</a> </li>
                <li><a href="#mclearoutputdirbeforedocgeneration">clearOutputDirBeforeDocGeneration</a> </li>
                <li><a href="#mclassentityfiltercondition">classEntityFilterCondition</a> </li>
                <li><a href="#mclassconstantentityfiltercondition">classConstantEntityFilterCondition</a> </li>
                <li><a href="#mmethodentityfiltercondition">methodEntityFilterCondition</a> </li>
                <li><a href="#mpropertyentityfiltercondition">propertyEntityFilterCondition</a> </li>
                <li><a href="#mgetplugins">getPlugins</a> </li>
                <li><a href="#mgettemplatefillers">getTemplateFillers</a> </li>
                <li><a href="#mgetentitydocrenderscollection">getEntityDocRendersCollection</a> </li>
                <li><a href="#mgetlogger">getLogger</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetprojectroot:

* `# <mgetprojectroot_>`_  ``getProjectRoot``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L20>`_
.. code-block:: php

        public function getProjectRoot(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetsourcelocators:

* `# <mgetsourcelocators_>`_  ``getSourceLocators``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L22>`_
.. code-block:: php

        public function getSourceLocators(): BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </docs/_Classes/SourceLocatorsCollection\.rst>`_

________

.. _mgettemplatesdir:

* `# <mgettemplatesdir_>`_  ``getTemplatesDir``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L24>`_
.. code-block:: php

        public function getTemplatesDir(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetoutputdir:

* `# <mgetoutputdir_>`_  ``getOutputDir``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L26>`_
.. code-block:: php

        public function getOutputDir(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetoutputdirbaseurl:

* `# <mgetoutputdirbaseurl_>`_  ``getOutputDirBaseUrl``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L28>`_
.. code-block:: php

        public function getOutputDirBaseUrl(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mclearoutputdirbeforedocgeneration:

* `# <mclearoutputdirbeforedocgeneration_>`_  ``clearOutputDirBeforeDocGeneration``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L30>`_
.. code-block:: php

        public function clearOutputDirBeforeDocGeneration(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mclassentityfiltercondition:

* `# <mclassentityfiltercondition_>`_  ``classEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L32>`_
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
            <td><a href='/docs/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </docs/_Classes/ConditionInterface\.rst>`_

________

.. _mclassconstantentityfiltercondition:

* `# <mclassconstantentityfiltercondition_>`_  ``classConstantEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L34>`_
.. code-block:: php

        public function classConstantEntityFilterCondition(BumbleDocGen\Parser\Entity\ConstantEntity $constantEntity): BumbleDocGen\Parser\FilterCondition\ConditionInterface;




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
            <td>$constantEntity</td>
            <td><a href='/docs/_Classes/ConstantEntity.rst'>BumbleDocGen\Parser\Entity\ConstantEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </docs/_Classes/ConditionInterface\.rst>`_

________

.. _mmethodentityfiltercondition:

* `# <mmethodentityfiltercondition_>`_  ``methodEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L36>`_
.. code-block:: php

        public function methodEntityFilterCondition(BumbleDocGen\Parser\Entity\MethodEntity $methodEntity): BumbleDocGen\Parser\FilterCondition\ConditionInterface;




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
            <td>$methodEntity</td>
            <td><a href='/docs/_Classes/MethodEntity.rst'>BumbleDocGen\Parser\Entity\MethodEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </docs/_Classes/ConditionInterface\.rst>`_

________

.. _mpropertyentityfiltercondition:

* `# <mpropertyentityfiltercondition_>`_  ``propertyEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L38>`_
.. code-block:: php

        public function propertyEntityFilterCondition(BumbleDocGen\Parser\Entity\PropertyEntity $propertyEntity): BumbleDocGen\Parser\FilterCondition\ConditionInterface;




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
            <td>$propertyEntity</td>
            <td><a href='/docs/_Classes/PropertyEntity.rst'>BumbleDocGen\Parser\Entity\PropertyEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </docs/_Classes/ConditionInterface\.rst>`_

________

.. _mgetplugins:

* `# <mgetplugins_>`_  ``getPlugins``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L40>`_
.. code-block:: php

        public function getPlugins(): BumbleDocGen\Plugin\PluginsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </docs/_Classes/PluginsCollection\.rst>`_

________

.. _mgettemplatefillers:

* `# <mgettemplatefillers_>`_  ``getTemplateFillers``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L42>`_
.. code-block:: php

        public function getTemplateFillers(): BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\TemplateFiller\\TemplateFillersCollection </docs/_Classes/TemplateFillersCollection\.rst>`_

________

.. _mgetentitydocrenderscollection:

* `# <mgetentitydocrenderscollection_>`_  ``getEntityDocRendersCollection``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L44>`_
.. code-block:: php

        public function getEntityDocRendersCollection(): BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\EntityDocRender\\EntityDocRendersCollection </docs/_Classes/EntityDocRendersCollection\.rst>`_

________

.. _mgetlogger:

* `# <mgetlogger_>`_  ``getLogger``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L46>`_
.. code-block:: php

        public function getLogger(): Psr\Log\LoggerInterface;




**Parameters:** not specified


**Return value:** `Psr\\Log\\LoggerInterface </vendor/psr/log/src/LoggerInterface\.php#L20>`_

________


