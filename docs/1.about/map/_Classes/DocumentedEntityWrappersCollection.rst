.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> DocumentedEntityWrappersCollection</embed>


Description of the `DocumentedEntityWrappersCollection </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Context;

    final class DocumentedEntityWrappersCollection implements IteratorAggregate, Traversable









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetiterator">getIterator</a> - <i>Retrieve an external iterator</i></li>
                <li><a href="#madd">add</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetiterator:

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection.php#L12>`_
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

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection.php#L17>`_
.. code-block:: php

        public function add(BumbleDocGen\Render\Context\DocumentedEntityWrapper $documentedClass): BumbleDocGen\Render\Context\DocumentedEntityWrappersCollection;




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
            <td>$documentedClass</td>
            <td><a href='/docs/_Classes/DocumentedEntityWrapper.rst'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Render\\Context\\DocumentedEntityWrappersCollection </docs/_Classes/DocumentedEntityWrappersCollection\.rst>`_

________


