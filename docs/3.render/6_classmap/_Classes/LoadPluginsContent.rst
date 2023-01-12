.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.md">Render class map</a> <b>/</b> LoadPluginsContent<hr> </embed>


Description of the `LoadPluginsContent </BumbleDocGen/Render/Twig/Function/LoadPluginsContent.php>`_ class:
-----------------------




**:warning: Is internal** 

.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class LoadPluginsContent


..

        Process class template blocks with plugins\. The method returns the content processed by plugins\.


**Examples of using:**

.. code-block:: php

        {{ loadPluginsContent('some text', classEntity, constant('BumbleDocGen\\Plugin\\BaseTemplatePluginInterface::BLOCK_AFTER_HEADER')) }}






Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **loadPluginsContent**
==============  ================



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
                <li><a href="#m-invoke">__invoke</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/LoadPluginsContent.php#L23>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Render\Context\Context $context): mixed;




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
            <td>Render context</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/LoadPluginsContent.php#L33>`_
.. code-block:: php

        public function __invoke(string $content, BumbleDocGen\Parser\Entity\ClassEntity $classEntity, string $blockType): string;




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
            <td>Content to be processed by plugins</td>
        </tr>
            <tr>
            <td>$classEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>The entity for which we process the content block</td>
        </tr>
            <tr>
            <td>$blockType</td>
            <td>string</td>
            <td>Content block type. @see BaseTemplatePluginInterface::BLOCK_*</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


