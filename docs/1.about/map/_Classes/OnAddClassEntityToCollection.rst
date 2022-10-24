.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> OnAddClassEntityToCollection</embed>


Description of the `OnAddClassEntityToCollection </BumbleDocGen/Plugin/Event/Parser/OnAddClassEntityToCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\Event\Parser;

    final class OnAddClassEntityToCollection extends Symfony\Contracts\EventDispatcher\Event implements Psr\EventDispatcher\StoppableEventInterface


..

        Called when each class entity is added to the entity collection





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
                <li><a href="#mgetclassentitycollection">getClassEntityCollection</a> </li>
                <li><a href="#mgetclassentity">getClassEntity</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection): mixed;




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
            <td>$classEntity</td>
            <td><a href='/docs/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classEntityCollection</td>
            <td><a href='/docs/_Classes/ClassEntityCollection.rst'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetclassentitycollection:

* `# <mgetclassentitycollection_>`_  ``getClassEntityCollection``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L22>`_
.. code-block:: php

        public function getClassEntityCollection(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/_Classes/ClassEntityCollection\.rst>`_

________

.. _mgetclassentity:

* `# <mgetclassentity_>`_  ``getClassEntity``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/OnAddClassEntityToCollection.php#L27>`_
.. code-block:: php

        public function getClassEntity(): BumbleDocGen\Parser\Entity\ClassEntity;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </docs/_Classes/ClassEntity\.rst>`_

________


