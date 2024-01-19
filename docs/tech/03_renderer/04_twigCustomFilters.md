[BumbleDocGen](../../README.md) **/**
[Technical description of the project](../readme.md) **/**
[Renderer](readme.md) **/**
Template filters

---


# Template filters

When generating pages, you can use filters that allow you to modify the content.
Filters available during page generation are defined in <a href='/docs/tech/01_configuration.md'>the configuration</a> ( `twig_filters` parameter )

We use the twig template engine, you can get more information about working with filters here: https://twig.symfony.com/doc/1.x/advanced.html#filters


## How to use a filter in a template:

<pre>&#123;&#123; someText | filter(...parameters) &#125;&#125;</pre>

or

<pre>&#123;&#123; someText | filter &#125;&#125;</pre>


## Configuration example

You can add your custom filters to the configuration like this:

```yaml
twig_filters:
  - class: \BumbleDocGen\Core\Renderer\Twig\Filter\AddIndentFromLeft
  - class: \BumbleDocGen\Core\Renderer\Twig\Filter\FixStrSize
```

It is important to remember that when a template is inherited, custom filters are not overridden and augmented.
This information is detailed on page [Configuration](/docs/tech/01_configuration.md).

## Default template filters

Several filters are already defined in the base configuration.
There are both general filters for all types of entities, and filters that only serve to process entities that belong to a particular PL.

Here is a list of filters available by default:

<table>
    <thead>
    <tr>
        <th rowspan="3">Filter</th>
        <th colspan="3">Parameters</th>
    </tr>
    <tr>
        <th>name</th>
        <th>type</th>
        <th>description</th>
    </tr>
    <tr>
        <th colspan="4"></th>
    </tr>
    </thead>
    <tbody>
                                        <tr>
                                                        <td rowspan="5">
                        <a href="classes/AddIndentFromLeft.md">addIndentFromLeft</a><br>
                        Filter adds indent from left                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$identLength</b>
                    </td>
                    <td>
                        <i>[int](https://www.php.net/manual/en/language.types.integer.php)</i>
                    </td>
                    <td>Indent size</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$skipFirstIdent</b>
                    </td>
                    <td>
                        <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                    </td>
                    <td>Skip indent for first line in text or not</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="5">
                        <a href="classes/FixStrSize.md">fixStrSize</a><br>
                        The filter pads the string with the specified characters on the right to the specified size                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$size</b>
                    </td>
                    <td>
                        <i>[int](https://www.php.net/manual/en/language.types.integer.php)</i>
                    </td>
                    <td>Required string size</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$symbol</b>
                    </td>
                    <td>
                        <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                    </td>
                    <td>The character to be used to complete the string</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="3">
                        <a href="classes/Implode.md">implode</a><br>
                        Join array elements with a string                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$separator</b>
                    </td>
                    <td>
                        <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                    </td>
                    <td>Element separator in result string</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="3">
                        <a href="classes/PregMatch.md">preg_match</a><br>
                        Perform a regular expression match                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$pattern</b>
                    </td>
                    <td>
                        <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                    </td>
                    <td>The pattern to search for, as a string.</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td >
                        <a href="classes/PrepareSourceLink.md">prepareSourceLink</a><br>
                        The filter converts the string into an anchor that can be used in a GitHub document link                    </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td >
                        <a href="classes/Quotemeta.md">quotemeta</a><br>
                        Quote meta characters                    </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td >
                        <a href="classes/RemoveLineBrakes.md">removeLineBrakes</a><br>
                        The filter replaces all line breaks with a space                    </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="11">
                        <a href="classes/StrTypeToUrl.md">strTypeToUrl</a><br>
                        The filter converts the string with the data type into a link to the documented entity, if possible.<br><i><b>:warning: This filter initiates the creation of documents for the displayed entities</b></i><br>                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$text</b>
                    </td>
                    <td>
                        <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                    </td>
                    <td>Processed text</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$rootEntityCollection</b>
                    </td>
                    <td>
                        <i>[\BumbleDocGen\Core\Parser\Entity\RootEntityCollection](https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php)</i>
                    </td>
                    <td></td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$useShortLinkVersion</b>
                    </td>
                    <td>
                        <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                    </td>
                    <td>Shorten or not the link name. When shortening, only the shortName of the entity will be shown</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$createDocument</b>
                    </td>
                    <td>
                        <i>[bool](https://www.php.net/manual/en/language.types.boolean.php)</i>
                    </td>
                    <td>If true, creates an entity document. Otherwise, just gives a reference to the entity code</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$separator</b>
                    </td>
                    <td>
                        <i>[string](https://www.php.net/manual/en/language.types.string.php)</i>
                    </td>
                    <td>Separator between types</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                </tbody>
</table>


---

**Last page committer:** fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br>**Last modified date:**   Sat Jan 20 00:42:48 2024 +0300<br>**Page content update date:** Fri Jan 19 2024<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)