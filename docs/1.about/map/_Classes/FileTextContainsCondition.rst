.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> FileTextContainsCondition<hr> </embed>


Description of the `FileTextContainsCondition </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/FileTextContainsCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

    final class FileTextContainsCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Checking if a file contains a substring





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
                <li><a href="#mcanaddtocollection">canAddToCollection</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/FileTextContainsCondition.php#L15>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, string $substring): mixed;




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
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntity.php'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$substring</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/FileTextContainsCondition.php#L21>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


