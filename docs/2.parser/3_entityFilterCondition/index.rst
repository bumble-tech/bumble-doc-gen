.. raw:: html

 <embed> <a href="/docs/readme.rst">BumbleDocGen</a> <b>/</b> <a href="/docs/2.parser/index.rst">Parser</a> <b>/</b> Entity filter conditions</embed>

---------


.. raw:: html

 <embed> <h1>Entity filter conditions</h1></embed>


In order to determine whether an entity can be added to a collection (for example, `ClassEntity </docs/2.parser/3_entityFilterCondition/_Classes/ClassEntity.rst>`_ in a `ClassEntityCollection </docs/2.parser/3_entityFilterCondition/_Classes/ClassEntityCollection.rst>`_ ), filter conditions must be used.

Filtering conditions must be set in the configuration:

*  For classes - `ConfigurationInterface::classEntityFilterCondition() </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst#mclassentityfiltercondition>`_
*  For class constants - `ConfigurationInterface::classConstantEntityFilterCondition() </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst#mclassconstantentityfiltercondition>`_
*  For class properties - `ConfigurationInterface::propertyEntityFilterCondition() </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst#mpropertyentityfiltercondition>`_
*  For class methods - `ConfigurationInterface::methodEntityFilterCondition() </docs/2.parser/3_entityFilterCondition/_Classes/ConfigurationInterface.rst#mmethodentityfiltercondition>`_

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


#. `FalseCondition </docs/2.parser/3_entityFilterCondition/_Classes/FalseCondition.rst>`_ - False conditions, any object is not available

#. `TrueCondition </docs/2.parser/3_entityFilterCondition/_Classes/TrueCondition.rst>`_ - True conditions, any object is available


.. raw:: html

 <embed> <h3>Class filter conditions</h3></embed>


#. `LocatedInCondition </docs/2.parser/3_entityFilterCondition/_Classes/LocatedInCondition.rst>`_ - Checking the existence of a class in the specified directories

#. `HasAnnotationCondition </docs/2.parser/3_entityFilterCondition/_Classes/HasAnnotationCondition.rst>`_ - Checking for an annotation on a class

#. `HasAttributeCondition </docs/2.parser/3_entityFilterCondition/_Classes/HasAttributeCondition.rst>`_ - Checking for an attribute on a class


.. raw:: html

 <embed> <h3>Method filter conditions</h3></embed>


#. `OnlyFromCurrentClassCondition </docs/2.parser/3_entityFilterCondition/_Classes/OnlyFromCurrentClassCondition.rst>`_ - Only methods that belong to the current class (not parent)

#. `VisibilityCondition </docs/2.parser/3_entityFilterCondition/_Classes/VisibilityCondition.rst>`_ - Method access modifier check


.. raw:: html

 <embed> <h3>Property filter conditions</h3></embed>


#. `OnlyFromCurrentClassCondition </docs/2.parser/3_entityFilterCondition/_Classes/OnlyFromCurrentClassCondition_2.rst>`_ - Only properties that belong to the current class (not parent)

#. `VisibilityCondition </docs/2.parser/3_entityFilterCondition/_Classes/VisibilityCondition_2.rst>`_ - Property access modifier check


.. raw:: html

 <embed> <h3>Class constant filter conditions</h3></embed>


#. `VisibilityCondition </docs/2.parser/3_entityFilterCondition/_Classes/VisibilityCondition_3.rst>`_ - Constant access modifier check

