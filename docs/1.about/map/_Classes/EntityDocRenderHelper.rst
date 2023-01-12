<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.md">About documentation generator</a> <b>/</b> <a href="/docs/1.about/map/index.md">BumbleDocGen class map</a> <b>/</b> EntityDocRenderHelper<hr> </embed>

Description of the `EntityDocRenderHelper </BumbleDocGen/Render/EntityDocRender/EntityDocRenderHelper.php>`_ class:
-----------------------






.. code-block:: php

    namespace BumbleDocGen\Render\EntityDocRender;

    final class EntityDocRenderHelper









Methods:
-----------------------



.. raw:: html

  <ol>
                <li><a href="#mgetentityurldata">getEntityUrlData</a> </li>
        </ol>



Constants:
-----------------------



.. raw:: html

    <ul>
            <li><a name="qclass-entity-short-link-option" href="#qclass-entity-short-link-option">#</a> <code>CLASS_ENTITY_SHORT_LINK_OPTION</code>   <b>|</b> <a href="/BumbleDocGen/Render/EntityDocRender/EntityDocRenderHelper.php#L15">source code</a> </li>
            <li><a name="qclass-entity-full-link-option" href="#qclass-entity-full-link-option">#</a> <code>CLASS_ENTITY_FULL_LINK_OPTION</code>   <b>|</b> <a href="/BumbleDocGen/Render/EntityDocRender/EntityDocRenderHelper.php#L16">source code</a> </li>
            <li><a name="qclass-entity-only-cursor-link-option" href="#qclass-entity-only-cursor-link-option">#</a> <code>CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION</code>   <b>|</b> <a href="/BumbleDocGen/Render/EntityDocRender/EntityDocRenderHelper.php#L17">source code</a> </li>
        </ul>







--------------------




Method details:
-----------------------



.. _mgetentityurldata:

* `# <mgetentityurldata_>`_  ``getEntityUrlData``   **|** `source code </BumbleDocGen/Render/EntityDocRender/EntityDocRenderHelper.php#L19>`_
.. code-block:: php

        public static function getEntityUrlData(string $linkString, BumbleDocGen\Render\Context\Context $context, string|null $defaultEntityClassName = NULL, bool $createDocument = true): array;




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
            <td>$linkString</td>
            <td>string</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='/BumbleDocGen/Render/Context/Context.php'>BumbleDocGen\Render\Context\Context</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$defaultEntityClassName</td>
            <td>string | null</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$createDocument</td>
            <td>bool</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>


**Return value:** array

________


