.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> Entity filter conditions</embed>

---------


.. raw:: html

 <embed> <h1>Entity filter conditions</h1></embed>


In order to determine whether an entity can be added to a collection (for example, `ClassEntity </docs/2.parser/3_entityFilterCondition/_Classes/ClassEntity.rst>`_ in a `ClassEntityCollection </docs/2.parser/3_entityFilterCondition/_Classes/ClassEntityCollection.rst>`_ ), filter conditions must be used.

Filtering conditions must be set in the configuration:

*  For classes - `ConfigurationInterface::classEntityFilterCondition\(\) </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst>`_
*  For class constants - `ConfigurationInterface::classConstantEntityFilterCondition\(\) </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst>`_
*  For class properties - `ConfigurationInterface::propertyEntityFilterCondition\(\) </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst>`_
*  For class methods - `ConfigurationInterface::methodEntityFilterCondition\(\) </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst>`_

**Usage example:**

.. code-block:: php

 public function classEntityFilterCondition(ClassEntity $classEntity): ConditionInterface
 {
     return new TrueCondition();
 }



Any conditions must comply with interface `ConditionInterface </docs/2.parser/3_entityFilterCondition/_Classes/ConditionInterface.rst>`_.

To group conditions, there is a `ConditionGroup </docs/2.parser/3_entityFilterCondition/_Classes/ConditionGroup.rst>`_ in the documentation generator:

.. code-block:: php

 public function methodEntityFilterCondition(MethodEntity $methodEntity): ConditionInterface {
     return ConditionGroup::create(
         ConditionGroupTypeEnum::AND,
         new MethodVisibilityCondition(
             $methodEntity,
             VisibilityConditionModifier::PUBLIC
         ),
         new MethodOnlyFromCurrentClassCondition(
             $methodEntity
         )
     );
 }



.. raw:: html

 <embed> <h2>Built-in filter conditions</h2></embed>



.. raw:: html

 <embed> <h3>Common filter conditions</h3></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/FalseCondition.rst'>FalseCondition</a> - False conditions, any object is not available</li><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/TrueCondition.rst'>TrueCondition</a> - True conditions, any object is available</li></ul></embed>


.. raw:: html

 <embed> <h3>Class filter conditions</h3></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/LocatedInCondition.rst'>LocatedInCondition</a> - Checking the existence of a class in the specified directories</li><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/FileTextContainsCondition.rst'>FileTextContainsCondition</a> - Checking if a file contains a substring</li><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/HasAnnotationCondition.rst'>HasAnnotationCondition</a> - Checking for an annotation on a class</li><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/HasAttributeCondition.rst'>HasAttributeCondition</a> - Checking for an attribute on a class</li></ul></embed>


.. raw:: html

 <embed> <h3>Method filter conditions</h3></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/OnlyFromCurrentClassCondition.rst'>OnlyFromCurrentClassCondition</a> - Only methods that belong to the current class (not parent)</li><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/VisibilityCondition.rst'>VisibilityCondition</a> - Method access modifier check</li></ul></embed>


.. raw:: html

 <embed> <h3>Property filter conditions</h3></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/OnlyFromCurrentClassCondition_2.rst'>OnlyFromCurrentClassCondition</a> - Only properties that belong to the current class (not parent)</li><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/VisibilityCondition_2.rst'>VisibilityCondition</a> - Property access modifier check</li></ul></embed>


.. raw:: html

 <embed> <h3>Class constant filter conditions</h3></embed>


.. raw:: html

 <embed> <ul><li><a href='/docs/2.parser/3_entityFilterCondition/_Classes/VisibilityCondition_3.rst'>VisibilityCondition</a> - Constant access modifier check</li></ul></embed>
