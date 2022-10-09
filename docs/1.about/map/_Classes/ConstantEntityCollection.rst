.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> ConstantEntityCollection</embed>


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
        </ol>










--------------------




Method details:
-----------------------



.. _mcreatebyreflectionclass:

* `# <mcreatebyreflectionclass_>`_  ``createByReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/ConstantEntityCollection.php#L34>`_
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
            <td><a href='/docs/_Classes/ConfigurationInterface.rst'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflectionClass</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php#L63'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/docs/_Classes/AttributeParser.rst'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ConstantEntityCollection </docs/_Classes/ConstantEntityCollection\.rst>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/Entity/ConstantEntityCollection.php#L59>`_
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
            <td><a href='/docs/_Classes/ConstantEntity.rst'>BumbleDocGen\Parser\Entity\ConstantEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reload</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ConstantEntityCollection </docs/_Classes/ConstantEntityCollection\.rst>`_

________


