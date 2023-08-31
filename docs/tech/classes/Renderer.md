<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> Renderer<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Renderer.php#L31">Renderer</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Renderer;

final class Renderer
```

<blockquote>Generates and processes files from directory TemplatesDir saving them to directory OutputDir</blockquote>

See:
<ul>
    <li>
        <a href="/docs/tech/classes/Configuration.md#mgettemplatesdir">\BumbleDocGen\Core\Configuration\Configuration::getTemplatesDir()</a>    </li>
    <li>
        <a href="/docs/tech/classes/Configuration.md#mgetoutputdir">\BumbleDocGen\Core\Configuration\Configuration::getOutputDir()</a>    </li>
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
    <a href="#mrun">run</a>
    - <i>Starting the rendering process</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Renderer.php#L33">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \BumbleDocGen\Core\Plugin\PluginEventDispatcher $pluginEventDispatcher, \BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, \BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment $twig, \BumbleDocGen\Core\Renderer\RendererIteratorFactory $renderIteratorFactory, \BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache, \Symfony\Component\Filesystem\Filesystem $fs, \Psr\Log\LoggerInterface $logger);
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
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rootEntityCollectionsGroup</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$pluginEventDispatcher</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginEventDispatcher.php'>\BumbleDocGen\Core\Plugin\PluginEventDispatcher</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rendererContext</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Context/RendererContext.php'>\BumbleDocGen\Core\Renderer\Context\RendererContext</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$twig</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Twig/MainTwigEnvironment.php'>\BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$renderIteratorFactory</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/RendererIteratorFactory.php'>\BumbleDocGen\Core\Renderer\RendererIteratorFactory</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$sharedCompressedDocumentFileCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/SharedCompressedDocumentFileCache.php'>\BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$fs</td>
            <td><a href='https://github.com/symfony/filesystem/blob/master/Filesystem.php'>Symfony\Component\Filesystem\Filesystem</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='https://github.com/php-fig/log/blob/master/src/LoggerInterface.php'>Psr\Log\LoggerInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mrun" href="#mrun">#</a>
 <b>run</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Renderer.php#L57">source code</a></li>
</ul>

```php
public function run(): void;
```

<blockquote>Starting the rendering process</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/php-fig/cache/blob/master/src/InvalidArgumentException.php">\Psr\Cache\InvalidArgumentException</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/RuntimeError.php">\Twig\Error\RuntimeError</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/LoaderError.php">\Twig\Error\LoaderError</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="https://github.com/twigphp/Twig/blob/master/src/Error/SyntaxError.php">\Twig\Error\SyntaxError</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->