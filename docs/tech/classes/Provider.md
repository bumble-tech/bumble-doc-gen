<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> Provider<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L13">Provider</a> class:
</h1>





```php
namespace BumbleDocGen\AI\Providers\HuggingFace;

final class Provider implements \BumbleDocGen\AI\ProviderInterface
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
    <a href="#mgeneratemissingphpdocblocs">generateMissingPHPDocBlocs</a>
    </li>
<li>
    <a href="#mgeneratereadmefilecontent">generateReadMeFileContent</a>
    </li>
<li>
    <a href="#mgeneratetemplatecontent">generateTemplateContent</a>
    </li>
<li>
    <a href="#mgeneratetemplatestructure">generateTemplateStructure</a>
    </li>
<li>
    <a href="#mgetname">getName</a>
    </li>
<li>
    <a href="#msendprompt">sendPrompt</a>
    </li>
</ol>

<h2>Traits:</h2>

<ul>
        <li><b><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Traits/JsonExtractorTrait.php'>\BumbleDocGen\AI\Traits\JsonExtractorTrait</a></b></li>
    </ul>


<h2>Properties:</h2>

<ol>
            <li>
            <a href="#pextractfirstjsonobject">extractFirstJsonObject</a> </li>
    </ol>



<h2>Property details:</h2>


* <a name="pextractfirstjsonobject" href="#pextractfirstjsonobject">#</a>
 <b>$extractFirstJsonObject</b>
    **|** <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L17">source code</a>
```php
public bool $extractFirstJsonObject;

```




<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L24">source code</a></li>
</ul>

```php
public function __construct(mixed $bearerToken, mixed $apiEndpoint);
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
            <td>$bearerToken</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$apiEndpoint</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratemissingphpdocblocs" href="#mgeneratemissingphpdocblocs">#</a>
 <b>generateMissingPHPDocBlocs</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L40">source code</a></li>
</ul>

```php
public function generateMissingPHPDocBlocs(string $prompt): string;
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
            <td>$prompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratereadmefilecontent" href="#mgeneratereadmefilecontent">#</a>
 <b>generateReadMeFileContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L46">source code</a></li>
</ul>

```php
public function generateReadMeFileContent(array $prompts): string;
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
            <td>$prompts</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratetemplatecontent" href="#mgeneratetemplatecontent">#</a>
 <b>generateTemplateContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L52">source code</a></li>
</ul>

```php
public function generateTemplateContent(array $prompts): string;
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
            <td>$prompts</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratetemplatestructure" href="#mgeneratetemplatestructure">#</a>
 <b>generateTemplateStructure</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L58">source code</a></li>
</ul>

```php
public function generateTemplateStructure(array $namespacesList, string|null $additionalPrompt): string;
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
            <td>$namespacesList</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$additionalPrompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L75">source code</a></li>
</ul>

```php
public function getName(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msendprompt" href="#msendprompt">#</a>
 <b>sendPrompt</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/Providers/HuggingFace/Provider.php#L80">source code</a></li>
</ul>

```php
public function sendPrompt(array $prompts, string $system): string;
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
            <td>$prompts</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$system</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>

<!-- {% endraw %} -->