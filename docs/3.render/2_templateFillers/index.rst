.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/3.render/index.rst">Render</a> <b>/</b> Template fillers</embed>

---------


.. raw:: html

 <embed> <h1>Template fillers</h1></embed>


Sometimes there are situations when the template needs to be filled with some dynamic information,
which can be dynamically obtained when generating documentation. If this information is not in the variables already passed to the template,
you can create a TemplateFiller that will collect this information and pass it to the template.

.. raw:: html

 <embed> <h2>Adding a new template filler</h2></embed>


If you decide to add a new template filler, there are a few things you need to do:

*  Add a new class that implements the `TemplateFillerInterface </docs/3.render/2_templateFillers/_Classes/TemplateFillerInterface.rst>`_ interface
*  In method `TemplateFillerInterface::getTemplateParameters\(\) </docs/3.render/2_templateFillers/_Classes/TemplateFillerInterface.rst#mgettemplateparameters>`_, implement the return of the parameters that are expected in the template
*  Add a new filler to the `TemplateFillersCollection::setForTemplate\(\) </docs/3.render/2_templateFillers/_Classes/TemplateFillersCollection.rst#msetfortemplate>`_ returned in the `ConfigurationInterface::getTemplateFillers\(\) </docs/3.render/2_templateFillers/_Classes/ConfigurationInterface.rst#mgettemplatefillers>`_ method

After that, the data will be available in the template you connected it to in step 3.

The data is passed to the template in the **fillersParameters** variable:

.. code-block:: twig

 {{ fillersParameters.someParameter }}



.. raw:: html

 <embed> <h2>Template fillers class map</h2></embed>


.. raw:: html

 <embed> <pre>└──<b>BumbleDocGen</b>/
 │  └──<b>Render</b>/
 │  │  └──<b>TemplateFiller</b>/
 │  │  │  ├── <a href='/docs/3.render/2_templateFillers/_Classes/TemplateFillerInterface.rst'>TemplateFillerInterface.php</a>
 │  │  │  └── <a href='/docs/3.render/2_templateFillers/_Classes/TemplateFillersCollection.rst'>TemplateFillersCollection.php</a>
 </pre></embed>
