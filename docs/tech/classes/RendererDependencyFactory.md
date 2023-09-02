<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> RendererDependencyFactory<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php#L10">RendererDependencyFactory</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer\Context\Dependency;

final class RendererDependencyFactory
```








<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcreatedirectorydependency">createDirectoryDependency</a>
    </li>
<li>
    <a href="#mcreatefiledependency">createFileDependency</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php#L12">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\RendererHelper $rendererHelper);
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
            <td>$rendererHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererHelper.php'>\BumbleDocGen\Core\Renderer\RendererHelper</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreatedirectorydependency" href="#mcreatedirectorydependency">#</a>
 <b>createDirectoryDependency</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php#L31">source code</a></li>
</ul>

```php
public function createDirectoryDependency(string $dirPath): \BumbleDocGen\Core\Renderer\Context\Dependency\DirectoryDependency;
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
            <td>$dirPath</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/DirectoryDependency.php'>\BumbleDocGen\Core\Renderer\Context\Dependency\DirectoryDependency</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreatefiledependency" href="#mcreatefiledependency">#</a>
 <b>createFileDependency</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php#L20">source code</a></li>
</ul>

```php
public function createFileDependency(string $filePath, string|null $contentFilterRegex = NULL, int|null $matchIndex = NULL): \BumbleDocGen\Core\Renderer\Context\Dependency\FileDependency;
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
            <td>$filePath</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$contentFilterRegex</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$matchIndex</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/FileDependency.php'>\BumbleDocGen\Core\Renderer\Context\Dependency\FileDependency</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->