.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> FileIteratorSourceLocator</embed>


Description of the `FileIteratorSourceLocator </BumbleDocGen/Parser/SourceLocator/FileIteratorSourceLocator.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    final class FileIteratorSourceLocator extends BumbleDocGen\Parser\SourceLocator\BaseSourceLocator implements BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface


..

        Loads all files using an iterator





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/FileIteratorSourceLocator.php#L14>`_
.. code-block:: php

        public function __construct(Iterator $fileInfoIterator, Psr\Cache\CacheItemPoolInterface|null $cache = NULL): mixed;




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
            <td>$fileInfoIterator</td>
            <td></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$cache</td>
            <td><a href='/vendor/psr/cache/src/CacheItemPoolInterface.php#L14'>Psr\Cache\CacheItemPoolInterface</a> | null</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________


