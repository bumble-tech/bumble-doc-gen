<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> BeforeCreatingDocFile<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L13">BeforeCreatingDocFile</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Plugin\Event\Renderer;

final class BeforeCreatingDocFile extends \Symfony\Contracts\EventDispatcher\Event implements \Psr\EventDispatcher\StoppableEventInterface
```

<blockquote>Called before the content of the documentation document is saved to a file</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetcontent">getContent</a>
    </li>
<li>
    <a href="#mgetcontext">getContext</a>
    </li>
<li>
    <a href="#msetcontent">setContent</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L15">source code</a></li>
</ul>

```php
public function __construct(string $content, \BumbleDocGen\Core\Renderer\Context\RendererContext $context);
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
            <td>$content</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$context</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcontent" href="#mgetcontent">#</a>
 <b>getContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L19">source code</a></li>
</ul>

```php
public function getContent(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcontext" href="#mgetcontext">#</a>
 <b>getContext</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L29">source code</a></li>
</ul>

```php
public function getContext(): \BumbleDocGen\Core\Renderer\Context\RendererContext;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcontent" href="#msetcontent">#</a>
 <b>setContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/Event/Renderer/BeforeCreatingDocFile.php#L24">source code</a></li>
</ul>

```php
public function setContent(string $content): void;
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
            <td>$content</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>

<!-- {% endraw %} -->