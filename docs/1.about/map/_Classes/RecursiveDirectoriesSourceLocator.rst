.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> RecursiveDirectoriesSourceLocator</embed>


Description of the `RecursiveDirectoriesSourceLocator </BumbleDocGen/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    final class RecursiveDirectoriesSourceLocator implements BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface


..

        Loads all files from the specified directories, which are traversed recursively





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
                <li><a href="#mgetfiles">getFiles</a> </li>
                <li><a href="#mconverttoreflectorsourcelocator">convertToReflectorSourceLocator</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php#L19>`_
.. code-block:: php

        public function __construct(array $directories, array $exclude = [ ], string|null $cacheDirName = NULL): mixed;




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
            <td>$directories</td>
            <td>array</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$exclude</td>
            <td>array</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cacheDirName</td>
            <td>string | null</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetfiles:

* `# <mgetfiles_>`_  ``getFiles``   **|** `source code </BumbleDocGen/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php#L43>`_
.. code-block:: php

        public function getFiles(): Generator;




**Parameters:** not specified


**Return value:** 

________

.. _mconverttoreflectorsourcelocator:

* `# <mconverttoreflectorsourcelocator_>`_  ``convertToReflectorSourceLocator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php#L51>`_
.. code-block:: php

        public function convertToReflectorSourceLocator(Roave\BetterReflection\SourceLocator\Ast\Locator $astLocator): Roave\BetterReflection\SourceLocator\Type\SourceLocator;




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
            <td>$astLocator</td>
            <td><a href='/vendor/roave/better-reflection/src/SourceLocator/Ast/Locator.php#L23'>Roave\BetterReflection\SourceLocator\Ast\Locator</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `Roave\\BetterReflection\\SourceLocator\\Type\\SourceLocator </vendor/roave/better-reflection/src/SourceLocator/Type/SourceLocator\.php#L12>`_

________


