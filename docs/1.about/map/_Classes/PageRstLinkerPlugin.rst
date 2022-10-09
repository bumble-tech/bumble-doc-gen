.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> PageRstLinkerPlugin</embed>


Description of the `PageRstLinkerPlugin </BumbleDocGen/Plugin/PageLinker/PageRstLinkerPlugin.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\PageLinker;

    final class PageRstLinkerPlugin extends BumbleDocGen\Plugin\PageLinker\BasePageLinker implements BumbleDocGen\Plugin\TemplatePluginInterface, BumbleDocGen\Plugin\PluginInterface


..

        Adds URLs to empty links in rst format;      Links may contain:      1\) Short class name      2\) Full class name      3\) Relative link to the class file from the root directory of the project      4\) Page title \( title \)      5\) Template key \( BreadcrumbsHelper::getTemplateLinkKey\(\) \)      6\) Relative reference to the class document from the root directory of the documentation


**Examples of using:**

.. code-block:: php

        `Existent page name`_ => `Existent page name </docs/some/page/targetPage.rst>`_


.. code-block:: php

        `Non-existent page name`_ => Non-existent page name









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetlinkregex">getLinkRegEx</a> - <i>Template to search for empty links</i></li>
                <li><a href="#mgetgroupregexnumber">getGroupRegExNumber</a> - <i>Group number of the regular expression that contains the text that will be used to search for the link</i></li>
                <li><a href="#mgetoutputtemplate">getOutputTemplate</a> - <i>Template of the result of processing an empty link by a plugin.</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetlinkregex:

* `# <mgetlinkregex_>`_  ``getLinkRegEx``   **|** `source code </BumbleDocGen/Plugin/PageLinker/PageRstLinkerPlugin.php#L25>`_
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

* `# <mgetgroupregexnumber_>`_  ``getGroupRegExNumber``   **|** `source code </BumbleDocGen/Plugin/PageLinker/PageRstLinkerPlugin.php#L30>`_
.. code-block:: php

        public function getGroupRegExNumber(): int;


..

    Group number of the regular expression that contains the text that will be used to search for the link


**Parameters:** not specified


**Return value:** int

________

.. _mgetoutputtemplate:

* `# <mgetoutputtemplate_>`_  ``getOutputTemplate``   **|** `source code </BumbleDocGen/Plugin/PageLinker/PageRstLinkerPlugin.php#L35>`_
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


