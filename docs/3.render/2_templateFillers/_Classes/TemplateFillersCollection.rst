<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/2_templateFillers/index.md">Template fillers</a> <b>/</b> TemplateFillersCollection<hr></embed>

Description of the `TemplateFillersCollection </BumbleDocGen/Render/TemplateFiller/TemplateFillersCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\TemplateFiller;

    final class TemplateFillersCollection









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#msetfortemplate">setForTemplate</a> - <i>Add a set of fillers for the template</i></li>
                <li><a href="#mgetparametersfortemplate">getParametersForTemplate</a> - <i>Get all parameters for a template, obtained using all its fillers</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _msetfortemplate:

* `# <msetfortemplate_>`_  ``setForTemplate``   **|** `source code </BumbleDocGen/Render/TemplateFiller/TemplateFillersCollection.php#L17>`_
.. code-block:: php

        public function setForTemplate(string $templateName, BumbleDocGen\Render\TemplateFiller\TemplateFillerInterface $templateFillers): BumbleDocGen\Render\TemplateFiller\TemplateFillersCollection;


..

    Add a set of fillers for the template


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
            <td>$templateName</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$templateFillers</td>
            <td><a href='/BumbleDocGen/Render/TemplateFiller/TemplateFillerInterface.php'>BumbleDocGen\Render\TemplateFiller\TemplateFillerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Render\\TemplateFiller\\TemplateFillersCollection </BumbleDocGen/Render/TemplateFiller/TemplateFillersCollection\.php>`_

________

.. _mgetparametersfortemplate:

* `# <mgetparametersfortemplate_>`_  ``getParametersForTemplate``   **|** `source code </BumbleDocGen/Render/TemplateFiller/TemplateFillersCollection.php#L28>`_
.. code-block:: php

        public function getParametersForTemplate(Roave\BetterReflection\Reflector\Reflector $reflector, string $templateName): array;


..

    Get all parameters for a template, obtained using all its fillers


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
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$templateName</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________


