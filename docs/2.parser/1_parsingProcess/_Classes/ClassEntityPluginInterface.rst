.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/1_parsingProcess/index.rst">Parsing process</a> <b>/</b> ClassEntityPluginInterface</embed>


Description of the `ClassEntityPluginInterface </BumbleDocGen/Plugin/ClassEntityPluginInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    interface ClassEntityPluginInterface extends BumbleDocGen\Plugin\PluginInterface


..

        Plugin for working with class entities







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mbeforeaddingclassentity">beforeAddingClassEntity</a> - <i>The method is executed before adding an already created entity to the ClassEntityCollection</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mbeforeaddingclassentity:

* `# <mbeforeaddingclassentity_>`_  ``beforeAddingClassEntity``   **|** `source code </BumbleDocGen/Plugin/ClassEntityPluginInterface.php#L22>`_
.. code-block:: php

        public function beforeAddingClassEntity(BumbleDocGen\Parser\Entity\ClassEntity $classEntity, BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection): BumbleDocGen\Parser\Entity\ClassEntity;


..

    The method is executed before adding an already created entity to the ClassEntityCollection


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
            <td>$classEntityCollection</td>
            <td><a href='/docs/_Classes/ClassEntityCollection.rst'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </docs/_Classes/ClassEntity\.rst>`_

________


