.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/1_renderingProcess/index.rst">Rendering process</a> <b>/</b> DocumentedEntityWrappersCollection</embed>


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

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection.php#L13>`_
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

.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection.php#L23>`_
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
            <td><a href='/BumbleDocGen/Render/Context/DocumentedEntityWrapper.php'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Render\\Context\\DocumentedEntityWrappersCollection </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection\.php>`_

________


