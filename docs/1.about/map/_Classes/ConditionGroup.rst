.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> ConditionGroup</embed>


Description of the `ConditionGroup </BumbleDocGen/Parser/FilterCondition/ConditionGroup.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition;

    final class ConditionGroup implements BumbleDocGen\Parser\FilterCondition\ConditionInterface







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreate">create</a> </li>
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



.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ConditionGroup.php#L15>`_
.. code-block:: php

        public static function create(BumbleDocGen\Parser\FilterCondition\ConditionGroupTypeEnum $groupType, BumbleDocGen\Parser\FilterCondition\ConditionInterface $conditions): BumbleDocGen\Parser\FilterCondition\ConditionGroup;




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
            <td>$groupType</td>
            <td><a href='/docs/_Classes/ConditionGroupTypeEnum.rst'>BumbleDocGen\Parser\FilterCondition\ConditionGroupTypeEnum</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$conditions</td>
            <td><a href='/docs/_Classes/ConditionInterface.rst'>BumbleDocGen\Parser\FilterCondition\ConditionInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\FilterCondition\\ConditionGroup </docs/_Classes/ConditionGroup\.rst>`_

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ConditionGroup.php#L23>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


