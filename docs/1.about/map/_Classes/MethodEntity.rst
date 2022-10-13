.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> MethodEntity</embed>


Description of the `MethodEntity </BumbleDocGen/Parser/Entity/MethodEntity.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class MethodEntity extends BumbleDocGen\Parser\Entity\BaseEntity implements BumbleDocGen\Parser\Entity\MethodEntityInterface


..

        Class method entity





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
                <li><a href="#mgetreflection">getReflection</a> </li>
                <li><a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a> </li>
                <li><a href="#mgetname">getName</a> </li>
                <li><a href="#mgetfilename">getFileName</a> </li>
                <li><a href="#mgetline">getLine</a> </li>
                <li><a href="#mgetmodifiersstring">getModifiersString</a> </li>
                <li><a href="#mgetreturntype">getReturnType</a> </li>
                <li><a href="#mparseannotationparams">parseAnnotationParams</a> </li>
                <li><a href="#mgetparameters">getParameters</a> </li>
                <li><a href="#mgetparametersstring">getParametersString</a> </li>
                <li><a href="#misimplementedinparentclass">isImplementedInParentClass</a> </li>
                <li><a href="#mgetimplementingclassname">getImplementingClassName</a> </li>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#misinitialization">isInitialization</a> </li>
                <li><a href="#misdynamic">isDynamic</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L28>`_
.. code-block:: php

        public static function create(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, Roave\BetterReflection\Reflection\ReflectionMethod $reflectionMethod, BumbleDocGen\Parser\AttributeParser $attributeParser, bool $reloadCache = false): BumbleDocGen\Parser\Entity\MethodEntity;




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
            <td>$reflectionMethod</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionMethod.php#L28'>Roave\BetterReflection\Reflection\ReflectionMethod</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/docs/_Classes/AttributeParser.rst'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reloadCache</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntity </docs/_Classes/MethodEntity\.rst>`_

________

.. _mgetreflection:

* `# <mgetreflection_>`_  ``getReflection``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L46>`_
.. code-block:: php

        public function getReflection(): Roave\BetterReflection\Reflection\ReflectionMethod;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionMethod </vendor/roave/better-reflection/src/Reflection/ReflectionMethod\.php#L28>`_

________

.. _mgetimplementingreflectionclass:

* `# <mgetimplementingreflectionclass_>`_  ``getImplementingReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L51>`_
.. code-block:: php

        public function getImplementingReflectionClass(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php#L63>`_

________

.. _mgetname:

* `# <mgetname_>`_  ``getName``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L101>`_
.. code-block:: php

        public function getName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L106>`_
.. code-block:: php

        public function getFileName(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetline:

* `# <mgetline_>`_  ``getLine``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L120>`_
.. code-block:: php

        public function getLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetmodifiersstring:

* `# <mgetmodifiersstring_>`_  ``getModifiersString``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L125>`_
.. code-block:: php

        public function getModifiersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetreturntype:

* `# <mgetreturntype_>`_  ``getReturnType``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L145>`_
.. code-block:: php

        public function getReturnType(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mparseannotationparams:

* `# <mparseannotationparams_>`_  ``parseAnnotationParams``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L165>`_
.. code-block:: php

        public static function parseAnnotationParams(array $params): array;




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
            <td>$params</td>
            <td>array</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mgetparameters:

* `# <mgetparameters_>`_  ``getParameters``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L190>`_
.. code-block:: php

        public function getParameters(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetparametersstring:

* `# <mgetparametersstring_>`_  ``getParametersString``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L245>`_
.. code-block:: php

        public function getParametersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misimplementedinparentclass:

* `# <misimplementedinparentclass_>`_  ``isImplementedInParentClass``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L255>`_
.. code-block:: php

        public function isImplementedInParentClass(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetimplementingclassname:

* `# <mgetimplementingclassname_>`_  ``getImplementingClassName``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L260>`_
.. code-block:: php

        public function getImplementingClassName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L265>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misinitialization:

* `# <misinitialization_>`_  ``isInitialization``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L271>`_
.. code-block:: php

        public function isInitialization(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _misdynamic:

* `# <misdynamic_>`_  ``isDynamic``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntity.php#L287>`_
.. code-block:: php

        public function isDynamic(): bool;




**Parameters:** not specified


**Return value:** bool

________


