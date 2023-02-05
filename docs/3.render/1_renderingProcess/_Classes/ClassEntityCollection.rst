.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/1_renderingProcess/index.md">Rendering process</a> <b>/</b> ClassEntityCollection<hr> </embed>


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
                <li><a href="#mfilterbyinterfaces">filterByInterfaces</a> </li>
                <li><a href="#mfilterbynameregularexpression">filterByNameRegularExpression</a> </li>
                <li><a href="#mfilterbyparentclassnames">filterByParentClassNames</a> </li>
                <li><a href="#mfilterbypaths">filterByPaths</a> </li>
                <li><a href="#mget">get</a> </li>
                <li><a href="#mgetentitybyclassname">getEntityByClassName</a> </li>
                <li><a href="#mgetlogger">getLogger</a> </li>
                <li><a href="#mgetonlyinstantiable">getOnlyInstantiable</a> </li>
                <li><a href="#mgetonlyinterfaces">getOnlyInterfaces</a> </li>
                <li><a href="#mgetreflector">getReflector</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L57>`_
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
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reload</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _maddwithoutpreparation:

* `# <maddwithoutpreparation_>`_  ``addWithoutPreparation``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L68>`_
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
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mcreatebyreflector:

* `# <mcreatebyreflector_>`_  ``createByReflector``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L27>`_
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
            <td><a href='/BumbleDocGen/ConfigurationInterface.php'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/BumbleDocGen/Parser/AttributeParser.php'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='/BumbleDocGen/Plugin/PluginEventDispatcher.php'>BumbleDocGen\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mfilterbyinterfaces:

* `# <mfilterbyinterfaces_>`_  ``filterByInterfaces``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L99>`_
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


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mfilterbynameregularexpression:

* `# <mfilterbynameregularexpression_>`_  ``filterByNameRegularExpression``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L143>`_
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


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mfilterbyparentclassnames:

* `# <mfilterbyparentclassnames_>`_  ``filterByParentClassNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L113>`_
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


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mfilterbypaths:

* `# <mfilterbypaths_>`_  ``filterByPaths``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L127>`_
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


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mget:

* `# <mget_>`_  ``get``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L74>`_
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


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </BumbleDocGen/Parser/Entity/ClassEntity\.php>`_ | null

________

.. _mgetentitybyclassname:

* `# <mgetentitybyclassname_>`_  ``getEntityByClassName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L79>`_
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


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </BumbleDocGen/Parser/Entity/ClassEntity\.php>`_ | null

________

.. _mgetlogger:

* `# <mgetlogger_>`_  ``getLogger``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L91>`_
.. code-block:: php

        public function getLogger(): Psr\Log\LoggerInterface;




**Parameters:** not specified


**Return value:** `Psr\\Log\\LoggerInterface </vendor/psr/log/src/LoggerInterface\.php>`_

________

.. _mgetonlyinstantiable:

* `# <mgetonlyinstantiable_>`_  ``getOnlyInstantiable``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L157>`_
.. code-block:: php

        public function getOnlyInstantiable(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mgetonlyinterfaces:

* `# <mgetonlyinterfaces_>`_  ``getOnlyInterfaces``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L171>`_
.. code-block:: php

        public function getOnlyInterfaces(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mgetreflector:

* `# <mgetreflector_>`_  ``getReflector``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L86>`_
.. code-block:: php

        public function getReflector(): Roave\BetterReflection\Reflector\Reflector;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflector\\Reflector </vendor/roave/better-reflection/src/Reflector/Reflector\.php>`_

________


