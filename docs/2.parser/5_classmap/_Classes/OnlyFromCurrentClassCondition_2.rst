<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.md">Parser class map</a> <b>/</b> OnlyFromCurrentClassCondition<hr> </embed>

Description of the `OnlyFromCurrentClassCondition </BumbleDocGen/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\PropertyFilterCondition;

    final class OnlyFromCurrentClassCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Only properties that belong to the current class \(not parent\)





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php#L15>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\PropertyEntity $propertyEntity): mixed;




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
            <td>$propertyEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/PropertyEntity.php'>BumbleDocGen\Parser\Entity\PropertyEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/PropertyFilterCondition/OnlyFromCurrentClassCondition.php#L20>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


