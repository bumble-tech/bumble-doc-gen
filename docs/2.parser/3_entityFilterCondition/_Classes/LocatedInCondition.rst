<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/3_entityFilterCondition/index.md">Entity filter conditions</a> <b>/</b> LocatedInCondition<hr> </embed>

Description of the `LocatedInCondition </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/LocatedInCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

    final class LocatedInCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Checking the existence of a class in the specified directories





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/LocatedInCondition.php#L15>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, array $directories = [ ]): mixed;




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
            <td>$directories</td>
            <td>array</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/LocatedInCondition.php#L21>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


