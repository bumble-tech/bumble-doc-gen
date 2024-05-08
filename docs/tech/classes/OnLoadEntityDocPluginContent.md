<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/04_pluginSystem.md">Plugin system</a> <b>/</b> OnLoadEntityDocPluginContent<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L16">OnLoadEntityDocPluginContent</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class OnLoadEntityDocPluginContent extends \Symfony\Contracts\EventDispatcher\Event
```

<blockquote>Called when entity documentation is generated (plugin content loading)</blockquote>

See:
<ul>
    <li>
        <a href="/docs/tech/classes/LoadPluginsContent_2.md">\BumbleDocGen\Core\Renderer\Twig\Function\LoadPluginsContent</a>    </li>
</ul>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#maddblockcontentpluginresult">addBlockContentPluginResult</a>
    </li>
<li>
    <a href="#mgetblockcontent">getBlockContent</a>
    </li>
<li>
    <a href="#mgetblockcontentpluginresults">getBlockContentPluginResults</a>
    </li>
<li>
    <a href="#mgetblocktype">getBlockType</a>
    </li>
<li>
    <a href="#mgetentity">getEntity</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L20">source code</a></li>
</ul>

```php
public function __construct(string $blockContent, \BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity, string $blockType);
```



<b>Parameters:</b>

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
            <td>$blockContent</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$blockType</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddblockcontentpluginresult" href="#maddblockcontentpluginresult">#</a>
 <b>addBlockContentPluginResult</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L42">source code</a></li>
</ul>

```php
public function addBlockContentPluginResult(string $pluginResult): void;
```



<b>Parameters:</b>

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
            <td>$pluginResult</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetblockcontent" href="#mgetblockcontent">#</a>
 <b>getBlockContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L32">source code</a></li>
</ul>

```php
public function getBlockContent(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetblockcontentpluginresults" href="#mgetblockcontentpluginresults">#</a>
 <b>getBlockContentPluginResults</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L47">source code</a></li>
</ul>

```php
public function getBlockContentPluginResults(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetblocktype" href="#mgetblocktype">#</a>
 <b>getBlockType</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L37">source code</a></li>
</ul>

```php
public function getBlockType(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentity" href="#mgetentity">#</a>
 <b>getEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/Event/Renderer/OnLoadEntityDocPluginContent.php#L27">source code</a></li>
</ul>

```php
public function getEntity(): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>


</div>
<hr>
