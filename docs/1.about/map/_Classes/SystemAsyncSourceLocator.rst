<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> SystemAsyncSourceLocator<hr></embed>

Description of the `SystemAsyncSourceLocator </BumbleDocGen/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php>`_ class:
-----------------------




**:warning: Is internal** 

.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator\Internal;

    final class SystemAsyncSourceLocator extends Roave\BetterReflection\SourceLocator\Type\AbstractSourceLocator implements Roave\BetterReflection\SourceLocator\Type\SourceLocator







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
                <li><a href="#mgetclassloader">getClassLoader</a> </li>
                <li><a href="#mgetlocatedsource">getLocatedSource</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L19>`_
.. code-block:: php

        public function __construct(Roave\BetterReflection\SourceLocator\Ast\Locator $astLocator, array $psr4FileMap, array $classMap): mixed;




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

.. _mgetclassloader:

* `# <mgetclassloader_>`_  ``getClassLoader``   **|** `source code </BumbleDocGen/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L41>`_
.. code-block:: php

        public static function getClassLoader(array $psr4FileMap, array $classMap): Composer\Autoload\ClassLoader;




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


**Return value:** `Composer\\Autoload\\ClassLoader </vendor/composer/ClassLoader\.php>`_

________

.. _mgetlocatedsource:

* `# <mgetlocatedsource_>`_  ``getLocatedSource``   **|** `source code </BumbleDocGen/Parser/SourceLocator/Internal/SystemAsyncSourceLocator.php#L58>`_
.. code-block:: php

        public function getLocatedSource(string $className): Roave\BetterReflection\SourceLocator\Located\LocatedSource|null;




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
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `Roave\\BetterReflection\\SourceLocator\\Located\\LocatedSource </vendor/roave/better-reflection/src/SourceLocator/Located/LocatedSource\.php>`_ | null

________


