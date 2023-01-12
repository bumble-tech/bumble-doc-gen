.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> CachedSourceLocator<hr> </embed>


Description of the `CachedSourceLocator </BumbleDocGen/Parser/SourceLocator/Internal/CachedSourceLocator.php>`_ class:
-----------------------




**:warning: Is internal** 

.. code-block:: php

    namespace BumbleDocGen\Parser\SourceLocator\Internal;

    final class CachedSourceLocator implements Roave\BetterReflection\SourceLocator\Type\SourceLocator







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
                <li><a href="#mlocateidentifier">locateIdentifier</a> - <i>Locate some source code.</i></li>
                <li><a href="#mlocateidentifiersbytype">locateIdentifiersByType</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Parser/SourceLocator/Internal/CachedSourceLocator.php#L31>`_
.. code-block:: php

        public function __construct(Roave\BetterReflection\SourceLocator\Type\SourceLocator $wrappedSourceLocator, BumbleDocGen\ConfigurationInterface $configuration): mixed;




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
            <td>$wrappedSourceLocator</td>
            <td><a href='/vendor/roave/better-reflection/src/SourceLocator/Type/SourceLocator.php'>Roave\BetterReflection\SourceLocator\Type\SourceLocator</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='/BumbleDocGen/ConfigurationInterface.php'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _mlocateidentifier:

* `# <mlocateidentifier_>`_  ``locateIdentifier``   **|** `source code </BumbleDocGen/Parser/SourceLocator/Internal/CachedSourceLocator.php#L35>`_
.. code-block:: php

        public function locateIdentifier(Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Identifier\Identifier $identifier): Roave\BetterReflection\Reflection\Reflection|null;


..

    Locate some source code\.


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
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$identifier</td>
            <td><a href='/vendor/roave/better-reflection/src/Identifier/Identifier.php'>Roave\BetterReflection\Identifier\Identifier</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `Roave\\BetterReflection\\Reflection\\Reflection </vendor/roave/better-reflection/src/Reflection/Reflection\.php>`_ | null

________

.. _mlocateidentifiersbytype:

* `# <mlocateidentifiersbytype_>`_  ``locateIdentifiersByType``   **|** `source code </BumbleDocGen/Parser/SourceLocator/Internal/CachedSourceLocator.php#L106>`_
.. code-block:: php

        public function locateIdentifiersByType(Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Identifier\IdentifierType $identifierType): array;




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
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$identifierType</td>
            <td><a href='/vendor/roave/better-reflection/src/Identifier/IdentifierType.php'>Roave\BetterReflection\Identifier\IdentifierType</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________


