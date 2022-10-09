.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> Rendering process</embed>

---------


.. raw:: html

 <embed> <h1>Rendering process</h1></embed>


.. code-block:: php

 (new Render($configuration, $projectParser->getReflector(), $classEntityCollection))->run();


.. raw:: html

 <embed> <h2>Start rendering:</h2></embed>


Render passes through all files from the directory specified in method `ConfigurationInterface::getTemplatesDir() </docs/3.render/1_renderingProcess/_Classes/ConfigurationInterface.rst#mgettemplatesdir>`_

If the file ends with **.twig** then the file is processed, otherwise it is simply copied
to the target directory obtained from method `ConfigurationInterface::getOutputDirBaseUrl() </docs/3.render/1_renderingProcess/_Classes/ConfigurationInterface.rst#mgetoutputdirbaseurl>`_.
We use twig to process templates.

.. raw:: html

 <embed> <h2>Adding class documentation:</h2></embed>


If the template contains links to any classes *(for example, when calling the* `GetDocumentedClassUrl </docs/3.render/1_renderingProcess/_Classes/GetDocumentedClassUrl.rst>`_ *function)*,
as well as if they were parsed according to the rules in the
`ConfigurationInterface::getSourceLocators() </docs/3.render/1_renderingProcess/_Classes/ConfigurationInterface.rst#mgetsourcelocators>`_ and `ConfigurationInterface::classEntityFilterCondition() </docs/3.render/1_renderingProcess/_Classes/ConfigurationInterface.rst#mclassentityfiltercondition>`_ methods, the **_Classes** directory
is automatically created next to this file, in which automatically generated documentation for these classes.




---------




.. raw:: html

 <embed> <h1>Variables available in doc templates</h1></embed>


*  **classEntityCollection** - contains an instance of class `ClassEntityCollection </docs/3.render/1_renderingProcess/_Classes/ClassEntityCollection.rst>`_
*  **fillersParameters** - contains an array obtained from method `TemplateFillersCollection::getParametersForTemplate() </docs/3.render/1_renderingProcess/_Classes/TemplateFillersCollection.rst#mgetparametersfortemplate>`_ You can read more about this on the `Template filters </docs/3.render/3_twigCustomFilters/index.rst>`_ page.




---------




.. raw:: html

 <embed> <h1>Linking templates</h1></embed>



One of the main requirements of the documentation is to be able to easily and quickly implement linking between pages.
We have several options for this:

.. raw:: html

 <embed> <h2>Completing blank links</h2></embed>


Two plugins ( `PageRstLinkerPlugin </docs/3.render/1_renderingProcess/_Classes/PageRstLinkerPlugin.rst>`_ and `PageHtmlLinkerPlugin </docs/3.render/1_renderingProcess/_Classes/PageHtmlLinkerPlugin.rst>`_ ) have been added to the basic configuration,
which process the text of the filled template before its result is written to a file, and fill in all empty links.

For example, an empty rst link of this format:

.. raw:: html

 <embed> <pre>&lsquo;Existent page name&lsquo;_</pre></embed>


will be replaced with this link:

.. raw:: html

 <embed> <pre>&lsquo;Existent page name &#8249;/docs/some/page/targetPage.rst&#8250;&lsquo;_</pre></embed>



And for HTML links like this:

.. raw:: html

 <embed> <pre>&lt;a&gt;Existent page name&lt;/a&gt;</pre></embed>


will be replaced with this link:

.. raw:: html

 <embed> <pre>&lt;a href=&quot;/docs/some/page/targetPage.rst&quot;&gt;Existent page name&lt;/a&gt;</pre></embed>



.. raw:: html

 <embed> <h2>Breadcrumbs</h2></embed>


For breadcrumbs we have class `BreadcrumbsHelper </docs/3.render/1_renderingProcess/_Classes/BreadcrumbsHelper.rst>`_

The **generatePageBreadcrumbs** function is also available in each template:

.. code-block:: twig

 {{ generatePageBreadcrumbs(title, _self) }}


With it, you can generate breadcrumbs for the template, for example, in the example shown, breadcrumbs are generated for the current page


.. raw:: html

 <embed> <h2>Functions and filters</h2></embed>


We have functions and filters that can generate a reference for documented classes.




---------




.. raw:: html

 <embed> <h1>Page title</h1></embed>


You need to add a page title for several reasons: the title text is involved in menu generation and breadcrumb generation.

To add a title to a template, add the following code:

.. code-block:: twig

 {% set title = 'Some title' %}


*:warning:* If the title is not set, the name of the directory will be used as the title.
