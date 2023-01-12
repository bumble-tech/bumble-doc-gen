<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/3_twigCustomFilters/index.md">Template filters</a> <b>/</b> HtmlToRst<hr></embed>

Description of the `HtmlToRst </BumbleDocGen/Render/Twig/Filter/HtmlToRst.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class HtmlToRst


..

        Wraps an html string in an rst `\.\.raw::html` construct, thus helping to display it\.




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **htmlToRst**
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

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/HtmlToRst.php#L13>`_
.. code-block:: php

        public function __invoke(string $text): string;




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
            <td>Processed text</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


