.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/4_twigCustomFunctions/index.rst">Template functions</a> <b>/</b> DrawClassMap</embed>


Description of the `DrawClassMap </BumbleDocGen/Render/Twig/Function/DrawClassMap.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class DrawClassMap


..

        Generate class map in HTML or rst format


**Examples of using:**

.. code-block:: php

        {{ drawClassMap(classEntityCollection.filterByPaths(['/BumbleDocGen/Render'])) }}


.. code-block:: php

        {{ drawClassMap(classEntityCollection) }}






Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **drawClassMap**
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
                <li><a href="#mgetdirectorystructure">getDirectoryStructure</a> </li>
                <li><a href="#mconvertdirectorystructuretoformattedstring">convertDirectoryStructureToFormattedString</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawClassMap.php#L23>`_
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
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
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

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawClassMap.php#L32>`_
.. code-block:: php

        public function __invoke(BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollections): string;




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
            <td>$classEntityCollections</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntityCollection.php'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>The collection of entities for which the class map will be generated</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________

.. _mgetdirectorystructure:

* `# <mgetdirectorystructure_>`_  ``getDirectoryStructure``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawClassMap.php#L64>`_
.. code-block:: php

        public function getDirectoryStructure(BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollections): array;




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
            <td>$classEntityCollections</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntityCollection.php'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mconvertdirectorystructuretoformattedstring:

* `# <mconvertdirectorystructuretoformattedstring_>`_  ``convertDirectoryStructureToFormattedString``   **|** `source code </BumbleDocGen/Render/Twig/Function/DrawClassMap.php#L91>`_
.. code-block:: php

        public function convertDirectoryStructureToFormattedString(array $structure, string $prefix = '│', string $path = '/'): string;




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
            <td>$structure</td>
            <td>array</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$prefix</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$path</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


