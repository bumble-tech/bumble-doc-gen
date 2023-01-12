.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/4_twigCustomFunctions/index.md">Template functions</a> <b>/</b> Context<hr> </embed>


Description of the `Context </BumbleDocGen/Render/Context/Context.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Context;

    final class Context


..

        Document rendering context





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
                <li><a href="#msetcurrenttemplatefilepatch">setCurrentTemplateFilePatch</a> - <i>Saving the path to the template file that is currently being worked on in the context</i></li>
                <li><a href="#mgetcurrenttemplatefilepatch">getCurrentTemplateFilePatch</a> - <i>Getting the path to the template file that is currently being worked on</i></li>
                <li><a href="#miscurrenttemplaterst">isCurrentTemplateRst</a> </li>
                <li><a href="#miscurrenttemplatemd">isCurrentTemplateMd</a> </li>
                <li><a href="#mgetreflector">getReflector</a> </li>
                <li><a href="#mgetconfiguration">getConfiguration</a> </li>
                <li><a href="#mgetclassentitycollection">getClassEntityCollection</a> </li>
                <li><a href="#mgetentitywrapperscollection">getEntityWrappersCollection</a> </li>
                <li><a href="#mgetbreadcrumbshelper">getBreadcrumbsHelper</a> </li>
                <li><a href="#mgetplugineventdispatcher">getPluginEventDispatcher</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L22>`_
.. code-block:: php

        public function __construct(BumbleDocGen\ConfigurationInterface $configuration, BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection, BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper $breadcrumbsHelper, BumbleDocGen\Plugin\PluginEventDispatcher $pluginEventDispatcher): mixed;




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
            <tr>
            <td>$classEntityCollection</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntityCollection.php'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$breadcrumbsHelper</td>
            <td><a href='/BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper.php'>BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='/BumbleDocGen/Plugin/PluginEventDispatcher.php'>BumbleDocGen\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _msetcurrenttemplatefilepatch:

* `# <msetcurrenttemplatefilepatch_>`_  ``setCurrentTemplateFilePatch``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L36>`_
.. code-block:: php

        public function setCurrentTemplateFilePatch(string $currentTemplateFilePath): void;


..

    Saving the path to the template file that is currently being worked on in the context


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
            <td>$currentTemplateFilePath</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetcurrenttemplatefilepatch:

* `# <mgetcurrenttemplatefilepatch_>`_  ``getCurrentTemplateFilePatch``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L44>`_
.. code-block:: php

        public function getCurrentTemplateFilePatch(): string;


..

    Getting the path to the template file that is currently being worked on


**Parameters:** not specified


**Return value:** string

________

.. _miscurrenttemplaterst:

* `# <miscurrenttemplaterst_>`_  ``isCurrentTemplateRst``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L49>`_
.. code-block:: php

        public function isCurrentTemplateRst(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _miscurrenttemplatemd:

* `# <miscurrenttemplatemd_>`_  ``isCurrentTemplateMd``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L54>`_
.. code-block:: php

        public function isCurrentTemplateMd(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetreflector:

* `# <mgetreflector_>`_  ``getReflector``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L59>`_
.. code-block:: php

        public function getReflector(): Roave\BetterReflection\Reflector\Reflector;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflector\\Reflector </vendor/roave/better-reflection/src/Reflector/Reflector\.php>`_

________

.. _mgetconfiguration:

* `# <mgetconfiguration_>`_  ``getConfiguration``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L64>`_
.. code-block:: php

        public function getConfiguration(): BumbleDocGen\ConfigurationInterface;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\ConfigurationInterface </BumbleDocGen/ConfigurationInterface\.php>`_

________

.. _mgetclassentitycollection:

* `# <mgetclassentitycollection_>`_  ``getClassEntityCollection``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L69>`_
.. code-block:: php

        public function getClassEntityCollection(): BumbleDocGen\Parser\Entity\ClassEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntityCollection </BumbleDocGen/Parser/Entity/ClassEntityCollection\.php>`_

________

.. _mgetentitywrapperscollection:

* `# <mgetentitywrapperscollection_>`_  ``getEntityWrappersCollection``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L74>`_
.. code-block:: php

        public function getEntityWrappersCollection(): BumbleDocGen\Render\Context\DocumentedEntityWrappersCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\Context\\DocumentedEntityWrappersCollection </BumbleDocGen/Render/Context/DocumentedEntityWrappersCollection\.php>`_

________

.. _mgetbreadcrumbshelper:

* `# <mgetbreadcrumbshelper_>`_  ``getBreadcrumbsHelper``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L79>`_
.. code-block:: php

        public function getBreadcrumbsHelper(): BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Render\\Breadcrumbs\\BreadcrumbsHelper </BumbleDocGen/Render/Breadcrumbs/BreadcrumbsHelper\.php>`_

________

.. _mgetplugineventdispatcher:

* `# <mgetplugineventdispatcher_>`_  ``getPluginEventDispatcher``   **|** `source code </BumbleDocGen/Render/Context/Context.php#L84>`_
.. code-block:: php

        public function getPluginEventDispatcher(): BumbleDocGen\Plugin\PluginEventDispatcher;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Plugin\\PluginEventDispatcher </BumbleDocGen/Plugin/PluginEventDispatcher\.php>`_

________


