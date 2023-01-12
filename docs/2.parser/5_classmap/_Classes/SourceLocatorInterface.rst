<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.md">Parser class map</a> <b>/</b> SourceLocatorInterface<hr></embed>

Description of the `SourceLocatorInterface </BumbleDocGen/Parser/SourceLocator/SourceLocatorInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    interface SourceLocatorInterface









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



.. _mgetfinder:

* `# <mgetfinder_>`_  ``getFinder``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorInterface.php#L13>`_
.. code-block:: php

        public function getFinder(): Symfony\Component\Finder\Finder|null;




**Parameters:** not specified


**Return value:** `Symfony\\Component\\Finder\\Finder </vendor/symfony/finder/Finder\.php>`_ | null

________

.. _mconverttoreflectorsourcelocator:

* `# <mconverttoreflectorsourcelocator_>`_  ``convertToReflectorSourceLocator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorInterface.php#L15>`_
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


