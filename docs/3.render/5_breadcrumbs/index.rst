.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> Breadcrumbs</embed>

---------


.. raw:: html

 <embed> <h1>Breadcrumbs</h1></embed>


For breadcrumbs we have class `BreadcrumbsHelper </docs/3.render/5_breadcrumbs/_Classes/BreadcrumbsHelper.rst>`_ .
It contains methods that allow you to get additional information from the templates, such as the title of the page,
and also gives you the ability to get breadcrumbs for the current page in html format or as an array.

In templates, you can use the built-in function `GeneratePageBreadcrumbs </docs/3.render/5_breadcrumbs/_Classes/GeneratePageBreadcrumbs.rst>`_, which turns the rendered breadcrumbs into rst or html format:

.. code-block:: twig

 {{ generatePageBreadcrumbs(title, _self) }}


With this function, you can generate breadcrumbs for the template, for example, in the example shown, breadcrumbs are generated for the current page