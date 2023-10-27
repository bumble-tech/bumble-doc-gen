<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> RendererIteratorFactory<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererIteratorFactory.php#L26">RendererIteratorFactory</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer;

final class RendererIteratorFactory
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
    <a href="#mgetdocumentedentitywrapperswithoutdatedcache">getDocumentedEntityWrappersWithOutdatedCache</a>
    </li>
<li>
    <a href="#mgetfilestoremove">getFilesToRemove</a>
    </li>
<li>
    <a href="#mgettemplateswithoutdatedcache">getTemplatesWithOutdatedCache</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererIteratorFactory.php#L32">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection $documentedEntityWrappersCollection, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Configuration\ConfigurationParameterBag $configurationParameterBag, \BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache, \BumbleDocGen\Core\Renderer\RendererHelper $rendererHelper, \BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory $dependencyFactory, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \BumbleDocGen\Console\ProgressBar\ProgressBarFactory $progressBarFactory, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \Symfony\Component\Console\Style\OutputStyle $io, \Monolog\Logger $logger, \BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler $generationErrorsHandler);
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
            <td>$rendererContext</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rootEntityCollectionsGroup</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$documentedEntityWrappersCollection</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/DocumentedEntityWrappersCollection.php'>\BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configurationParameterBag</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/ConfigurationParameterBag.php'>\BumbleDocGen\Core\Configuration\ConfigurationParameterBag</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$sharedCompressedDocumentFileCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/SharedCompressedDocumentFileCache.php'>\BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rendererHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererHelper.php'>\BumbleDocGen\Core\Renderer\RendererHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$dependencyFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/Context/Dependency/RendererDependencyFactory.php'>\BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$progressBarFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/ProgressBar/ProgressBarFactory.php'>\BumbleDocGen\Console\ProgressBar\ProgressBarFactory</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Plugin/PluginEventDispatcher.php'>\BumbleDocGen\Core\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$io</td>
            <td><a href='https://github.com/symfony/console/blob/master/Style/OutputStyle.php'>\Symfony\Component\Console\Style\OutputStyle</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td>\Monolog\Logger</td>
            <td>-</td>
        </tr>
            <tr>
            <td>$generationErrorsHandler</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php'>\BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocumentedentitywrapperswithoutdatedcache" href="#mgetdocumentedentitywrapperswithoutdatedcache">#</a>
 <b>getDocumentedEntityWrappersWithOutdatedCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererIteratorFactory.php#L144">source code</a></li>
</ul>

```php
public function getDocumentedEntityWrappersWithOutdatedCache(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfilestoremove" href="#mgetfilestoremove">#</a>
 <b>getFilesToRemove</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererIteratorFactory.php#L218">source code</a></li>
</ul>

```php
public function getFilesToRemove(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettemplateswithoutdatedcache" href="#mgettemplateswithoutdatedcache">#</a>
 <b>getTemplatesWithOutdatedCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Renderer/RendererIteratorFactory.php#L53">source code</a></li>
</ul>

```php
public function getTemplatesWithOutdatedCache(): \Generator;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.generators.overview.php'>\Generator</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->