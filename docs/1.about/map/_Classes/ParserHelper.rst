.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> ParserHelper</embed>


Description of the `ParserHelper </BumbleDocGen/Parser/ParserHelper.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser;

    final class ParserHelper









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#misclassloaded">isClassLoaded</a> </li>
                <li><a href="#mgetuseslist">getUsesList</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _misclassloaded:

* `# <misclassloaded_>`_  ``isClassLoaded``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L12>`_
.. code-block:: php

        public static function isClassLoaded(Roave\BetterReflection\Reflector\Reflector $reflector, string $className): bool;




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
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$className</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________

.. _mgetuseslist:

* `# <mgetuseslist_>`_  ``getUsesList``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L23>`_
.. code-block:: php

        public static function getUsesList(Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, bool $extended = true): array;




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
            <td>$reflectionClass</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php#L63'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$extended</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________


