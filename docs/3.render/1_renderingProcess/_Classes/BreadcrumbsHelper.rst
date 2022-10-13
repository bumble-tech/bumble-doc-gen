.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/1_renderingProcess/index.rst">Rendering process</a> <b>/</b> BreadcrumbsHelper</embed>


Description of the `BreadcrumbsHelper </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Breadcrumbs;

    final class BreadcrumbsHelper


..

        Helper class for working with breadcrumbs





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
                <li><a href="#mgettemplatetitle">getTemplateTitle</a> - <i>Get the name of a template by its URL.</i></li>
                <li><a href="#mgettemplatelinkkey">getTemplateLinkKey</a> </li>
                <li><a href="#mgetbreadcrumbs">getBreadcrumbs</a> - <i>Get breadcrumbs as an array</i></li>
                <li><a href="#mrenderbreadcrumbs">renderBreadcrumbs</a> - <i>Returns an HTML string with rendered breadcrumbs</i></li>
        </ol>



Constants:
-----------------------


* ``DEFAULT_MAIN_PAGE_NAME``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L19>`_ 
* ``DEFAULT_PREV_PAGE_NAME``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L23>`_ 







--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L30>`_
.. code-block:: php

        public function __construct(BumbleDocGen\ConfigurationInterface $configuration, string $mainPageName = BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper::DEFAULT_MAIN_PAGE_NAME, string $prevPageName = BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper::DEFAULT_PREV_PAGE_NAME): mixed;




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
            <td>$configuration</td>
            <td><a href='/docs/_Classes/ConfigurationInterface.rst'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$mainPageName</td>
            <td>string</td>
            <td>Main documentation page name</td>
        </tr>
            <tr>
            <td>$prevPageName</td>
            <td>string</td>
            <td>Index page for each child section</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgettemplatetitle:

* `# <mgettemplatetitle_>`_  ``getTemplateTitle``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L81>`_
.. code-block:: php

        public function getTemplateTitle(string $templateName): string;


..

    Get the name of a template by its URL\.


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
            <td>$templateName</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string


**Examples of using:**

.. code-block:: php

    // variable in template:
    // {% set title = 'Some template title' %}
    
    $breadcrumbsHelper->getTemplateTitle() == 'Some template title'; // is true



________

.. _mgettemplatelinkkey:

* `# <mgettemplatelinkkey_>`_  ``getTemplateLinkKey``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L91>`_
.. code-block:: php

        public function getTemplateLinkKey(string $templateName): string|null;




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
            <td>$templateName</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string | null

________

.. _mgetbreadcrumbs:

* `# <mgetbreadcrumbs_>`_  ``getBreadcrumbs``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L109>`_
.. code-block:: php

        public function getBreadcrumbs(string $filePatch, bool $fromCurrent = true): array;


..

    Get breadcrumbs as an array


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
            <td>$filePatch</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fromCurrent</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mrenderbreadcrumbs:

* `# <mrenderbreadcrumbs_>`_  ``renderBreadcrumbs``   **|** `source code </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php#L129>`_
.. code-block:: php

        public function renderBreadcrumbs(string $currentPageTitle, string $filePatch, bool $fromCurrent = true): string;


..

    Returns an HTML string with rendered breadcrumbs


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
            <td>-</td>
        </tr>
            <tr>
            <td>$filePatch</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fromCurrent</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


