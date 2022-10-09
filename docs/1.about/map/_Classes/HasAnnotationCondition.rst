.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> HasAnnotationCondition</embed>


Description of the `HasAnnotationCondition </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/HasAnnotationCondition.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

    final class HasAnnotationCondition implements BumbleDocGen\Parser\FilterCondition\ConditionInterface


..

        Checking for an annotation on a class





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/HasAnnotationCondition.php#L15>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, string $className): mixed;




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
            <td><a href='/docs/_Classes/ClassEntity.rst'>BumbleDocGen\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mcanaddtocollection:

* `# <mcanaddtocollection_>`_  ``canAddToCollection``   **|** `source code </BumbleDocGen/Parser/FilterCondition/ClassFilterCondition/HasAnnotationCondition.php#L21>`_
.. code-block:: php

        public function canAddToCollection(): bool;




**Parameters:** not specified


**Return value:** bool

________


