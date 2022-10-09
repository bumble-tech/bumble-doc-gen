.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> GetDocumentedClassUrl</embed>


Description of the `GetDocumentedClassUrl </BumbleDocGen/Render/Twig/Function/GetDocumentedClassUrl.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\Twig\Function;

    final class GetDocumentedClassUrl


..

        Get the URL of a documented class by its name\. If the class is found, next to the file where this method was called,     the `_Classes` directory will be created, in which the documented class file will be created


See:

    #. DocumentedEntityWrapper     #. DocumentedEntityWrappersCollection     #. `BumbleDocGen\\Render\\Context\\Context::\$entityWrappersCollection </BumbleDocGen/Render/Context/Context.php#L18>`_ 

**Examples of using:**

.. code-block:: php

        {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension', 'getFunctions') }}


.. code-block:: php

        {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension') }}






Settings:
=======================

==============  ================
name            value
==============  ================
Function name   **getDocumentedClassUrl**
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



Constants:
-----------------------


* ``DEFAULT_URL``   **|** `source code </BumbleDocGen/Render/Twig/Function/GetDocumentedClassUrl.php#L27>`_ 







--------------------




Method details:
-----------------------



.. _m-construct:

* `# <m-construct_>`_  ``__construct``   **|** `source code </BumbleDocGen/Render/Twig/Function/GetDocumentedClassUrl.php#L29>`_
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
            <td><a href='/docs/_Classes/Context.rst'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** mixed

________

.. _m-invoke:

* `# <m-invoke_>`_  ``__invoke``   **|** `source code </BumbleDocGen/Render/Twig/Function/GetDocumentedClassUrl.php#L42>`_
.. code-block:: php

        public function __invoke(string $className, string $cursor = ''): string;




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
            <td>$className</td>
            <td>string</td>
            <td>The full name of the class for which the URL will be retrieved.
 If the class is not found, the DEFAULT_URL value will be returned.</td>
        </tr>
            <tr>
            <td>$cursor</td>
            <td>string</td>
            <td>Cursor on the page of the documented class (for example, the name of a method or property)</td>
        </tr>
        </tbody>
    </table>


**Return value:** string

________


