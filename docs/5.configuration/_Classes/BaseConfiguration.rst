.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/5.configuration/index.rst">Documentation generator configuration</a> <b>/</b> BaseConfiguration</embed>


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
                <li><a href="#mgetcachedir">getCacheDir</a> </li>
                <li><a href="#mgetlogger">getLogger</a> </li>
                <li><a href="#mgetsourcelocatorcacheitempool">getSourceLocatorCacheItemPool</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mclearoutputdirbeforedocgeneration:

* `# <mclearoutputdirbeforedocgeneration_>`_  ``clearOutputDirBeforeDocGeneration``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L36>`_
.. code-block:: php

        public function clearOutputDirBeforeDocGeneration(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetoutputdir:

* `# <mgetoutputdir_>`_  ``getOutputDir``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L41>`_
.. code-block:: php

        public function getOutputDir(): string;


..

    Directory where the documentation will be generated \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mclassconstantentityfiltercondition:

* `# <mclassconstantentityfiltercondition_>`_  ``classConstantEntityFilterCondition``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L46>`_
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
            <td><a href='/BumbleDocGen/Parser/Entity/ConstantEntity.php'>BumbleDocGen\Parser\Entity\ConstantEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </BumbleDocGen/Parser/FilterCondition/ConditionInterface\.php>`_

________

.. _mmethodentityfiltercondition:

* `# <mmethodentityfiltercondition_>`_  ``methodEntityFilterCondition``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L54>`_
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
            <td><a href='/BumbleDocGen/Parser/Entity/MethodEntity.php'>BumbleDocGen\Parser\Entity\MethodEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </BumbleDocGen/Parser/FilterCondition/ConditionInterface\.php>`_

________

.. _mpropertyentityfiltercondition:

* `# <mpropertyentityfiltercondition_>`_  ``propertyEntityFilterCondition``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L68>`_
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
            <td><a href='/BumbleDocGen/Parser/Entity/PropertyEntity.php'>BumbleDocGen\Parser\Entity\PropertyEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionInterface </BumbleDocGen/Parser/FilterCondition/ConditionInterface\.php>`_

________

.. _mgetplugins:

* `# <mgetplugins_>`_  ``getPlugins``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L76>`_
.. code-block:: php

        public function getPlugins(): BumbleDocGen\Plugin\PluginsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </BumbleDocGen/Plugin/PluginsCollection\.php>`_

________

.. _mgettemplatefillers:

* `# <mgettemplatefillers_>`_  ``getTemplateFillers``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L84>`_
.. code-block:: php

        public function getTemplateFillers(): BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\TemplateFiller\\TemplateFillersCollection </BumbleDocGen/Render/TemplateFiller/TemplateFillersCollection\.php>`_

________

.. _mgetentitydocrenderscollection:

* `# <mgetentitydocrenderscollection_>`_  ``getEntityDocRendersCollection``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L89>`_
.. code-block:: php

        public function getEntityDocRendersCollection(): BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\EntityDocRender\\EntityDocRendersCollection </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection\.php>`_

________

.. _mgetcachedir:

* `# <mgetcachedir_>`_  ``getCacheDir``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L99>`_
.. code-block:: php

        public function getCacheDir(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetlogger:

* `# <mgetlogger_>`_  ``getLogger``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L104>`_
.. code-block:: php

        public function getLogger(): Psr\Log\LoggerInterface;




**Parameters:** not specified


**Return value:** `Psr\\Log\\LoggerInterface </vendor/psr/log/src/LoggerInterface\.php>`_

________

.. _mgetsourcelocatorcacheitempool:

* `# <mgetsourcelocatorcacheitempool_>`_  ``getSourceLocatorCacheItemPool``   **|** `source code </BumbleDocGen/BaseConfiguration.php#L125>`_
.. code-block:: php

        public function getSourceLocatorCacheItemPool(): Psr\Cache\CacheItemPoolInterface;




**Parameters:** not specified


**Return value:** `Psr\\Cache\\CacheItemPoolInterface </vendor/psr/cache/src/CacheItemPoolInterface\.php>`_

________


