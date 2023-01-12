<embed><a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/4.pluginSystem/index.md">Plugin system</a> <b>/</b> TwigFunctionClassParserPlugin<hr></embed>

Description of the `TwigFunctionClassParserPlugin </SelfDoc/Configuration/Plugin/TwigFunctionClassParser/TwigFunctionClassParserPlugin.php>`_ class:
-----------------------






.. code-block:: php

    namespace SelfDoc\Configuration\Plugin\TwigFunctionClassParser;

    final class TwigFunctionClassParserPlugin implements BumbleDocGen\Plugin\PluginInterface, Symfony\Component\EventDispatcher\EventSubscriberInterface









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetsubscribedevents">getSubscribedEvents</a> - <i>Returns an array of event names this subscriber wants to listen to.</i></li>
                <li><a href="#monloadentitydocplugincontentevent">onLoadEntityDocPluginContentEvent</a> </li>
                <li><a href="#maftercreationclassentitycollection">afterCreationClassEntityCollection</a> </li>
        </ol>



Constants:
-----------------------



.. raw:: html

    <ul>
            <li><a name="qplugin-key" href="#qplugin-key">#</a> <code>PLUGIN_KEY</code>   <b>|</b> <a href="/SelfDoc/Configuration/Plugin/TwigFunctionClassParser/TwigFunctionClassParserPlugin.php#L21">source code</a> </li>
        </ul>







--------------------




Method details:
-----------------------



.. _mgetsubscribedevents:

* `# <mgetsubscribedevents_>`_  ``getSubscribedEvents``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFunctionClassParser/TwigFunctionClassParserPlugin.php#L23>`_
.. code-block:: php

        public static function getSubscribedEvents(): array&lt;string,;


..

    Returns an array of event names this subscriber wants to listen to\.


**Parameters:** not specified


**Return value:** array<string,

________

.. _monloadentitydocplugincontentevent:

* `# <monloadentitydocplugincontentevent_>`_  ``onLoadEntityDocPluginContentEvent``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFunctionClassParser/TwigFunctionClassParserPlugin.php#L31>`_
.. code-block:: php

        public function onLoadEntityDocPluginContentEvent(BumbleDocGen\Plugin\Event\Render\OnLoadEntityDocPluginContent $event): void;




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
            <td><a href='/BumbleDocGen/Plugin/Event/Render/OnLoadEntityDocPluginContent.php'>BumbleDocGen\Plugin\Event\Render\OnLoadEntityDocPluginContent</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _maftercreationclassentitycollection:

* `# <maftercreationclassentitycollection_>`_  ``afterCreationClassEntityCollection``   **|** `source code </SelfDoc/Configuration/Plugin/TwigFunctionClassParser/TwigFunctionClassParserPlugin.php#L51>`_
.. code-block:: php

        public function afterCreationClassEntityCollection(BumbleDocGen\Plugin\Event\Parser\AfterCreationClassEntityCollection $event): void;




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
            <td><a href='/BumbleDocGen/Plugin/Event/Parser/AfterCreationClassEntityCollection.php'>BumbleDocGen\Plugin\Event\Parser\AfterCreationClassEntityCollection</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________


