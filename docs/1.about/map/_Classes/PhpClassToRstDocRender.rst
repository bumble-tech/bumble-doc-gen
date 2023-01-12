<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> PhpClassToRstDocRender<hr> </embed>

Description of the `PhpClassToRstDocRender </BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\EntityDocRender\PhpClassToRst;

    class PhpClassToRstDocRender implements BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface


..

        Rendering PHP classes into rst format documents \(for display on github\)





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
                <li><a href="#misavailableforentity">isAvailableForEntity</a> - <i>Can this render be used to create entity documentation</i></li>
                <li><a href="#msetcontext">setContext</a> </li>
                <li><a href="#mgetrenderedtext">getRenderedText</a> - <i>Get rendered documentation for an entity</i></li>
        </ol>



Constants:
-----------------------



.. raw:: html

    <ul>
            <li><a name="qblock-after-main-info" href="#qblock-after-main-info">#</a> <code>BLOCK_AFTER_MAIN_INFO</code>   <b>|</b> <a href="/BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L20">source code</a> </li>
            <li><a name="qblock-after-header" href="#qblock-after-header">#</a> <code>BLOCK_AFTER_HEADER</code>   <b>|</b> <a href="/BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L21">source code</a> </li>
            <li><a name="qblock-before-details" href="#qblock-before-details">#</a> <code>BLOCK_BEFORE_DETAILS</code>   <b>|</b> <a href="/BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L22">source code</a> </li>
        </ul>







--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L27>`_
.. code-block:: php

        public function __construct(): mixed;




**Parameters:** not specified


**Return value:** mixed

________

.. _misavailableforentity:

* `# <misavailableforentity_>`_  ``isAvailableForEntity``   **|** `source code </BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L35>`_
.. code-block:: php

        public function isAvailableForEntity(BumbleDocGen\Render\Context\DocumentedEntityWrapper $entityWrapper): bool;


..

    Can this render be used to create entity documentation


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
            <td>$entityWrapper</td>
            <td><a href='/BumbleDocGen/Render/Context/DocumentedEntityWrapper.php'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>The class whose documentation was requested</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________

.. _msetcontext:

* `# <msetcontext_>`_  ``setContext``   **|** `source code </BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L40>`_
.. code-block:: php

        public function setContext(BumbleDocGen\Render\Context\Context $context): void;




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
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetrenderedtext:

* `# <mgetrenderedtext_>`_  ``getRenderedText``   **|** `source code </BumbleDocGen/Render/EntityDocRender/PhpClassToRst/PhpClassToRstDocRender.php#L52>`_
.. code-block:: php

        public function getRenderedText(BumbleDocGen\Render\Context\DocumentedEntityWrapper $entityWrapper): string;


..

    Get rendered documentation for an entity


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
            <td>$entityWrapper</td>
            <td><a href='/BumbleDocGen/Render/Context/DocumentedEntityWrapper.php'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>The class whose documentation was requested</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


