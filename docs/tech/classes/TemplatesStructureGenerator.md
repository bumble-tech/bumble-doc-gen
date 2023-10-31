<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> TemplatesStructureGenerator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/TemplatesStructureGenerator.php#L15">TemplatesStructureGenerator</a> class:
</h1>





```php
namespace BumbleDocGen\TemplateGenerator\ChatGpt;

final class TemplatesStructureGenerator
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
    <a href="#mgeneratestructurebyentitycollection">generateStructureByEntityCollection</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qmodel-gpt-4"
               href="#qmodel-gpt-4">#</a>
            <code>MODEL_GPT_4</code>                   <b>|</b> <a href="/src/TemplateGenerator/ChatGpt/TemplatesStructureGenerator.php#L17">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/TemplatesStructureGenerator.php#L19">source code</a></li>
</ul>

```php
public function __construct(\Tectalic\OpenAi\Client $openaiClient, string $model = self::MODEL_GPT_4);
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
            <td>$openaiClient</td>
            <td><a href='https://github.com/tectalichq/public-openai-client-php/blob/master/src/Client.php'>\Tectalic\OpenAi\Client</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$model</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratestructurebyentitycollection" href="#mgeneratestructurebyentitycollection">#</a>
 <b>generateStructureByEntityCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/TemplatesStructureGenerator.php#L28">source code</a></li>
</ul>

```php
public function generateStructureByEntityCollection(\BumbleDocGen\Core\Parser\Entity\RootEntityCollection $rootEntityCollection, string|null $additionalPrompt = null): array;
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
            <td>$rootEntityCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$additionalPrompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/tectalichq/public-openai-client-php/blob/master/src/ClientException.php">\Tectalic\OpenAi\ClientException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->