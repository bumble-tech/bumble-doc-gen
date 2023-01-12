.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> PageRstLinkerPlugin<hr> </embed>


Description of the `PageRstLinkerPlugin </BumbleDocGen/Plugin/CorePlugin/PageLinker/PageRstLinkerPlugin.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\CorePlugin\PageLinker;

    final class PageRstLinkerPlugin extends BumbleDocGen\Plugin\CorePlugin\PageLinker\BasePageLinker implements BumbleDocGen\Plugin\PluginInterface, Symfony\Component\EventDispatcher\EventSubscriberInterface


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



Constants:
-----------------------



.. raw:: html

    <ul>
            <li><a name="qclass-entity-short-link-option" href="#qclass-entity-short-link-option">#</a> <code>CLASS_ENTITY_SHORT_LINK_OPTION</code>   <b>|</b> <a href="/BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L16">source code</a> </li>
            <li><a name="qclass-entity-full-link-option" href="#qclass-entity-full-link-option">#</a> <code>CLASS_ENTITY_FULL_LINK_OPTION</code>   <b>|</b> <a href="/BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L17">source code</a> </li>
            <li><a name="qclass-entity-only-cursor-link-option" href="#qclass-entity-only-cursor-link-option">#</a> <code>CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION</code>   <b>|</b> <a href="/BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L18">source code</a> </li>
        </ul>







--------------------




Method details:
-----------------------



.. _mgetlinkregex:

* `# <mgetlinkregex_>`_  ``getLinkRegEx``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/PageRstLinkerPlugin.php#L25>`_
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

* `# <mgetgroupregexnumber_>`_  ``getGroupRegExNumber``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/PageRstLinkerPlugin.php#L30>`_
.. code-block:: php

        public function getGroupRegExNumber(): int;


..

    Group number of the regular expression that contains the text that will be used to search for the link


**Parameters:** not specified


**Return value:** int

________

.. _mgetoutputtemplate:

* `# <mgetoutputtemplate_>`_  ``getOutputTemplate``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/PageRstLinkerPlugin.php#L35>`_
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


