.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.rst">Render class map</a> <b>/</b> TemplateFillerInterface</embed>


Description of the `TemplateFillerInterface </BumbleDocGen/Render/TemplateFiller/TemplateFillerInterface.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\TemplateFiller;

    interface TemplateFillerInterface









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgettemplateparameters">getTemplateParameters</a> - <i>Getting template parameters from filler</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgettemplateparameters:

* `# <mgettemplateparameters_>`_  ``getTemplateParameters``   **|** `source code </BumbleDocGen/Render/TemplateFiller/TemplateFillerInterface.php#L18>`_
.. code-block:: php

        public function getTemplateParameters(Roave\BetterReflection\Reflector\Reflector $reflector, string $templateName): array;


..

    Getting template parameters from filler


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
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
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


