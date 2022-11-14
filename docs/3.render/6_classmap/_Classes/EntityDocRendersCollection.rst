.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.rst">Render class map</a> <b>/</b> EntityDocRendersCollection</embed>


Description of the `EntityDocRendersCollection </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\EntityDocRender;

    final class EntityDocRendersCollection implements IteratorAggregate, Traversable









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetiterator">getIterator</a> - <i>Retrieve an external iterator</i></li>
                <li><a href="#madd">add</a> </li>
                <li><a href="#mgetfirstmatchingrender">getFirstMatchingRender</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetiterator:

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection.php#L14>`_
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

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection.php#L19>`_
.. code-block:: php

        public function add(BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface $entityDocRender): BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;




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
            <td>$entityDocRender</td>
            <td><a href='/BumbleDocGen/Render/EntityDocRender/EntityDocRenderInterface.php'>BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Render\\EntityDocRender\\EntityDocRendersCollection </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection\.php>`_

________

.. _mgetfirstmatchingrender:

* `# <mgetfirstmatchingrender_>`_  ``getFirstMatchingRender``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRendersCollection.php#L25>`_
.. code-block:: php

        public function getFirstMatchingRender(BumbleDocGen\Render\Context\DocumentedEntityWrapper $entityWrapper): BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface|null;




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
            <td>$entityWrapper</td>
            <td><a href='/BumbleDocGen/Render/Context/DocumentedEntityWrapper.php'>BumbleDocGen\Render\Context\DocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Render\\EntityDocRender\\EntityDocRenderInterface </BumbleDocGen/Render/EntityDocRender/EntityDocRenderInterface\.php>`_ | null

________


