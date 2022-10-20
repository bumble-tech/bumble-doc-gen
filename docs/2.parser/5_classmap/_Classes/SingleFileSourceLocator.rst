.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> SingleFileSourceLocator</embed>


Description of the `SingleFileSourceLocator </BumbleDocGen/Parser/SourceLocator/SingleFileSourceLocator.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    final class SingleFileSourceLocator implements BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface


..

        Loads one specific file by its path





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SingleFileSourceLocator.php#L18>`_
.. code-block:: php

        public function __construct(string $filename, Psr\Cache\CacheItemPoolInterface|null $cache = NULL): mixed;




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
            <td>$filename</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cache</td>
            <td><a href='/vendor/psr/cache/src/CacheItemPoolInterface.php#L14'>Psr\Cache\CacheItemPoolInterface</a> | null</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetfiles:

* `# <mgetfiles_>`_  ``getFiles``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SingleFileSourceLocator.php#L24>`_
.. code-block:: php

        public function getFiles(): Generator;




**Parameters:** not specified


**Return value:** 

________

.. _mconverttoreflectorsourcelocator:

* `# <mconverttoreflectorsourcelocator_>`_  ``convertToReflectorSourceLocator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SingleFileSourceLocator.php#L29>`_
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


