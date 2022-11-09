.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> DynamicMethodEntity</embed>


Description of the `DynamicMethodEntity </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class DynamicMethodEntity implements BumbleDocGen\Parser\Entity\MethodEntityInterface


..

        Method obtained by parsing the "method" annotation





Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreatebyannotationmethod">createByAnnotationMethod</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetname">getName</a> </li>
                <li><a href="#misstatic">isStatic</a> </li>
                <li><a href="#mgetfilename">getFileName</a> </li>
                <li><a href="#mgetline">getLine</a> </li>
                <li><a href="#mgetmodifiersstring">getModifiersString</a> </li>
                <li><a href="#mgetreturntype">getReturnType</a> </li>
                <li><a href="#mgetparameters">getParameters</a> </li>
                <li><a href="#mgetparametersstring">getParametersString</a> </li>
                <li><a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a> </li>
                <li><a href="#mgetimplementingclassname">getImplementingClassName</a> </li>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#misinitialization">isInitialization</a> </li>
                <li><a href="#misdynamic">isDynamic</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreatebyannotationmethod:

* `# <mcreatebyannotationmethod_>`_  ``createByAnnotationMethod``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L27>`_
.. code-block:: php

        public static function createByAnnotationMethod(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, phpDocumentor\Reflection\DocBlock\Tags\Method $annotationMethod): BumbleDocGen\Parser\Entity\DynamicMethodEntity;




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
            <td><a href='/docs/2.parser/5_classmap/_Classes/ConfigurationInterface.rst'>BumbleDocGen\ConfigurationInterface</a></td>
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
            <td>$annotationMethod</td>
            <td><a href='/vendor/phpdocumentor/reflection-docblock/src/DocBlock/Tags/Method.php#L40'>phpDocumentor\Reflection\DocBlock\Tags\Method</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\DynamicMethodEntity </docs/2\.parser/5_classmap/_Classes/DynamicMethodEntity\.rst>`_

________

.. _mgetname:

* `# <mgetname_>`_  ``getName``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L38>`_
.. code-block:: php

        public function getName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misstatic:

* `# <misstatic_>`_  ``isStatic``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L43>`_
.. code-block:: php

        public function isStatic(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L61>`_
.. code-block:: php

        public function getFileName(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetline:

* `# <mgetline_>`_  ``getLine``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L75>`_
.. code-block:: php

        public function getLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetmodifiersstring:

* `# <mgetmodifiersstring_>`_  ``getModifiersString``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L81>`_
.. code-block:: php

        public function getModifiersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetreturntype:

* `# <mgetreturntype_>`_  ``getReturnType``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L92>`_
.. code-block:: php

        public function getReturnType(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetparameters:

* `# <mgetparameters_>`_  ``getParameters``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L110>`_
.. code-block:: php

        public function getParameters(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetparametersstring:

* `# <mgetparametersstring_>`_  ``getParametersString``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L127>`_
.. code-block:: php

        public function getParametersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetimplementingreflectionclass:

* `# <mgetimplementingreflectionclass_>`_  ``getImplementingReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L137>`_
.. code-block:: php

        public function getImplementingReflectionClass(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php#L63>`_

________

.. _mgetimplementingclassname:

* `# <mgetimplementingclassname_>`_  ``getImplementingClassName``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L143>`_
.. code-block:: php

        public function getImplementingClassName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L148>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misinitialization:

* `# <misinitialization_>`_  ``isInitialization``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L153>`_
.. code-block:: php

        public function isInitialization(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _misdynamic:

* `# <misdynamic_>`_  ``isDynamic``   **|** `source code </BumbleDocGen/Parser/Entity/DynamicMethodEntity.php#L165>`_
.. code-block:: php

        public function isDynamic(): bool;




**Parameters:** not specified


**Return value:** bool

________


