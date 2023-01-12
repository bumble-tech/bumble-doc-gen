.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/2_entity/index.md">Entities</a> <b>/</b> PropertyEntityCollection<hr> </embed>


Description of the `PropertyEntityCollection </BumbleDocGen/Parser/Entity/PropertyEntityCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class PropertyEntityCollection extends BumbleDocGen\Parser\Entity\BaseEntityCollection implements IteratorAggregate, Traversable







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

* `# <mcreatebyreflectionclass_>`_  ``createByReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntityCollection.php#L14>`_
.. code-block:: php

        public static function createByReflectionClass(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, BumbleDocGen\Parser\AttributeParser $attributeParser): BumbleDocGen\Parser\Entity\PropertyEntityCollection;




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


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntityCollection </BumbleDocGen/Parser/Entity/PropertyEntityCollection\.php>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntityCollection.php#L38>`_
.. code-block:: php

        public function add(BumbleDocGen\Parser\Entity\PropertyEntity $propertyEntity, bool $reload = false): BumbleDocGen\Parser\Entity\PropertyEntityCollection;




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
            <tr>
            <td>$reload</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntityCollection </BumbleDocGen/Parser/Entity/PropertyEntityCollection\.php>`_

________

.. _mget:

* `# <mget_>`_  ``get``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntityCollection.php#L47>`_
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


