.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> DrawDocumentedClassLink</embed>


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



Constants:
-----------------------



.. raw:: html

    <ul>
            <li><a name="qtemplate-rst" href="#qtemplate-rst">#</a> <code>TEMPLATE_RST</code>   <b>|</b> <a href="/BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php#L21">source code</a> </li>
            <li><a name="qtemplate-html" href="#qtemplate-html">#</a> <code>TEMPLATE_HTML</code>   <b>|</b> <a href="/BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php#L22">source code</a> </li>
        </ul>







--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php#L27>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Render\Context\Context $context, string $templateType = BumbleDocGen\Render\Twig\Function\DrawDocumentedClassLink::TEMPLATE_RST): mixed;




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
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawDocumentedClassLink.php#L31>`_
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
            <td><a href='/docs/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
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


