.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> Template filters</embed>

---------


.. raw:: html

 <embed> <h1>Template filters</h1></embed>


When generating pages, you can use filters that allow you to modify the content.
Filters available during page generation are defined in method `MainExtension::getFilters\(\) </docs/3.render/3_twigCustomFilters/_Classes/MainExtension.rst>`_

We use the twig template engine, you can get more information about working with filters here: https://twig.symfony.com/doc/1.x/advanced.html#filters


.. raw:: html

 <embed> <h2>How to use a filter in a template:</h2></embed>


.. code-block:: twig

 {{ someText | filter(...parameters) }}


or

.. code-block:: twig

 {{ someText | filter }}



.. raw:: html

 <embed> <h2>Available template filters:</h2></embed>


.. raw:: html

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
                                                        <td >
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/PrepareSourceLink.rst">prepareSourceLink</a><br>
                                                The filter converts the string into an anchor that can be used in a github document link
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td rowspan="5">
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/FixStrSize.rst">fixStrSize</a><br>
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
                        <i>int</i>
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
                        <i>string</i>
                    </td>
                    <td>The character to be used to complete the string</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td >
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/EndTextBySeparatorRst.rst">endTextBySeparatorRst</a><br>
                                                Terminates a string with a delimiter (only in rst format)
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td rowspan="7">
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/StrTypeToUrl.rst">strTypeToUrl</a><br>
                                                The filter converts the string with the data type into a link to the documented class, if possible.
                        <br><i><b>:warning: This filter initiates the creation of documents for the displayed classes</b></i><br>                    </td>
                                                </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$templateType</b>
                    </td>
                    <td>
                        <i>string</i>
                    </td>
                    <td>Display format. rst or html</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$useShortLinkVersion</b>
                    </td>
                    <td>
                        <i>bool</i>
                    </td>
                    <td>Shorten or not the link name. When shortening, only the shortName of the class will be shown</td>
                            </tr>
                            <tr>
                    <td colspan="3"></td>
                </tr>
                                <tr>
                                    <td>
                        <b>$createDocument</b>
                    </td>
                    <td>
                        <i>bool</i>
                    </td>
                    <td>If true, creates a class document. Otherwise, just gives a reference to the class code</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td rowspan="5">
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/AddIndentFromLeft.rst">addIndentFromLeft</a><br>
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
                        <i>int</i>
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
                        <i>bool</i>
                    </td>
                    <td>Skip indent for first line in text or not</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td >
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/HtmlToRst.rst">htmlToRst</a><br>
                                                Wraps an html string in an rst `..raw::html` construct, thus helping to display it.
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td rowspan="3">
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/TextToHeading.rst">textToHeading</a><br>
                                                Convert text to html or rst header
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
                        <i>string</i>
                    </td>
                    <td>Choose heading type: H1, H2, H3</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td rowspan="3">
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/TextToCodeBlockRst.rst">textToCodeBlockRst</a><br>
                                                Convert text to rst header
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
                        <i>string</i>
                    </td>
                    <td>Code block type (e.g. php or console )</td>
                            </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td >
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/Quotemeta.rst">quotemeta</a><br>
                                                Quote meta characters
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                            
                    <tr>
                                                        <td >
                        <a href="/docs/3.render/3_twigCustomFilters/_Classes/RemoveLineBrakes.rst">removeLineBrakes</a><br>
                                                The filter replaces all line breaks with a space
                                            </td>
                                            <td colspan="3">The filter does not accept any additional parameters</td>
                                                </tr>
                                        <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
                </tbody>
  </table>
