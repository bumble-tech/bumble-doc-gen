.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/3_twigCustomFilters/index.rst">Template filters</a> <b>/</b> RemoveLineBrakes</embed>


Description of the `RemoveLineBrakes </BumbleDocGen/Render/Twig/Filter/RemoveLineBrakes.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class RemoveLineBrakes


..

        The filter replaces all line breaks with a space




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **removeLineBrakes**
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

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/RemoveLineBrakes.php#L15>`_
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


