.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> Render</embed>


Description of the `Render </BumbleDocGen/Render/Render.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render;

    final class Render


..

        Generates and processes files from directory TemplatesDir saving them to directory OutputDir


See:

#. `BumbleDocGen\\ConfigurationInterface::getTemplatesDir\(\) </BumbleDocGen/ConfigurationInterface.php#L36>`_ 
#. `BumbleDocGen\\ConfigurationInterface::getOutputDir\(\) </BumbleDocGen/ConfigurationInterface.php#L41>`_ 





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
                <li><a href="#mrun">run</a> - <i>Starting the rendering process</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Render.php#L25>`_
.. code-block:: php

        public function __construct(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection): mixed;




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
            <tr>
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$classEntityCollection</td>
            <td><a href='/docs/_Classes/ClassEntityCollection.rst'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mrun:

* `# <mrun_>`_  ``run``   **|** `source code </BumbleDocGen/Render/Render.php#L64>`_
.. code-block:: php

        public function run(): void;


..

    Starting the rendering process


**Parameters:** not specified


**Return value:** void


**Throws:**

#. `Twig\\Error\\LoaderError </vendor/twig/twig/src/Error/LoaderError.php#L19>`_ 
#. `Twig\\Error\\RuntimeError </vendor/twig/twig/src/Error/RuntimeError.php#L20>`_ 
#. `Twig\\Error\\SyntaxError </vendor/twig/twig/src/Error/SyntaxError.php#L20>`_ 

________


