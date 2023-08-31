<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> Configuration<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L28">Configuration</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration;

final class Configuration
```

<blockquote>Configuration project documentation</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#mgetcachedir">getCacheDir</a>
    </li>
<li>
    <a href="#mgetdocgenlibdir">getDocGenLibDir</a>
    </li>
<li>
    <a href="#mgetgitclientpath">getGitClientPath</a>
    </li>
<li>
    <a href="#mgetlanguagehandlerscollection">getLanguageHandlersCollection</a>
    </li>
<li>
    <a href="#mgetoutputdir">getOutputDir</a>
    </li>
<li>
    <a href="#mgetoutputdirbaseurl">getOutputDirBaseUrl</a>
    </li>
<li>
    <a href="#mgetpagelinkprocessor">getPageLinkProcessor</a>
    </li>
<li>
    <a href="#mgetplugins">getPlugins</a>
    </li>
<li>
    <a href="#mgetprojectroot">getProjectRoot</a>
    </li>
<li>
    <a href="#mgetsourcelocators">getSourceLocators</a>
    </li>
<li>
    <a href="#mgettemplatesdir">getTemplatesDir</a>
    </li>
<li>
    <a href="#mgettwigfilters">getTwigFilters</a>
    </li>
<li>
    <a href="#mgettwigfunctions">getTwigFunctions</a>
    </li>
<li>
    <a href="#mgetworkingdir">getWorkingDir</a>
    </li>
<li>
    <a href="#mischeckfileingitbeforecreatingdocenabled">isCheckFileInGitBeforeCreatingDocEnabled</a>
    </li>
<li>
    <a href="#musesharedcache">useSharedCache</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qdefault-settings-file"
               href="#qdefault-settings-file">#</a>
            <code>DEFAULT_SETTINGS_FILE</code>                   <b>|</b> <a href="/BumbleDocGen/Core/Configuration/Configuration.php#L30">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L32">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Configuration\ConfigurationParameterBag $parameterBag, \BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache $localObjectCache, \Psr\Log\LoggerInterface $logger);
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
            <td>$parameterBag</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/ConfigurationParameterBag.php'>\BumbleDocGen\Core\Configuration\ConfigurationParameterBag</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$localObjectCache</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Cache/LocalCache/LocalObjectCache.php'>\BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache</a></td>
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
<li><a name="mgetcachedir" href="#mgetcachedir">#</a>
 <b>getCacheDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L182">source code</a></li>
</ul>

```php
public function getCacheDir(): string|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdocgenlibdir" href="#mgetdocgenlibdir">#</a>
 <b>getDocGenLibDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L325">source code</a></li>
</ul>

```php
public function getDocGenLibDir(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetgitclientpath" href="#mgetgitclientpath">#</a>
 <b>getGitClientPath</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L228">source code</a></li>
</ul>

```php
public function getGitClientPath(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlanguagehandlerscollection" href="#mgetlanguagehandlerscollection">#</a>
 <b>getLanguageHandlersCollection</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L143">source code</a></li>
</ul>

```php
public function getLanguageHandlersCollection(): \BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/LanguageHandlersCollection.php'>\BumbleDocGen\LanguageHandler\LanguageHandlersCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a >\DI\DependencyException</a></li>

<li>
    <a >\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoutputdir" href="#mgetoutputdir">#</a>
 <b>getOutputDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L102">source code</a></li>
</ul>

```php
public function getOutputDir(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetoutputdirbaseurl" href="#mgetoutputdirbaseurl">#</a>
 <b>getOutputDirBaseUrl</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L127">source code</a></li>
</ul>

```php
public function getOutputDirBaseUrl(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetpagelinkprocessor" href="#mgetpagelinkprocessor">#</a>
 <b>getPageLinkProcessor</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L210">source code</a></li>
</ul>

```php
public function getPageLinkProcessor(): \BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/PageLinkProcessor/PageLinkProcessorInterface.php'>\BumbleDocGen\Core\Renderer\PageLinkProcessor\PageLinkProcessorInterface</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetplugins" href="#mgetplugins">#</a>
 <b>getPlugins</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L164">source code</a></li>
</ul>

```php
public function getPlugins(): \BumbleDocGen\Core\Plugin\PluginsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Plugin/PluginsCollection.php'>\BumbleDocGen\Core\Plugin\PluginsCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprojectroot" href="#mgetprojectroot">#</a>
 <b>getProjectRoot</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L43">source code</a></li>
</ul>

```php
public function getProjectRoot(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsourcelocators" href="#mgetsourcelocators">#</a>
 <b>getSourceLocators</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L59">source code</a></li>
</ul>

```php
public function getSourceLocators(): \BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/SourceLocator/SourceLocatorsCollection.php'>\BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettemplatesdir" href="#mgettemplatesdir">#</a>
 <b>getTemplatesDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L77">source code</a></li>
</ul>

```php
public function getTemplatesDir(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettwigfilters" href="#mgettwigfilters">#</a>
 <b>getTwigFilters</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L267">source code</a></li>
</ul>

```php
public function getTwigFilters(): \BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Twig/Filter/CustomFiltersCollection.php'>\BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettwigfunctions" href="#mgettwigfunctions">#</a>
 <b>getTwigFunctions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L244">source code</a></li>
</ul>

```php
public function getTwigFunctions(): \BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Twig/Function/CustomFunctionsCollection.php'>\BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetworkingdir" href="#mgetworkingdir">#</a>
 <b>getWorkingDir</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L316">source code</a></li>
</ul>

```php
public function getWorkingDir(): string;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mischeckfileingitbeforecreatingdocenabled" href="#mischeckfileingitbeforecreatingdocenabled">#</a>
 <b>isCheckFileInGitBeforeCreatingDocEnabled</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L302">source code</a></li>
</ul>

```php
public function isCheckFileInGitBeforeCreatingDocEnabled(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="musesharedcache" href="#musesharedcache">#</a>
 <b>useSharedCache</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php#L288">source code</a></li>
</ul>

```php
public function useSharedCache(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>

<!-- {% endraw %} -->