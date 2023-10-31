<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> DocGenerator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L41">DocGenerator</a> class:
</h1>





```php
namespace BumbleDocGen;

final class DocGenerator
```

<blockquote>Class for generating documentation.</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#madddocblocks">addDocBlocks</a>
    - <i>Generate missing docBlocks with ChatGPT for project class methods that are available for documentation</i></li>
<li>
    <a href="#mgenerate">generate</a>
    - <i>Generates documentation using configuration</i></li>
<li>
    <a href="#mgeneratereadmetemplate">generateReadmeTemplate</a>
    </li>
<li>
    <a href="#mgeneratetemplatescontent">generateTemplatesContent</a>
    </li>
<li>
    <a href="#minitdocsstructure">initDocsStructure</a>
    - <i>Generate documentation structure with blank templates using AI tools</i></li>
<li>
    <a href="#mparseandgetrootentitycollectionsgroup">parseAndGetRootEntityCollectionsGroup</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qlog-file-name"
               href="#qlog-file-name">#</a>
            <code>LOG_FILE_NAME</code>                   <b>|</b> <a href="/src/DocGenerator.php#L44">source
                    code</a> </li>
            <li><a name="qversion"
               href="#qversion">#</a>
            <code>VERSION</code>                   <b>|</b> <a href="/src/DocGenerator.php#L43">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L46">source code</a></li>
</ul>

```php
public function __construct(\Symfony\Component\Filesystem\Filesystem $fs, \Symfony\Component\Console\Style\OutputStyle $io, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\Core\Parser\ProjectParser $parser, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Renderer\Renderer $renderer, \BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler $generationErrorsHandler, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \Monolog\Logger $logger);
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
            <td>$fs</td>
            <td><a href='https://github.com/symfony/filesystem/blob/master/Filesystem.php'>\Symfony\Component\Filesystem\Filesystem</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$io</td>
            <td><a href='https://github.com/symfony/console/blob/master/Style/OutputStyle.php'>\Symfony\Component\Console\Style\OutputStyle</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php'>\BumbleDocGen\Core\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parser</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/ProjectParser.php'>\BumbleDocGen\Core\Parser\ProjectParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$renderer</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Renderer.php'>\BumbleDocGen\Core\Renderer\Renderer</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$generationErrorsHandler</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php'>\BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rootEntityCollectionsGroup</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td>\Monolog\Logger</td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="madddocblocks" href="#madddocblocks">#</a>
 <b>addDocBlocks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L156">source code</a></li>
</ul>

```php
public function addDocBlocks(string $aiHandler, string $aiApiKey, string $aiModel, string|null $systemPrompt = null): void;
```

<blockquote>Generate missing docBlocks with ChatGPT for project class methods that are available for documentation</blockquote>

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
            <td>$aiHandler</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiApiKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiModel</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$systemPrompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="/docs/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgenerate" href="#mgenerate">#</a>
 <b>generate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L408">source code</a></li>
</ul>

```php
public function generate(): void;
```

<blockquote>Generates documentation using configuration</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratereadmetemplate" href="#mgeneratereadmetemplate">#</a>
 <b>generateReadmeTemplate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L246">source code</a></li>
</ul>

```php
public function generateReadmeTemplate(string $aiHandler, string $aiApiKey, string $aiModel, string|null $systemPrompt = null): void;
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
            <td>$aiHandler</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiApiKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiModel</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$systemPrompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgeneratetemplatescontent" href="#mgeneratetemplatescontent">#</a>
 <b>generateTemplatesContent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L337">source code</a></li>
</ul>

```php
public function generateTemplatesContent(string $aiHandler, string $aiApiKey, string $aiModel, bool $nonInteractive = false, string|null $systemPrompt = null): void;
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
            <td>$aiHandler</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiApiKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiModel</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$nonInteractive</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$systemPrompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.jsonexception.php">\JsonException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="minitdocsstructure" href="#minitdocsstructure">#</a>
 <b>initDocsStructure</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L83">source code</a></li>
</ul>

```php
public function initDocsStructure(string $aiHandler, string $aiApiKey, string $aiModel, bool $nonInteractive = false, string|null $systemPrompt = null): void;
```

<blockquote>Generate documentation structure with blank templates using AI tools</blockquote>

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
            <td>$aiHandler</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiApiKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$aiModel</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$nonInteractive</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$systemPrompt</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mparseandgetrootentitycollectionsgroup" href="#mparseandgetrootentitycollectionsgroup">#</a>
 <b>parseAndGetRootEntityCollectionsGroup</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L72">source code</a></li>
</ul>

```php
public function parseAndGetRootEntityCollectionsGroup(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->