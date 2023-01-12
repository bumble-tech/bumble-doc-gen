.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> IsSubclassOf<hr> </embed>


Description of the `IsSubclassOf </BumbleDocGen/Render/Twig/Function/IsSubclassOf.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class IsSubclassOf


..

        Checks if the object has this class as one of its parents or implements it


See:

#. `https://www\.php\.net/manual/en/function\.is-subclass-of\.php <https://www.php.net/manual/en/function.is-subclass-of.php>`_ 




Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **isSubclassOf**
==============  ================





Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#m-invoke">__invoke</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/IsSubclassOf.php#L19>`_
.. code-block:: php

        public function __invoke(mixed $objectOrClass, string $class): bool;




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
            <td>$objectOrClass</td>
            <td>mixed</td>
            <td>A class name or an object instance. No error is generated if the class does not exist.</td>
        </tr>
            <tr>
            <td>$class</td>
            <td>string</td>
            <td>The class name</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________


