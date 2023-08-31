<!-- {% raw %} -->
<embed> <a href="/docs/readme.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ProgressBarFactory<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Console/ProgressBarFactory.php#L9">ProgressBarFactory</a> class:
</h1>





```php
namespace BumbleDocGen\Core\Console;

final class ProgressBarFactory
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
    <a href="#mcreatestylizedprogressbar">createStylizedProgressBar</a>
    </li>
</ol>







<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="m-construct" href="#m-construct">#</a>
 <b>__construct</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Console/ProgressBarFactory.php#L11">source code</a></li>
</ul>

```php
public function __construct(\Symfony\Component\Console\Style\OutputStyle $io);
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
            <td>$io</td>
            <td><a href='https://github.com/symfony/console/blob/master/Style/OutputStyle.php'>Symfony\Component\Console\Style\OutputStyle</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>



</div>
<hr>
<div class='method_description-block'>

<ul>
<li><a name="mcreatestylizedprogressbar" href="#mcreatestylizedprogressbar">#</a>
 <b>createStylizedProgressBar</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Console/ProgressBarFactory.php#L15">source code</a></li>
</ul>

```php
public function createStylizedProgressBar(): \BumbleDocGen\Core\Console\StylizedProgressBar;
```



<b>Parameters:</b> not specified

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Core/Console/StylizedProgressBar.php'>\BumbleDocGen\Core\Console\StylizedProgressBar</a>


</div>
<hr>

<!-- {% endraw %} -->