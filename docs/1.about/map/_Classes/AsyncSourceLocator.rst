<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> AsyncSourceLocator<hr> </embed>

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
                <li><a href="#mgetfinder">getFinder</a> </li>
                <li><a href="#mconverttoreflectorsourcelocator">convertToReflectorSourceLocator</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php#L16>`_
.. code-block:: php

        public function __construct(array $psr4FileMap, array $classMap): mixed;




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
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetfinder:

* `# <mgetfinder_>`_  ``getFinder``   **|** `source code </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php#L25>`_
.. code-block:: php

        public function getFinder(): Symfony\Component\Finder\Finder|null;




**Parameters:** not specified


**Return value:** `Symfony\\Component\\Finder\\Finder </vendor/symfony/finder/Finder\.php>`_ | null

________

.. _mconverttoreflectorsourcelocator:

* `# <mconverttoreflectorsourcelocator_>`_  ``convertToReflectorSourceLocator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/AsyncSourceLocator.php#L30>`_
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
            <td><a href='/vendor/roave/better-reflection/src/SourceLocator/Ast/Locator.php'>Roave\BetterReflection\SourceLocator\Ast\Locator</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `Roave\\BetterReflection\\SourceLocator\\Type\\SourceLocator </vendor/roave/better-reflection/src/SourceLocator/Type/SourceLocator\.php>`_

________


