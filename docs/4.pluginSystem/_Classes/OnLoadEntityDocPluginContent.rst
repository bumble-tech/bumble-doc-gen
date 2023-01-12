<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.md">Plugin system</a> <b>/</b> OnLoadEntityDocPluginContent<hr> </embed>

Description of the `OnLoadEntityDocPluginContent </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\Event\Render;

    final class OnLoadEntityDocPluginContent extends Symfony\Contracts\EventDispatcher\Event implements Psr\EventDispatcher\StoppableEventInterface


..

        Called when class documentation is generated \(plugin content loading\)


See:

#. `BumbleDocGen\\Render\\Twig\\Function\\LoadPluginsContent </docs/4.pluginSystem/_Classes/LoadPluginsContent.rst>`_ 





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
                <li><a href="#mgetclassentity">getClassEntity</a> </li>
                <li><a href="#mgetblockcontent">getBlockContent</a> </li>
                <li><a href="#mgetblocktype">getBlockType</a> </li>
                <li><a href="#mgetcontext">getContext</a> </li>
                <li><a href="#maddblockcontentpluginresult">addBlockContentPluginResult</a> </li>
                <li><a href="#mgetblockcontentpluginresults">getBlockContentPluginResults</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L21>`_
.. code-block:: php

        public function __construct(string $blockContent, BumbleDocGen\Parser\Entity\ClassEntity $classEntity, string $blockType, BumbleDocGen\Render\Context\Context $context): mixed;




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
            <td>$blockContent</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$blockType</td>
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

.. _mgetclassentity:

* `# <mgetclassentity_>`_  ``getClassEntity``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L29>`_
.. code-block:: php

        public function getClassEntity(): BumbleDocGen\Parser\Entity\ClassEntity;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </BumbleDocGen/Parser/Entity/ClassEntity\.php>`_

________

.. _mgetblockcontent:

* `# <mgetblockcontent_>`_  ``getBlockContent``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L34>`_
.. code-block:: php

        public function getBlockContent(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetblocktype:

* `# <mgetblocktype_>`_  ``getBlockType``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L39>`_
.. code-block:: php

        public function getBlockType(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetcontext:

* `# <mgetcontext_>`_  ``getContext``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L44>`_
.. code-block:: php

        public function getContext(): BumbleDocGen\Render\Context\Context;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\Context\\Context </BumbleDocGen/Render/Context/Context\.php>`_

________

.. _maddblockcontentpluginresult:

* `# <maddblockcontentpluginresult_>`_  ``addBlockContentPluginResult``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L49>`_
.. code-block:: php

        public function addBlockContentPluginResult(string $pluginResult): void;




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
            <td>$pluginResult</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetblockcontentpluginresults:

* `# <mgetblockcontentpluginresults_>`_  ``getBlockContentPluginResults``   **|** `source code </BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php#L54>`_
.. code-block:: php

        public function getBlockContentPluginResults(): array;




**Parameters:** not specified


**Return value:** array

________


