<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> MissingDocBlocksGenerator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L18">MissingDocBlocksGenerator</a> class:
</h1>





```php
namespace BumbleDocGen\TemplateGenerator\ChatGpt;

final class MissingDocBlocksGenerator
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
    <a href="#mgeneratedocblocksformethodswithoutit">generateDocBlocksForMethodsWithoutIt</a>
    </li>
<li>
    <a href="#mhasmethodswithoutdocblocks">hasMethodsWithoutDocBlocks</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qmodel-gpt-4"
               href="#qmodel-gpt-4">#</a>
            <code>MODEL_GPT_4</code>                   <b>|</b> <a href="/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L20">source
                    code</a> </li>
            <li><a name="qmode-read-all-code"
               href="#qmode-read-all-code">#</a>
            <code>MODE_READ_ALL_CODE</code>                   <b>|</b> <a href="/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L23">source
                    code</a> </li>
            <li><a name="qmode-read-only-signatures"
               href="#qmode-read-only-signatures">#</a>
            <code>MODE_READ_ONLY_SIGNATURES</code>                   <b>|</b> <a href="/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L22">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L25">source code</a></li>
</ul>

```php
public function __construct(\Tectalic\OpenAi\Client $openaiClient, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, string $model = \BumbleDocGen\TemplateGenerator\ChatGpt\MissingDocBlocksGenerator::MODEL_GPT_4);
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
            <td>\Tectalic\OpenAi\Client</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
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
<li><a name="mgeneratedocblocksformethodswithoutit" href="#mgeneratedocblocksformethodswithoutit">#</a>
 <b>generateDocBlocksForMethodsWithoutIt</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L60">source code</a></li>
</ul>

```php
public function generateDocBlocksForMethodsWithoutIt(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $rootEntity, int $mode = \BumbleDocGen\TemplateGenerator\ChatGpt\MissingDocBlocksGenerator::MODE_READ_ONLY_SIGNATURES): array;
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
            <td>$rootEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$mode</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\Tectalic\OpenAi\ClientException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhasmethodswithoutdocblocks" href="#mhasmethodswithoutdocblocks">#</a>
 <b>hasMethodsWithoutDocBlocks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/TemplateGenerator/ChatGpt/MissingDocBlocksGenerator.php#L38">source code</a></li>
</ul>

```php
public function hasMethodsWithoutDocBlocks(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $rootEntity): bool;
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
            <td>$rootEntity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->