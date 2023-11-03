<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> <a href="/docs/tech/3.renderer/readme.md">Renderer</a> <b>/</b> Template filters<hr> </embed>

<embed> <h1>Template filters</h1> </embed>

When generating pages, you can use filters that allow you to modify the content.
Filters available during page generation are defined in <a href='/docs/tech/1.configuration/readme.md'>the configuration</a> ( `twig_filters` parameter )

We use the twig template engine, you can get more information about working with filters here: https://twig.symfony.com/doc/1.x/advanced.html#filters


<embed> <h2>How to use a filter in a template:</h2> </embed>

<pre>&#123;&#123; someText | filter(...parameters) &#125;&#125;</pre>

or

<pre>&#123;&#123; someText | filter &#125;&#125;</pre>


<embed> <h2>Configuration example</h2> </embed>

You can add your custom filters to the configuration like this:

```yaml
twig_filters:
  - class: \BumbleDocGen\Core\Renderer\Twig\Filter\AddIndentFromLeft
  - class: \BumbleDocGen\Core\Renderer\Twig\Filter\FixStrSize
```

It is important to remember that when a template is inherited, custom filters are not overridden and augmented.
This information is detailed on page <a href="/docs/tech/1.configuration/readme.md">Configuration files</a>.

<embed> <h2>Defautl template filters</h2> </embed>

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
                        <a href="/docs/tech/3.renderer/classes/AddIndentFromLeft.md">addIndentFromLeft</a><br>
                                                Filter adds indent from left
                                            </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$identLength</b>
                    </td>
                    <td>
                        <i><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></i>
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
                        <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
                    </td>
                    <td>Skip indent for first line in text or not</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="5">
                        <a href="/docs/tech/3.renderer/classes/FixStrSize.md">fixStrSize</a><br>
                                                The filter pads the string with the specified characters on the right to the specified size
                                            </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$size</b>
                    </td>
                    <td>
                        <i><a href='https://www.php.net/manual/en/language.types.integer.php'>int</a></i>
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
                        <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                    </td>
                    <td>The character to be used to complete the string</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="3">
                        <a href="/docs/tech/3.renderer/classes/PregMatch.md">preg_match</a><br>
                                                Perform a regular expression match
                                            </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$pattern</b>
                    </td>
                    <td>
                        <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                    </td>
                    <td>The pattern to search for, as a string.</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td >
                        <a href="/docs/tech/3.renderer/classes/PrepareSourceLink.md">prepareSourceLink</a><br>
                                                The filter converts the string into an anchor that can be used in a GitHub document link
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td >
                        <a href="/docs/tech/3.renderer/classes/Quotemeta.md">quotemeta</a><br>
                                                Quote meta characters
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td >
                        <a href="/docs/tech/3.renderer/classes/RemoveLineBrakes.md">removeLineBrakes</a><br>
                                                The filter replaces all line breaks with a space
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="7">
                        <a href="/docs/tech/3.renderer/classes/StrTypeToUrl.md">strTypeToUrl</a><br>
                                                The filter converts the string with the data type into a link to the documented entity, if possible.
                        <br><i><b>:warning: This filter initiates the creation of documents for the displayed entities</b></i><br>                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$rootEntityCollection</b>
                    </td>
                    <td>
                        <i><a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/src/Core/Parser/Entity/RootEntityCollection.php'>RootEntityCollection</a></i>
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
                        <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
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
                        <i><a href='https://www.php.net/manual/en/language.types.boolean.php'>bool</a></i>
                    </td>
                    <td>If true, creates an entity document. Otherwise, just gives a reference to the entity code</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="3">
                        <a href="/docs/tech/3.renderer/classes/TextToCodeBlock.md">textToCodeBlock</a><br>
                                                Convert text to code block
                                            </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$codeBlockType</b>
                    </td>
                    <td>
                        <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                    </td>
                    <td>Code block type (e.g. php or console )</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                                                <tr>
                                                        <td rowspan="3">
                        <a href="/docs/tech/3.renderer/classes/TextToHeading.md">textToHeading</a><br>
                                                Convert text to html header
                                            </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$headingType</b>
                    </td>
                    <td>
                        <i><a href='https://www.php.net/manual/en/language.types.string.php'>string</a></i>
                    </td>
                    <td>Choose heading type: H1, H2, H3</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                </tbody>
</table>


<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Oct 28 11:03:31 2023 +0300<br><b>Page content update date:</b> Fri Nov 03 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>