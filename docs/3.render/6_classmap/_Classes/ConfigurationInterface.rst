.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.rst">Render class map</a> <b>/</b> ConfigurationInterface<hr> </embed>


Description of the `ConfigurationInterface </BumbleDocGen/ConfigurationInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen;

    interface ConfigurationInterface


..

        Documentation generator configuration







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetprojectroot">getProjectRoot</a> - <i>Get project root (absolute path)</i></li>
                <li><a href="#mgetsourcelocators">getSourceLocators</a> - <i>Get a collection of source locators</i></li>
                <li><a href="#mgettemplatesdir">getTemplatesDir</a> - <i>Directory with documentation templates (absolute path)</i></li>
                <li><a href="#mgetoutputdir">getOutputDir</a> - <i>Directory where the documentation will be generated (absolute path)</i></li>
                <li><a href="#mgetoutputdirbaseurl">getOutputDirBaseUrl</a> - <i>Base URL of the generated document</i></li>
                <li><a href="#mgetcachedir">getCacheDir</a> </li>
                <li><a href="#mclearoutputdirbeforedocgeneration">clearOutputDirBeforeDocGeneration</a> </li>
                <li><a href="#mclassentityfiltercondition">classEntityFilterCondition</a> </li>
                <li><a href="#mclassconstantentityfiltercondition">classConstantEntityFilterCondition</a> </li>
                <li><a href="#mmethodentityfiltercondition">methodEntityFilterCondition</a> </li>
                <li><a href="#mpropertyentityfiltercondition">propertyEntityFilterCondition</a> </li>
                <li><a href="#mgetplugins">getPlugins</a> </li>
                <li><a href="#mgettemplatefillers">getTemplateFillers</a> </li>
                <li><a href="#mgetentitydocrenderscollection">getEntityDocRendersCollection</a> </li>
                <li><a href="#mgetlogger">getLogger</a> </li>
                <li><a href="#mgetsourcelocatorcacheitempool">getSourceLocatorCacheItemPool</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetprojectroot:

* `# <mgetprojectroot_>`_  ``getProjectRoot``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L27>`_
.. code-block:: php

        public function getProjectRoot(): string;


..

    Get project root \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mgetsourcelocators:

* `# <mgetsourcelocators_>`_  ``getSourceLocators``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L32>`_
.. code-block:: php

        public function getSourceLocators(): BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;


..

    Get a collection of source locators


**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection\.php>`_

________

.. _mgettemplatesdir:

* `# <mgettemplatesdir_>`_  ``getTemplatesDir``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L37>`_
.. code-block:: php

        public function getTemplatesDir(): string;


..

    Directory with documentation templates \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mgetoutputdir:

* `# <mgetoutputdir_>`_  ``getOutputDir``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L42>`_
.. code-block:: php

        public function getOutputDir(): string;


..

    Directory where the documentation will be generated \(absolute path\)


**Parameters:** not specified


**Return value:** string

________

.. _mgetoutputdirbaseurl:

* `# <mgetoutputdirbaseurl_>`_  ``getOutputDirBaseUrl``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L47>`_
.. code-block:: php

        public function getOutputDirBaseUrl(): string;


..

    Base URL of the generated document


**Parameters:** not specified


**Return value:** string

________

.. _mgetcachedir:

* `# <mgetcachedir_>`_  ``getCacheDir``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L49>`_
.. code-block:: php

        public function getCacheDir(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mclearoutputdirbeforedocgeneration:

* `# <mclearoutputdirbeforedocgeneration_>`_  ``clearOutputDirBeforeDocGeneration``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L51>`_
.. code-block:: php

        public function clearOutputDirBeforeDocGeneration(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mclassentityfiltercondition:

* `# <mclassentityfiltercondition_>`_  ``classEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L53>`_
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

.. _mclassconstantentityfiltercondition:

* `# <mclassconstantentityfiltercondition_>`_  ``classConstantEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L55>`_
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

* `# <mmethodentityfiltercondition_>`_  ``methodEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L57>`_
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

* `# <mpropertyentityfiltercondition_>`_  ``propertyEntityFilterCondition``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L59>`_
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

* `# <mgetplugins_>`_  ``getPlugins``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L61>`_
.. code-block:: php

        public function getPlugins(): BumbleDocGen\Plugin\PluginsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </BumbleDocGen/Plugin/PluginsCollection\.php>`_

________

.. _mgettemplatefillers:

* `# <mgettemplatefillers_>`_  ``getTemplateFillers``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L63>`_
.. code-block:: php

        public function getTemplateFillers(): BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\TemplateFiller\\TemplateFillersCollection </BumbleDocGen/Render/TemplateFiller/TemplateFillersCollection\.php>`_

________

.. _mgetentitydocrenderscollection:

* `# <mgetentitydocrenderscollection_>`_  ``getEntityDocRendersCollection``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L65>`_
.. code-block:: php

        public function getEntityDocRendersCollection(): BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\EntityDocRender\\EntityDocRendersCollection </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection\.php>`_

________

.. _mgetlogger:

* `# <mgetlogger_>`_  ``getLogger``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L67>`_
.. code-block:: php

        public function getLogger(): Psr\Log\LoggerInterface;




**Parameters:** not specified


**Return value:** `Psr\\Log\\LoggerInterface </vendor/psr/log/src/LoggerInterface\.php>`_

________

.. _mgetsourcelocatorcacheitempool:

* `# <mgetsourcelocatorcacheitempool_>`_  ``getSourceLocatorCacheItemPool``   **|** `source code </BumbleDocGen/ConfigurationInterface.php#L69>`_
.. code-block:: php

        public function getSourceLocatorCacheItemPool(): Psr\Cache\CacheItemPoolInterface;




**Parameters:** not specified


**Return value:** `Psr\\Cache\\CacheItemPoolInterface </vendor/psr/cache/src/CacheItemPoolInterface\.php>`_

________


