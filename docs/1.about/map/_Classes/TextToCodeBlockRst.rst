.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> TextToCodeBlockRst</embed>


Description of the `TextToCodeBlockRst </BumbleDocGen/Render/Twig/Filter/TextToCodeBlockRst.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class TextToCodeBlockRst


..

        Convert text to rst header




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **textToCodeBlockRst**
==============  ================





Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#m-invoke">__invoke</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/TextToCodeBlockRst.php#L17>`_
.. code-block:: php

        public function __invoke(string $text, string $codeBlockType): string;




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
            <td>$text</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$codeBlockType</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


