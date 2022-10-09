.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> BaseConfiguration</embed>


Description of the `BaseConfiguration </BumbleDocGen/BaseConfiguration.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen;

    abstract class BaseConfiguration implements BumbleDocGen\ConfigurationInterface


..

        Basic configuration for project documentation







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mclearoutputdirbeforedocgeneration">clearOutputDirBeforeDocGeneration</a> </li>
                <li><a href="#mgetoutputdir">getOutputDir</a> - <i>Directory where the documentation will be generated (absolute path)</i></li>
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



.. _mclearoutputdirbeforedocgeneration:

* `# <mclearoutputdirbeforedocgeneration_>`_  ``clearOutputDirBeforeDocGeneration``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L34>`_
.. code-block:: php

        public function clearOutputDirBeforeDocGeneration(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetoutputdir:

* `# <mgetoutputdir_>`_  ``getOutputDir``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L39>`_
.. code-block:: php

        public function getOutputDir(): string;


..

    Directory where the documentation will be generated \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mclassconstantentityfiltercondition:

* `# <mclassconstantentityfiltercondition_>`_  ``classConstantEntityFilterCondition``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L44>`_
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

* `# <mmethodentityfiltercondition_>`_  ``methodEntityFilterCondition``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L52>`_
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

* `# <mpropertyentityfiltercondition_>`_  ``propertyEntityFilterCondition``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L66>`_
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

* `# <mgetplugins_>`_  ``getPlugins``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L74>`_
.. code-block:: php

        public function getPlugins(): BumbleDocGen\Plugin\PluginsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </docs/_Classes/PluginsCollection\.rst>`_

________

.. _mgettemplatefillers:

* `# <mgettemplatefillers_>`_  ``getTemplateFillers``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L82>`_
.. code-block:: php

        public function getTemplateFillers(): BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\TemplateFiller\\TemplateFillersCollection </docs/_Classes/TemplateFillersCollection\.rst>`_

________

.. _mgetentitydocrenderscollection:

* `# <mgetentitydocrenderscollection_>`_  ``getEntityDocRendersCollection``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L87>`_
.. code-block:: php

        public function getEntityDocRendersCollection(): BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\EntityDocRender\\EntityDocRendersCollection </docs/_Classes/EntityDocRendersCollection\.rst>`_

________

.. _mgetlogger:

* `# <mgetlogger_>`_  ``getLogger``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L97>`_
.. code-block:: php

        public function getLogger(): Psr\Log\LoggerInterface;




**Parameters:** not specified


**Return value:** `Psr\\Log\\LoggerInterface </vendor/psr/log/src/LoggerInterface\.php#L20>`_

________


