.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/3_twigCustomFilters/index.rst">Template filters</a> <b>/</b> TextToHeading</embed>


Description of the `TextToHeading </BumbleDocGen/Render/Twig/Filter/TextToHeading.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class TextToHeading


..

        Convert text to html or rst header




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **textToHeading**
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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Filter/TextToHeading.php#L18>`_
.. code-block:: php

        public function __construct(string $templateType = 'rst'): mixed;




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
            <td>$templateType</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/TextToHeading.php#L27>`_
.. code-block:: php

        public function __invoke(string $text, string $headingType): string;




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
            <td>$headingType</td>
            <td>string</td>
            <td>Choose heading type: H1, H2, H3</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


