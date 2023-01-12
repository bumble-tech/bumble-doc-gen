<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.md">Plugin system</a> <b>/</b> AfterCreationClassEntityCollection<hr> </embed>

Description of the `AfterCreationClassEntityCollection </BumbleDocGen/Plugin/Event/Parser/AfterCreationClassEntityCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\Event\Parser;

    final class AfterCreationClassEntityCollection extends Symfony\Contracts\EventDispatcher\Event implements Psr\EventDispatcher\StoppableEventInterface


..

        The event is called after the initial creation of a collection of class entities





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
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/AfterCreationClassEntityCollection.php#L15>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection): mixed;




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
            <td>$classEntityCollection</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntityCollection.php'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetclassentitycollection:

* `# <mgetclassentitycollection_>`_  ``getClassEntityCollection``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/AfterCreationClassEntityCollection.php#L19>`_
.. code-block:: php

        public function getClassEntityCollection(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________


