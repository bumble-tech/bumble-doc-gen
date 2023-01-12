.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/5_breadcrumbs/index.md">Breadcrumbs</a> <b>/</b> GeneratePageBreadcrumbs<hr> </embed>


Description of the `GeneratePageBreadcrumbs </BumbleDocGen/Render/Twig/Function/GeneratePageBreadcrumbs.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class GeneratePageBreadcrumbs


..

        Function to generate breadcrumbs on the page




Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **generatePageBreadcrumbs**
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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/GeneratePageBreadcrumbs.php#L18>`_
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
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a></td>
            <td>Render context</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/GeneratePageBreadcrumbs.php#L32>`_
.. code-block:: php

        public function __invoke(string $currentPageTitle, string $templatePath, bool $skipFirstTemplatePage = true): string;




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
            <td>$currentPageTitle</td>
            <td>string</td>
            <td>Title of the current page</td>
        </tr>
            <tr>
            <td>$templatePath</td>
            <td>string</td>
            <td>Path to the template from which the breadcrumbs will be generated</td>
        </tr>
            <tr>
            <td>$skipFirstTemplatePage</td>
            <td>bool</td>
            <td>If set to true, the page from which parsing starts will not participate in the formation of breadcrumbs
 This option is useful when working with the _self value in a template, as it returns the full path to the
 current template, and the reference to it in breadcrumbs should not be clickable.</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


