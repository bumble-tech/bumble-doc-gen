.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> AddIndentFromLeft</embed>


Description of the `AddIndentFromLeft </BumbleDocGen/Render/Twig/Filter/AddIndentFromLeft.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class AddIndentFromLeft


..

        Filter adds indent from left




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **addIndentFromLeft**
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

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/AddIndentFromLeft.php#L18>`_
.. code-block:: php

        public function __invoke(string $text, int $identLength = 4, bool $skipFirstIdent = false): string;




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
            <td>$identLength</td>
            <td>int</td>
            <td>Indent size</td>
        </tr>
            <tr>
            <td>$skipFirstIdent</td>
            <td>bool</td>
            <td>Skip indent for first line in text or not</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


