<?php

namespace SelfDoc\Configuration;

use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionGroup;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionGroupTypeEnum;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRendersCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition\VisibilityCondition as ClassConstantVisibilityCondition;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\OnlyFromCurrentClassCondition as MethodOnlyFromCurrentClassCondition;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\VisibilityCondition as MethodVisibilityCondition;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition\VisibilityCondition as PropertyVisibilityCondition;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettingsInterface;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;

class PhpHandlerSettings implements PhpHandlerSettingsInterface
{
    public function getClassEntityFilter(): ConditionInterface
    {
        static $classEntityFilter = null;
        if (!$classEntityFilter) {
            $classEntityFilter = new TrueCondition();
        }
        return $classEntityFilter;
    }

    public function getClassConstantEntityFilter(): ConditionInterface
    {
        static $constantEntityFilter = null;
        if (!$constantEntityFilter) {
            $constantEntityFilter = new ClassConstantVisibilityCondition(VisibilityConditionModifier::PUBLIC);
        }
        return $constantEntityFilter;
    }

    public function getMethodEntityFilter(): ConditionInterface
    {
        static $methodEntityFilter = null;
        if (!$methodEntityFilter) {
            $methodEntityFilter = ConditionGroup::create(
                ConditionGroupTypeEnum::AND,
                new MethodVisibilityCondition(VisibilityConditionModifier::PUBLIC),
                new MethodOnlyFromCurrentClassCondition()
            );
        }
        return $methodEntityFilter;
    }

    public function getPropertyEntityFilter(): ConditionInterface
    {
        static $propertyEntityFilter = null;
        if (!$propertyEntityFilter) {
            $propertyEntityFilter = new PropertyVisibilityCondition(VisibilityConditionModifier::PUBLIC);
        }
        return $propertyEntityFilter;
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

    public function asyncSourceLoadingEnabled(): bool
    {
        return true;
    }
}