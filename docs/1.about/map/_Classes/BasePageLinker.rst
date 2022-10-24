.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> BasePageLinker</embed>


Description of the `BasePageLinker </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin\CorePlugin\PageLinker;

    abstract class BasePageLinker implements BumbleDocGen\Plugin\PluginInterface, Symfony\Component\EventDispatcher\EventSubscriberInterface







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
                <li><a href="#mgetlinkregex">getLinkRegEx</a> - <i>Template to search for empty links</i></li>
                <li><a href="#mgetgroupregexnumber">getGroupRegExNumber</a> - <i>Group number of the regular expression that contains the text that will be used to search for the link</i></li>
                <li><a href="#mgetoutputtemplate">getOutputTemplate</a> - <i>Template of the result of processing an empty link by a plugin.</i></li>
                <li><a href="#mgetsubscribedevents">getSubscribedEvents</a> - <i>Returns an array of event names this subscriber wants to listen to.</i></li>
                <li><a href="#mbeforecreatingdocfile">beforeCreatingDocFile</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetlinkregex:

* `# <mgetlinkregex_>`_  ``getLinkRegEx``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L23>`_
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

* `# <mgetgroupregexnumber_>`_  ``getGroupRegExNumber``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L28>`_
.. code-block:: php

        public function getGroupRegExNumber(): int;


..

    Group number of the regular expression that contains the text that will be used to search for the link


**Parameters:** not specified


**Return value:** int

________

.. _mgetoutputtemplate:

* `# <mgetoutputtemplate_>`_  ``getOutputTemplate``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L36>`_
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

.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L38>`_
.. code-block:: php

        public function __construct(Psr\Log\LoggerInterface $logger): mixed;




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
            <td>$logger</td>
            <td><a href='/vendor/psr/log/src/LoggerInterface.php#L20'>Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mgetsubscribedevents:

* `# <mgetsubscribedevents_>`_  ``getSubscribedEvents``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L42>`_
.. code-block:: php

        public static function getSubscribedEvents(): array&lt;string,;


..

    Returns an array of event names this subscriber wants to listen to\.


**Parameters:** not specified


**Return value:** array<string,

________

.. _mbeforecreatingdocfile:

* `# <mbeforecreatingdocfile_>`_  ``beforeCreatingDocFile``   **|** `source code </BumbleDocGen/Plugin/CorePlugin/PageLinker/BasePageLinker.php#L49>`_
.. code-block:: php

        public function beforeCreatingDocFile(BumbleDocGen\Plugin\Event\Render\BeforeCreatingDocFile $event): void;




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
            <td>$event</td>
            <td><a href='/docs/_Classes/BeforeCreatingDocFile.rst'>BumbleDocGen\Plugin\Event\Render\BeforeCreatingDocFile</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________


