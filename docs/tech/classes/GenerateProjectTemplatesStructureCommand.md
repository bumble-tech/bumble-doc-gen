<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> GenerateProjectTemplatesStructureCommand<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/Command/GenerateProjectTemplatesStructureCommand.php#L15">GenerateProjectTemplatesStructureCommand</a> class:
</h1>





```php
namespace BumbleDocGen\Console\Command;

final class GenerateProjectTemplatesStructureCommand extends \BumbleDocGen\Console\Command\BaseCommand
```

<blockquote>Base class for all commands.</blockquote>






<h2>Initialization methods:</h2>

<ol>
<li>
    <a href="#m-construct">__construct</a>
    </li>
</ol>

<h2>Methods:</h2>

<ol>
<li>
    <a href="#maddargument">addArgument</a>
    - <i>Adds an argument.</i></li>
<li>
    <a href="#maddoption">addOption</a>
    - <i>Adds an option.</i></li>
<li>
    <a href="#maddusage">addUsage</a>
    - <i>Add a command usage example, it'll be prefixed with the command name.</i></li>
<li>
    <a href="#mcomplete">complete</a>
    - <i>Adds suggestions to $suggestions for the current completion input (e.g. option or argument).</i></li>
<li>
    <a href="#mgetaliases">getAliases</a>
    - <i>Returns the aliases for the command.</i></li>
<li>
    <a href="#mgetapplication">getApplication</a>
    - <i>Gets the application instance for this command.</i></li>
<li>
    <a href="#mgetdefaultdescription">getDefaultDescription</a>
    </li>
<li>
    <a href="#mgetdefaultname">getDefaultName</a>
    </li>
<li>
    <a href="#mgetdefinition">getDefinition</a>
    - <i>Gets the InputDefinition attached to this Command.</i></li>
<li>
    <a href="#mgetdescription">getDescription</a>
    - <i>Returns the description for the command.</i></li>
<li>
    <a href="#mgethelp">getHelp</a>
    - <i>Returns the help for the command.</i></li>
<li>
    <a href="#mgethelper">getHelper</a>
    - <i>Gets a helper instance by name.</i></li>
<li>
    <a href="#mgethelperset">getHelperSet</a>
    - <i>Gets the helper set.</i></li>
<li>
    <a href="#mgetname">getName</a>
    - <i>Returns the command name.</i></li>
<li>
    <a href="#mgetnativedefinition">getNativeDefinition</a>
    - <i>Gets the InputDefinition to be used to create representations of this Command.</i></li>
<li>
    <a href="#mgetprocessedhelp">getProcessedHelp</a>
    - <i>Returns the processed help for the command replacing the %command.name% and %command.full_name% patterns with the real values dynamically.</i></li>
<li>
    <a href="#mgetsynopsis">getSynopsis</a>
    - <i>Returns the synopsis for the command.</i></li>
<li>
    <a href="#mgetusages">getUsages</a>
    - <i>Returns alternative usages of the command.</i></li>
<li>
    <a href="#mignorevalidationerrors">ignoreValidationErrors</a>
    - <i>Ignores validation errors.</i></li>
<li>
    <a href="#misenabled">isEnabled</a>
    - <i>Checks whether the command is enabled or not in the current environment.</i></li>
<li>
    <a href="#mishidden">isHidden</a>
    </li>
<li>
    <a href="#mmergeapplicationdefinition">mergeApplicationDefinition</a>
    - <i>Merges the application definition with the command definition.</i></li>
<li>
    <a href="#mrun">run</a>
    - <i>Runs the command.</i></li>
<li>
    <a href="#msetaliases">setAliases</a>
    - <i>Sets the aliases for the command.</i></li>
<li>
    <a href="#msetapplication">setApplication</a>
    </li>
<li>
    <a href="#msetcode">setCode</a>
    - <i>Sets the code to execute when running this command.</i></li>
<li>
    <a href="#msetdefinition">setDefinition</a>
    - <i>Sets an array of argument and option instances.</i></li>
<li>
    <a href="#msetdescription">setDescription</a>
    - <i>Sets the description for the command.</i></li>
<li>
    <a href="#msethelp">setHelp</a>
    - <i>Sets the help for the command.</i></li>
<li>
    <a href="#msethelperset">setHelperSet</a>
    </li>
<li>
    <a href="#msethidden">setHidden</a>
    </li>
<li>
    <a href="#msetname">setName</a>
    - <i>Sets the name of the command.</i></li>
<li>
    <a href="#msetprocesstitle">setProcessTitle</a>
    - <i>Sets the process title of the command.</i></li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qfailure"
               href="#qfailure">#</a>
            <code>FAILURE</code>                   <b>|</b> <a href="/vendor/symfony/console/Command/Command.php#L37">source
                    code</a> </li>
            <li><a name="qinvalid"
               href="#qinvalid">#</a>
            <code>INVALID</code>                   <b>|</b> <a href="/vendor/symfony/console/Command/Command.php#L38">source
                    code</a> </li>
            <li><a name="qsuccess"
               href="#qsuccess">#</a>
            <code>SUCCESS</code>                   <b>|</b> <a href="/vendor/symfony/console/Command/Command.php#L36">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Console/Command/BaseCommand.php#L21">source code</a></li>
</ul>

```php
// Implemented in BumbleDocGen\Console\Command\BaseCommand

public function __construct(string|null $name = NULL);
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
            <td>$name</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>The name of the command; passing null means it must be set in configure()</td>
        </tr>
        </tbody>
</table>



<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/LogicException.php">\Symfony\Component\Console\Exception\LogicException</a> - When the command name is empty </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddargument" href="#maddargument">#</a>
 <b>addArgument</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L421">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function addArgument(string $name, int|null $mode = NULL, string $description = '', mixed $default = NULL): static;
```

<blockquote>Adds an argument.</blockquote>

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
            <td>$mode</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>The argument mode: InputArgument::REQUIRED or InputArgument::OPTIONAL</td>
        </tr>
            <tr>
            <td>$description</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$default</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>The default value (for InputArgument::OPTIONAL mode only)</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/InvalidArgumentException.php">\Symfony\Component\Console\Exception\InvalidArgumentException</a> - When argument mode is not valid </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddoption" href="#maddoption">#</a>
 <b>addOption</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L442">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function addOption(string $name, string|array|null $shortcut = NULL, int|null $mode = NULL, string $description = '', mixed $default = NULL): static;
```

<blockquote>Adds an option.</blockquote>

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
            <td>$shortcut</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>The shortcuts, can be null, a string of shortcuts delimited by | or an array of shortcuts</td>
        </tr>
            <tr>
            <td>$mode</td>
            <td><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>The option mode: One of the InputOption::VALUE_* constants</td>
        </tr>
            <tr>
            <td>$description</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$default</td>
            <td><a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a></td>
            <td>The default value (must be null for InputOption::VALUE_NONE)</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/InvalidArgumentException.php">\Symfony\Component\Console\Exception\InvalidArgumentException</a> - If option mode is invalid or incompatible </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="maddusage" href="#maddusage">#</a>
 <b>addUsage</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L629">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function addUsage(string $usage): static;
```

<blockquote>Add a command usage example, it&#039;ll be prefixed with the command name.</blockquote>

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
            <td>$usage</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcomplete" href="#mcomplete">#</a>
 <b>complete</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L304">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

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
<li><a name="mgetaliases" href="#mgetaliases">#</a>
 <b>getAliases</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L603">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getAliases(): array;
```

<blockquote>Returns the aliases for the command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetapplication" href="#mgetapplication">#</a>
 <b>getApplication</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L160">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getApplication(): \Symfony\Component\Console\Application|null;
```

<blockquote>Gets the application instance for this command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Application.php'>\Symfony\Component\Console\Application</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdefaultdescription" href="#mgetdefaultdescription">#</a>
 <b>getDefaultDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L78">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public static function getDefaultDescription(): string|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdefaultname" href="#mgetdefaultname">#</a>
 <b>getDefaultName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L65">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public static function getDefaultName(): string|null;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdefinition" href="#mgetdefinition">#</a>
 <b>getDefinition</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L393">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getDefinition(): \Symfony\Component\Console\Input\InputDefinition;
```

<blockquote>Gets the InputDefinition attached to this Command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Input/InputDefinition.php'>\Symfony\Component\Console\Input\InputDefinition</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetdescription" href="#mgetdescription">#</a>
 <b>getDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L531">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getDescription(): string;
```

<blockquote>Returns the description for the command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgethelp" href="#mgethelp">#</a>
 <b>getHelp</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L551">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getHelp(): string;
```

<blockquote>Returns the help for the command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgethelper" href="#mgethelper">#</a>
 <b>getHelper</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L654">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getHelper(string $name): mixed;
```

<blockquote>Gets a helper instance by name.</blockquote>

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


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/LogicException.php">\Symfony\Component\Console\Exception\LogicException</a> - if no HelperSet is defined </li>

<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/InvalidArgumentException.php">\Symfony\Component\Console\Exception\InvalidArgumentException</a> - if the helper is not defined </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgethelperset" href="#mgethelperset">#</a>
 <b>getHelperSet</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L152">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getHelperSet(): \Symfony\Component\Console\Helper\HelperSet|null;
```

<blockquote>Gets the helper set.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Helper/HelperSet.php'>\Symfony\Component\Console\Helper\HelperSet</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetname" href="#mgetname">#</a>
 <b>getName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L491">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getName(): string|null;
```

<blockquote>Returns the command name.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetnativedefinition" href="#mgetnativedefinition">#</a>
 <b>getNativeDefinition</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L406">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getNativeDefinition(): \Symfony\Component\Console\Input\InputDefinition;
```

<blockquote>Gets the InputDefinition to be used to create representations of this Command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/symfony/console/blob/master/Input/InputDefinition.php'>\Symfony\Component\Console\Input\InputDefinition</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetprocessedhelp" href="#mgetprocessedhelp">#</a>
 <b>getProcessedHelp</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L560">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getProcessedHelp(): string;
```

<blockquote>Returns the processed help for the command replacing the %command.name% and
%command.full_name% patterns with the real values dynamically.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetsynopsis" href="#mgetsynopsis">#</a>
 <b>getSynopsis</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L613">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getSynopsis(bool $short = false): string;
```

<blockquote>Returns the synopsis for the command.</blockquote>

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
            <td>$short</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Whether to show the short version of the synopsis (with options folded) or not</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.string.php'>string</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetusages" href="#mgetusages">#</a>
 <b>getUsages</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L643">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function getUsages(): array;
```

<blockquote>Returns alternative usages of the command.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.array.php'>array</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mignorevalidationerrors" href="#mignorevalidationerrors">#</a>
 <b>ignoreValidationErrors</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L127">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function ignoreValidationErrors(): mixed;
```

<blockquote>Ignores validation errors.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misenabled" href="#misenabled">#</a>
 <b>isEnabled</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L173">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function isEnabled(): bool;
```

<blockquote>Checks whether the command is enabled or not in the current environment.</blockquote>

<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mishidden" href="#mishidden">#</a>
 <b>isHidden</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L511">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function isHidden(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mmergeapplicationdefinition" href="#mmergeapplicationdefinition">#</a>
 <b>mergeApplicationDefinition</b>
 <b>:warning:</b> Is internal    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L354">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function mergeApplicationDefinition(bool $mergeArgs = true): mixed;
```

<blockquote>Merges the application definition with the command definition.</blockquote>

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
            <td>$mergeArgs</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Whether to merge or not the Application definition arguments to Command definition arguments</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mrun" href="#mrun">#</a>
 <b>run</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L243">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output): int;
```

<blockquote>Runs the command.</blockquote>

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


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/ExceptionInterface.php">\Symfony\Component\Console\Exception\ExceptionInterface</a> - When input binding fails. Bypass this by calling {@link ignoreValidationErrors()}. </li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="https://github.com/symfony/console/blob/master/Command/setCode().php">\Symfony\Component\Console\Command\setCode()</a>    </li>
    <li>
        <a href="https://github.com/symfony/console/blob/master/Command/execute().php">\Symfony\Component\Console\Command\execute()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetaliases" href="#msetaliases">#</a>
 <b>setAliases</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L586">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setAliases(iterable $aliases): static;
```

<blockquote>Sets the aliases for the command.</blockquote>

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
            <td>$aliases</td>
            <td>iterable</td>
            <td>An array of aliases for the command</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/InvalidArgumentException.php">\Symfony\Component\Console\Exception\InvalidArgumentException</a> - When an alias is invalid </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetapplication" href="#msetapplication">#</a>
 <b>setApplication</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L132">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setApplication(\Symfony\Component\Console\Application|null $application = NULL): mixed;
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
            <td>$application</td>
            <td><a href='https://github.com/symfony/console/blob/master/Application.php'>Symfony\Component\Console\Application</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.mixed.php'>mixed</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetcode" href="#msetcode">#</a>
 <b>setCode</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L322">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setCode(callable $code): static;
```

<blockquote>Sets the code to execute when running this command.</blockquote>

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
            <td>$code</td>
            <td><a href='https://www.php.net/manual/en/language.types.callable.php'>callable</a></td>
            <td>A callable(InputInterface $input, OutputInterface $output)</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/InvalidArgumentException.php">\Symfony\Component\Console\Exception\InvalidArgumentException</a></li>

</ul>


<b>See:</b>
<ul>
    <li>
        <a href="https://github.com/symfony/console/blob/master/Command/execute().php">\Symfony\Component\Console\Command\execute()</a>    </li>
</ul>
</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdefinition" href="#msetdefinition">#</a>
 <b>setDefinition</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L377">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setDefinition(array|\Symfony\Component\Console\Input\InputDefinition $definition): static;
```

<blockquote>Sets an array of argument and option instances.</blockquote>

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
            <td><a href='https://www.php.net/manual/en/language.types.array.php'>array</a> | <a href='https://github.com/symfony/console/blob/master/Input/InputDefinition.php'>Symfony\Component\Console\Input\InputDefinition</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetdescription" href="#msetdescription">#</a>
 <b>setDescription</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L521">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setDescription(string $description): static;
```

<blockquote>Sets the description for the command.</blockquote>

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
            <td>$description</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msethelp" href="#msethelp">#</a>
 <b>setHelp</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L541">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setHelp(string $help): static;
```

<blockquote>Sets the help for the command.</blockquote>

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
            <td>$help</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msethelperset" href="#msethelperset">#</a>
 <b>setHelperSet</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L144">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

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
<li><a name="msethidden" href="#msethidden">#</a>
 <b>setHidden</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L501">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setHidden(bool $hidden = true): static;
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
            <td>$hidden</td>
            <td><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></td>
            <td>Whether or not the command should be hidden from the list of commands</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetname" href="#msetname">#</a>
 <b>setName</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L464">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setName(string $name): static;
```

<blockquote>Sets the name of the command.</blockquote>

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

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


<b>Throws:</b>
<ul>
<li>
    <a href="https://github.com/symfony/console/blob/master/Exception/InvalidArgumentException.php">\Symfony\Component\Console\Exception\InvalidArgumentException</a> - When the name is invalid </li>

</ul>

</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="msetprocesstitle" href="#msetprocesstitle">#</a>
 <b>setProcessTitle</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/vendor/symfony/console/Command/Command.php#L481">source code</a></li>
</ul>

```php
// Implemented in Symfony\Component\Console\Command\Command

public function setProcessTitle(string $title): static;
```

<blockquote>Sets the process title of the command.</blockquote>

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
            <td>$title</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://wiki.php.net/rfc/static_return_type'>static</a>


</div>
<hr>

<!-- {% endraw %} -->