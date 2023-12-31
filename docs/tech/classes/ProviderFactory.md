<!-- {% raw %} -->
<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/map.md">Class map</a> <b>/</b> ProviderFactory<hr> </embed>

<h1>
    <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderFactory.php#L10">ProviderFactory</a> class:
</h1>





```php
namespace BumbleDocGen\AI;

final class ProviderFactory
```









<h2>Methods:</h2>

<ol>
<li>
    <a href="#mcreate">create</a>
    </li>
</ol>


<h2>Constants:</h2>
<ul>
            <li><a name="qvalid-providers"
               href="#qvalid-providers">#</a>
            <code>VALID_PROVIDERS</code>                   <b>|</b> <a href="/src/AI/ProviderFactory.php#L12">source
                    code</a> </li>
    </ul>





<h2>Method details:</h2>

<div class='method_description-block'>

<ul>
<li><a name="mcreate" href="#mcreate">#</a>
 <b>create</b>
    <b>|</b> <a href="https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderFactory.php#L14">source code</a></li>
</ul>

```php
public static function create(string $provider, string $apiKey, string|null $model = null): \BumbleDocGen\AI\ProviderInterface;
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
            <td>$provider</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$apiKey</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></td>
            <td>-</td>
        </tr>
            <tr>
            <td>$model</td>
            <td><a href='https://www.php.net/manual/en/language.types.string.php'>string</a> | <a href='https://www.php.net/manual/en/language.types.null.php'>null</a></td>
            <td>-</td>
        </tr>
        </tbody>
</table>

<b>Return value:</b> <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/AI/ProviderInterface.php'>\BumbleDocGen\AI\ProviderInterface</a>


</div>
<hr>

<!-- {% endraw %} -->