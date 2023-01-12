.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> FakeClassLoader<hr> </embed>


Description of the `FakeClassLoader </BumbleDocGen/Parser/FakeClassLoader.php>`_ class:
-----------------------




**:warning: Is internal** 

.. code-block:: php

    namespace BumbleDocGen\Parser;

    final class FakeClassLoader







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
                <li><a href="#maddclassbodyhandler">addClassBodyHandler</a> </li>
                <li><a href="#mloadclass">loadClass</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FakeClassLoader.php#L22>`_
.. code-block:: php

        public function __construct(Roave\BetterReflection\Reflector\Reflector $reflector, Psr\Log\LoggerInterface $logger): mixed;




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
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='/vendor/psr/log/src/LoggerInterface.php'>Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _maddclassbodyhandler:

* `# <maddclassbodyhandler_>`_  ``addClassBodyHandler``   **|** `source code </BumbleDocGen/Parser/FakeClassLoader.php#L63>`_
.. code-block:: php

        public function addClassBodyHandler(callable $handler): void;




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
            <td>$handler</td>
            <td>callable</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mloadclass:

* `# <mloadclass_>`_  ``loadClass``   **|** `source code </BumbleDocGen/Parser/FakeClassLoader.php#L68>`_
.. code-block:: php

        public function loadClass(string $fullClassName, bool $isAttribute = false): bool;




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
            <td>$fullClassName</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$isAttribute</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________


