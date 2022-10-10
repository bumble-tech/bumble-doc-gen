.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.rst">Render class map</a> <b>/</b> StrTypeToUrl</embed>


Description of the `StrTypeToUrl </BumbleDocGen/Render/Twig/Filter/StrTypeToUrl.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Filter;

    final class StrTypeToUrl


..

        The filter converts the string with the data type into a link to the documented class, if possible\.


See:

#. GetDocumentedClassUrl 




Settings:
=======================

==============  ================
name            value
==============  ================
Filter name     **strTypeToUrl**
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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Filter/StrTypeToUrl.php#L22>`_
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
            <td><a href='/docs/_Classes/Context.rst'>BumbleDocGen\Render\Context\Context</a></td>
            <td>Render context</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Filter/StrTypeToUrl.php#L33>`_
.. code-block:: php

        public function __invoke(string $text, string $templateType = 'rst', bool $useShortLinkVersion = false): string;




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
            <td>$templateType</td>
            <td>string</td>
            <td>Display format. rst or html</td>
        </tr>
            <tr>
            <td>$useShortLinkVersion</td>
            <td>bool</td>
            <td>Shorten or not the link name. When shortening, only the shortName of the class will be shown</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


