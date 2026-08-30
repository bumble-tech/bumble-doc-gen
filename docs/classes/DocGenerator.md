<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> DocGenerator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L46">DocGenerator</a> class:
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
    - <i>Generate missing docBlocks with LLM for project class methods that are available for documentation</i></li>
<li>
    <a href="#maddplugin">addPlugin</a>
    </li>
<li>
    <a href="#mgenerate">generate</a>
    - <i>Generates documentation using configuration</i></li>
<li>
    <a href="#mgeneratereadmetemplate">generateReadmeTemplate</a>
    - <i>Creates a `README.md` template filled with basic information using LLM</i></li>
<li>
    <a href="#mgetconfiguration">getConfiguration</a>
    </li>
<li>
    <a href="#mgetconfigurationkey">getConfigurationKey</a>
    </li>
<li>
    <a href="#mgetconfigurationkeys">getConfigurationKeys</a>
    </li>
<li>
    <a href="#mparseandgetrootentitycollectionsgroup">parseAndGetRootEntityCollectionsGroup</a>
    </li>
<li>
    <a href="#mserve">serve</a>
    - <i>Serve documentation</i></li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qlog-file-name"
               href="#qlog-file-name">#</a>
            <code>LOG_FILE_NAME</code>                   <b>|</b> <a href="/src/DocGenerator.php#L49">source
                    code</a> </li>
            <li><a name="qversion"
               href="#qversion">#</a>
            <code>VERSION</code>                   <b>|</b> <a href="/src/DocGenerator.php#L48">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L56">source code</a></li>
</ul>

```php
public function __construct(\Symfony\Component\Console\Style\OutputStyle $io, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\Core\Parser\ProjectParser $parser, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Renderer\Renderer $renderer, \BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler $generationErrorsHandler, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Console\ProgressBar\ProgressBarFactory $progressBarFactory, \DI\Container $diContainer, \BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Monolog\Logger $logger);
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
            <td>$progressBarFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/ProgressBar/ProgressBarFactory.php'>\BumbleDocGen\Console\ProgressBar\ProgressBarFactory</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$diContainer</td>
            <td><a href='https://github.com/PHP-DI/PHP-DI/blob/master/src/Container.php'>\DI\Container</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$sharedCompressedDocumentFileCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/SharedCompressedDocumentFileCache.php'>\BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Logger.php'>\Monolog\Logger</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="madddocblocks" href="#madddocblocks">#</a>
 <b>addDocBlocks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L116">source code</a></li>
</ul>

```php
public function addDocBlocks(\BumbleDocGen\AI\ProviderInterface $aiProvider): void;
```

<blockquote>Generate missing docBlocks with LLM for project class methods that are available for documentation</blockquote>

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
            <td>$aiProvider</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderInterface.php'>\BumbleDocGen\AI\ProviderInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://www.php.net/manual/en/class.jsonexception.php">\JsonException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddplugin" href="#maddplugin">#</a>
 <b>addPlugin</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L85">source code</a></li>
</ul>

```php
public function addPlugin(\BumbleDocGen\Core\Plugin\PluginInterface|string $plugin): void;
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
            <td>$plugin</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginInterface.php'>\BumbleDocGen\Core\Plugin\PluginInterface</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgenerate" href="#mgenerate">#</a>
 <b>generate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L287">source code</a></li>
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
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L200">source code</a></li>
</ul>

```php
public function generateReadmeTemplate(\BumbleDocGen\AI\ProviderInterface $aiProvider): void;
```

<blockquote>Creates a `README.md` template filled with basic information using LLM</blockquote>

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
            <td>$aiProvider</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderInterface.php'>\BumbleDocGen\AI\ProviderInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconfiguration" href="#mgetconfiguration">#</a>
 <b>getConfiguration</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L534">source code</a></li>
</ul>

```php
public function getConfiguration(): \BumbleDocGen\Core\Configuration\Configuration;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconfigurationkey" href="#mgetconfigurationkey">#</a>
 <b>getConfigurationKey</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L431">source code</a></li>
</ul>

```php
public function getConfigurationKey(string $key): void;
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
            <td>$key</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetconfigurationkeys" href="#mgetconfigurationkeys">#</a>
 <b>getConfigurationKeys</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L419">source code</a></li>
</ul>

```php
public function getConfigurationKeys(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mparseandgetrootentitycollectionsgroup" href="#mparseandgetrootentitycollectionsgroup">#</a>
 <b>parseAndGetRootEntityCollectionsGroup</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L100">source code</a></li>
</ul>

```php
public function parseAndGetRootEntityCollectionsGroup(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/DependencyException.php">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/PHP-DI/PHP-DI/blob/master/src/NotFoundException.php">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mserve" href="#mserve">#</a>
 <b>serve</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/DocGenerator.php#L340">source code</a></li>
</ul>

```php
public function serve(callable|null $afterPreparation = null, callable|null $afterDocChanged = null, int $timeout = 1000000): void;
```

<blockquote>Serve documentation</blockquote>

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
            <td>$afterPreparation</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$afterDocChanged</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$timeout</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

</ul>

</div>
<hr>
