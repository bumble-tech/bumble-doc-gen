.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> DrawDocumentationMenu</embed>


Description of the `DrawDocumentationMenu </BumbleDocGen/Render/Twig/Function/DrawDocumentationMenu.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class DrawDocumentationMenu


..

        Generate documentation menu in HTML or rst format\. To generate the menu, the start page is taken,     and all links with this page are recursively collected for it, after which the html menu is created\.


See:

#. GetDocumentedClassUrl 


**Examples of using:**

.. code-block:: php

        {{ drawDocumentationMenu() }}


.. code-block:: php

        {{ drawDocumentationMenu('/render/index.rst') }}


.. code-block:: php

        {{ drawDocumentationMenu(_self) }}






Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **drawDocumentationMenu**
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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawDocumentationMenu.php#L27>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Render\Context\Context $context, string $templateType = 'rst'): mixed;




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
            <tr>
            <td>$templateType</td>
            <td>string</td>
            <td>The type of string to be generated ( html or rst )</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawDocumentationMenu.php#L41>`_
.. code-block:: php

        public function __invoke(string|null $startPageKey = NULL, int|null $maxDeep = NULL): string;




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
            <td>$startPageKey</td>
            <td>string | null</td>
            <td>Relative path to the page from which the menu will be generated (only child pages will be taken into account).
 By default, the main documentation page is used.</td>
        </tr>
            <tr>
            <td>$maxDeep</td>
            <td>int | null</td>
            <td>Maximum parsing depth of documented links starting from the current page.
 By default, this restriction is disabled.</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


