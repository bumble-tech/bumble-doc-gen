.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.rst">Plugin system</a> <b>/</b> TwigFilterClassParserPlugin</embed>


Description of the `TwigFilterClassParserPlugin </SelfDoc/Configuration/Plugin/TwigFilterClassParser/TwigFilterClassParserPlugin.php>`_ class:
-----------------------






.. code-block:: php

    namespace SelfDoc\Configuration\Plugin\TwigFilterClassParser;

    final class TwigFilterClassParserPlugin implements BumbleDocGen\Plugin\ClassEntityCollectionPluginInterface, BumbleDocGen\Plugin\PluginInterface, BumbleDocGen\Plugin\EntityDocRenderPluginInterface







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
                <li><a href="#maftercreationclassentitycollectionbyreflector">afterCreationClassEntityCollectionByReflector</a> - <i>The method is called after the ClassEntityCollection has been created using the reflector</i></li>
                <li><a href="#mhandletemplateblockcontent">handleTemplateBlockContent</a> - <i>Handles text blocks in an entity template when generating entity documentation</i></li>
        </ol>



Constants:
-----------------------


* ``PLUGIN_KEY``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFilterClassParser/TwigFilterClassParserPlugin.php#L21>`_ 







--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFilterClassParser/TwigFilterClassParserPlugin.php#L24>`_
.. code-block:: php

        public function __construct(): mixed;




**Parameters:** not specified


**Return value:** mixed

________

.. _maftercreationclassentitycollectionbyreflector:

* `# <maftercreationclassentitycollectionbyreflector_>`_  ``afterCreationClassEntityCollectionByReflector``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFilterClassParser/TwigFilterClassParserPlugin.php#L73>`_
.. code-block:: php

        public function afterCreationClassEntityCollectionByReflector(BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection): void;


..

    The method is called after the ClassEntityCollection has been created using the reflector


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
            <td>$classEntityCollection</td>
            <td><a href='/docs/_Classes/ClassEntityCollection.rst'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void


**See:**

#. `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection::createByReflector\(\) </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L23>`_ 

________

.. _mhandletemplateblockcontent:

* `# <mhandletemplateblockcontent_>`_  ``handleTemplateBlockContent``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFilterClassParser/TwigFilterClassParserPlugin.php#L85>`_
.. code-block:: php

        public function handleTemplateBlockContent(string $blockContent, BumbleDocGen\Parser\Entity\ClassEntity $classEntity, string $blockType, BumbleDocGen\Render\Context\Context $context): string;


..

    Handles text blocks in an entity template when generating entity documentation


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
            <td><a href='/docs/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$blockType</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='/docs/_Classes/Context.rst'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string


**See:**

#. **LoadPluginsContent** 

________


