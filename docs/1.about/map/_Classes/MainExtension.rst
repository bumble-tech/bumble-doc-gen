.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> MainExtension</embed>


Description of the `MainExtension </BumbleDocGen/Render/Twig/MainExtension.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig;

    final class MainExtension extends Twig\Extension\AbstractExtension implements Twig\Extension\ExtensionInterface


..

        This is an extension that is used to generate documents from templates





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
                <li><a href="#mchangecontext">changeContext</a> </li>
                <li><a href="#mgetfunctions">getFunctions</a> - <i>List of custom functions</i></li>
                <li><a href="#mgetfilters">getFilters</a> - <i>List of custom filters</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/MainExtension.php#L30>`_
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
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mchangecontext:

* `# <mchangecontext_>`_  ``changeContext``   **|** `source code </BumbleDocGen/Render/Twig/MainExtension.php#L34>`_
.. code-block:: php

        public function changeContext(BumbleDocGen\Render\Context\Context $context): void;




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
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetfunctions:

* `# <mgetfunctions_>`_  ``getFunctions``   **|** `source code </BumbleDocGen/Render/Twig/MainExtension.php#L42>`_
.. code-block:: php

        public function getFunctions(): array;


..

    List of custom functions


**Parameters:** not specified


**Return value:** array

________

.. _mgetfilters:

* `# <mgetfilters_>`_  ``getFilters``   **|** `source code </BumbleDocGen/Render/Twig/MainExtension.php#L67>`_
.. code-block:: php

        public function getFilters(): array;


..

    List of custom filters


**Parameters:** not specified


**Return value:** array

________


