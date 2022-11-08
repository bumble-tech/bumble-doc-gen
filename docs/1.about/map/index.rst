.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/1.about/index.rst">About documentation generator</a> <b>/</b> BumbleDocGen class map</embed>

---------


Directory layout ( only documented files shown ):

.. raw:: html

 <embed> <pre>├──<b>BumbleDocGen</b>/
 │  ├──<b>Plugin</b>/
 │  │  ├──<b>CorePlugin</b>/
 │  │  │  └──<b>PageLinker</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/PageRstLinkerPlugin.rst'>PageRstLinkerPlugin.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/PageHtmlLinkerPlugin.rst'>PageHtmlLinkerPlugin.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/BasePageLinker.rst'>BasePageLinker.php</a>
 │  │  ├──<b>Event</b>/
 │  │  │  ├──<b>Render</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/OnLoadEntityDocPluginContent.rst'>OnLoadEntityDocPluginContent.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/BeforeCreatingDocFile.rst'>BeforeCreatingDocFile.php</a>
 │  │  │  └──<b>Parser</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/OnLoadSourceLocatorsCollection.rst'>OnLoadSourceLocatorsCollection.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/AfterCreationClassEntityCollection.rst'>AfterCreationClassEntityCollection.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/OnAddClassEntityToCollection.rst'>OnAddClassEntityToCollection.php</a>
 │  │  ├── <a href='/docs/1.about/map/_Classes/PluginEventDispatcher.rst'>PluginEventDispatcher.php</a>
 │  │  ├── <a href='/docs/1.about/map/_Classes/PluginsCollection.rst'>PluginsCollection.php</a>
 │  │  └── <a href='/docs/1.about/map/_Classes/PluginInterface.rst'>PluginInterface.php</a>
 │  ├──<b>Render</b>/
 │  │  ├──<b>Context</b>/
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/DocumentTransformableEntityInterface.rst'>DocumentTransformableEntityInterface.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/DocumentedEntityWrappersCollection.rst'>DocumentedEntityWrappersCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/DocumentedEntityWrapper.rst'>DocumentedEntityWrapper.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/Context.rst'>Context.php</a>
 │  │  ├──<b>EntityDocRender</b>/
 │  │  │  ├──<b>PhpClassToRst</b>/
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/PhpClassToRstDocRender.rst'>PhpClassToRstDocRender.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/EntityDocRenderInterface.rst'>EntityDocRenderInterface.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/EntityDocRendersCollection.rst'>EntityDocRendersCollection.php</a>
 │  │  ├──<b>Twig</b>/
 │  │  │  ├──<b>Function</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/GetDocumentedClassUrl.rst'>GetDocumentedClassUrl.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/DrawDocumentedClassLink.rst'>DrawDocumentedClassLink.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/LoadPluginsContent.rst'>LoadPluginsContent.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/IsSubclassOf.rst'>IsSubclassOf.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/PrintClassEntityCollectionAsList.rst'>PrintClassEntityCollectionAsList.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/DrawDocumentationMenu.rst'>DrawDocumentationMenu.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/GeneratePageBreadcrumbs.rst'>GeneratePageBreadcrumbs.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/DrawClassMap.rst'>DrawClassMap.php</a>
 │  │  │  ├──<b>Filter</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/PrepareSourceLink.rst'>PrepareSourceLink.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/FixStrSize.rst'>FixStrSize.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/EndTextBySeparatorRst.rst'>EndTextBySeparatorRst.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/StrTypeToUrl.rst'>StrTypeToUrl.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/AddIndentFromLeft.rst'>AddIndentFromLeft.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/HtmlToRst.rst'>HtmlToRst.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/TextToHeading.rst'>TextToHeading.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/TextToCodeBlockRst.rst'>TextToCodeBlockRst.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/Quotemeta.rst'>Quotemeta.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/RemoveLineBrakes.rst'>RemoveLineBrakes.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/MainExtension.rst'>MainExtension.php</a>
 │  │  ├──<b>Breadcrumbs</b>/
 │  │  │  └── <a href='/docs/1.about/map/_Classes/BreadcrumbsHelper.rst'>BreadcrumbsHelper.php</a>
 │  │  ├──<b>TemplateFiller</b>/
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/TemplateFillerInterface.rst'>TemplateFillerInterface.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/TemplateFillersCollection.rst'>TemplateFillersCollection.php</a>
 │  │  └── <a href='/docs/1.about/map/_Classes/Render.rst'>Render.php</a>
 │  ├──<b>Parser</b>/
 │  │  ├──<b>SourceLocator</b>/
 │  │  │  ├──<b>Internal</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/CachedSourceLocator.rst'>CachedSourceLocator.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/SystemAsyncSourceLocator.rst'>SystemAsyncSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/SourceLocatorInterface.rst'>SourceLocatorInterface.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/DirectorySourceLocator.rst'>DirectorySourceLocator.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/BaseSourceLocator.rst'>BaseSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/AsyncSourceLocator.rst'>AsyncSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/SourceLocatorsCollection.rst'>SourceLocatorsCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/RecursiveDirectoriesSourceLocator.rst'>RecursiveDirectoriesSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/FileIteratorSourceLocator.rst'>FileIteratorSourceLocator.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/SingleFileSourceLocator.rst'>SingleFileSourceLocator.php</a>
 │  │  ├──<b>FilterCondition</b>/
 │  │  │  ├──<b>MethodFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/OnlyFromCurrentClassCondition.rst'>OnlyFromCurrentClassCondition.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/VisibilityCondition.rst'>VisibilityCondition.php</a>
 │  │  │  ├──<b>ClassConstantFilterCondition</b>/
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/VisibilityCondition_2.rst'>VisibilityCondition.php</a>
 │  │  │  ├──<b>CommonFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/VisibilityConditionModifier.rst'>VisibilityConditionModifier.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/FalseCondition.rst'>FalseCondition.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/TrueCondition.rst'>TrueCondition.php</a>
 │  │  │  ├──<b>PropertyFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/OnlyFromCurrentClassCondition_2.rst'>OnlyFromCurrentClassCondition.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/VisibilityCondition_3.rst'>VisibilityCondition.php</a>
 │  │  │  ├──<b>ClassFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/LocatedInCondition.rst'>LocatedInCondition.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/FileTextContainsCondition.rst'>FileTextContainsCondition.php</a>
 │  │  │  │  ├── <a href='/docs/1.about/map/_Classes/HasAnnotationCondition.rst'>HasAnnotationCondition.php</a>
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/HasAttributeCondition.rst'>HasAttributeCondition.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/ConditionGroupTypeEnum.rst'>ConditionGroupTypeEnum.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/ConditionInterface.rst'>ConditionInterface.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/ConditionGroup.rst'>ConditionGroup.php</a>
 │  │  ├──<b>Entity</b>/
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/BaseEntityCollection.rst'>BaseEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/BaseEntity.rst'>BaseEntity.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/PropertyEntityCollection.rst'>PropertyEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/MethodEntityCollection.rst'>MethodEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/PropertyEntity.rst'>PropertyEntity.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/DynamicMethodEntity.rst'>DynamicMethodEntity.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/EnumEntity.rst'>EnumEntity.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/ConstantEntity.rst'>ConstantEntity.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/ClassEntityCollection.rst'>ClassEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/ConstantEntityCollection.rst'>ConstantEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/ClassEntity.rst'>ClassEntity.php</a>
 │  │  │  ├── <a href='/docs/1.about/map/_Classes/MethodEntityInterface.rst'>MethodEntityInterface.php</a>
 │  │  │  └── <a href='/docs/1.about/map/_Classes/MethodEntity.rst'>MethodEntity.php</a>
 │  │  ├── <a href='/docs/1.about/map/_Classes/AttributeParser.rst'>AttributeParser.php</a>
 │  │  ├── <a href='/docs/1.about/map/_Classes/ParserHelper.rst'>ParserHelper.php</a>
 │  │  ├── <a href='/docs/1.about/map/_Classes/ProjectParser.rst'>ProjectParser.php</a>
 │  │  └── <a href='/docs/1.about/map/_Classes/FakeClassLoader.rst'>FakeClassLoader.php</a>
 │  ├── <a href='/docs/1.about/map/_Classes/BaseConfiguration.rst'>BaseConfiguration.php</a>
 │  ├── <a href='/docs/1.about/map/_Classes/DocGenerator.rst'>DocGenerator.php</a>
 │  └── <a href='/docs/1.about/map/_Classes/ConfigurationInterface.rst'>ConfigurationInterface.php</a>
 └──<b>SelfDoc</b>/
 │  ├──<b>Configuration</b>/
 │  │  ├──<b>Plugin</b>/
 │  │  │  ├──<b>TwigFilterClassParser</b>/
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/TwigFilterClassParserPlugin.rst'>TwigFilterClassParserPlugin.php</a>
 │  │  │  └──<b>TwigFunctionClassParser</b>/
 │  │  │  │  └── <a href='/docs/1.about/map/_Classes/TwigFunctionClassParserPlugin.rst'>TwigFunctionClassParserPlugin.php</a>
 │  │  └── <a href='/docs/1.about/map/_Classes/Configuration.rst'>Configuration.php</a>
 │  └──<b>Console</b>/
 │  │  ├──<b>Command</b>/
 │  │  │  └── <a href='/docs/1.about/map/_Classes/GenerateCommand.rst'>GenerateCommand.php</a>
 │  │  └── <a href='/docs/1.about/map/_Classes/App.rst'>App.php</a>
 </pre></embed>
