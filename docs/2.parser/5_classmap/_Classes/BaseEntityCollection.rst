.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> BaseEntityCollection</embed>


Description of the `BaseEntityCollection </BumbleDocGen/Parser/Entity/BaseEntityCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    abstract class BaseEntityCollection implements IteratorAggregate, Traversable









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetiterator">getIterator</a> - <i>Retrieve an external iterator</i></li>
                <li><a href="#misempty">isEmpty</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetiterator:

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntityCollection.php#L11>`_
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

.. _misempty:

* `# <misempty_>`_  ``isEmpty``   **|** `source code </BumbleDocGen/Parser/Entity/BaseEntityCollection.php#L16>`_
.. code-block:: php

        public function isEmpty(): bool;




**Parameters:** not specified


**Return value:** bool

________


