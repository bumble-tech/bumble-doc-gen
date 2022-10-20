.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/1_parsingProcess/index.rst">Parsing process</a> <b>/</b> ClassEntityCollectionPluginInterface</embed>


Description of the `ClassEntityCollectionPluginInterface </BumbleDocGen/Plugin/ClassEntityCollectionPluginInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    interface ClassEntityCollectionPluginInterface extends BumbleDocGen\Plugin\PluginInterface


..

        Plugin for working with ClassEntityCollection







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#maftercreationclassentitycollection">afterCreationClassEntityCollection</a> - <i>The method is called after the ClassEntityCollection has been created using the reflector</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _maftercreationclassentitycollection:

* `# <maftercreationclassentitycollection_>`_  ``afterCreationClassEntityCollection``   **|** `source code </BumbleDocGen/Plugin/ClassEntityCollectionPluginInterface.php#L19>`_
.. code-block:: php

        public function afterCreationClassEntityCollection(BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection): void;


..

    The method is called after the ClassEntityCollection has been created using the reflector


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
            <td>$classEntityCollection</td>
            <td><a href='/docs/_Classes/ClassEntityCollection.rst'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void


**See:**

#. `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection::createByReflector\(\) </BumbleDocGen/Parser/Entity/ClassEntityCollection.php#L23>`_ 

________


