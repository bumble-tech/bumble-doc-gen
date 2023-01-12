.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/4_sourceLocator/index.md">Source locators</a> <b>/</b> RecursiveDirectoriesSourceLocator<hr> </embed>


Description of the `RecursiveDirectoriesSourceLocator </BumbleDocGen/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator;

    final class RecursiveDirectoriesSourceLocator extends BumbleDocGen\Parser\SourceLocator\BaseSourceLocator implements BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface


..

        Loads all files from the specified directories, which are traversed recursively





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

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/RecursiveDirectoriesSourceLocator.php#L12>`_
.. code-block:: php

        public function __construct(array $directories, array $exclude = [ ]): mixed;




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
            <td>$directories</td>
            <td>array</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$exclude</td>
            <td>array</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________


