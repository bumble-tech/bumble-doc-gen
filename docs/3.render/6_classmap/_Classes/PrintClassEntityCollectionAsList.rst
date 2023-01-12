.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.md">Render</a> <b>/</b> <a href="/docs/3.render/6_classmap/index.md">Render class map</a> <b>/</b> PrintClassEntityCollectionAsList<hr> </embed>


Description of the `PrintClassEntityCollectionAsList </BumbleDocGen/Render/Twig/Function/PrintClassEntityCollectionAsList.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class PrintClassEntityCollectionAsList


..

        Outputting entity data as HTML or rst list




Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **printClassEntityCollectionAsList**
==============  ================



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
                <li><a href="#m-invoke">__invoke</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/PrintClassEntityCollectionAsList.php#L16>`_
.. code-block:: php

        public function __construct(BumbleDocGen\Render\Context\Context $context): mixed;




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
            <td>$context</td>
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/PrintClassEntityCollectionAsList.php#L26>`_
.. code-block:: php

        public function __invoke(BumbleDocGen\Parser\Entity\ClassEntityCollection $classEntityCollection, string $type = 'ul', bool $skipDescription = false): string;




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
            <td>$classEntityCollection</td>
            <td><a href='/BumbleDocGen/Parser/Entity/ClassEntityCollection.php'>BumbleDocGen\Parser\Entity\ClassEntityCollection</a></td>
            <td>Processed entity collection</td>
        </tr>
            <tr>
            <td>$type</td>
            <td>string</td>
            <td>List tag type</td>
        </tr>
            <tr>
            <td>$skipDescription</td>
            <td>bool</td>
            <td>Don't print description</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


