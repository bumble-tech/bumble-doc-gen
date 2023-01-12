<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/1_renderingProcess/index.md">Rendering process</a> <b>/</b> DocumentedEntityWrapper<hr></embed>

Description of the `DocumentedEntityWrapper </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Context;

    final class DocumentedEntityWrapper


..

        Wrapper for the class that was requested for documentation





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
                <li><a href="#mgetkey">getKey</a> - <i>Get document key</i></li>
                <li><a href="#mgetfilename">getFileName</a> - <i>The name of the file to be generated</i></li>
                <li><a href="#mgetdocumenttransformableentity">getDocumentTransformableEntity</a> - <i>Get entity that is allowed to be documented</i></li>
                <li><a href="#mgetdocurl">getDocUrl</a> - <i>Get the relative path to the document to be generated</i></li>
                <li><a href="#mgetinitiatorfilepath">getInitiatorFilePath</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Render\Context\DocumentTransformableEntityInterface $documentTransformableEntity, string $initiatorFilePath): mixed;




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
            <td>$documentTransformableEntity</td>
            <td><a href='/BumbleDocGen/Render/Context/DocumentTransformableEntityInterface.php'>BumbleDocGen\Render\Context\DocumentTransformableEntityInterface</a></td>
            <td>An entity that is allowed to be documented</td>
        </tr>
            <tr>
            <td>$initiatorFilePath</td>
            <td>string</td>
            <td>The file in which the documentation of the entity was requested</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetkey:

* `# <mgetkey_>`_  ``getKey``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php#L25>`_
.. code-block:: php

        public function getKey(): string;


..

    Get document key


**Parameters:** not specified


**Return value:** string

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php#L54>`_
.. code-block:: php

        public function getFileName(string $fileExtension = 'rst'): string;


..

    The name of the file to be generated


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
            <td>$fileExtension</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________

.. _mgetdocumenttransformableentity:

* `# <mgetdocumenttransformableentity_>`_  ``getDocumentTransformableEntity``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php#L62>`_
.. code-block:: php

        public function getDocumentTransformableEntity(): BumbleDocGen\Render\Context\DocumentTransformableEntityInterface;


..

    Get entity that is allowed to be documented


**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\Context\\DocumentTransformableEntityInterface </BumbleDocGen/Render/Context/DocumentTransformableEntityInterface\.php>`_

________

.. _mgetdocurl:

* `# <mgetdocurl_>`_  ``getDocUrl``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php#L70>`_
.. code-block:: php

        public function getDocUrl(): string;


..

    Get the relative path to the document to be generated


**Parameters:** not specified


**Return value:** string

________

.. _mgetinitiatorfilepath:

* `# <mgetinitiatorfilepath_>`_  ``getInitiatorFilePath``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrapper.php#L78>`_
.. code-block:: php

        public function getInitiatorFilePath(): string;




**Parameters:** not specified


**Return value:** string

________


