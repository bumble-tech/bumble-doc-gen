.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.rst">Render class map</a> <b>/</b> DrawDocumentedClassLink<hr> </embed>


Description of the `DrawDocumentedClassLink </BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class DrawDocumentedClassLink


..

        Creates an entity link by object


**Examples of using:**

.. code-block:: php

        {{ drawDocumentedClassLink($entity, 'getFunctions') }}


.. code-block:: php

        {{ drawDocumentedClassLink($entity) }}


.. code-block:: php

        {{ drawDocumentedClassLink($entity, '', false) }}






Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **drawDocumentedClassLink**
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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php#L24>`_
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

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php#L28>`_
.. code-block:: php

        public function __invoke(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, string $cursor = '', bool $useShortName = true): string;




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
            <td>$classEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cursor</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$useShortName</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


