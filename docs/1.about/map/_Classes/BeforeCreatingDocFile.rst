<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> BeforeCreatingDocFile<hr> </embed>

Description of the `BeforeCreatingDocFile </BumbleDocGen/Plugin/Event/Render/BeforeCreatingDocFile.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\Event\Render;

    final class BeforeCreatingDocFile extends Symfony\Contracts\EventDispatcher\Event implements Psr\EventDispatcher\StoppableEventInterface


..

        Called before the content of the documentation document is saved to a file





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
                <li><a href="#mgetcontent">getContent</a> </li>
                <li><a href="#msetcontent">setContent</a> </li>
                <li><a href="#mgetcontext">getContext</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/Event/Render/BeforeCreatingDocFile.php#L15>`_
.. code-block:: php

        public function __construct(string $content, BumbleDocGen\Render\Context\Context $context): mixed;




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
            <td>$content</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetcontent:

* `# <mgetcontent_>`_  ``getContent``   **|** `source code </BumbleDocGen/Plugin/Event/Render/BeforeCreatingDocFile.php#L19>`_
.. code-block:: php

        public function getContent(): string;




**Parameters:** not specified


**Return value:** string

________

.. _msetcontent:

* `# <msetcontent_>`_  ``setContent``   **|** `source code </BumbleDocGen/Plugin/Event/Render/BeforeCreatingDocFile.php#L24>`_
.. code-block:: php

        public function setContent(string $content): void;




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
            <td>$content</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetcontext:

* `# <mgetcontext_>`_  ``getContext``   **|** `source code </BumbleDocGen/Plugin/Event/Render/BeforeCreatingDocFile.php#L29>`_
.. code-block:: php

        public function getContext(): BumbleDocGen\Render\Context\Context;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\Context\\Context </BumbleDocGen/Render/Context/Context\.php>`_

________


