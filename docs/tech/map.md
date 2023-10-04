<embed> <a href="/docs/README.md">BumbleDocGen</a> <b>/</b> <a href="/docs/tech/readme.md">Technical description of the project</a> <b>/</b> Class map<hr> </embed>

Directory layout ( only documented files shown ):

<embed> <pre>└──<b>src</b>/
│  ├──<b>Console</b>/
│  │  ├──<b>Command</b>/
│  │  │  ├── <a href='/docs/tech/classes/AddMissingDocBlocksCommand.md'>AddMissingDocBlocksCommand.php</a> <i> — <samp>Base class for all commands.</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/AdditionalCommandCollection.md'>AdditionalCommandCollection.php</a> 
│  │  │  ├── <a href='/docs/tech/classes/BaseCommand.md'>BaseCommand.php</a> <i> — <samp>Base class for all commands.</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/FillInReadmeMdTemplateCommand.md'>FillInReadmeMdTemplateCommand.php</a> <i> — <samp>Base class for all commands.</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/GenerateCommand.md'>GenerateCommand.php</a> <i> — <samp>Base class for all commands.</samp></i>
│  │  │  └── <a href='/docs/tech/classes/GenerateProjectTemplatesStructureCommand.md'>GenerateProjectTemplatesStructureCommand.php</a> <i> — <samp>Base class for all commands.</samp></i>
│  │  ├──<b>ProgressBar</b>/
│  │  │  ├── <a href='/docs/tech/classes/ProgressBarFactory.md'>ProgressBarFactory.php</a> 
│  │  │  └── <a href='/docs/tech/classes/StylizedProgressBar.md'>StylizedProgressBar.php</a> 
│  │  └── <a href='/docs/tech/classes/App.md'>App.php</a> <i> — <samp>An Application is the container for a collection of commands.</samp></i>
│  ├──<b>Core</b>/
│  │  ├──<b>Cache</b>/
│  │  │  ├──<b>LocalCache</b>/
│  │  │  │  ├──<b>Exception</b>/
│  │  │  │  │  └── <a href='/docs/tech/classes/ObjectNotFoundException.md'>ObjectNotFoundException.php</a> <i> — <samp>Exception is the base class for all Exceptions.</samp></i>
│  │  │  │  └── <a href='/docs/tech/classes/LocalObjectCache.md'>LocalObjectCache.php</a> 
│  │  │  ├── <a href='/docs/tech/classes/EntityCacheItemPool.md'>EntityCacheItemPool.php</a> 
│  │  │  ├── <a href='/docs/tech/classes/SharedCompressedDocumentFileCache.md'>SharedCompressedDocumentFileCache.php</a> 
│  │  │  └── <a href='/docs/tech/classes/SourceLocatorCacheItemPool.md'>SourceLocatorCacheItemPool.php</a> 
│  │  ├──<b>Configuration</b>/
│  │  │  ├──<b>Exception</b>/
│  │  │  │  └── <a href='/docs/tech/classes/InvalidConfigurationParameterException.md'>InvalidConfigurationParameterException.php</a> <i> — <samp>Exception is the base class for all Exceptions.</samp></i>
│  │  │  ├──<b>ValueResolver</b>/
│  │  │  │  ├── <a href='/docs/tech/classes/ArgvValueResolver.md'>ArgvValueResolver.php</a> <i> — <samp>We supplement the values by replacing the shortcodes with real values by the arguments passed to ...</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/InternalValueResolver.md'>InternalValueResolver.php</a> <i> — <samp>We supplement the values by replacing the shortcodes with real values by internalValuesMap</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/RefValueResolver.md'>RefValueResolver.php</a> <i> — <samp>We supplement the values by replacing the shortcodes with real values by the configuration key</samp></i>
│  │  │  │  └── <a href='/docs/tech/classes/ValueResolverInterface.md'>ValueResolverInterface.php</a> <i> — <samp>Class interface to resolve value from config file</samp></i>
│  │  │  ├──<b>ValueTransformer</b>/
│  │  │  │  ├── <a href='/docs/tech/classes/ValueToClassTransformer.md'>ValueToClassTransformer.php</a> <i> — <samp>Standard text-to-class transformer</samp></i>
│  │  │  │  └── <a href='/docs/tech/classes/ValueTransformerInterface.md'>ValueTransformerInterface.php</a> <i> — <samp>Interface defining classes that transform text configuration values into objects</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/Configuration.md'>Configuration.php</a> <i> — <samp>Configuration project documentation</samp></i>
│  │  │  └── <a href='/docs/tech/classes/ConfigurationParameterBag.md'>ConfigurationParameterBag.php</a> <i> — <samp>Wrapper for getting raw configuration file data</samp></i>
│  │  ├──<b>Parser</b>/
│  │  │  ├──<b>Entity</b>/
│  │  │  │  ├──<b>Cache</b>/
│  │  │  │  │  ├──<b>CacheKey</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/CacheKeyGeneratorInterface.md'>CacheKeyGeneratorInterface.php</a> 
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/DefaultCacheKeyGenerator.md'>DefaultCacheKeyGenerator.php</a> 
│  │  │  │  │  │  └── <a href='/docs/tech/classes/RendererContextCacheKeyGenerator.md'>RendererContextCacheKeyGenerator.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CacheableEntityInterface.md'>CacheableEntityInterface.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CacheableEntityTrait.md'>CacheableEntityTrait.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CacheableEntityWrapperFactory.md'>CacheableEntityWrapperFactory.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CacheableEntityWrapperTrait.md'>CacheableEntityWrapperTrait.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CacheableMethod.md'>CacheableMethod.php</a> 
│  │  │  │  │  └── <a href='/docs/tech/classes/EntityCacheStorageHelper.md'>EntityCacheStorageHelper.php</a> 
│  │  │  │  ├──<b>CollectionLogOperation</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/CloneOperation.md'>CloneOperation.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/IterateEntitiesOperation.md'>IterateEntitiesOperation.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/OperationInterface.md'>OperationInterface.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/OperationsCollection.md'>OperationsCollection.php</a> 
│  │  │  │  │  └── <a href='/docs/tech/classes/SingleEntitySearchOperation.md'>SingleEntitySearchOperation.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/BaseEntityCollection.md'>BaseEntityCollection.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/EntityInterface.md'>EntityInterface.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/LoggableRootEntityCollection.md'>LoggableRootEntityCollection.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/RootEntityCollection.md'>RootEntityCollection.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/RootEntityCollectionsGroup.md'>RootEntityCollectionsGroup.php</a> 
│  │  │  │  └── <a href='/docs/tech/classes/RootEntityInterface.md'>RootEntityInterface.php</a> <i> — <samp>Since the documentation generator supports several programming languages, their entities need to ...</samp></i>
│  │  │  ├──<b>FilterCondition</b>/
│  │  │  │  ├──<b>CommonFilterCondition</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/FalseCondition.md'>FalseCondition.php</a> <i> — <samp>False conditions, any object is not available</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/FileTextContainsCondition.md'>FileTextContainsCondition.php</a> <i> — <samp>Checking if a file contains a substring</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/LocatedInCondition.md'>LocatedInCondition.php</a> <i> — <samp>Checking the existence of an entity in the specified directories</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/TrueCondition.md'>TrueCondition.php</a> <i> — <samp>True conditions, any object is available</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/ConditionGroup.md'>ConditionGroup.php</a> <i> — <samp>Filter condition to group other filter conditions. A group can have an OR/AND condition test; In ...</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/ConditionGroupTypeEnum.md'>ConditionGroupTypeEnum.php</a> 
│  │  │  │  └── <a href='/docs/tech/classes/ConditionInterface.md'>ConditionInterface.php</a> 
│  │  │  ├──<b>SourceLocator</b>/
│  │  │  │  ├── <a href='/docs/tech/classes/BaseSourceLocator.md'>BaseSourceLocator.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/DirectoriesSourceLocator.md'>DirectoriesSourceLocator.php</a> <i> — <samp>Loads all files from the specified directory</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/FileIteratorSourceLocator.md'>FileIteratorSourceLocator.php</a> <i> — <samp>Loads all files using an iterator</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/RecursiveDirectoriesSourceLocator.md'>RecursiveDirectoriesSourceLocator.php</a> <i> — <samp>Loads all files from the specified directories, which are traversed recursively</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/SingleFileSourceLocator.md'>SingleFileSourceLocator.php</a> <i> — <samp>Loads one specific file by its path</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/SourceLocatorInterface.md'>SourceLocatorInterface.php</a> 
│  │  │  │  └── <a href='/docs/tech/classes/SourceLocatorsCollection.md'>SourceLocatorsCollection.php</a> 
│  │  │  └── <a href='/docs/tech/classes/ProjectParser.md'>ProjectParser.php</a> <i> — <samp>Entity for project parsing using source locators</samp></i>
│  │  ├──<b>Plugin</b>/
│  │  │  ├──<b>CorePlugin</b>/
│  │  │  │  ├──<b>LastPageCommitter</b>/
│  │  │  │  │  └── <a href='/docs/tech/classes/LastPageCommitter.md'>LastPageCommitter.php</a> <i> — <samp>Plugin for adding a block with information about the last commit and date of page update to the g...</samp></i>
│  │  │  │  └──<b>PageLinker</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/BasePageLinker.md'>BasePageLinker.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/PageHtmlLinkerPlugin.md'>PageHtmlLinkerPlugin.php</a> <i> — <samp>Adds URLs to empty links in HTML format; Links may contain: 1) Short entity name 2) Full entity n...</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/PageRstLinkerPlugin.md'>PageRstLinkerPlugin.php</a> <i> — <samp>Adds URLs to empty links in rst format; Links may contain: 1) Short entity name 2) Full entity na...</samp></i>
│  │  │  ├──<b>Event</b>/
│  │  │  │  ├──<b>Parser</b>/
│  │  │  │  │  └── <a href='/docs/tech/classes/OnLoadSourceLocatorsCollection.md'>OnLoadSourceLocatorsCollection.php</a> <i> — <samp>Called when source locators are loaded</samp></i>
│  │  │  │  └──<b>Renderer</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/BeforeCreatingDocFile.md'>BeforeCreatingDocFile.php</a> <i> — <samp>Called before the content of the documentation document is saved to a file</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/OnGettingResourceLink.md'>OnGettingResourceLink.php</a> <i> — <samp>Event is the base class for classes containing event data.</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/OnLoadEntityDocPluginContent.md'>OnLoadEntityDocPluginContent.php</a> <i> — <samp>Called when entity documentation is generated (plugin content loading)</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/OnlySingleExecutionEvent.md'>OnlySingleExecutionEvent.php</a> 
│  │  │  ├── <a href='/docs/tech/classes/PluginEventDispatcher.md'>PluginEventDispatcher.php</a> <i> — <samp>The EventDispatcherInterface is the central point of Symfony's event listener system.</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/PluginInterface.md'>PluginInterface.php</a> 
│  │  │  └── <a href='/docs/tech/classes/PluginsCollection.md'>PluginsCollection.php</a> 
│  │  └──<b>Renderer</b>/
│  │  │  ├──<b>Breadcrumbs</b>/
│  │  │  │  ├── <a href='/docs/tech/classes/BreadcrumbsHelper.md'>BreadcrumbsHelper.php</a> <i> — <samp>Helper entity for working with breadcrumbs</samp></i>
│  │  │  │  └── <a href='/docs/tech/classes/BreadcrumbsTwigEnvironment.md'>BreadcrumbsTwigEnvironment.php</a> 
│  │  │  ├──<b>Context</b>/
│  │  │  │  ├──<b>Dependency</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/DirectoryDependency.md'>DirectoryDependency.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/FileDependency.md'>FileDependency.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/RendererDependencyFactory.md'>RendererDependencyFactory.php</a> 
│  │  │  │  │  └── <a href='/docs/tech/classes/RendererDependencyInterface.md'>RendererDependencyInterface.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/DocumentTransformableEntityInterface.md'>DocumentTransformableEntityInterface.php</a> <i> — <samp>Interface for entities that can be generated into documents</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/DocumentedEntityWrapper.md'>DocumentedEntityWrapper.php</a> <i> — <samp>Wrapper for the entity that was requested for documentation</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/DocumentedEntityWrappersCollection.md'>DocumentedEntityWrappersCollection.php</a> 
│  │  │  │  └── <a href='/docs/tech/classes/RendererContext.md'>RendererContext.php</a> <i> — <samp>Document rendering context</samp></i>
│  │  │  ├──<b>EntityDocRenderer</b>/
│  │  │  │  ├── <a href='/docs/tech/classes/EntityDocRendererInterface.md'>EntityDocRendererInterface.php</a> <i> — <samp>Entity documentation renderer interface</samp></i>
│  │  │  │  └── <a href='/docs/tech/classes/EntityDocRenderersCollection.md'>EntityDocRenderersCollection.php</a> 
│  │  │  ├──<b>PageLinkProcessor</b>/
│  │  │  │  ├── <a href='/docs/tech/classes/BasePageLinkProcessor.md'>BasePageLinkProcessor.php</a> 
│  │  │  │  ├── <a href='/docs/tech/classes/GithubPagesLinkProcessor.md'>GithubPagesLinkProcessor.php</a> 
│  │  │  │  └── <a href='/docs/tech/classes/PageLinkProcessorInterface.md'>PageLinkProcessorInterface.php</a> 
│  │  │  ├──<b>Twig</b>/
│  │  │  │  ├──<b>Filter</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/AddIndentFromLeft.md'>AddIndentFromLeft.php</a> <i> — <samp>Filter adds indent from left</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/CustomFilterInterface.md'>CustomFilterInterface.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CustomFiltersCollection.md'>CustomFiltersCollection.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/FixStrSize.md'>FixStrSize.php</a> <i> — <samp>The filter pads the string with the specified characters on the right to the specified size</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/PregMatch.md'>PregMatch.php</a> <i> — <samp>Perform a regular expression match</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/PrepareSourceLink.md'>PrepareSourceLink.php</a> <i> — <samp>The filter converts the string into an anchor that can be used in a GitHub document link</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/Quotemeta.md'>Quotemeta.php</a> <i> — <samp>Quote meta characters</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/RemoveLineBrakes.md'>RemoveLineBrakes.php</a> <i> — <samp>The filter replaces all line breaks with a space</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/StrTypeToUrl.md'>StrTypeToUrl.php</a> <i> — <samp>The filter converts the string with the data type into a link to the documented entity, if possible.</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/TextToCodeBlock.md'>TextToCodeBlock.php</a> <i> — <samp>Convert text to code block</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/TextToHeading.md'>TextToHeading.php</a> <i> — <samp>Convert text to html header</samp></i>
│  │  │  │  ├──<b>Function</b>/
│  │  │  │  │  ├── <a href='/docs/tech/classes/CustomFunctionInterface.md'>CustomFunctionInterface.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/CustomFunctionsCollection.md'>CustomFunctionsCollection.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/DrawDocumentationMenu.md'>DrawDocumentationMenu.php</a> <i> — <samp>Generate documentation menu in HTML format. To generate the menu, the start page is taken, and al...</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/DrawDocumentedEntityLink.md'>DrawDocumentedEntityLink.php</a> <i> — <samp>Creates an entity link by object</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/FileGetContents.md'>FileGetContents.php</a> <i> — <samp>Displaying the content of a file or web resource</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/GeneratePageBreadcrumbs.md'>GeneratePageBreadcrumbs.php</a> <i> — <samp>Function to generate breadcrumbs on the page</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/GetDocumentationPageUrl.md'>GetDocumentationPageUrl.php</a> <i> — <samp>Creates an entity link by object</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/GetDocumentedEntityUrl.md'>GetDocumentedEntityUrl.php</a> <i> — <samp>Get the URL of a documented entity by its name. If the entity is found, next to the file where th...</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/LoadPluginsContent.md'>LoadPluginsContent.php</a> <i> — <samp>Process entity template blocks with plugins. The method returns the content processed by plugins.</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/PrintEntityCollectionAsList.md'>PrintEntityCollectionAsList.php</a> <i> — <samp>Outputting entity data as HTML list</samp></i>
│  │  │  │  ├── <a href='/docs/tech/classes/MainExtension.md'>MainExtension.php</a> <i> — <samp>This is an extension that is used to generate documents from templates</samp></i>
│  │  │  │  └── <a href='/docs/tech/classes/MainTwigEnvironment.md'>MainTwigEnvironment.php</a> 
│  │  │  ├── <a href='/docs/tech/classes/Renderer.md'>Renderer.php</a> <i> — <samp>Generates and processes files from directory TemplatesDir saving them to directory OutputDir</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/RendererHelper.md'>RendererHelper.php</a> 
│  │  │  └── <a href='/docs/tech/classes/RendererIteratorFactory.md'>RendererIteratorFactory.php</a> 
│  ├──<b>LanguageHandler</b>/
│  │  ├──<b>Php</b>/
│  │  │  ├──<b>Parser</b>/
│  │  │  │  ├──<b>Entity</b>/
│  │  │  │  │  ├──<b>Cache</b>/
│  │  │  │  │  │  └── <a href='/docs/tech/classes/CacheablePhpEntityFactory.md'>CacheablePhpEntityFactory.php</a> 
│  │  │  │  │  ├──<b>Exception</b>/
│  │  │  │  │  │  └── <a href='/docs/tech/classes/ReflectionException.md'>ReflectionException.php</a> <i> — <samp>Exception is the base class for all Exceptions.</samp></i>
│  │  │  │  │  ├──<b>Reflection</b>/
│  │  │  │  │  │  └── <a href='/docs/tech/classes/ReflectorWrapper.md'>ReflectorWrapper.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/BaseEntity.md'>BaseEntity.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/ClassEntity.md'>ClassEntity.php</a> <i> — <samp>Class entity</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/ClassEntityCollection.md'>ClassEntityCollection.php</a> <i> — <samp>Collection of PHP class entities</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/ConstantEntity.md'>ConstantEntity.php</a> <i> — <samp>Class constant entity</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/ConstantEntityCollection.md'>ConstantEntityCollection.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/DynamicMethodEntity.md'>DynamicMethodEntity.php</a> <i> — <samp>Method obtained by parsing the "method" annotation</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/MethodEntity.md'>MethodEntity.php</a> <i> — <samp>Class method entity</samp></i>
│  │  │  │  │  ├── <a href='/docs/tech/classes/MethodEntityCollection.md'>MethodEntityCollection.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/MethodEntityInterface.md'>MethodEntityInterface.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/PropertyEntity.md'>PropertyEntity.php</a> <i> — <samp>Class property entity</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/PropertyEntityCollection.md'>PropertyEntityCollection.php</a> 
│  │  │  │  ├──<b>FilterCondition</b>/
│  │  │  │  │  ├──<b>ClassConstantFilterCondition</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsPrivateCondition.md'>IsPrivateCondition.php</a> <i> — <samp>Check is a private constant or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsProtectedCondition.md'>IsProtectedCondition.php</a> <i> — <samp>Check is a protected constant or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsPublicCondition.md'>IsPublicCondition.php</a> <i> — <samp>Check is a public constant or not</samp></i>
│  │  │  │  │  │  └── <a href='/docs/tech/classes/VisibilityCondition.md'>VisibilityCondition.php</a> <i> — <samp>Constant access modifier check</samp></i>
│  │  │  │  │  ├──<b>ClassFilterCondition</b>/
│  │  │  │  │  │  └── <a href='/docs/tech/classes/VisibilityConditionModifier.md'>VisibilityConditionModifier.php</a> 
│  │  │  │  │  ├──<b>MethodFilterCondition</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsPrivateCondition_2.md'>IsPrivateCondition.php</a> <i> — <samp>Check is a private method or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsProtectedCondition_2.md'>IsProtectedCondition.php</a> <i> — <samp>Check is a protected method or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsPublicCondition_2.md'>IsPublicCondition.php</a> <i> — <samp>Check is a public method or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/OnlyFromCurrentClassCondition.md'>OnlyFromCurrentClassCondition.php</a> <i> — <samp>Only methods that belong to the current class (not parent)</samp></i>
│  │  │  │  │  │  └── <a href='/docs/tech/classes/VisibilityCondition_2.md'>VisibilityCondition.php</a> <i> — <samp>Method access modifier check</samp></i>
│  │  │  │  │  └──<b>PropertyFilterCondition</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsPrivateCondition_3.md'>IsPrivateCondition.php</a> <i> — <samp>Check is a private property or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsProtectedCondition_3.md'>IsProtectedCondition.php</a> <i> — <samp>Check is a protected property or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/IsPublicCondition_3.md'>IsPublicCondition.php</a> <i> — <samp>Check is a public property or not</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/OnlyFromCurrentClassCondition_2.md'>OnlyFromCurrentClassCondition.php</a> <i> — <samp>Only properties that belong to the current class (not parent)</samp></i>
│  │  │  │  │  │  └── <a href='/docs/tech/classes/VisibilityCondition_3.md'>VisibilityCondition.php</a> <i> — <samp>Property access modifier check</samp></i>
│  │  │  │  ├──<b>SourceLocator</b>/
│  │  │  │  │  ├──<b>Internal</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/CachedSourceLocator.md'>CachedSourceLocator.php</a> 
│  │  │  │  │  │  └── <a href='/docs/tech/classes/SystemAsyncSourceLocator.md'>SystemAsyncSourceLocator.php</a> 
│  │  │  │  │  ├── <a href='/docs/tech/classes/AsyncSourceLocator.md'>AsyncSourceLocator.php</a> <i> — <samp>Lazy loading classes. Cannot be used for initial parsing of files, only for getting specific docu...</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/CustomSourceLocatorInterface.md'>CustomSourceLocatorInterface.php</a> 
│  │  │  │  └── <a href='/docs/tech/classes/ParserHelper.md'>ParserHelper.php</a> 
│  │  │  ├──<b>Plugin</b>/
│  │  │  │  ├──<b>CorePlugin</b>/
│  │  │  │  │  └──<b>BasePhpStubber</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/BasePhpStubberPlugin.md'>BasePhpStubberPlugin.php</a> <i> — <samp>Adding links to type documentation and documentation of built-in PHP classes</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/ComposerStubberPlugin.md'>ComposerStubberPlugin.php</a> <i> — <samp>Adding links to the documentation of PHP classes in the \Composer namespace</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/PhpDocumentorStubberPlugin.md'>PhpDocumentorStubberPlugin.php</a> <i> — <samp>Adding links to the documentation of PHP classes in the \phpDocumentor namespace</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/PhpUnitStubberPlugin.md'>PhpUnitStubberPlugin.php</a> <i> — <samp>Adding links to the documentation of PHP classes in the \PHPUnit namespace</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/PsrClassesStubberPlugin.md'>PsrClassesStubberPlugin.php</a> <i> — <samp>Adding links to the documentation of PHP classes in the \Psr namespace</samp></i>
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/SymfonyComponentStubberPlugin.md'>SymfonyComponentStubberPlugin.php</a> <i> — <samp>Adding links to the documentation of PHP classes in the \Symfony\Component namespace</samp></i>
│  │  │  │  │  │  └── <a href='/docs/tech/classes/TwigStubberPlugin.md'>TwigStubberPlugin.php</a> <i> — <samp>Adding links to the documentation of PHP classes in the \Twig namespace</samp></i>
│  │  │  │  └──<b>Event</b>/
│  │  │  │  │  ├──<b>Entity</b>/
│  │  │  │  │  │  └── <a href='/docs/tech/classes/OnCheckIsClassEntityCanBeLoad.md'>OnCheckIsClassEntityCanBeLoad.php</a> <i> — <samp>Event is the base class for classes containing event data.</samp></i>
│  │  │  │  │  └──<b>Parser</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/AfterLoadingClassEntityCollection.md'>AfterLoadingClassEntityCollection.php</a> <i> — <samp>The event is called after the initial creation of a collection of class entities</samp></i>
│  │  │  │  │  │  └── <a href='/docs/tech/classes/OnAddClassEntityToCollection.md'>OnAddClassEntityToCollection.php</a> <i> — <samp>Called when each class entity is added to the entity collection</samp></i>
│  │  │  ├──<b>Renderer</b>/
│  │  │  │  ├──<b>EntityDocRenderer</b>/
│  │  │  │  │  ├──<b>PhpClassToMd</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/PhpClassRendererTwigEnvironment.md'>PhpClassRendererTwigEnvironment.php</a> 
│  │  │  │  │  │  └── <a href='/docs/tech/classes/PhpClassToMdDocRenderer.md'>PhpClassToMdDocRenderer.php</a> <i> — <samp>Rendering PHP classes into md format documents (for display on GitHub)</samp></i>
│  │  │  │  │  └── <a href='/docs/tech/classes/EntityDocRendererHelper.md'>EntityDocRendererHelper.php</a> 
│  │  │  │  └──<b>Twig</b>/
│  │  │  │  │  └──<b>Function</b>/
│  │  │  │  │  │  ├── <a href='/docs/tech/classes/DrawClassMap.md'>DrawClassMap.php</a> <i> — <samp>Generate class map in HTML format</samp></i>
│  │  │  │  │  │  └── <a href='/docs/tech/classes/GetClassMethodsBodyCode.md'>GetClassMethodsBodyCode.php</a> <i> — <samp>Get the code of the specified class methods as a formatted string</samp></i>
│  │  │  ├── <a href='/docs/tech/classes/PhpHandler.md'>PhpHandler.php</a> 
│  │  │  └── <a href='/docs/tech/classes/PhpHandlerSettings.md'>PhpHandlerSettings.php</a> 
│  │  ├── <a href='/docs/tech/classes/LanguageHandlerInterface.md'>LanguageHandlerInterface.php</a> 
│  │  └── <a href='/docs/tech/classes/LanguageHandlersCollection.md'>LanguageHandlersCollection.php</a> 
│  ├──<b>TemplateGenerator</b>/
│  │  └──<b>ChatGpt</b>/
│  │  │  ├── <a href='/docs/tech/classes/MissingDocBlocksGenerator.md'>MissingDocBlocksGenerator.php</a> 
│  │  │  ├── <a href='/docs/tech/classes/ReadmeTemplateFiller.md'>ReadmeTemplateFiller.php</a> 
│  │  │  └── <a href='/docs/tech/classes/TemplatesStructureGenerator.md'>TemplatesStructureGenerator.php</a> 
│  ├── <a href='/docs/tech/classes/DocGenerator.md'>DocGenerator.php</a> <i> — <samp>Class for generating documentation.</samp></i>
│  └── <a href='/docs/tech/classes/DocGeneratorFactory.md'>DocGeneratorFactory.php</a> 
</pre> </embed>

<div id='page_committer_info'>
<hr>
<b>Last page committer:</b> fshcherbanich &lt;filipp.shcherbanich@team.bumble.com&gt;<br><b>Last modified date:</b>   Sat Sep 2 21:01:47 2023 +0300<br><b>Page content update date:</b> Wed Oct 04 2023<br>Made with <a href='https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md'>Bumble Documentation Generator</a></div>