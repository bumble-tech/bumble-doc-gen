.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> PluginEventDispatcher</embed>


Description of the `PluginEventDispatcher </BumbleDocGen/Plugin/PluginEventDispatcher.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    class PluginEventDispatcher extends Symfony\Component\EventDispatcher\EventDispatcher implements Symfony\Component\EventDispatcher\EventDispatcherInterface, Symfony\Contracts\EventDispatcher\EventDispatcherInterface, Psr\EventDispatcher\EventDispatcherInterface


..

        The EventDispatcherInterface is the central point of Symfony's event listener system\.





Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#m-construct">__construct</a> </li>
        </ol>












--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Plugin/PluginEventDispatcher.php#L12>`_
.. code-block:: php

        public function __construct(BumbleDocGen\ConfigurationInterface $configuration): mixed;




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


**Return value:** mixed

________


