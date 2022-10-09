.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> VisibilityCondition</embed>


Description of the `VisibilityCondition </BumbleDocGen/Parser/FilterCondition/PropertyFilterCondition/VisibilityCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\PropertyFilterCondition;

    final class VisibilityCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Property access modifier check





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/PropertyFilterCondition/VisibilityCondition.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\PropertyEntity $propertyEntity, BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier $visibilityModifier = BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier::PUBLIC): mixed;




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
            <td><a href='/docs/_Classes/PropertyEntity.rst'>BumbleDocGen\Parser\Entity\PropertyEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$visibilityModifier</td>
            <td><a href='/docs/_Classes/VisibilityConditionModifier.rst'>BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/PropertyFilterCondition/VisibilityCondition.php#L22>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


