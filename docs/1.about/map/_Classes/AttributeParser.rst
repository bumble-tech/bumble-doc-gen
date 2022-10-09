.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> AttributeParser</embed>


Description of the `AttributeParser </BumbleDocGen/Parser/AttributeParser.php>`_ class:
-----------------------




**:warning: Is internal** 

.. code-block:: php

    namespace BumbleDocGen\Parser;

    final class AttributeParser







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#m-construct">__construct</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mparseannotations">parseAnnotations</a> </li>
                <li><a href="#mgetdocblockfactory">getDocBlockFactory</a> </li>
                <li><a href="#mhasannotationifissubclassof">hasAnnotationIfIsSubclassOf</a> </li>
                <li><a href="#mgetannotationifissubclassof">getAnnotationIfIsSubclassOf</a> </li>
                <li><a href="#mhasattributeifissubclassof">hasAttributeIfIsSubclassOf</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/AttributeParser.php#L20>`_
.. code-block:: php

        public function __construct(Roave\BetterReflection\Reflector\Reflector $reflector, Psr\Log\LoggerInterface $logger): mixed;




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
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='/vendor/psr/log/src/LoggerInterface.php#L20'>Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mparseannotations:

* `# <mparseannotations_>`_  ``parseAnnotations``   **|** `source code </BumbleDocGen/Parser/AttributeParser.php#L25>`_
.. code-block:: php

        public function parseAnnotations(string $docComment): array;




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
            <td>$docComment</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mgetdocblockfactory:

* `# <mgetdocblockfactory_>`_  ``getDocBlockFactory``   **|** `source code </BumbleDocGen/Parser/AttributeParser.php#L42>`_
.. code-block:: php

        public function getDocBlockFactory(): phpDocumentor\Reflection\DocBlockFactory;




**Parameters:** not specified


**Return value:** `phpDocumentor\\Reflection\\DocBlockFactory </vendor/phpdocumentor/reflection-docblock/src/DocBlockFactory\.php#L36>`_

________

.. _mhasannotationifissubclassof:

* `# <mhasannotationifissubclassof_>`_  ``hasAnnotationIfIsSubclassOf``   **|** `source code </BumbleDocGen/Parser/AttributeParser.php#L51>`_
.. code-block:: php

        public function hasAnnotationIfIsSubclassOf(string $docComment, string $className): bool;




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
            <td>$docComment</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________

.. _mgetannotationifissubclassof:

* `# <mgetannotationifissubclassof_>`_  ``getAnnotationIfIsSubclassOf``   **|** `source code </BumbleDocGen/Parser/AttributeParser.php#L88>`_
.. code-block:: php

        public function getAnnotationIfIsSubclassOf(string $docComment, string $className): object|null;




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
            <td>$docComment</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** object | null

________

.. _mhasattributeifissubclassof:

* `# <mhasattributeifissubclassof_>`_  ``hasAttributeIfIsSubclassOf``   **|** `source code </BumbleDocGen/Parser/AttributeParser.php#L99>`_
.. code-block:: php

        public function hasAttributeIfIsSubclassOf(Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, string $className): bool;




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
            <td>$reflectionClass</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php#L63'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________


