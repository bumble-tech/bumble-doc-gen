.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> BasePageLinker</embed>


Description of the `BasePageLinker </BumbleDocGen/Plugin/PageLinker/BasePageLinker.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\PageLinker;

    abstract class BasePageLinker implements BumbleDocGen\Plugin\TemplatePluginInterface, BumbleDocGen\Plugin\PluginInterface









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetlinkregex">getLinkRegEx</a> - <i>Template to search for empty links</i></li>
                <li><a href="#mgetgroupregexnumber">getGroupRegExNumber</a> - <i>Group number of the regular expression that contains the text that will be used to search for the link</i></li>
                <li><a href="#mgetoutputtemplate">getOutputTemplate</a> - <i>Template of the result of processing an empty link by a plugin.</i></li>
                <li><a href="#mhandlerenderedtemplatecontent">handleRenderedTemplateContent</a> - <i>Process rendered template content before writing to file</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetlinkregex:

* `# <mgetlinkregex_>`_  ``getLinkRegEx``   **|** `source code </BumbleDocGen/Plugin/PageLinker/BasePageLinker.php#L22>`_
.. code-block:: php

        public function getLinkRegEx(): string;


..

    Template to search for empty links


**Parameters:** not specified


**Return value:** string


**Examples of using:**

.. code-block:: php

    /(`)([^<>\n]+?)(`_)/m



________

.. _mgetgroupregexnumber:

* `# <mgetgroupregexnumber_>`_  ``getGroupRegExNumber``   **|** `source code </BumbleDocGen/Plugin/PageLinker/BasePageLinker.php#L27>`_
.. code-block:: php

        public function getGroupRegExNumber(): int;


..

    Group number of the regular expression that contains the text that will be used to search for the link


**Parameters:** not specified


**Return value:** int

________

.. _mgetoutputtemplate:

* `# <mgetoutputtemplate_>`_  ``getOutputTemplate``   **|** `source code </BumbleDocGen/Plugin/PageLinker/BasePageLinker.php#L35>`_
.. code-block:: php

        public function getOutputTemplate(): string;


..

    Template of the result of processing an empty link by a plugin\.


**Parameters:** not specified


**Return value:** string


**Examples of using:**

.. code-block:: php

    `%title% <%url%>`_



________

.. _mhandlerenderedtemplatecontent:

* `# <mhandlerenderedtemplatecontent_>`_  ``handleRenderedTemplateContent``   **|** `source code </BumbleDocGen/Plugin/PageLinker/BasePageLinker.php#L140>`_
.. code-block:: php

        public function handleRenderedTemplateContent(string $content, BumbleDocGen\Render\Context\Context $context): string;


..

    Process rendered template content before writing to file


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
            <td>$content</td>
            <td>string</td>
            <td>Rendered template content</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='/docs/_Classes/Context.rst'>BumbleDocGen\Render\Context\Context</a></td>
            <td>Rendering context</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


