.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> VisibilityCondition<hr> </embed>


Description of the `VisibilityCondition </BumbleDocGen/Parser/FilterCondition/ClassConstantFilterCondition/VisibilityCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\ClassConstantFilterCondition;

    final class VisibilityCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Constant access modifier check





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassConstantFilterCondition/VisibilityCondition.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\ConstantEntity $constantEntity, string $visibilityModifier = BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier::PUBLIC): mixed;




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
            <td>$constantEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ConstantEntity.php'>BumbleDocGen\Parser\Entity\ConstantEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$visibilityModifier</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassConstantFilterCondition/VisibilityCondition.php#L22>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


