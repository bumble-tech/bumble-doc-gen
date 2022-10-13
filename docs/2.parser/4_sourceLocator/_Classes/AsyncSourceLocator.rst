.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/4_sourceLocator/index.rst">Source locators</a> <b>/</b> AsyncSourceLocator</embed>


Description of the `AsyncSourceLocator </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    final class AsyncSourceLocator implements BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface


..

        Lazy loading classes\. Cannot be used for initial parsing of files, only for getting specific documents





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php#L17>`_
.. code-block:: php

        public function __construct(array $psr4FileMap, array $classMap, string|null $cacheDirName = NULL): mixed;




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
            <td>$psr4FileMap</td>
            <td>array</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classMap</td>
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

* `# <mgetfiles_>`_  ``getFiles``   **|** `source code </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php#L24>`_
.. code-block:: php

        public function getFiles(): Generator;




**Parameters:** not specified


**Return value:** 

________

.. _mconverttoreflectorsourcelocator:

* `# <mconverttoreflectorsourcelocator_>`_  ``convertToReflectorSourceLocator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php#L29>`_
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


