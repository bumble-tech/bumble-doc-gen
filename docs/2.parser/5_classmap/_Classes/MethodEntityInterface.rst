<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.md">Parser class map</a> <b>/</b> MethodEntityInterface<hr></embed>

Description of the `MethodEntityInterface </BumbleDocGen/Parser/Entity/MethodEntityInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    interface MethodEntityInterface









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetname">getName</a> </li>
                <li><a href="#mgetfilename">getFileName</a> </li>
                <li><a href="#mgetline">getLine</a> </li>
                <li><a href="#mgetmodifiersstring">getModifiersString</a> </li>
                <li><a href="#mgetreturntype">getReturnType</a> </li>
                <li><a href="#mgetparameters">getParameters</a> </li>
                <li><a href="#mgetparametersstring">getParametersString</a> </li>
                <li><a href="#mgetimplementingclassname">getImplementingClassName</a> </li>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#misinitialization">isInitialization</a> </li>
                <li><a href="#misdynamic">isDynamic</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetname:

* `# <mgetname_>`_  ``getName``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L10>`_
.. code-block:: php

        public function getName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L12>`_
.. code-block:: php

        public function getFileName(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetline:

* `# <mgetline_>`_  ``getLine``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L14>`_
.. code-block:: php

        public function getLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetmodifiersstring:

* `# <mgetmodifiersstring_>`_  ``getModifiersString``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L16>`_
.. code-block:: php

        public function getModifiersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetreturntype:

* `# <mgetreturntype_>`_  ``getReturnType``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L18>`_
.. code-block:: php

        public function getReturnType(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetparameters:

* `# <mgetparameters_>`_  ``getParameters``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L20>`_
.. code-block:: php

        public function getParameters(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetparametersstring:

* `# <mgetparametersstring_>`_  ``getParametersString``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L22>`_
.. code-block:: php

        public function getParametersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetimplementingclassname:

* `# <mgetimplementingclassname_>`_  ``getImplementingClassName``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L24>`_
.. code-block:: php

        public function getImplementingClassName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L26>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misinitialization:

* `# <misinitialization_>`_  ``isInitialization``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L28>`_
.. code-block:: php

        public function isInitialization(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _misdynamic:

* `# <misdynamic_>`_  ``isDynamic``   **|** `source code </BumbleDocGen/Parser/Entity/MethodEntityInterface.php#L30>`_
.. code-block:: php

        public function isDynamic(): bool;




**Parameters:** not specified


**Return value:** bool

________


