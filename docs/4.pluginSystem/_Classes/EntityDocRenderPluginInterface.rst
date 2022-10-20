.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.rst">Plugin system</a> <b>/</b> EntityDocRenderPluginInterface</embed>


Description of the `EntityDocRenderPluginInterface </BumbleDocGen/Plugin/EntityDocRenderPluginInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    interface EntityDocRenderPluginInterface extends BumbleDocGen\Plugin\PluginInterface


..

        Plugin for working with templates of documented entities







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mhandletemplateblockcontent">handleTemplateBlockContent</a> - <i>Handles text blocks in an entity template when generating entity documentation</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mhandletemplateblockcontent:

* `# <mhandletemplateblockcontent_>`_  ``handleTemplateBlockContent``   **|** `source code </BumbleDocGen/Plugin/EntityDocRenderPluginInterface.php#L21>`_
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


