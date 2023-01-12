.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/2_entity/index.md">Entities</a> <b>/</b> EnumEntity<hr> </embed>


Description of the `EnumEntity </BumbleDocGen/Parser/Entity/EnumEntity.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    final class EnumEntity extends BumbleDocGen\Parser\Entity\ClassEntity implements BumbleDocGen\Render\Context\DocumentTransformableEntityInterface


..

        Enum class entity







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetpropertyentitycollection">getPropertyEntityCollection</a> </li>
                <li><a href="#mgetcasesnames">getCasesNames</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetpropertyentitycollection:

* `# <mgetpropertyentitycollection_>`_  ``getPropertyEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/EnumEntity.php#L12>`_
.. code-block:: php

        public function getPropertyEntityCollection(): BumbleDocGen\Parser\Entity\PropertyEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntityCollection </BumbleDocGen/Parser/Entity/PropertyEntityCollection\.php>`_

________

.. _mgetcasesnames:

* `# <mgetcasesnames_>`_  ``getCasesNames``   **|** `source code </BumbleDocGen/Parser/Entity/EnumEntity.php#L21>`_
.. code-block:: php

        public function getCasesNames(): array;




**Parameters:** not specified


**Return value:** array

________


