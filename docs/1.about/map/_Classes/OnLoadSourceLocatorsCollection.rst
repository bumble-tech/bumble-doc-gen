<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> OnLoadSourceLocatorsCollection<hr> </embed>

Description of the `OnLoadSourceLocatorsCollection </BumbleDocGen/Plugin/Event/Parser/OnLoadSourceLocatorsCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\Event\Parser;

    final class OnLoadSourceLocatorsCollection extends Symfony\Contracts\EventDispatcher\Event implements Psr\EventDispatcher\StoppableEventInterface


..

        Called when source locators are loaded





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
                <li><a href="#mgetsourcelocatorscollection">getSourceLocatorsCollection</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/OnLoadSourceLocatorsCollection.php#L15>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection $sourceLocatorsCollection): mixed;




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
            <td>$sourceLocatorsCollection</td>
            <td><a href='/BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection.php'>BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetsourcelocatorscollection:

* `# <mgetsourcelocatorscollection_>`_  ``getSourceLocatorsCollection``   **|** `source code </BumbleDocGen/Plugin/Event/Parser/OnLoadSourceLocatorsCollection.php#L19>`_
.. code-block:: php

        public function getSourceLocatorsCollection(): BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\SourceLocator\\SourceLocatorsCollection </BumbleDocGen/Parser/SourceLocator/SourceLocatorsCollection\.php>`_

________


