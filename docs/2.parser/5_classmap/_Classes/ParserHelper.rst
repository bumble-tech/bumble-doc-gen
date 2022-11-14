.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> <a href="/docs/2.parser/5_classmap/index.rst">Parser class map</a> <b>/</b> ParserHelper</embed>


Description of the `ParserHelper </BumbleDocGen/Parser/ParserHelper.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser;

    final class ParserHelper









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetbuiltinclassnames">getBuiltInClassNames</a> </li>
                <li><a href="#misbuiltintype">isBuiltInType</a> </li>
                <li><a href="#misclassloaded">isClassLoaded</a> </li>
                <li><a href="#mgetuseslist">getUsesList</a> </li>
                <li><a href="#mparsefullclassname">parseFullClassName</a> </li>
                <li><a href="#mgetmethodreturnvalue">getMethodReturnValue</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mgetbuiltinclassnames:

* `# <mgetbuiltinclassnames_>`_  ``getBuiltInClassNames``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L32>`_
.. code-block:: php

        public static function getBuiltInClassNames(): array;




**Parameters:** not specified


**Return value:** array

________

.. _misbuiltintype:

* `# <misbuiltintype_>`_  ``isBuiltInType``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L46>`_
.. code-block:: php

        public static function isBuiltInType(string $name): bool;




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
            <td>$name</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________

.. _misclassloaded:

* `# <misclassloaded_>`_  ``isClassLoaded``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L73>`_
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
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
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

* `# <mgetuseslist_>`_  ``getUsesList``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L88>`_
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
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
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

.. _mparsefullclassname:

* `# <mparsefullclassname_>`_  ``parseFullClassName``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L127>`_
.. code-block:: php

        public static function parseFullClassName(string $searchClassName, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, bool $extended = true): string;




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
            <td>$searchClassName</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflectionClass</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$extended</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________

.. _mgetmethodreturnvalue:

* `# <mgetmethodreturnvalue_>`_  ``getMethodReturnValue``   **|** `source code </BumbleDocGen/Parser/ParserHelper.php#L173>`_
.. code-block:: php

        public static function getMethodReturnValue(Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionMethod $reflection): mixed;




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
            <td>$reflection</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionMethod.php'>Roave\BetterReflection\Reflection\ReflectionMethod</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________


