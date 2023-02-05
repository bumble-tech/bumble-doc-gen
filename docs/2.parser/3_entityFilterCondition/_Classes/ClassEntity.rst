.. raw:: html

  <embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.md">Parser</a> <b>/</b> <a href="/docs/2.parser/3_entityFilterCondition/index.md">Entity filter conditions</a> <b>/</b> ClassEntity<hr> </embed>


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
                <li><a href="#mcreatebyreflection">createByReflection</a> </li>
        </ol>

Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetabsolutefilename">getAbsoluteFileName</a> </li>
                <li><a href="#mgetcasesnames">getCasesNames</a> </li>
                <li><a href="#mgetconstantentitycollection">getConstantEntityCollection</a> </li>
                <li><a href="#mgetdescription">getDescription</a> </li>
                <li><a href="#mgetendline">getEndLine</a> </li>
                <li><a href="#mgetextends">getExtends</a> </li>
                <li><a href="#mgetfilecontent">getFileContent</a> </li>
                <li><a href="#mgetfilename">getFileName</a> </li>
                <li><a href="#mgetimplementingreflectionclass">getImplementingReflectionClass</a> </li>
                <li><a href="#mgetinterfaces">getInterfaces</a> </li>
                <li><a href="#mgetinterfacesstring">getInterfacesString</a> </li>
                <li><a href="#mgetmethodentitycollection">getMethodEntityCollection</a> </li>
                <li><a href="#mgetmodifiersstring">getModifiersString</a> </li>
                <li><a href="#mgetname">getName</a> </li>
                <li><a href="#mgetnamespacename">getNamespaceName</a> </li>
                <li><a href="#mgetobjectid">getObjectId</a> </li>
                <li><a href="#mgetparentclassnames">getParentClassNames</a> </li>
                <li><a href="#mgetplugindata">getPluginData</a> </li>
                <li><a href="#mgetpropertyentitycollection">getPropertyEntityCollection</a> </li>
                <li><a href="#mgetreflection">getReflection</a> </li>
                <li><a href="#mgetshortname">getShortName</a> </li>
                <li><a href="#mgetstartline">getStartLine</a> </li>
                <li><a href="#mgettraitsnames">getTraitsNames</a> </li>
                <li><a href="#mhasannotationkey">hasAnnotationKey</a> </li>
                <li><a href="#mhastraits">hasTraits</a> </li>
                <li><a href="#misenum">isEnum</a> </li>
                <li><a href="#mloadplugindata">loadPluginData</a> </li>
        </ol>










--------------------




Method details:
-----------------------



.. _mcreate:

* `# <mcreate_>`_  ``create``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L37>`_
.. code-block:: php

        public static function create(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, string $className, string $relativeFileName, BumbleDocGen\Parser\AttributeParser $attributeParser, bool $reloadCache = false): BumbleDocGen\Parser\Entity\ClassEntity;




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
            <td><a href='/BumbleDocGen/ConfigurationInterface.php'>BumbleDocGen\ConfigurationInterface</a></td>
            <td>-</td>
        </tr>
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
            <tr>
            <td>$relativeFileName</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$attributeParser</td>
            <td><a href='/BumbleDocGen/Parser/AttributeParser.php'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reloadCache</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </BumbleDocGen/Parser/Entity/ClassEntity\.php>`_

________

.. _mcreatebyreflection:

* `# <mcreatebyreflection_>`_  ``createByReflection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L60>`_
.. code-block:: php

        public static function createByReflection(BumbleDocGen\ConfigurationInterface $configuration, Roave\BetterReflection\Reflector\Reflector $reflector, Roave\BetterReflection\Reflection\ReflectionClass $reflectionClass, BumbleDocGen\Parser\AttributeParser $attributeParser, bool $reloadCache = false): BumbleDocGen\Parser\Entity\ClassEntity;




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
            <td><a href='/BumbleDocGen/ConfigurationInterface.php'>BumbleDocGen\ConfigurationInterface</a></td>
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
            <td>$attributeParser</td>
            <td><a href='/BumbleDocGen/Parser/AttributeParser.php'>BumbleDocGen\Parser\AttributeParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$reloadCache</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** `BumbleDocGen\\Parser\\Entity\\ClassEntity </BumbleDocGen/Parser/Entity/ClassEntity\.php>`_

________

.. _mgetabsolutefilename:

* `# <mgetabsolutefilename_>`_  ``getAbsoluteFileName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L335>`_
.. code-block:: php

        public function getAbsoluteFileName(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetcasesnames:

* `# <mgetcasesnames_>`_  ``getCasesNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L324>`_
.. code-block:: php

        public function getCasesNames(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetconstantentitycollection:

* `# <mgetconstantentitycollection_>`_  ``getConstantEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L271>`_
.. code-block:: php

        public function getConstantEntityCollection(): BumbleDocGen\Parser\Entity\ConstantEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\ConstantEntityCollection </BumbleDocGen/Parser/Entity/ConstantEntityCollection\.php>`_

________

.. _mgetdescription:

* `# <mgetdescription_>`_  ``getDescription``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L313>`_
.. code-block:: php

        public function getDescription(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetendline:

* `# <mgetendline_>`_  ``getEndLine``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L174>`_
.. code-block:: php

        public function getEndLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgetextends:

* `# <mgetextends_>`_  ``getExtends``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L207>`_
.. code-block:: php

        public function getExtends(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetfilecontent:

* `# <mgetfilecontent_>`_  ``getFileContent``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L341>`_
.. code-block:: php

        public function getFileContent(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetfilename:

* `# <mgetfilename_>`_  ``getFileName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L164>`_
.. code-block:: php

        public function getFileName(): string|null;




**Parameters:** not specified


**Return value:** string | null

________

.. _mgetimplementingreflectionclass:

* `# <mgetimplementingreflectionclass_>`_  ``getImplementingReflectionClass``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L139>`_
.. code-block:: php

        public function getImplementingReflectionClass(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php>`_

________

.. _mgetinterfaces:

* `# <mgetinterfaces_>`_  ``getInterfaces``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L222>`_
.. code-block:: php

        public function getInterfaces(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetinterfacesstring:

* `# <mgetinterfacesstring_>`_  ``getInterfacesString``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L251>`_
.. code-block:: php

        public function getInterfacesString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetmethodentitycollection:

* `# <mgetmethodentitycollection_>`_  ``getMethodEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L299>`_
.. code-block:: php

        public function getMethodEntityCollection(): BumbleDocGen\Parser\Entity\MethodEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\MethodEntityCollection </BumbleDocGen/Parser/Entity/MethodEntityCollection\.php>`_

________

.. _mgetmodifiersstring:

* `# <mgetmodifiersstring_>`_  ``getModifiersString``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L179>`_
.. code-block:: php

        public function getModifiersString(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetname:

* `# <mgetname_>`_  ``getName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L149>`_
.. code-block:: php

        public function getName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetnamespacename:

* `# <mgetnamespacename_>`_  ``getNamespaceName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L159>`_
.. code-block:: php

        public function getNamespaceName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetobjectid:

* `# <mgetobjectid_>`_  ``getObjectId``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L32>`_
.. code-block:: php

        public function getObjectId(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetparentclassnames:

* `# <mgetparentclassnames_>`_  ``getParentClassNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L236>`_
.. code-block:: php

        public function getParentClassNames(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mgetplugindata:

* `# <mgetplugindata_>`_  ``getPluginData``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L126>`_
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

.. _mgetpropertyentitycollection:

* `# <mgetpropertyentitycollection_>`_  ``getPropertyEntityCollection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L285>`_
.. code-block:: php

        public function getPropertyEntityCollection(): BumbleDocGen\Parser\Entity\PropertyEntityCollection;




**Parameters:** not specified


**Return value:** `BumbleDocGen\\Parser\\Entity\\PropertyEntityCollection </BumbleDocGen/Parser/Entity/PropertyEntityCollection\.php>`_

________

.. _mgetreflection:

* `# <mgetreflection_>`_  ``getReflection``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L131>`_
.. code-block:: php

        public function getReflection(): Roave\BetterReflection\Reflection\ReflectionClass;




**Parameters:** not specified


**Return value:** `Roave\\BetterReflection\\Reflection\\ReflectionClass </vendor/roave/better-reflection/src/Reflection/ReflectionClass\.php>`_

________

.. _mgetshortname:

* `# <mgetshortname_>`_  ``getShortName``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L154>`_
.. code-block:: php

        public function getShortName(): string;




**Parameters:** not specified


**Return value:** string

________

.. _mgetstartline:

* `# <mgetstartline_>`_  ``getStartLine``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L169>`_
.. code-block:: php

        public function getStartLine(): int;




**Parameters:** not specified


**Return value:** int

________

.. _mgettraitsnames:

* `# <mgettraitsnames_>`_  ``getTraitsNames``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L256>`_
.. code-block:: php

        public function getTraitsNames(): array;




**Parameters:** not specified


**Return value:** array

________

.. _mhasannotationkey:

* `# <mhasannotationkey_>`_  ``hasAnnotationKey``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L144>`_
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

.. _mhastraits:

* `# <mhastraits_>`_  ``hasTraits``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L266>`_
.. code-block:: php

        public function hasTraits(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _misenum:

* `# <misenum_>`_  ``isEnum``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L319>`_
.. code-block:: php

        public function isEnum(): bool;




**Parameters:** not specified


**Return value:** bool

________

.. _mloadplugindata:

* `# <mloadplugindata_>`_  ``loadPluginData``   **|** `source code </BumbleDocGen/Parser/Entity/ClassEntity.php#L121>`_
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


