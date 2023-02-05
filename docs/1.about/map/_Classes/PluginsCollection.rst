.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> PluginsCollection<hr> </embed>


Description of the `PluginsCollection </BumbleDocGen/Plugin/PluginsCollection.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Plugin;

    final class PluginsCollection implements IteratorAggregate, Traversable







Initialization methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mcreate">create</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#madd">add</a> </li>
                <li><a href="#mget">get</a> </li>
                <li><a href="#mgetiterator">getIterator</a> - <i>Retrieve an external iterator</i></li>
        </ol>










--------------------




Method details:
-----------------------



.. _madd:

* `# <madd_>`_  ``add``   **|** `source code </BumbleDocGen/Plugin/PluginsCollection.php#L26>`_
.. code-block:: php

        public function add(BumbleDocGen\Plugin\PluginInterface $plugin): BumbleDocGen\Plugin\PluginsCollection;




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
            <td>$plugin</td>
            <td><a href='/BumbleDocGen/Plugin/PluginInterface.php'>BumbleDocGen\Plugin\PluginInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </BumbleDocGen/Plugin/PluginsCollection\.php>`_

________

.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Plugin/PluginsCollection.php#L17>`_
.. code-block:: php

        public static function create(BumbleDocGen\Plugin\PluginInterface $plugins): BumbleDocGen\Plugin\PluginsCollection;




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
            <td>$plugins</td>
            <td><a href='/BumbleDocGen/Plugin/PluginInterface.php'>BumbleDocGen\Plugin\PluginInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Plugin\\PluginsCollection </BumbleDocGen/Plugin/PluginsCollection\.php>`_

________

.. _mget:

* `# <mget_>`_  ``get``   **|** `source code </BumbleDocGen/Plugin/PluginsCollection.php#L32>`_
.. code-block:: php

        public function get(string $key): BumbleDocGen\Plugin\PluginInterface|null;




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
            <td>$key</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Plugin\\PluginInterface </BumbleDocGen/Plugin/PluginInterface\.php>`_ | null

________

.. _mgetiterator:

* `# <mgetiterator_>`_  ``getIterator``   **|** `source code </BumbleDocGen/Plugin/PluginsCollection.php#L12>`_
.. code-block:: php

        public function getIterator(): Generator;


..

    Retrieve an external iterator


**Parameters:** not specified


**Return value:** Generator


**Throws:**

#. **\\Exception** - on failure.


**See:**

#. `https://php\.net/manual/en/iteratoraggregate\.getiterator\.php <https://php.net/manual/en/iteratoraggregate.getiterator.php>`_ 

________


