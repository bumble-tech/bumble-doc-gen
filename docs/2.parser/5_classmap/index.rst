.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> Parser class map</embed>

---------


.. raw:: html

 <embed> <h1>Parser class map</h1></embed>


.. raw:: html

 <embed> <pre>└──<b>BumbleDocGen</b>/
 │  └──<b>Parser</b>/
 │  │  ├──<b>SourceLocator</b>/
 │  │  │  ├──<b>Internal</b>/
 │  │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/SystemAsyncSourceLocator.rst'>SystemAsyncSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/SourceLocatorInterface.rst'>SourceLocatorInterface.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/DirectorySourceLocator.rst'>DirectorySourceLocator.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/AsyncSourceLocator.rst'>AsyncSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/SourceLocatorsCollection.rst'>SourceLocatorsCollection.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/RecursiveDirectoriesSourceLocator.rst'>RecursiveDirectoriesSourceLocator.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/FileIteratorSourceLocator.rst'>FileIteratorSourceLocator.php</a>
 │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/SingleFileSourceLocator.rst'>SingleFileSourceLocator.php</a>
 │  │  ├──<b>FilterCondition</b>/
 │  │  │  ├──<b>MethodFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/OnlyFromCurrentClassCondition.rst'>OnlyFromCurrentClassCondition.php</a>
 │  │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/VisibilityCondition.rst'>VisibilityCondition.php</a>
 │  │  │  ├──<b>ClassConstantFilterCondition</b>/
 │  │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/VisibilityCondition_2.rst'>VisibilityCondition.php</a>
 │  │  │  ├──<b>CommonFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/VisibilityConditionModifier.rst'>VisibilityConditionModifier.php</a>
 │  │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/FalseCondition.rst'>FalseCondition.php</a>
 │  │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/TrueCondition.rst'>TrueCondition.php</a>
 │  │  │  ├──<b>PropertyFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/OnlyFromCurrentClassCondition_2.rst'>OnlyFromCurrentClassCondition.php</a>
 │  │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/VisibilityCondition_3.rst'>VisibilityCondition.php</a>
 │  │  │  ├──<b>ClassFilterCondition</b>/
 │  │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/LocatedInCondition.rst'>LocatedInCondition.php</a>
 │  │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/HasAnnotationCondition.rst'>HasAnnotationCondition.php</a>
 │  │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/HasAttributeCondition.rst'>HasAttributeCondition.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ConditionGroupTypeEnum.rst'>ConditionGroupTypeEnum.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ConditionInterface.rst'>ConditionInterface.php</a>
 │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/ConditionGroup.rst'>ConditionGroup.php</a>
 │  │  ├──<b>Entity</b>/
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/BaseEntityCollection.rst'>BaseEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/BaseEntity.rst'>BaseEntity.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/PropertyEntityCollection.rst'>PropertyEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/MethodEntityCollection.rst'>MethodEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/PropertyEntity.rst'>PropertyEntity.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/DynamicMethodEntity.rst'>DynamicMethodEntity.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/EnumEntity.rst'>EnumEntity.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ConstantEntity.rst'>ConstantEntity.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ClassEntityCollection.rst'>ClassEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ConstantEntityCollection.rst'>ConstantEntityCollection.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ClassEntity.rst'>ClassEntity.php</a>
 │  │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/MethodEntityInterface.rst'>MethodEntityInterface.php</a>
 │  │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/MethodEntity.rst'>MethodEntity.php</a>
 │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/AttributeParser.rst'>AttributeParser.php</a>
 │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ParserHelper.rst'>ParserHelper.php</a>
 │  │  ├── <a href='/docs/2.parser/5_classmap/_Classes/ProjectParser.rst'>ProjectParser.php</a>
 │  │  └── <a href='/docs/2.parser/5_classmap/_Classes/FakeClassLoader.rst'>FakeClassLoader.php</a>
 </pre></embed>
