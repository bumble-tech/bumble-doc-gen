.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> OnlyFromCurrentClassCondition</embed>


Description of the `OnlyFromCurrentClassCondition </BumbleDocGen/Parser/FilterCondition/MethodFilterCondition/OnlyFromCurrentClassCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\MethodFilterCondition;

    final class OnlyFromCurrentClassCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Only methods that belong to the current class \(not parent\)





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/MethodFilterCondition/OnlyFromCurrentClassCondition.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\MethodEntity $methodEntity): mixed;




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
            <td><a href='/docs/2.parser/5_classmap/_Classes/MethodEntity.rst'>BumbleDocGen\Parser\Entity\MethodEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/MethodFilterCondition/OnlyFromCurrentClassCondition.php#L21>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


