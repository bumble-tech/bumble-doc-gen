<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/2_entity/index.md">Entities</a> <b>/</b> MethodEntityCollection<hr></embed>

Description of the `MethodEntityCollection </BumbleDocGen/Parser/Entity/MethodEntityCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class MethodEntityCollection extends BumbleDocGen\Parser\Entity\BaseEntityCollection implements IteratorAggregate, Traversable







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreatebyclassentity">createByClassEntity</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#madd">add</a> </li>
                <li><a href="#mget">get</a> </li>
                <li><a href="#mgetinitializations">getInitializations</a> </li>
                <li><a href="#mgetallexceptinitializations">getAllExceptInitializations</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreatebyclassentity:

* `# <mcreatebyclassentity_>`_  ``createByClassEntity``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityCollection.php#L16>`_
.. code-block:: php

        public static function createByClassEntity(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, BumbleDocGen\Parser\Entity\ClassEntity $classEntity, BumbleDocGen\Parser\AttributeParser $attributeParser): BumbleDocGen\Parser\Entity\MethodEntityCollection;




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
            <td>$classEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/BumbleDocGen/Parser/AttributeParser.php'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntityCollection </BumbleDocGen/Parser/Entity/MethodEntityCollection\.php>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityCollection.php#L62>`_
.. code-block:: php

        public function add(BumbleDocGen\Parser\Entity\MethodEntityInterface $methodEntity, bool $reload = false): BumbleDocGen\Parser\Entity\MethodEntityCollection;




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
            <td><a href='/BumbleDocGen/Parser/Entity/MethodEntityInterface.php'>BumbleDocGen\Parser\Entity\MethodEntityInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reload</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntityCollection </BumbleDocGen/Parser/Entity/MethodEntityCollection\.php>`_

________

.. _mget:

* `# <mget_>`_  ``get``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityCollection.php#L71>`_
.. code-block:: php

        public function get(string $key): BumbleDocGen\Parser\Entity\MethodEntity|null;




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
            <td>$key</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntity </BumbleDocGen/Parser/Entity/MethodEntity\.php>`_ | null

________

.. _mgetinitializations:

* `# <mgetinitializations_>`_  ``getInitializations``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityCollection.php#L76>`_
.. code-block:: php

        public function getInitializations(): BumbleDocGen\Parser\Entity\MethodEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntityCollection </BumbleDocGen/Parser/Entity/MethodEntityCollection\.php>`_

________

.. _mgetallexceptinitializations:

* `# <mgetallexceptinitializations_>`_  ``getAllExceptInitializations``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityCollection.php#L88>`_
.. code-block:: php

        public function getAllExceptInitializations(): BumbleDocGen\Parser\Entity\MethodEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntityCollection </BumbleDocGen/Parser/Entity/MethodEntityCollection\.php>`_

________


