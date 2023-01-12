<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> ConstantEntityCollection<hr> </embed>

Description of the `ConstantEntityCollection </BumbleDocGen/Parser/Entity/ConstantEntityCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class ConstantEntityCollection extends BumbleDocGen\Parser\Entity\BaseEntityCollection implements IteratorAggregate, Traversable







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreatebyreflectionclass">createByReflectionClass</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#madd">add</a> </li>
                <li><a href="#mget">get</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreatebyreflectionclass:

* `# <mcreatebyreflectionclass_>`_  ``createByReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/ConstantEntityCollection.php#L14>`_
.. code-block:: php

        public static function createByReflectionClass(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, BumbleDocGen\Parser\AttributeParser $attributeParser): BumbleDocGen\Parser\Entity\ConstantEntityCollection;




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
            <td>$reflectionClass</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/BumbleDocGen/Parser/AttributeParser.php'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ConstantEntityCollection </BumbleDocGen/Parser/Entity/ConstantEntityCollection\.php>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/Entity/ConstantEntityCollection.php#L38>`_
.. code-block:: php

        public function add(BumbleDocGen\Parser\Entity\ConstantEntity $constantEntity, bool $reload = false): BumbleDocGen\Parser\Entity\ConstantEntityCollection;




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
            <tr>
            <td>$reload</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ConstantEntityCollection </BumbleDocGen/Parser/Entity/ConstantEntityCollection\.php>`_

________

.. _mget:

* `# <mget_>`_  ``get``   **|** `source code </BumbleDocGen/Parser/Entity/ConstantEntityCollection.php#L47>`_
.. code-block:: php

        public function get(string $key): BumbleDocGen\Parser\Entity\PropertyEntity|null;




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


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntity </BumbleDocGen/Parser/Entity/PropertyEntity\.php>`_ | null

________


