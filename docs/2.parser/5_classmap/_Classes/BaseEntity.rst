<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.md">Parser class map</a> <b>/</b> BaseEntity<hr> </embed>

Description of the `BaseEntity </BumbleDocGen/Parser/Entity/BaseEntity.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    abstract class BaseEntity









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetreflection">getReflection</a> </li>
                <li><a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a> </li>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#mgetattributeparser">getAttributeParser</a> </li>
                <li><a href="#mgenerateobjectidbyreflection">generateObjectIdByReflection</a> </li>
                <li><a href="#mgetobjectid">getObjectId</a> </li>
                <li><a href="#mgetdocblock">getDocBlock</a> </li>
                <li><a href="#misinternal">isInternal</a> </li>
                <li><a href="#misdeprecated">isDeprecated</a> </li>
                <li><a href="#mhasdescriptionlinks">hasDescriptionLinks</a> </li>
                <li><a href="#mgetdescriptionlinks">getDescriptionLinks</a> </li>
                <li><a href="#mhasthrows">hasThrows</a> </li>
                <li><a href="#mgetthrows">getThrows</a> </li>
                <li><a href="#mhasexamples">hasExamples</a> </li>
                <li><a href="#mgetexamples">getExamples</a> </li>
                <li><a href="#mgetfirstexample">getFirstExample</a> </li>
                <li><a href="#mgetdocnote">getDocNote</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetreflection:

* `# <mgetreflection_>`_  ``getReflection``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L33>`_
.. code-block:: php

        public function getReflection(): Roave\BetterReflection\Reflection\ReflectionClass|Roave\BetterReflection\Reflection\ReflectionMethod|Roave\BetterReflection\Reflection\ReflectionProperty|Roave\BetterReflection\Reflection\ReflectionClassConstant;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php>`_ | `Roave\\BetterReflection\\Reflection\\ReflectionMethod </vendor/roave/better-reflection/src/Reflection/ReflectionMethod\.php>`_ | `Roave\\BetterReflection\\Reflection\\ReflectionProperty </vendor/roave/better-reflection/src/Reflection/ReflectionProperty\.php>`_ | `Roave\\BetterReflection\\Reflection\\ReflectionClassConstant </vendor/roave/better-reflection/src/Reflection/ReflectionClassConstant\.php>`_

________

.. _mgetimplementingreflectionclass:

* `# <mgetimplementingreflectionclass_>`_  ``getImplementingReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L35>`_
.. code-block:: php

        public function getImplementingReflectionClass(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php>`_

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L41>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetattributeparser:

* `# <mgetattributeparser_>`_  ``getAttributeParser``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L43>`_
.. code-block:: php

        public function getAttributeParser(): BumbleDocGen\Parser\AttributeParser;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\AttributeParser </BumbleDocGen/Parser/AttributeParser\.php>`_

________

.. _mgenerateobjectidbyreflection:

* `# <mgenerateobjectidbyreflection_>`_  ``generateObjectIdByReflection``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L48>`_
.. code-block:: php

        public static function generateObjectIdByReflection(Roave\BetterReflection\Reflection\ReflectionClass|Roave\BetterReflection\Reflection\ReflectionMethod|Roave\BetterReflection\Reflection\ReflectionProperty|Roave\BetterReflection\Reflection\ReflectionClassConstant $reflection): string;




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
            <td>$reflection</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php'>Roave\BetterReflection\Reflection\ReflectionClass</a> | <a href='/vendor/roave/better-reflection/src/Reflection/ReflectionMethod.php'>Roave\BetterReflection\Reflection\ReflectionMethod</a> | <a href='/vendor/roave/better-reflection/src/Reflection/ReflectionProperty.php'>Roave\BetterReflection\Reflection\ReflectionProperty</a> | <a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClassConstant.php'>Roave\BetterReflection\Reflection\ReflectionClassConstant</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________

.. _mgetobjectid:

* `# <mgetobjectid_>`_  ``getObjectId``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L56>`_
.. code-block:: php

        public function getObjectId(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetdocblock:

* `# <mgetdocblock_>`_  ``getDocBlock``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L77>`_
.. code-block:: php

        public function getDocBlock(): phpDocumentor\Reflection\DocBlock;




**Parameters:** not specified


**Return value:** `phpDocumentor\\Reflection\\DocBlock </vendor/phpdocumentor/reflection-docblock/src/DocBlock\.php>`_

________

.. _misinternal:

* `# <misinternal_>`_  ``isInternal``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L88>`_
.. code-block:: php

        public function isInternal(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _misdeprecated:

* `# <misdeprecated_>`_  ``isDeprecated``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L100>`_
.. code-block:: php

        public function isDeprecated(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mhasdescriptionlinks:

* `# <mhasdescriptionlinks_>`_  ``hasDescriptionLinks``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L112>`_
.. code-block:: php

        public function hasDescriptionLinks(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetdescriptionlinks:

* `# <mgetdescriptionlinks_>`_  ``getDescriptionLinks``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L133>`_
.. code-block:: php

        public function getDescriptionLinks(BumbleDocGen\Render\Context\Context|null $context = NULL): array;




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
            <td>$context</td>
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a> | null</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mhasthrows:

* `# <mhasthrows_>`_  ``hasThrows``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L234>`_
.. code-block:: php

        public function hasThrows(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetthrows:

* `# <mgetthrows_>`_  ``getThrows``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L243>`_
.. code-block:: php

        public function getThrows(BumbleDocGen\Render\Context\Context|null $context = NULL): array;




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
            <td>$context</td>
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a> | null</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mhasexamples:

* `# <mhasexamples_>`_  ``hasExamples``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L291>`_
.. code-block:: php

        public function hasExamples(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetexamples:

* `# <mgetexamples_>`_  ``getExamples``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L300>`_
.. code-block:: php

        public function getExamples(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetfirstexample:

* `# <mgetfirstexample_>`_  ``getFirstExample``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L319>`_
.. code-block:: php

        public function getFirstExample(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetdocnote:

* `# <mgetdocnote_>`_  ``getDocNote``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntity.php#L325>`_
.. code-block:: php

        public function getDocNote(): string;




**Parameters:** not specified


**Return value:** string

________


