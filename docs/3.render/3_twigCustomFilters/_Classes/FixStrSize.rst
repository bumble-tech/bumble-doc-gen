<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/3_twigCustomFilters/index.md">Template filters</a> <b>/</b> FixStrSize<hr></embed>

Description of the `FixStrSize </BumbleDocGen/Render/Twig/Filter/FixStrSize.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class FixStrSize


..

        The filter pads the string with the specified characters on the right to the specified size




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **fixStrSize**
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

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/FixStrSize.php#L18>`_
.. code-block:: php

        public function __invoke(string $text, int $size, string $symbol = ' '): string;




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
            <tr>
            <td>$size</td>
            <td>int</td>
            <td>Required string size</td>
        </tr>
            <tr>
            <td>$symbol</td>
            <td>string</td>
            <td>The character to be used to complete the string</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


