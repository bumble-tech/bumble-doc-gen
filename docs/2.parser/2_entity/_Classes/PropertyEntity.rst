.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/2_entity/index.md">Entities</a> <b>/</b> PropertyEntity<hr> </embed>


Description of the `PropertyEntity </BumbleDocGen/Parser/Entity/PropertyEntity.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class PropertyEntity extends BumbleDocGen\Parser\Entity\BaseEntity


..

        Class property entity





Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreate">create</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#mgetfilename">getFileName</a> </li>
                <li><a href="#mgetimplementingclassname">getImplementingClassName</a> </li>
                <li><a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a> </li>
                <li><a href="#mgetline">getLine</a> </li>
                <li><a href="#mgetmodifiersstring">getModifiersString</a> </li>
                <li><a href="#mgetname">getName</a> </li>
                <li><a href="#mgetreflection">getReflection</a> </li>
                <li><a href="#mgettype">getType</a> </li>
                <li><a href="#misimplementedinparentclass">isImplementedInParentClass</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L29>`_
.. code-block:: php

        public static function create(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, Roave\BetterReflection\Reflection\ReflectionProperty $reflectionProperty, BumbleDocGen\Parser\AttributeParser $attributeParser, bool $reloadCache = false): BumbleDocGen\Parser\Entity\PropertyEntity;




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
            <td>$reflectionProperty</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionProperty.php'>Roave\BetterReflection\Reflection\ReflectionProperty</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/BumbleDocGen/Parser/AttributeParser.php'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reloadCache</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntity </BumbleDocGen/Parser/Entity/PropertyEntity\.php>`_

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L172>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L100>`_
.. code-block:: php

        public function getFileName(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetimplementingclassname:

* `# <mgetimplementingclassname_>`_  ``getImplementingClassName``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L167>`_
.. code-block:: php

        public function getImplementingClassName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetimplementingreflectionclass:

* `# <mgetimplementingreflectionclass_>`_  ``getImplementingReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L52>`_
.. code-block:: php

        public function getImplementingReflectionClass(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php>`_

________

.. _mgetline:

* `# <mgetline_>`_  ``getLine``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L113>`_
.. code-block:: php

        public function getLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetmodifiersstring:

* `# <mgetmodifiersstring_>`_  ``getModifiersString``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L141>`_
.. code-block:: php

        public function getModifiersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetname:

* `# <mgetname_>`_  ``getName``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L95>`_
.. code-block:: php

        public function getName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetreflection:

* `# <mgetreflection_>`_  ``getReflection``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L47>`_
.. code-block:: php

        public function getReflection(): Roave\BetterReflection\Reflection\ReflectionProperty;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionProperty </vendor/roave/better-reflection/src/Reflection/ReflectionProperty\.php>`_

________

.. _mgettype:

* `# <mgettype_>`_  ``getType``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L118>`_
.. code-block:: php

        public function getType(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misimplementedinparentclass:

* `# <misimplementedinparentclass_>`_  ``isImplementedInParentClass``   **|** `source code </BumbleDocGen/Parser/Entity/PropertyEntity.php#L162>`_
.. code-block:: php

        public function isImplementedInParentClass(): bool;




**Parameters:** not specified


**Return value:** bool

________


