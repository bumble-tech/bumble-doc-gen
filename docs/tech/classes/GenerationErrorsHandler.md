<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> GenerationErrorsHandler<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php#L11">GenerationErrorsHandler</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Logger\Handler;

final class GenerationErrorsHandler extends \Monolog\Handler\AbstractProcessingHandler
```

<blockquote>Base Handler class providing the Handler structure, including processors and formatters</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#m-destruct">__destruct</a>
    </li>
<li>
    <a href="#m-sleep">__sleep</a>
    </li>
<li>
    <a href="#maddrecords">addRecords</a>
    </li>
<li>
    <a href="#mclose">close</a>
    - <i>Closes the handler.</i></li>
<li>
    <a href="#mgetbubble">getBubble</a>
    - <i>Gets the bubbling behavior.</i></li>
<li>
    <a href="#mgetformatter">getFormatter</a>
    - <i>{@inheritDoc}</i></li>
<li>
    <a href="#mgetlevel">getLevel</a>
    - <i>Gets minimum logging level at which this handler will be triggered.</i></li>
<li>
    <a href="#mgetrecords">getRecords</a>
    </li>
<li>
    <a href="#mhandle">handle</a>
    - <i>Handles a record.</i></li>
<li>
    <a href="#mhandlebatch">handleBatch</a>
    - <i>Handles a set of records at once.</i></li>
<li>
    <a href="#mishandling">isHandling</a>
    - <i>Checks whether the given record will be handled by this handler.</i></li>
<li>
    <a href="#mpopprocessor">popProcessor</a>
    - <i>{@inheritDoc}</i></li>
<li>
    <a href="#mpushprocessor">pushProcessor</a>
    - <i>{@inheritDoc}</i></li>
<li>
    <a href="#mreset">reset</a>
    </li>
<li>
    <a href="#msetbubble">setBubble</a>
    - <i>Sets the bubbling behavior.</i></li>
<li>
    <a href="#msetformatter">setFormatter</a>
    - <i>{@inheritDoc}</i></li>
<li>
    <a href="#msetlevel">setLevel</a>
    - <i>Sets minimum logging level at which this handler will be triggered.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php#L15">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Renderer\Context\RendererContext $rendererContext, int|string $level = \Monolog\Logger::WARNING, bool $bubble = true);
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
            <td>$level</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>The minimum logging level at which this handler will be triggered</td>
        </tr>
            <tr>
            <td>$bubble</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Whether the messages that are handled can bubble up the stack or not</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-destruct" href="#m-destruct">#</a>
 <b>__destruct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/Handler.php#L38">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\Handler

public function __destruct(): mixed;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-sleep" href="#m-sleep">#</a>
 <b>__sleep</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/Handler.php#L47">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\Handler

public function __sleep(): mixed;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddrecords" href="#maddrecords">#</a>
 <b>addRecords</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php#L54">source code</a></li>
</ul>

```php
public function addRecords(array $records): void;
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
            <td>$records</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mclose" href="#mclose">#</a>
 <b>close</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/Handler.php#L34">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\Handler

public function close(): void;
```

<blockquote>Closes the handler.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetbubble" href="#mgetbubble">#</a>
 <b>getBubble</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php#L101">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractHandler

public function getBubble(): bool;
```

<blockquote>Gets the bubbling behavior.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetformatter" href="#mgetformatter">#</a>
 <b>getFormatter</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/FormattableHandlerTrait.php#L42">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\FormattableHandlerTrait

public function getFormatter(): \Monolog\Formatter\FormatterInterface;
```

<blockquote>{@inheritDoc}</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Formatter/FormatterInterface.php'>\Monolog\Formatter\FormatterInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlevel" href="#mgetlevel">#</a>
 <b>getLevel</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php#L76">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractHandler

public function getLevel(): int;
```

<blockquote>Gets minimum logging level at which this handler will be triggered.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetrecords" href="#mgetrecords">#</a>
 <b>getRecords</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Logger/Handler/GenerationErrorsHandler.php#L49">source code</a></li>
</ul>

```php
public function getRecords(): array;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhandle" href="#mhandle">#</a>
 <b>handle</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractProcessingHandler.php#L35">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractProcessingHandler

public function handle(array $record): bool;
```

<blockquote>Handles a record.</blockquote>

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
            <td>$record</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>The record to handle</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhandlebatch" href="#mhandlebatch">#</a>
 <b>handleBatch</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/Handler.php#L24">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\Handler

public function handleBatch(array $records): void;
```

<blockquote>Handles a set of records at once.</blockquote>

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
            <td>$records</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>The records to handle (an array of record arrays)</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mishandling" href="#mishandling">#</a>
 <b>isHandling</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php#L51">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractHandler

public function isHandling(array $record): bool;
```

<blockquote>Checks whether the given record will be handled by this handler.</blockquote>

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
            <td>$record</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>Partial log record containing only a level key</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mpopprocessor" href="#mpopprocessor">#</a>
 <b>popProcessor</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/ProcessableHandlerTrait.php#L45">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\ProcessableHandlerTrait

public function popProcessor(): callable;
```

<blockquote>{@inheritDoc}</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mpushprocessor" href="#mpushprocessor">#</a>
 <b>pushProcessor</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/ProcessableHandlerTrait.php#L35">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\ProcessableHandlerTrait

public function pushProcessor(callable $callback): \Monolog\Handler\HandlerInterface;
```

<blockquote>{@inheritDoc}</blockquote>

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
            <td>$callback</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Handler/HandlerInterface.php'>\Monolog\Handler\HandlerInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreset" href="#mreset">#</a>
 <b>reset</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractProcessingHandler.php#L63">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractProcessingHandler

public function reset(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetbubble" href="#msetbubble">#</a>
 <b>setBubble</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php#L88">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractHandler

public function setBubble(bool $bubble): self;
```

<blockquote>Sets the bubbling behavior.</blockquote>

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
            <td>$bubble</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>true means that this handler allows bubbling.
 false means that bubbling is not permitted.</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>self</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetformatter" href="#msetformatter">#</a>
 <b>setFormatter</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/FormattableHandlerTrait.php#L32">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\FormattableHandlerTrait

public function setFormatter(\Monolog\Formatter\FormatterInterface $formatter): \Monolog\Handler\HandlerInterface;
```

<blockquote>{@inheritDoc}</blockquote>

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
            <td>$formatter</td>
            <td><a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Formatter/FormatterInterface.php'>\Monolog\Formatter\FormatterInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Handler/HandlerInterface.php'>\Monolog\Handler\HandlerInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetlevel" href="#msetlevel">#</a>
 <b>setLevel</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php#L62">source code</a></li>
</ul>

```php
// Implemented in Monolog\Handler\AbstractHandler

public function setLevel(\Monolog\Handler\Level|\Monolog\Handler\LevelName|\Psr\Log\LogLevel::* $level): self;
```

<blockquote>Sets minimum logging level at which this handler will be triggered.</blockquote>

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
            <td>$level</td>
            <td><a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Handler/Level.php'>\Monolog\Handler\Level</a> | <a href='https://github.com/Seldaek/monolog/blob/master/src/Monolog/Handler/LevelName.php'>\Monolog\Handler\LevelName</a> | <a href='https://github.com/php-fig/log/blob/master/src/LogLevel.php'>\Psr\Log\LogLevel::*</a></td>
            <td>Level or level name</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.object.php'>self</a>


</div>
<hr>

<!-- {% endraw %} -->