.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.md">Parser class map</a> <b>/</b> VisibilityCondition<hr> </embed>


Description of the `VisibilityCondition </BumbleDocGen/Parser/FilterCondition/MethodFilterCondition/VisibilityCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\MethodFilterCondition;

    final class VisibilityCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Method access modifier check





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/MethodFilterCondition/VisibilityCondition.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\MethodEntity $methodEntity, string $visibilityModifier = BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier::PUBLIC): mixed;




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
            <td>$methodEntity</td>
            <td><a href='/BumbleDocGen/Parser/Entity/MethodEntity.php'>BumbleDocGen\Parser\Entity\MethodEntity</a></td>
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

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/MethodFilterCondition/VisibilityCondition.php#L22>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


