.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.rst">BumbleDocGen class map</a> <b>/</b> ClassEntity</embed>


Description of the `ClassEntity </BumbleDocGen/Parser/Entity/ClassEntity.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Parser\Entity;

    class ClassEntity extends BumbleDocGen\Parser\Entity\BaseEntity implements BumbleDocGen\Render\Context\DocumentTransformableEntityInterface


..

        Class entity





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
                <li><a href="#mloadclassmembers">loadClassMembers</a> </li>
                <li><a href="#mloadplugindata">loadPluginData</a> </li>
                <li><a href="#mgetplugindata">getPluginData</a> </li>
                <li><a href="#mgetdocannotation">getDocAnnotation</a> </li>
                <li><a href="#mgetreflection">getReflection</a> </li>
                <li><a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a> </li>
                <li><a href="#mhasannotationkey">hasAnnotationKey</a> </li>
                <li><a href="#mgetname">getName</a> </li>
                <li><a href="#mgetshortname">getShortName</a> </li>
                <li><a href="#mgetnamespacename">getNamespaceName</a> </li>
                <li><a href="#mgetfilename">getFileName</a> </li>
                <li><a href="#mgetfilepath">getFilePath</a> </li>
                <li><a href="#mgetstartline">getStartLine</a> </li>
                <li><a href="#mgetendline">getEndLine</a> </li>
                <li><a href="#mgetmodifiersstring">getModifiersString</a> </li>
                <li><a href="#mgetextends">getExtends</a> </li>
                <li><a href="#mgetinterfaces">getInterfaces</a> </li>
                <li><a href="#mgetparentclassnames">getParentClassNames</a> </li>
                <li><a href="#mgetinterfacesstring">getInterfacesString</a> </li>
                <li><a href="#mgettraitsnames">getTraitsNames</a> </li>
                <li><a href="#mhastraits">hasTraits</a> </li>
                <li><a href="#mgetconstantentitycollection">getConstantEntityCollection</a> </li>
                <li><a href="#mgetpropertyentitycollection">getPropertyEntityCollection</a> </li>
                <li><a href="#mgetmethodentitycollection">getMethodEntityCollection</a> </li>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#misenum">isEnum</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L32>`_
.. code-block:: php

        public static function create(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, BumbleDocGen\Parser\AttributeParser $attributeParser, bool $reloadCache = false): BumbleDocGen\Parser\Entity\ClassEntity;




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
            <tr>
            <td>$reflector</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflector/Reflector.php#L12'>Roave\BetterReflection\Reflector\Reflector</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reflectionClass</td>
            <td><a href='/vendor/roave/better-reflection/src/Reflection/ReflectionClass.php#L63'>Roave\BetterReflection\Reflection\ReflectionClass</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/docs/_Classes/AttributeParser.rst'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reloadCache</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </docs/_Classes/ClassEntity\.rst>`_

________

.. _mloadclassmembers:

* `# <mloadclassmembers_>`_  ``loadClassMembers``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L55>`_
.. code-block:: php

        public function loadClassMembers(): void;




**Parameters:** not specified


**Return value:** void

________

.. _mloadplugindata:

* `# <mloadplugindata_>`_  ``loadPluginData``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L114>`_
.. code-block:: php

        public function loadPluginData(string $pluginKey, array $data): void;




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
            <td>$pluginKey</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$data</td>
            <td>array</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** void

________

.. _mgetplugindata:

* `# <mgetplugindata_>`_  ``getPluginData``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L119>`_
.. code-block:: php

        public function getPluginData(string $pluginKey): array|null;




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
            <td>$pluginKey</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array | null

________

.. _mgetdocannotation:

* `# <mgetdocannotation_>`_  ``getDocAnnotation``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L124>`_
.. code-block:: php

        public function getDocAnnotation(): object|null;




**Parameters:** not specified


**Return value:** object | null

________

.. _mgetreflection:

* `# <mgetreflection_>`_  ``getReflection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L137>`_
.. code-block:: php

        public function getReflection(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php#L63>`_

________

.. _mgetimplementingreflectionclass:

* `# <mgetimplementingreflectionclass_>`_  ``getImplementingReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L142>`_
.. code-block:: php

        public function getImplementingReflectionClass(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php#L63>`_

________

.. _mhasannotationkey:

* `# <mhasannotationkey_>`_  ``hasAnnotationKey``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L147>`_
.. code-block:: php

        public function hasAnnotationKey(string $annotationKey): bool;




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
            <td>$annotationKey</td>
            <td>string</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** bool

________

.. _mgetname:

* `# <mgetname_>`_  ``getName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L152>`_
.. code-block:: php

        public function getName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetshortname:

* `# <mgetshortname_>`_  ``getShortName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L157>`_
.. code-block:: php

        public function getShortName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetnamespacename:

* `# <mgetnamespacename_>`_  ``getNamespaceName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L162>`_
.. code-block:: php

        public function getNamespaceName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L167>`_
.. code-block:: php

        public function getFileName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetfilepath:

* `# <mgetfilepath_>`_  ``getFilePath``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L172>`_
.. code-block:: php

        public function getFilePath(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetstartline:

* `# <mgetstartline_>`_  ``getStartLine``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L178>`_
.. code-block:: php

        public function getStartLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetendline:

* `# <mgetendline_>`_  ``getEndLine``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L183>`_
.. code-block:: php

        public function getEndLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetmodifiersstring:

* `# <mgetmodifiersstring_>`_  ``getModifiersString``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L188>`_
.. code-block:: php

        public function getModifiersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetextends:

* `# <mgetextends_>`_  ``getExtends``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L215>`_
.. code-block:: php

        public function getExtends(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetinterfaces:

* `# <mgetinterfaces_>`_  ``getInterfaces``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L229>`_
.. code-block:: php

        public function getInterfaces(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetparentclassnames:

* `# <mgetparentclassnames_>`_  ``getParentClassNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L242>`_
.. code-block:: php

        public function getParentClassNames(): Generator;




**Parameters:** not specified


**Return value:** 

________

.. _mgetinterfacesstring:

* `# <mgetinterfacesstring_>`_  ``getInterfacesString``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L261>`_
.. code-block:: php

        public function getInterfacesString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgettraitsnames:

* `# <mgettraitsnames_>`_  ``getTraitsNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L266>`_
.. code-block:: php

        public function getTraitsNames(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mhastraits:

* `# <mhastraits_>`_  ``hasTraits``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L285>`_
.. code-block:: php

        public function hasTraits(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mgetconstantentitycollection:

* `# <mgetconstantentitycollection_>`_  ``getConstantEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L290>`_
.. code-block:: php

        public function getConstantEntityCollection(): BumbleDocGen\Parser\Entity\ConstantEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ConstantEntityCollection </docs/_Classes/ConstantEntityCollection\.rst>`_

________

.. _mgetpropertyentitycollection:

* `# <mgetpropertyentitycollection_>`_  ``getPropertyEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L295>`_
.. code-block:: php

        public function getPropertyEntityCollection(): BumbleDocGen\Parser\Entity\PropertyEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntityCollection </docs/_Classes/PropertyEntityCollection\.rst>`_

________

.. _mgetmethodentitycollection:

* `# <mgetmethodentitycollection_>`_  ``getMethodEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L300>`_
.. code-block:: php

        public function getMethodEntityCollection(): BumbleDocGen\Parser\Entity\MethodEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntityCollection </docs/_Classes/MethodEntityCollection\.rst>`_

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L305>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _misenum:

* `# <misenum_>`_  ``isEnum``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L311>`_
.. code-block:: php

        public function isEnum(): bool;




**Parameters:** not specified


**Return value:** bool

________


