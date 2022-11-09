.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/1_renderingProcess/index.rst">Rendering process</a> <b>/</b> ClassEntityCollection</embed>


Description of the `ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class ClassEntityCollection extends BumbleDocGen\Parser\Entity\BaseEntityCollection implements IteratorAggregate, Traversable







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreatebyreflector">createByReflector</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#madd">add</a> </li>
                <li><a href="#maddwithoutpreparation">addWithoutPreparation</a> </li>
                <li><a href="#mget">get</a> </li>
                <li><a href="#mgetentitybyclassname">getEntityByClassName</a> </li>
                <li><a href="#mgetreflector">getReflector</a> </li>
                <li><a href="#mgetlogger">getLogger</a> </li>
                <li><a href="#mfilterbyinterfaces">filterByInterfaces</a> </li>
                <li><a href="#mfilterbyparentclassnames">filterByParentClassNames</a> </li>
                <li><a href="#mfilterbypaths">filterByPaths</a> </li>
                <li><a href="#mfilterbynameregularexpression">filterByNameRegularExpression</a> </li>
                <li><a href="#mgetonlyinstantiable">getOnlyInstantiable</a> </li>
                <li><a href="#mgetonlyinterfaces">getOnlyInterfaces</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreatebyreflector:

* `# <mcreatebyreflector_>`_  ``createByReflector``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L25>`_
.. code-block:: php

        public static function createByReflector(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, BumbleDocGen\Parser\AttributeParser $attributeParser, BumbleDocGen\Plugin\PluginEventDispatcher $pluginEventDispatcher): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td>$configuration</td>
            <td><a href='/docs/3.render/1_renderingProcess/_Classes/ConfigurationInterface.rst'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/docs/3.render/1_renderingProcess/_Classes/AttributeParser.rst'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='/docs/3.render/1_renderingProcess/_Classes/PluginEventDispatcher.rst'>BumbleDocGen\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L60>`_
.. code-block:: php

        public function add(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, bool $reload = false): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td><a href='/docs/3.render/1_renderingProcess/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reload</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _maddwithoutpreparation:

* `# <maddwithoutpreparation_>`_  ``addWithoutPreparation``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L72>`_
.. code-block:: php

        public function addWithoutPreparation(BumbleDocGen\Parser\Entity\ClassEntity $classEntity): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td><a href='/docs/3.render/1_renderingProcess/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _mget:

* `# <mget_>`_  ``get``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L78>`_
.. code-block:: php

        public function get(string $objectId): BumbleDocGen\Parser\Entity\ClassEntity|null;




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
            <td>$objectId</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </docs/3\.render/1_renderingProcess/_Classes/ClassEntity\.rst>`_ | null

________

.. _mgetentitybyclassname:

* `# <mgetentitybyclassname_>`_  ``getEntityByClassName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L83>`_
.. code-block:: php

        public function getEntityByClassName(string $className): BumbleDocGen\Parser\Entity\ClassEntity|null;




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
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </docs/3\.render/1_renderingProcess/_Classes/ClassEntity\.rst>`_ | null

________

.. _mgetreflector:

* `# <mgetreflector_>`_  ``getReflector``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L90>`_
.. code-block:: php

        public function getReflector(): Roave\BetterReflection\Reflector\Reflector;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflector\\Reflector </vendor/roave/better-reflection/src/Reflector/Reflector\.php#L12>`_

________

.. _mgetlogger:

* `# <mgetlogger_>`_  ``getLogger``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L95>`_
.. code-block:: php

        public function getLogger(): Psr\Log\LoggerInterface;




**Parameters:** not specified


**Return value:** `Psr\\Log\\LoggerInterface </vendor/psr/log/src/LoggerInterface\.php#L20>`_

________

.. _mfilterbyinterfaces:

* `# <mfilterbyinterfaces_>`_  ``filterByInterfaces``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L103>`_
.. code-block:: php

        public function filterByInterfaces(array $interfaces): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td>$interfaces</td>
            <td>string[]</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _mfilterbyparentclassnames:

* `# <mfilterbyparentclassnames_>`_  ``filterByParentClassNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L117>`_
.. code-block:: php

        public function filterByParentClassNames(array $parentClassNames): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td>$parentClassNames</td>
            <td>array</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _mfilterbypaths:

* `# <mfilterbypaths_>`_  ``filterByPaths``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L131>`_
.. code-block:: php

        public function filterByPaths(array $paths): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td>$paths</td>
            <td>array</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _mfilterbynameregularexpression:

* `# <mfilterbynameregularexpression_>`_  ``filterByNameRegularExpression``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L147>`_
.. code-block:: php

        public function filterByNameRegularExpression(string $regexPattern): BumbleDocGen\Parser\Entity\ClassEntityCollection;




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
            <td>$regexPattern</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _mgetonlyinstantiable:

* `# <mgetonlyinstantiable_>`_  ``getOnlyInstantiable``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L161>`_
.. code-block:: php

        public function getOnlyInstantiable(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________

.. _mgetonlyinterfaces:

* `# <mgetonlyinterfaces_>`_  ``getOnlyInterfaces``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L175>`_
.. code-block:: php

        public function getOnlyInterfaces(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/3\.render/1_renderingProcess/_Classes/ClassEntityCollection\.rst>`_

________


