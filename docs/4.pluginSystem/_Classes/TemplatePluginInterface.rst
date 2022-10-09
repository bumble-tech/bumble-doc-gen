.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.rst">Plugin system</a> <b>/</b> TemplatePluginInterface</embed>


Description of the `TemplatePluginInterface </BumbleDocGen/Plugin/TemplatePluginInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    interface TemplatePluginInterface extends BumbleDocGen\Plugin\PluginInterface implements BumbleDocGen\Plugin\PluginInterface


..

        Plugin for working with page templates







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mhandlerenderedtemplatecontent">handleRenderedTemplateContent</a> - <i>Process rendered template content before writing to file</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mhandlerenderedtemplatecontent:

* `# <mhandlerenderedtemplatecontent_>`_  ``handleRenderedTemplateContent``   **|** `source code </BumbleDocGen/Plugin/TemplatePluginInterface.php#L21>`_
.. code-block:: php

        public function handleRenderedTemplateContent(string $content, BumbleDocGen\Render\Context\Context $context): string;


..

    Process rendered template content before writing to file


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
            <td>Rendered template content</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='/docs/_Classes/Context.rst'>BumbleDocGen\Render\Context\Context</a></td>
            <td>Rendering context</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


