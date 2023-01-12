<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.md">Parser class map</a> <b>/</b> SourceLocatorsCollection<hr> </embed>

Description of the `SourceLocatorsCollection </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    final class SourceLocatorsCollection implements IteratorAggregate, Traversable







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreate">create</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetiterator">getIterator</a> - <i>Retrieve an external iterator</i></li>
                <li><a href="#madd">add</a> </li>
                <li><a href="#mconverttoreflectorsourcelocatorslist">convertToReflectorSourceLocatorsList</a> </li>
                <li><a href="#mgetcommonfinder">getCommonFinder</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetiterator:

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L15>`_
.. code-block:: php

        public function getIterator(): Generator;


..

    Retrieve an external iterator


**Parameters:** not specified


**Return value:** Generator


**Throws:**

#. **\\Exception** - on failure.


**See:**

#. `https://php\.net/manual/en/iteratoraggregate\.getiterator\.php <https://php.net/manual/en/iteratoraggregate.getiterator.php>`_ 

________

.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L20>`_
.. code-block:: php

        public static function create(BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface $sourceLocators): BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;




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
            <td>$sourceLocators</td>
            <td><a href='/BumbleDocGen/Parser/SourceLocator/SourceLocatorInterface.php'>BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection\.php>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L29>`_
.. code-block:: php

        public function add(BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface $sourceLocator): BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;




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
            <td>$sourceLocator</td>
            <td><a href='/BumbleDocGen/Parser/SourceLocator/SourceLocatorInterface.php'>BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection\.php>`_

________

.. _mconverttoreflectorsourcelocatorslist:

* `# <mconverttoreflectorsourcelocatorslist_>`_  ``convertToReflectorSourceLocatorsList``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L35>`_
.. code-block:: php

        public function convertToReflectorSourceLocatorsList(Roave\BetterReflection\SourceLocator\Ast\Locator $astLocator): array;




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


**Return value:** array

________

.. _mgetcommonfinder:

* `# <mgetcommonfinder_>`_  ``getCommonFinder``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L44>`_
.. code-block:: php

        public function getCommonFinder(): Symfony\Component\Finder\Finder;




**Parameters:** not specified


**Return value:** `Symfony\\Component\\Finder\\Finder </vendor/symfony/finder/Finder\.php>`_

________


