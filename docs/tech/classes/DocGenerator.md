<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> DocGenerator<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L33">DocGenerator</a> class:
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
    <a href="#maddmissingdocblocks">addMissingDocBlocks</a>
    - <i>Generate missing docBlocks with ChatGPT for project class methods that are available for documentation</i></li>
<li>
    <a href="#mfillinreadmemdtemplate">fillInReadmeMdTemplate</a>
    </li>
<li>
    <a href="#mgenerate">generate</a>
    - <i>Generates documentation using configuration</i></li>
<li>
    <a href="#mgenerateprojecttemplatesstructure">generateProjectTemplatesStructure</a>
    - <i>Generate documentation structure with blank templates using AI tools</i></li>
<li>
    <a href="#mparseandgetrootentitycollectionsgroup">parseAndGetRootEntityCollectionsGroup</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qlog-file-name"
               href="#qlog-file-name">#</a>
            <code>LOG_FILE_NAME</code>                   <b>|</b> <a href="/BumbleDocGen/DocGenerator.php#L36">source
                    code</a> </li>
            <li><a name="qversion"
               href="#qversion">#</a>
            <code>VERSION</code>                   <b>|</b> <a href="/BumbleDocGen/DocGenerator.php#L35">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L38">source code</a></li>
</ul>

```php
public function __construct(\Symfony\Component\Filesystem\Filesystem $fs, \Symfony\Component\Console\Style\OutputStyle $io, \BumbleDocGen\Core\Configuration\Configuration $configuration, \BumbleDocGen\Core\Parser\ProjectParser $parser, \BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper $parserHelper, \BumbleDocGen\Core\Renderer\Renderer $renderer, \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup $rootEntityCollectionsGroup, \Monolog\Logger $logger);
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
            <td><a href='https://github.com/symfony/filesystem/blob/master/Filesystem.php'>Symfony\Component\Filesystem\Filesystem</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$io</td>
            <td><a href='https://github.com/symfony/console/blob/master/Style/OutputStyle.php'>Symfony\Component\Console\Style\OutputStyle</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$configuration</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Configuration/Configuration.php'>\BumbleDocGen\Core\Configuration\Configuration</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parser</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/ProjectParser.php'>\BumbleDocGen\Core\Parser\ProjectParser</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$parserHelper</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/LanguageHandler/Php/Parser/ParserHelper.php'>\BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$renderer</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Renderer/Renderer.php'>\BumbleDocGen\Core\Renderer\Renderer</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$rootEntityCollectionsGroup</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$logger</td>
            <td><a href='#'>\Monolog\Logger</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddmissingdocblocks" href="#maddmissingdocblocks">#</a>
 <b>addMissingDocBlocks</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L134">source code</a></li>
</ul>

```php
public function addMissingDocBlocks(): void;
```

<blockquote>Generate missing docBlocks with ChatGPT for project class methods that are available for documentation</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

<li>
    <a >\Tectalic\OpenAi\ClientException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfillinreadmemdtemplate" href="#mfillinreadmemdtemplate">#</a>
 <b>fillInReadmeMdTemplate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L223">source code</a></li>
</ul>

```php
public function fillInReadmeMdTemplate(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="#">\Tectalic\OpenAi\ClientException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgenerate" href="#mgenerate">#</a>
 <b>generate</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L305">source code</a></li>
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

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgenerateprojecttemplatesstructure" href="#mgenerateprojecttemplatesstructure">#</a>
 <b>generateProjectTemplatesStructure</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L73">source code</a></li>
</ul>

```php
public function generateProjectTemplatesStructure(): void;
```

<blockquote>Generate documentation structure with blank templates using AI tools</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


<b>Throws:</b>
<ul>
<li>
    <a href="#">\Tectalic\OpenAi\ClientException</a></li>

<li>
    <a href="#">\DI\NotFoundException</a></li>

<li>
    <a href="/docs/tech/classes/ReflectionException.md">\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException</a></li>

<li>
    <a href="#">\DI\DependencyException</a></li>

<li>
    <a href="/docs/tech/classes/InvalidConfigurationParameterException.md">\BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException</a></li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mparseandgetrootentitycollectionsgroup" href="#mparseandgetrootentitycollectionsgroup">#</a>
 <b>parseAndGetRootEntityCollectionsGroup</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/DocGenerator.php#L58">source code</a></li>
</ul>

```php
public function parseAndGetRootEntityCollectionsGroup(): \BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Parser/Entity/RootEntityCollectionsGroup.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup</a>


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

<!-- {% endraw %} -->