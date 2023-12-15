<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> OnCheckIsEntityCanBeLoaded<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L10">OnCheckIsEntityCanBeLoaded</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity;

final class OnCheckIsEntityCanBeLoaded extends \Symfony\Contracts\EventDispatcher\Event
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
    <a href="#mdisableentityloading">disableEntityLoading</a>
    </li>
<li>
    <a href="#mgetentity">getEntity</a>
    </li>
<li>
    <a href="#misentitycanbeloaded">isEntityCanBeLoaded</a>
    </li>
</ol>



<h2>Properties:</h2>

<ol>
            <li>
            <a href="#pisentitycanbeloaded">isEntityCanBeLoaded</a> </li>
    </ol>



<h2>Property details:</h2>


* <a name="pisentitycanbeloaded" href="#pisentitycanbeloaded">#</a>
 <b>$isEntityCanBeLoaded</b>
    **|** <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L12">source code</a>
```php
public bool $isEntityCanBeLoaded;

```




<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L14">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\Core\Parser\Entity\RootEntityInterface $entity);
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
            <td>$entity</td>
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdisableentityloading" href="#mdisableentityloading">#</a>
 <b>disableEntityLoading</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L23">source code</a></li>
</ul>

```php
public function disableEntityLoading(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentity" href="#mgetentity">#</a>
 <b>getEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L18">source code</a></li>
</ul>

```php
public function getEntity(): \BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityInterface.php'>\BumbleDocGen\Core\Parser\Entity\RootEntityInterface</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misentitycanbeloaded" href="#misentitycanbeloaded">#</a>
 <b>isEntityCanBeLoaded</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsEntityCanBeLoaded.php#L28">source code</a></li>
</ul>

```php
public function isEntityCanBeLoaded(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->