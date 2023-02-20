<?php

namespace SelfDoc\Configuration;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition\VisibilityCondition as ClassConstantVisibilityCondition;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\OnlyFromCurrentClassCondition as MethodOnlyFromCurrentClassCondition;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\VisibilityCondition as MethodVisibilityCondition;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition\VisibilityCondition as PropertyVisibilityCondition;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettingsInterface;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Parser\FilterCondition\ConditionGroup;
use BumbleDocGen\Parser\FilterCondition\ConditionGroupTypeEnum;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Render\EntityDocRender\EntityDocRendersCollection;

final class PhpHandlerSettings implements PhpHandlerSettingsInterface
{
    public function classEntityFilterCondition(ClassEntity $classEntity): ConditionInterface
    {
        return new TrueCondition();
    }

    public function classConstantEntityFilterCondition(
        ConstantEntity $constantEntity
    ): ConditionInterface
    {
        return new ClassConstantVisibilityCondition(
            $constantEntity, VisibilityConditionModifier::PUBLIC
        );
    }

    public function methodEntityFilterCondition(
        MethodEntity $methodEntity
    ): ConditionInterface
    {
        return ConditionGroup::create(
            ConditionGroupTypeEnum::AND,
            new MethodVisibilityCondition(
                $methodEntity, VisibilityConditionModifier::PUBLIC
            ),
            new MethodOnlyFromCurrentClassCondition(
                $methodEntity
            )
        );
    }

    public function propertyEntityFilterCondition(
        PropertyEntity $propertyEntity
    ): ConditionInterface
    {
        return new PropertyVisibilityCondition(
            $propertyEntity, VisibilityConditionModifier::PUBLIC
        );
    }

    public function getEntityDocRendersCollection(): EntityDocRendersCollection
    {
        static $entityDocRendersCollection = null;
        if (!$entityDocRendersCollection) {
            $entityDocRendersCollection = new EntityDocRendersCollection();
            $entityDocRendersCollection->add(new PhpClassToMdDocRender());
        }
        return $entityDocRendersCollection;
    }

    public function getFileSourceBaseUrl(): ?string
    {
        return 'https://***REMOVED***/blob/master';
    }
}