<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> <a href="/docs/tech/3.renderer/templates.md">How to create documentation templates?</a> <b>/</b> <a href="/docs/tech/3.renderer/templatesVariables.md">Templates variables</a> <b>/</b> InvalidConfigurationParameterException<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Configuration/Exception/InvalidConfigurationParameterException.php#L7">InvalidConfigurationParameterException</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Configuration\Exception;

final class InvalidConfigurationParameterException extends \Exception implements \Throwable, \Stringable
```

<blockquote>Exception is the base class for
all Exceptions.</blockquote>

See:
<ul>
    <li>
        <a href="https://php.net/manual/en/class.exception.php">https://php.net/manual/en/class.exception.php</a>    </li>
</ul>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    - <i>Construct the exception. Note: The message is NOT binary safe.</i></li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#m-tostring">__toString</a>
    - <i>String representation of the exception</i></li>
<li>
    <a href="#m-wakeup">__wakeup</a>
    </li>
<li>
    <a href="#mgetcode">getCode</a>
    - <i>Gets the Exception code</i></li>
<li>
    <a href="#mgetfile">getFile</a>
    - <i>Gets the file in which the exception occurred</i></li>
<li>
    <a href="#mgetline">getLine</a>
    - <i>Gets the line in which the exception occurred</i></li>
<li>
    <a href="#mgetmessage">getMessage</a>
    - <i>Gets the Exception message</i></li>
<li>
    <a href="#mgetprevious">getPrevious</a>
    - <i>Returns previous Exception</i></li>
<li>
    <a href="#mgettrace">getTrace</a>
    - <i>Gets the stack trace</i></li>
<li>
    <a href="#mgettraceasstring">getTraceAsString</a>
    - <i>Gets the stack trace as a string</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
   </li>
</ul>

```php
// Implemented in Exception

public function __construct(string $message = '', int $code, \Throwable|null $previous = NULL);
```

<blockquote>Construct the exception. Note: The message is NOT binary safe.</blockquote>

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
            <td>$message</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>[optional] The Exception message to throw.</td>
        </tr>
            <tr>
            <td>$code</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>[optional] The Exception code.</td>
        </tr>
            <tr>
            <td>$previous</td>
            <td><a href='https://www.php.net/manual/en/class.throwable.php'>Throwable</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>[optional] The previous throwable used for the exception chaining.</td>
        </tr>
        </tbody>
</table>




<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.construct.php">https://php.net/manual/en/exception.construct.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-tostring" href="#m-tostring">#</a>
 <b>__toString</b>
   </li>
</ul>

```php
// Implemented in Exception

public function __toString(): string;
```

<blockquote>String representation of the exception</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.tostring.php">https://php.net/manual/en/exception.tostring.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="m-wakeup" href="#m-wakeup">#</a>
 <b>__wakeup</b>
   </li>
</ul>

```php
// Implemented in Exception

public function __wakeup(): mixed;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetcode" href="#mgetcode">#</a>
 <b>getCode</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getCode(): mixed|int;
```

<blockquote>Gets the Exception code</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a> | <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.getcode.php">https://php.net/manual/en/exception.getcode.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetfile" href="#mgetfile">#</a>
 <b>getFile</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getFile(): string;
```

<blockquote>Gets the file in which the exception occurred</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.getfile.php">https://php.net/manual/en/exception.getfile.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetline" href="#mgetline">#</a>
 <b>getLine</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getLine(): int;
```

<blockquote>Gets the line in which the exception occurred</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.getline.php">https://php.net/manual/en/exception.getline.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetmessage" href="#mgetmessage">#</a>
 <b>getMessage</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getMessage(): string;
```

<blockquote>Gets the Exception message</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.getmessage.php">https://php.net/manual/en/exception.getmessage.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprevious" href="#mgetprevious">#</a>
 <b>getPrevious</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getPrevious(): \Throwable|null;
```

<blockquote>Returns previous Exception</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/class.throwable.php'>\Throwable</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.getprevious.php">https://php.net/manual/en/exception.getprevious.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettrace" href="#mgettrace">#</a>
 <b>getTrace</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getTrace(): array;
```

<blockquote>Gets the stack trace</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.gettrace.php">https://php.net/manual/en/exception.gettrace.php</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgettraceasstring" href="#mgettraceasstring">#</a>
 <b>getTraceAsString</b>
   </li>
</ul>

```php
// Implemented in Exception

public function getTraceAsString(): string;
```

<blockquote>Gets the stack trace as a string</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>



<b>See:</b>
<ul>
    <li>
        <a href="https://php.net/manual/en/exception.gettraceasstring.php">https://php.net/manual/en/exception.gettraceasstring.php</a>    </li>
</ul>
</div>
<hr>

<!-- {% endraw %} -->