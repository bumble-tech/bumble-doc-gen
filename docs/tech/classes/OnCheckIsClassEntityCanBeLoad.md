<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> OnCheckIsClassEntityCanBeLoad<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsClassEntityCanBeLoad.php#L10">OnCheckIsClassEntityCanBeLoad</a> class:
</h1>





```php
namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity;

final class OnCheckIsClassEntityCanBeLoad extends \Symfony\Contracts\EventDispatcher\Event
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
    <a href="#mdisableclassloading">disableClassLoading</a>
    </li>
<li>
    <a href="#mgetentity">getEntity</a>
    </li>
<li>
    <a href="#misclasscanbeload">isClassCanBeLoad</a>
    </li>
</ol>



<h2>Properties:</h2>

<ol>
            <li>
            <a href="#pclasscanbeload">classCanBeLoad</a> </li>
    </ol>



<h2>Property details:</h2>


* <a name="pclasscanbeload" href="#pclasscanbeload">#</a>
 <b>$classCanBeLoad</b>
    **|** <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsClassEntityCanBeLoad.php#L12">source code</a>
```php
public bool $classCanBeLoad;

```




<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsClassEntityCanBeLoad.php#L14">source code</a></li>
</ul>

```php
public function __construct(\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity $entity);
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
            <td><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mdisableclassloading" href="#mdisableclassloading">#</a>
 <b>disableClassLoading</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsClassEntityCanBeLoad.php#L23">source code</a></li>
</ul>

```php
public function disableClassLoading(): void;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.void.php'>void</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mgetentity" href="#mgetentity">#</a>
 <b>getEntity</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsClassEntityCanBeLoad.php#L18">source code</a></li>
</ul>

```php
public function getEntity(): \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Parser/Entity/ClassEntity.php'>\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity</a>


</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="misclasscanbeload" href="#misclasscanbeload">#</a>
 <b>isClassCanBeLoad</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/LanguageHandler/Php/Plugin/Event/Entity/OnCheckIsClassEntityCanBeLoad.php#L28">source code</a></li>
</ul>

```php
public function isClassCanBeLoad(): bool;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a>


</div>
<hr>

<!-- {% endraw %} -->