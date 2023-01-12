.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> DocGenerator<hr> </embed>


Description of the `DocGenerator </BumbleDocGen/DocGenerator.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen;

    final class DocGenerator


..

        Class for generating documentation\.







Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgeneratedocumentation">generateDocumentation</a> - <i>Generates documentation using configuration</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgeneratedocumentation:

* `# <mgeneratedocumentation_>`_  ``generateDocumentation``   **|** `source code </BumbleDocGen/DocGenerator.php#L25>`_
.. code-block:: php

        public static function generateDocumentation(BumbleDocGen\ConfigurationInterface $configuration): void;


..

    Generates documentation using configuration


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
            <td><a href='/BumbleDocGen/ConfigurationInterface.php'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void


**Throws:**

#. `\\Twig\\Error\\LoaderError </vendor/twig/twig/src/Error/LoaderError.php>`_ 
#. `\\Twig\\Error\\RuntimeError </vendor/twig/twig/src/Error/RuntimeError.php>`_ 
#. `\\Twig\\Error\\SyntaxError </vendor/twig/twig/src/Error/SyntaxError.php>`_ 

________


