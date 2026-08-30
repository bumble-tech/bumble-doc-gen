<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> RendererContext<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L12">RendererContext</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Context;

final class RendererContext
```

<blockquote>Document rendering context</blockquote>







<h2>Methods:</h2>

<ol>
<li>
    <a href="#madddependency">addDependency</a>
    </li>
<li>
    <a href="#mcleardependencies">clearDependencies</a>
    </li>
<li>
    <a href="#mgetcurrentdocumentedentitywrapper">getCurrentDocumentedEntityWrapper</a>
    </li>
<li>
    <a href="#mgetcurrenttemplatefilepatch">getCurrentTemplateFilePatch</a>
    - <i>Getting the path to the template file that is currently being worked on</i></li>
<li>
    <a href="#mgetdependencies">getDependencies</a>
    </li>
<li>
    <a href="#msetcurrentdocumentedentitywrapper">setCurrentDocumentedEntityWrapper</a>
    </li>
<li>
    <a href="#msetcurrenttemplatefilepatch">setCurrentTemplateFilePatch</a>
    - <i>Saving the path to the template file that is currently being worked on in the context</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="madddependency" href="#madddependency">#</a>
 <b>addDependency</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L53">source code</a></li>
</ul>

```php
public function addDependency(\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyInterface $dependency): void;
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
            <td>$dependency</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyInterface.php'>\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcleardependencies" href="#mcleardependencies">#</a>
 <b>clearDependencies</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L48">source code</a></li>
</ul>

```php
public function clearDependencies(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcurrentdocumentedentitywrapper" href="#mgetcurrentdocumentedentitywrapper">#</a>
 <b>getCurrentDocumentedEntityWrapper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L43">source code</a></li>
</ul>

```php
public function getCurrentDocumentedEntityWrapper(): null|\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.null.php'>null</a> | <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcurrenttemplatefilepatch" href="#mgetcurrenttemplatefilepatch">#</a>
 <b>getCurrentTemplateFilePatch</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L32">source code</a></li>
</ul>

```php
public function getCurrentTemplateFilePatch(): string;
```

<blockquote>Getting the path to the template file that is currently being worked on</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdependencies" href="#mgetdependencies">#</a>
 <b>getDependencies</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L58">source code</a></li>
</ul>

```php
public function getDependencies(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcurrentdocumentedentitywrapper" href="#msetcurrentdocumentedentitywrapper">#</a>
 <b>setCurrentDocumentedEntityWrapper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L37">source code</a></li>
</ul>

```php
public function setCurrentDocumentedEntityWrapper(\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper $currentDocumentedEntityWrapper): void;
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
            <td>$currentDocumentedEntityWrapper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrapper.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcurrenttemplatefilepatch" href="#msetcurrenttemplatefilepatch">#</a>
 <b>setCurrentTemplateFilePatch</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php#L24">source code</a></li>
</ul>

```php
public function setCurrentTemplateFilePatch(string $currentTemplateFilePath): void;
```

<blockquote>Saving the path to the template file that is currently being worked on in the context</blockquote>

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
            <td>$currentTemplateFilePath</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
