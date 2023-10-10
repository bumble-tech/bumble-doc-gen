<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> App<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/App.php#L19">App</a> class:
</h1>





```php
namespace BumbleDocGen\Console;

class App extends \Symfony\Component\Console\Application implements \Symfony\Contracts\Service\ResetInterface
```

<blockquote>An Application is the container for a collection of commands.</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#madd">add</a>
    - <i>Adds a command object.</i></li>
<li>
    <a href="#maddcommands">addCommands</a>
    - <i>Adds an array of command objects.</i></li>
<li>
    <a href="#mall">all</a>
    - <i>Gets the commands (registered in the given namespace if provided).</i></li>
<li>
    <a href="#mareexceptionscaught">areExceptionsCaught</a>
    - <i>Gets whether to catch exceptions or not during commands execution.</i></li>
<li>
    <a href="#mcomplete">complete</a>
    - <i>Adds suggestions to $suggestions for the current completion input (e.g. option or argument).</i></li>
<li>
    <a href="#mdorun">doRun</a>
    - <i>Runs the current application.</i></li>
<li>
    <a href="#mextractnamespace">extractNamespace</a>
    - <i>Returns the namespace part of the command name.</i></li>
<li>
    <a href="#mfind">find</a>
    - <i>Finds a command by name or alias.</i></li>
<li>
    <a href="#mfindnamespace">findNamespace</a>
    - <i>Finds a registered namespace by a name or an abbreviation.</i></li>
<li>
    <a href="#mget">get</a>
    - <i>Returns a registered command by name or alias.</i></li>
<li>
    <a href="#mgetabbreviations">getAbbreviations</a>
    - <i>Returns an array of possible abbreviations given a set of names.</i></li>
<li>
    <a href="#mgetdefinition">getDefinition</a>
    - <i>Gets the InputDefinition related to this Application.</i></li>
<li>
    <a href="#mgethelp">getHelp</a>
    - <i>Gets the help message.</i></li>
<li>
    <a href="#mgethelperset">getHelperSet</a>
    - <i>Get the helper set associated with the command.</i></li>
<li>
    <a href="#mgetlongversion">getLongVersion</a>
    - <i>Returns the long version of the application.</i></li>
<li>
    <a href="#mgetname">getName</a>
    - <i>Gets the name of the application.</i></li>
<li>
    <a href="#mgetnamespaces">getNamespaces</a>
    - <i>Returns an array of all unique namespaces used by currently registered commands.</i></li>
<li>
    <a href="#mgetsignalregistry">getSignalRegistry</a>
    </li>
<li>
    <a href="#mgetversion">getVersion</a>
    - <i>Gets the application version.</i></li>
<li>
    <a href="#mhas">has</a>
    - <i>Returns true if the command exists, false otherwise.</i></li>
<li>
    <a href="#misautoexitenabled">isAutoExitEnabled</a>
    - <i>Gets whether to automatically exit after a command execution or not.</i></li>
<li>
    <a href="#missinglecommand">isSingleCommand</a>
    </li>
<li>
    <a href="#mregister">register</a>
    - <i>Registers a new command.</i></li>
<li>
    <a href="#mrenderthrowable">renderThrowable</a>
    </li>
<li>
    <a href="#mreset">reset</a>
    </li>
<li>
    <a href="#mrun">run</a>
    - <i>Runs the current application.</i></li>
<li>
    <a href="#msetautoexit">setAutoExit</a>
    - <i>Sets whether to automatically exit after a command execution or not.</i></li>
<li>
    <a href="#msetcatchexceptions">setCatchExceptions</a>
    - <i>Sets whether to catch exceptions or not during commands execution.</i></li>
<li>
    <a href="#msetcommandloader">setCommandLoader</a>
    </li>
<li>
    <a href="#msetdefaultcommand">setDefaultCommand</a>
    - <i>Sets the default Command name.</i></li>
<li>
    <a href="#msetdefinition">setDefinition</a>
    </li>
<li>
    <a href="#msetdispatcher">setDispatcher</a>
    </li>
<li>
    <a href="#msethelperset">setHelperSet</a>
    </li>
<li>
    <a href="#msetname">setName</a>
    - <i>Sets the application name.</i></li>
<li>
    <a href="#msetsignalstodispatchevent">setSignalsToDispatchEvent</a>
    </li>
<li>
    <a href="#msetversion">setVersion</a>
    - <i>Sets the application version.</i></li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/App.php#L21">source code</a></li>
</ul>

```php
public function __construct();
```



<b>Parameters:</b> not specified



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="madd" href="#madd">#</a>
 <b>add</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L501">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function add(\Symfony\Component\Console\Command\Command $command): \Symfony\Component\Console\Command\Command|null;
```

<blockquote>Adds a command object.</blockquote>

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
            <td>$command</td>
            <td><a href='https://github.com/symfony/console/blob/master/Command/Command.php'>Symfony\Component\Console\Command\Command</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Command/Command.php'>\Symfony\Component\Console\Command\Command</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddcommands" href="#maddcommands">#</a>
 <b>addCommands</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L486">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function addCommands(array $commands): mixed;
```

<blockquote>Adds an array of command objects.</blockquote>

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
            <td>$commands</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>An array of commands</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mall" href="#mall">#</a>
 <b>all</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L755">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function all(string|null $namespace = NULL): \Symfony\Component\Console\Command\Command[];
```

<blockquote>Gets the commands (registered in the given namespace if provided).</blockquote>

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
            <td>$namespace</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>\Symfony\Component\Console\Command\Command[]</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mareexceptionscaught" href="#mareexceptionscaught">#</a>
 <b>areExceptionsCaught</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L392">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function areExceptionsCaught(): bool;
```

<blockquote>Gets whether to catch exceptions or not during commands execution.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcomplete" href="#mcomplete">#</a>
 <b>complete</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L352">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function complete(\Symfony\Component\Console\Completion\CompletionInput $input, \Symfony\Component\Console\Completion\CompletionSuggestions $suggestions): void;
```

<blockquote>Adds suggestions to $suggestions for the current completion input (e.g. option or argument).</blockquote>

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
            <td>$input</td>
            <td><a href='https://github.com/symfony/console/blob/master/Completion/CompletionInput.php'>Symfony\Component\Console\Completion\CompletionInput</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$suggestions</td>
            <td><a href='https://github.com/symfony/console/blob/master/Completion/CompletionSuggestions.php'>Symfony\Component\Console\Completion\CompletionSuggestions</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdorun" href="#mdorun">#</a>
 <b>doRun</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L220">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function doRun(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output): int;
```

<blockquote>Runs the current application.</blockquote>

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
            <td>$input</td>
            <td><a href='https://github.com/symfony/console/blob/master/Input/InputInterface.php'>Symfony\Component\Console\Input\InputInterface</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$output</td>
            <td><a href='https://github.com/symfony/console/blob/master/Output/OutputInterface.php'>Symfony\Component\Console\Output\OutputInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mextractnamespace" href="#mextractnamespace">#</a>
 <b>extractNamespace</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L1116">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function extractNamespace(string $name, int|null $limit = NULL): string;
```

<blockquote>Returns the namespace part of the command name.</blockquote>

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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$limit</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfind" href="#mfind">#</a>
 <b>find</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L645">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function find(string $name): \Symfony\Component\Console\Command\Command;
```

<blockquote>Finds a command by name or alias.</blockquote>

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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Command/Command.php'>\Symfony\Component\Console\Command\Command</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/CommandNotFoundException.php">\Symfony\Component\Console\Exception\CommandNotFoundException</a> - When command name is incorrect or ambiguous </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mfindnamespace" href="#mfindnamespace">#</a>
 <b>findNamespace</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L605">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function findNamespace(string $namespace): string;
```

<blockquote>Finds a registered namespace by a name or an abbreviation.</blockquote>

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
            <td>$namespace</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/NamespaceNotFoundException.php">\Symfony\Component\Console\Exception\NamespaceNotFoundException</a> - When namespace is incorrect or ambiguous </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mget" href="#mget">#</a>
 <b>get</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L538">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function get(string $name): \Symfony\Component\Console\Command\Command;
```

<blockquote>Returns a registered command by name or alias.</blockquote>

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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Command/Command.php'>\Symfony\Component\Console\Command\Command</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/CommandNotFoundException.php">\Symfony\Component\Console\Exception\CommandNotFoundException</a> - When given command name does not exist </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetabbreviations" href="#mgetabbreviations">#</a>
 <b>getAbbreviations</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L797">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public static function getAbbreviations(array $names): array;
```

<blockquote>Returns an array of possible abbreviations given a set of names.</blockquote>

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
            <td>$names</td>
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdefinition" href="#mgetdefinition">#</a>
 <b>getDefinition</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L335">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getDefinition(): \Symfony\Component\Console\Input\InputDefinition;
```

<blockquote>Gets the InputDefinition related to this Application.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Input/InputDefinition.php'>\Symfony\Component\Console\Input\InputDefinition</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgethelp" href="#mgethelp">#</a>
 <b>getHelp</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L384">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getHelp(): string;
```

<blockquote>Gets the help message.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgethelperset" href="#mgethelperset">#</a>
 <b>getHelperSet</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L322">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getHelperSet(): \Symfony\Component\Console\Helper\HelperSet;
```

<blockquote>Get the helper set associated with the command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Helper/HelperSet.php'>\Symfony\Component\Console\Helper\HelperSet</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetlongversion" href="#mgetlongversion">#</a>
 <b>getLongVersion</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L458">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getLongVersion(): string;
```

<blockquote>Returns the long version of the application.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L424">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getName(): string;
```

<blockquote>Gets the name of the application.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetnamespaces" href="#mgetnamespaces">#</a>
 <b>getNamespaces</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L582">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getNamespaces(): array;
```

<blockquote>Returns an array of all unique namespaces used by currently registered commands.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsignalregistry" href="#mgetsignalregistry">#</a>
 <b>getSignalRegistry</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L116">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getSignalRegistry(): \Symfony\Component\Console\SignalRegistry\SignalRegistry;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/SignalRegistry/SignalRegistry.php'>\Symfony\Component\Console\SignalRegistry\SignalRegistry</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetversion" href="#mgetversion">#</a>
 <b>getVersion</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L440">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function getVersion(): string;
```

<blockquote>Gets the application version.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mhas" href="#mhas">#</a>
 <b>has</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L568">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function has(string $name): bool;
```

<blockquote>Returns true if the command exists, false otherwise.</blockquote>

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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misautoexitenabled" href="#misautoexitenabled">#</a>
 <b>isAutoExitEnabled</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L408">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function isAutoExitEnabled(): bool;
```

<blockquote>Gets whether to automatically exit after a command execution or not.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="missinglecommand" href="#missinglecommand">#</a>
 <b>isSingleCommand</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L1193">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function isSingleCommand(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mregister" href="#mregister">#</a>
 <b>register</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L474">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function register(string $name): \Symfony\Component\Console\Command\Command;
```

<blockquote>Registers a new command.</blockquote>

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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Command/Command.php'>\Symfony\Component\Console\Command\Command</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mrenderthrowable" href="#mrenderthrowable">#</a>
 <b>renderThrowable</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L810">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function renderThrowable(\Throwable $e, \Symfony\Component\Console\Output\OutputInterface $output): void;
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
            <td>$e</td>
            <td><a href='https://www.php.net/manual/en/class.throwable.php'>Throwable</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$output</td>
            <td><a href='https://github.com/symfony/console/blob/master/Output/OutputInterface.php'>Symfony\Component\Console\Output\OutputInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mreset" href="#mreset">#</a>
 <b>reset</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L310">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function reset(): mixed;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mrun" href="#mrun">#</a>
 <b>run</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L137">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function run(\Symfony\Component\Console\Input\InputInterface|null $input = NULL, \Symfony\Component\Console\Output\OutputInterface|null $output = NULL): int;
```

<blockquote>Runs the current application.</blockquote>

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
            <td>$input</td>
            <td><a href='https://github.com/symfony/console/blob/master/Input/InputInterface.php'>Symfony\Component\Console\Input\InputInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$output</td>
            <td><a href='https://github.com/symfony/console/blob/master/Output/OutputInterface.php'>Symfony\Component\Console\Output\OutputInterface</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.integer.php'>int</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://www.php.net/manual/en/class.exception.php">\Exception</a> - When running fails. Bypass this when {@link setCatchExceptions()}. </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetautoexit" href="#msetautoexit">#</a>
 <b>setAutoExit</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L416">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setAutoExit(bool $boolean): mixed;
```

<blockquote>Sets whether to automatically exit after a command execution or not.</blockquote>

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
            <td>$boolean</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcatchexceptions" href="#msetcatchexceptions">#</a>
 <b>setCatchExceptions</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L400">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setCatchExceptions(bool $boolean): mixed;
```

<blockquote>Sets whether to catch exceptions or not during commands execution.</blockquote>

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
            <td>$boolean</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcommandloader" href="#msetcommandloader">#</a>
 <b>setCommandLoader</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L111">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setCommandLoader(\Symfony\Component\Console\CommandLoader\CommandLoaderInterface $commandLoader): mixed;
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
            <td>$commandLoader</td>
            <td><a href='https://github.com/symfony/console/blob/master/CommandLoader/CommandLoaderInterface.php'>Symfony\Component\Console\CommandLoader\CommandLoaderInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdefaultcommand" href="#msetdefaultcommand">#</a>
 <b>setDefaultCommand</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L1176">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setDefaultCommand(string $commandName, bool $isSingleCommand = false): static;
```

<blockquote>Sets the default Command name.</blockquote>

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
            <td>$commandName</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$isSingleCommand</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdefinition" href="#msetdefinition">#</a>
 <b>setDefinition</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L327">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setDefinition(\Symfony\Component\Console\Input\InputDefinition $definition): mixed;
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
            <td>$definition</td>
            <td><a href='https://github.com/symfony/console/blob/master/Input/InputDefinition.php'>Symfony\Component\Console\Input\InputDefinition</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdispatcher" href="#msetdispatcher">#</a>
 <b>setDispatcher</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L106">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setDispatcher(\Symfony\Contracts\EventDispatcher\EventDispatcherInterface $dispatcher): mixed;
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
            <td>$dispatcher</td>
            <td>\Symfony\Contracts\EventDispatcher\EventDispatcherInterface</td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msethelperset" href="#msethelperset">#</a>
 <b>setHelperSet</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L314">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setHelperSet(\Symfony\Component\Console\Helper\HelperSet $helperSet): mixed;
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
            <td>$helperSet</td>
            <td><a href='https://github.com/symfony/console/blob/master/Helper/HelperSet.php'>Symfony\Component\Console\Helper\HelperSet</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetname" href="#msetname">#</a>
 <b>setName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L432">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setName(string $name): mixed;
```

<blockquote>Sets the application name.</blockquote>

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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetsignalstodispatchevent" href="#msetsignalstodispatchevent">#</a>
 <b>setSignalsToDispatchEvent</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L125">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setSignalsToDispatchEvent(int ...$signalsToDispatchEvent): mixed;
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
            <td>$signalsToDispatchEvent <i>(variadic)</i></td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetversion" href="#msetversion">#</a>
 <b>setVersion</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Application.php#L448">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Application

public function setVersion(string $version): mixed;
```

<blockquote>Sets the application version.</blockquote>

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
            <td>$version</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>

<!-- {% endraw %} -->