.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> SourceLocatorsCollection</embed>


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
                <li><a href="#mgetallfiles">getAllFiles</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetiterator:

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L14>`_
.. code-block:: php

        public function getIterator(): Generator;


..

    Retrieve an external iterator


**Parameters:** not specified


**Return value:** 


**Throws:**

#. **Exception** - on failure.


**See:**

#. `https://php\.net/manual/en/iteratoraggregate\.getiterator\.php <https://php.net/manual/en/iteratoraggregate.getiterator.php>`_ 

________

.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L19>`_
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
            <td><a href='/docs/_Classes/SourceLocatorInterface.rst'>BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </docs/_Classes/SourceLocatorsCollection\.rst>`_

________

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L28>`_
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
            <td><a href='/docs/_Classes/SourceLocatorInterface.rst'>BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </docs/_Classes/SourceLocatorsCollection\.rst>`_

________

.. _mconverttoreflectorsourcelocatorslist:

* `# <mconverttoreflectorsourcelocatorslist_>`_  ``convertToReflectorSourceLocatorsList``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L34>`_
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
            <td><a href='/vendor/roave/better-reflection/src/SourceLocator/Ast/Locator.php#L23'>Roave\BetterReflection\SourceLocator\Ast\Locator</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________

.. _mgetallfiles:

* `# <mgetallfiles_>`_  ``getAllFiles``   **|** `source code </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php#L46>`_
.. code-block:: php

        public function getAllFiles(): Generator;




**Parameters:** not specified


**Return value:** 

________


