.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> DocGenerator</embed>


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

* `# <mgeneratedocumentation_>`_  ``generateDocumentation``   **|** `source code </BumbleDocGen/DocGenerator.php#L24>`_
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
            <td><a href='/docs/_Classes/ConfigurationInterface.rst'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void


**Throws:**

#. `Twig\\Error\\LoaderError </vendor/twig/twig/src/Error/LoaderError.php#L19>`_ 
#. `Twig\\Error\\RuntimeError </vendor/twig/twig/src/Error/RuntimeError.php#L20>`_ 
#. `Twig\\Error\\SyntaxError </vendor/twig/twig/src/Error/SyntaxError.php#L20>`_ 

________


