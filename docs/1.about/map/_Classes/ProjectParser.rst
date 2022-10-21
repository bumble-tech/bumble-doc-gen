.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> ProjectParser</embed>


Description of the `ProjectParser </BumbleDocGen/Parser/ProjectParser.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser;

    final class ProjectParser


..

        Class for project parsing using source locators





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
                <li><a href="#mparse">parse</a> </li>
                <li><a href="#mgetreflector">getReflector</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/ProjectParser.php#L34>`_
.. code-block:: php

        public static function create(BumbleDocGen\ConfigurationInterface $configuration): BumbleDocGen\Parser\ProjectParser;




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
            <td>$configuration</td>
            <td><a href='/docs/_Classes/ConfigurationInterface.rst'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\ProjectParser </docs/_Classes/ProjectParser\.rst>`_

________

.. _mparse:

* `# <mparse_>`_  ``parse``   **|** `source code </BumbleDocGen/Parser/ProjectParser.php#L71>`_
.. code-block:: php

        public function parse(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </docs/_Classes/ClassEntityCollection\.rst>`_

________

.. _mgetreflector:

* `# <mgetreflector_>`_  ``getReflector``   **|** `source code </BumbleDocGen/Parser/ProjectParser.php#L81>`_
.. code-block:: php

        public function getReflector(): Roave\BetterReflection\Reflector\Reflector;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflector\\Reflector </vendor/roave/better-reflection/src/Reflector/Reflector\.php#L12>`_

________


