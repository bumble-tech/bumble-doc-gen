.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> EntityDocRenderInterface</embed>


Description of the `EntityDocRenderInterface </BumbleDocGen/Render/EntityDocRender/EntityDocRenderInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\EntityDocRender;

    interface EntityDocRenderInterface


..

        Entity documentation render interface







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#misavailableforentity">isAvailableForEntity</a> - <i>Can this render be used to create entity documentation</i></li>
                <li><a href="#msetcontext">setContext</a> </li>
                <li><a href="#mgetrenderedtext">getRenderedText</a> - <i>Get rendered documentation for an entity</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _misavailableforentity:

* `# <misavailableforentity_>`_  ``isAvailableForEntity``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRenderInterface.php#L21>`_
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
            <td><a href='/docs/1.about/map/_Classes/DocumentedEntityWrapper.rst'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>The class whose documentation was requested</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________

.. _msetcontext:

* `# <msetcontext_>`_  ``setContext``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRenderInterface.php#L23>`_
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
            <td><a href='/docs/1.about/map/_Classes/Context.rst'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetrenderedtext:

* `# <mgetrenderedtext_>`_  ``getRenderedText``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRenderInterface.php#L31>`_
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
            <td><a href='/docs/1.about/map/_Classes/DocumentedEntityWrapper.rst'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>The class whose documentation was requested</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


